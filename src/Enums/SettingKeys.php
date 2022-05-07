<?php


namespace SoleX\Blog\App\Enums;


use SoleX\Blog\App\Repositories\SettingRepository;
use SoleX\Blog\App\Utils\TypeConverter;

enum SettingKeys: string
{
    case ActiveTheme = 'active-theme';

    case AllowRegister = 'allow_register';

    case AdminUrl = 'admin_url';

    case UrlPrefix = 'url_prefix';

    public function fetch(mixed $default = null): TypeConverter
    {
        return app(SettingRepository::class)->fetch($this, $default);
    }
}
