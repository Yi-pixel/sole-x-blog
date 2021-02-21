<?php


namespace SoleX\App\Providers;


use Illuminate\Support\Facades\Route;
use SoleX\App\Contracts\Services\RegisterPageRouterService;

class PageRouterServiceProvider
{
    public function boot(RegisterPageRouterService $service)
    {
        $service->register();
    }
}