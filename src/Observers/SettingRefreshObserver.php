<?php


namespace SoleX\Blog\Observers;


use SoleX\Blog\Repositories\SettingRepository;

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
