<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\ServiceProvider;
use SoleX\Blog\App\Contracts\Services\RegisterPageRouterService;

class PageRouterServiceProvider extends ServiceProvider
{
    public function boot(RegisterPageRouterService $service)
    {
        $service->register();
    }
}