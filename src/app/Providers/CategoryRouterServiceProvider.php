<?php


namespace SoleX\App\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use SoleX\App\Contracts\Services\RegisterCategoryRouterService;

class CategoryRouterServiceProvider extends ServiceProvider
{
    public function boot(RegisterCategoryRouterService $service)
    {
        $service->register();
    }
}