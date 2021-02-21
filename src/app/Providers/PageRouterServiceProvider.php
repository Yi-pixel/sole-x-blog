<?php


namespace SoleX\Blog\App\Providers;


use SoleX\Blog\App\Contracts\Services\RegisterPageRouterService;

class PageRouterServiceProvider
{
    public function boot(RegisterPageRouterService $service)
    {
        $service->register();
    }
}