<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\App\Auth\UserProvider;
use SoleX\Blog\App\Models\UserModel;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        Auth::provider('blog_user_eloquent', function ($app, $config) {
            return $this->app->make(UserProvider::class, [
                'model' => $config['model'],
            ]);
        });
    }

    public function boot()
    {
        config([
            'auth.guards.blog'    => [
                'driver'   => 'session',
                'provider' => 'blog',
            ],
            'auth.providers.blog' => [
                'driver' => 'blog_user_eloquent',
                'model'  => UserModel::class,
            ],
            'auth.defaults.guard' => 'blog',
        ]);
    }
}