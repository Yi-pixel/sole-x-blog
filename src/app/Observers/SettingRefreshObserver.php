<?php


namespace SoleX\Blog\App\Observers;


use SoleX\Blog\App\Contracts\Repositories\Setting;

class SettingRefreshObserver
{
    public function __construct(private Setting $setting)
    {
    }

    public function saved()
    {
        $this->setting->refresh();
    }
}