<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\App\Contracts\Repositories\Setting;

class SettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::share('setting', resolve(Setting::class));
    }
}