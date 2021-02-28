<?php


namespace SoleX\Blog\App\Enums;


use MyCLabs\Enum\Enum;

class Abilities extends Enum
{
    public const ADMIN_VERIFIED = 'admin:verified';
    public const SUPER_ADMIN    = 'super_admin';
}