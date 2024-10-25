<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
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
        //Blade::component(FRONTEND_LAYOUT, 'frontend-layout');
        Blade::component('frontend.layouts.app', 'frontend-layout');
        Blade::component('admin.layouts.app', 'admin-layout');
    }
}
