<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\WebSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        $web_setting = WebSetting::first();
        view()->share('web_setting', $web_setting);

        $menus = Menu::where('parent_id', null)->get();
        view()->share('menus', $menus);

        $selectedPosts = Post::latest()->where('selected', 1)->limit(3)->get();
        view()->share('selectedPosts', $selectedPosts);

        $mostCommentedPosts = Post::withCount('comments')->orderBy('comments_count', 'desc')->limit(5)->get();
        view()->share('mostCommentedPosts', $mostCommentedPosts);
    }
}
