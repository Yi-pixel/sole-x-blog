<?php


namespace SoleX\Blog\App\Utils;


use SoleX\Blog\App\Contracts\Repositories\SettingRepository;
use SoleX\Blog\App\Enums\SettingKeys;

class Theme
{
    public function __construct(private SettingRepository $setting)
    {
    }

    public function set($name)
    {
        return once(fn() => $this->setting->put(SettingKeys::ACTIVE_THEME, $name));
    }

    public function get()
    {
        return once(fn() => $this->setting->fetch(SettingKeys::ACTIVE_THEME));
    }
}