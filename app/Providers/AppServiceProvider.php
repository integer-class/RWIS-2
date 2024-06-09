<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//pagination
use Illuminate\Pagination\Paginator;

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
        // Set the default pagination view
        Paginator::useBootstrap();
    }
}
