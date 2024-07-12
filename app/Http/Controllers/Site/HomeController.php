<?php

namespace App\Http\Controllers\Site;

use App\Enums\FeaturedPositionPostEnum;
use App\Models\Newsletter;
use App\Models\Post;
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
                ->union(Post::filterByFeaturedPosition(FeaturedPositionPostEnum::HIGHLIGHTED->name, 5))
                ->with(['media', 'categories', 'image'])
                ->get()
                ->groupBy('featured_position');
        });

        $postsCategoriesHome = Cache::rememberForever('postsCategoriesHome', function () {
            return Post::filterByCategoryId(categoryId: 37, take: 6) // eleições 2024
                ->union(Post::filterByCategoryId(categoryId: 1, take: 6)) // política
                ->union(Post::filterByCategoryId(categoryId: 9, take: 3)) // entrevistas
                ->with(['media', 'categories', 'image'])
                ->get()
                ->groupBy(fn($post) => $post->categories->first()->id);
        });

        $postsBloggers = Cache::rememberForever('postsBloggersHome', function () {
             return Post::with(['media', 'categories.media', 'image'])
                ->isFromBlog()
                ->active()
                ->validPeriod()
                ->latest('published_at')
                ->take(2)
                ->get();
        });

        return view('site.home.index', compact('featuredPosts', 'postsCategoriesHome', 'postsBloggers'));
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
