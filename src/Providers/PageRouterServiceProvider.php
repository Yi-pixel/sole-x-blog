<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\App\Http\Controller\PageController;

class PageRouterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::fallback(PageController::class);
    }
}