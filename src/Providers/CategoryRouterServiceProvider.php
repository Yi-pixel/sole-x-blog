<?php


namespace SoleX\Blog\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\Http\Controller\CategoryController;

class CategoryRouterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::fallback(CategoryController::class);
    }
}
