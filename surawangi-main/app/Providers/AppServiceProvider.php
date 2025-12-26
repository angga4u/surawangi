<?php

namespace App\Providers;

use Bjnstnkvc\ShadcnUi\ShadcnUiServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\SocialMedia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ShadcnUiServiceProvider::components();
        Facades\View::share('categories', Category::all());
        Facades\View::share('socialMedias', SocialMedia::all());
    }
}
