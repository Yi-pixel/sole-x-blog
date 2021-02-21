<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\ServiceProvider;
use SoleX\Blog\App\Contracts\Services\RegisterCategoryRouterService;

class CategoryRouterServiceProvider extends ServiceProvider
{
    public function boot(RegisterCategoryRouterService $service)
    {
        $service->register();
    }
}