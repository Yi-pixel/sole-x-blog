<?php


namespace SoleX\Blog\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\Http\Controller\PageController;

class PageRouterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::fallback(PageController::class);
    }
}
