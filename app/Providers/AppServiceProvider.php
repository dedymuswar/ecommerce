<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('web.layout._header', function ($view) {
            $view->with('kategoris', \App\Category::all());
        });

        // SIDEBAR
        view()->composer('web.layout.blog._sidebar', function ($view) {
            $view->with('recent', \App\Posts::RecentPosts());
        });
    }
}
