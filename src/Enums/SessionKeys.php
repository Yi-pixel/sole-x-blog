<?php


namespace SoleX\Blog\Enums;


use MyCLabs\Enum\Enum;

enum SessionKeys: string
{
    /**
     * 已严重的后台身份
     */
    case AdminVerified = 'admin_verified';
}
