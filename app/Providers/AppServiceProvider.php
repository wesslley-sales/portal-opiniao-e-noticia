<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\ContentCategory;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            $this->app['request']->server->set('HTTPS','on');
            \URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();

        view()->composer(['site.*'], function ($view) {
            // banners publicitários
            $banners = Cache::rememberForever('banners', function () {
                return Banner::active()
                    ->with(['media', 'type_banner:id,name'])
                    ->validPeriod()
                    ->orderBy('position')
                    ->get()
                    ->groupBy('type_banner.name');
            });

            // configurações gerais
            $settings = Cache::rememberForever('settings', function () {
                return Setting::pluck('value', 'key')->toArray();
            });

            // últimas postagens
            $lastPosts = Cache::rememberForever('lastPosts', function () {
                return Post::with(['media', 'categories', 'image'])
                    ->active()
                    ->validPeriod()
                    ->latest('published_at')
                    ->take(10)
                    ->get();
            });

            $view->with([
                'banners'   => $banners,
                'settings'  => $settings,
                'lastPosts' => $lastPosts,
            ]);
        });
    }
}
