<?php


namespace SoleX\Blog\App\Utils;


use SoleX\Blog\App\Repositories\SettingRepository;
use SoleX\Blog\App\Enums\SettingKeys;

class Theme
{
    public function __construct(private SettingRepository $setting)
    {
    }

    public function set($name)
    {
        return once(fn() => $this->setting->put(SettingKeys::ActiveTheme, $name));
    }

    public function get()
    {
        return once(fn() => $this->setting->fetch(SettingKeys::ActiveTheme));
    }
}
