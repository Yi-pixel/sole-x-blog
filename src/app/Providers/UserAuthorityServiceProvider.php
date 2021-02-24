<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class UserAuthorityServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }
}