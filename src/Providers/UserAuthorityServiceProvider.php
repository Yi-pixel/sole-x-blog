<?php


namespace SoleX\Blog\Providers;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\Enums\Abilities;
use SoleX\Blog\Enums\SessionKeys;

class UserAuthorityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define(Abilities::SuperAdmin->value, function (Authenticatable $user) {
            return $user?->isAdmin();
        });

        Gate::define(Abilities::AdminVerified->value, function () {
            return session()->has(SessionKeys::AdminVerified->value);
        });
    }
}
