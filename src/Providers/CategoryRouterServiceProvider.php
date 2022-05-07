<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\App\Http\Controller\CategoryController;

class CategoryRouterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::fallback(CategoryController::class);
    }
}