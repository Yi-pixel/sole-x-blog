<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\App\Enums\Abilities;
use SoleX\Blog\App\Enums\SessionKeys;

class UserAuthorityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define(Abilities::SUPER_ADMIN, function (Authenticatable $user) {
            return $user?->isAdmin();
        });

        Gate::define(Abilities::ADMIN_VERIFIED, function () {
            return session()->has(SessionKeys::ADMIN_VERIFIED);
        });
    }
}