<?php


namespace SoleX\Blog\Enums;


use SoleX\Blog\Repositories\SettingRepository;
use SoleX\Blog\Utils\TypeConverter;

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
