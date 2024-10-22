<?php

namespace App\Http\Controllers\Site;

use App\Enums\FeaturedPositionPostEnum;
use App\Models\Newsletter;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController
{

    public function index(): View
    {
        $featuredPosts = Cache::rememberForever('featuredPosts', function () {
            return Post::filterByFeaturedPosition(FeaturedPositionPostEnum::HEADLINE->name, 1)
                ->union(Post::filterByFeaturedPosition(FeaturedPositionPostEnum::SLIDESHOW->name, 3))
                ->with(['media', 'image'])
                ->get()
                ->groupBy('featured_position');
        });

        $postsCategoriesHome = Cache::rememberForever('postsCategoriesHome', function () {
            return Post::filterByCategoryId(categoryId: 1, take: 6) // Política
                ->union(Post::filterByCategoryId(categoryId: 3, take: 3)) // Polícia
                ->union(Post::filterByCategoryId(categoryId: 16, take: 2)) // Entrevistas
                ->union(Post::filterByCategoryId(categoryId: 2, take: 3)) // Cidades
                ->union(Post::filterByCategoryId(categoryId: 8, take: 3)) // Mundo PET
                ->with(['media', 'categories', 'image'])
                ->get()
                ->groupBy(fn($post) => $post->categories->first()->id);
        });

        $lastVideos = Cache::rememberForever('lastVideos', function () {
            return Video::latest('id')
                ->take(5)
                ->get();
        });

        return view('site.home.index', compact('featuredPosts', 'postsCategoriesHome', 'lastVideos'));
    }

    public function saveLead(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email:rfc', 'unique:newsletters,email'],
        ]);

        Newsletter::create($request->only('email'));

        return back()->with('success', 'E-mail cadastrado com sucesso!');
    }

}
