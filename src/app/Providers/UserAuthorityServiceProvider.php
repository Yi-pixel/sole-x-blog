<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class UserAuthorityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('is_super_admin', function (Authenticatable $user) {
            return $user?->isAdmin();
        });
    }
}