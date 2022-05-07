<?php


namespace SoleX\Blog\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\Repositories\SettingRepository;

class SettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::share('setting', resolve(SettingRepository::class));
    }
}
