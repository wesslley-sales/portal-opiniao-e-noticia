<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContentCategory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController
{

    public function index(Request $request): View
    {
        $inputPeriod = $request->input('filter.period', now()->format('d/m/Y') . ' - ' . now()->format('d/m/Y'));

        $totalPosts = Post::active()->validPeriod()
            ->when($inputPeriod, fn($query) => $query->filterPeriod($inputPeriod))
            ->count();

        $totalViewsPosts = Post::active()->validPeriod()
            ->selectRaw('COALESCE(COUNT(views.id), 0) AS total_views')
            ->join('views', 'posts.id', '=', 'views.viewable_id')
            ->when($inputPeriod, fn($query) => $query->filterPeriod($inputPeriod))
            ->first()
            ->total_views;

        $avgViewsPosts = $totalPosts != 0 ? round($totalViewsPosts / $totalPosts) : 0;

        $mostViewedPosts = Post::active()->validPeriod()
            ->with(['users:name'])
            ->selectRaw('posts.id, posts.title, posts.published_at, COALESCE(COUNT(views.id), 0) AS total_views')
            ->join('views', 'posts.id', '=', 'views.viewable_id')
            ->when($inputPeriod, fn($query) => $query->filterPeriod($inputPeriod))
            ->groupBy('posts.id')
            ->orderByDesc('total_views')
            ->take(10)
            ->get();

        $totalViewsPostMostViewed = $mostViewedPosts->max('total_views');
        $totalViewsPostLessViewed = $mostViewedPosts->min('total_views');
        $userPostMostViewed       = $mostViewedPosts->where('total_views', $totalViewsPostMostViewed)?->first()?->users?->first()?->name;

        $postsUsers = User::select('name as user_name')
            ->whereHas('posts', fn($query) => $query->active()->validPeriod())
            ->withCount([
                'posts as total_posts' => fn($query) => $query->active()
                    ->validPeriod()
                    ->when($inputPeriod, fn($query) => $query->filterPeriod($inputPeriod)),
                'posts as total_views' => fn($query) => $query->active()
                    ->validPeriod()
                    ->join('views', 'posts.id', '=', 'views.viewable_id')
                    ->when($inputPeriod, fn($query) => $query->filterPeriod($inputPeriod))
                    ->selectRaw('COUNT(views.id)'),
            ])
            ->take(10)
            ->orderByDesc('total_views')
            ->get();

        $postsCategories = ContentCategory::select('name as category_name')
            ->whereHas('posts', fn($query) => $query->active()->validPeriod())
            ->withCount([
                'posts as total_posts' => fn($query) => $query->active()
                    ->validPeriod()
                    ->when($inputPeriod, fn($query) => $query->filterPeriod($inputPeriod)),
                'posts as total_views' => fn($query) => $query->active()
                    ->validPeriod()
                    ->join('views', 'posts.id', '=', 'views.viewable_id')
                    ->when($inputPeriod, fn($query) => $query->filterPeriod($inputPeriod))
                    ->selectRaw('COUNT(views.id)'),
            ])
            ->take(10)
            ->orderByDesc('total_views')
            ->get();

        return view('home', compact(
            'inputPeriod',
            'totalPosts',
            'totalViewsPosts',
            'avgViewsPosts',
            'totalViewsPostMostViewed',
            'totalViewsPostLessViewed',
            'mostViewedPosts',
            'userPostMostViewed',
            'postsUsers',
            'postsCategories',
        ));
    }

}
