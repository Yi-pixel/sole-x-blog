<?php


namespace SoleX\Blog\App\Observers;


use SoleX\Blog\App\Repositories\SettingRepository;

class SettingRefreshObserver
{
    public function __construct(private SettingRepository $setting)
    {
    }

    public function saved()
    {
        $this->setting->refresh();
    }
}
