<?php


namespace SoleX\Blog\App\Enums;



enum Abilities: string
{
    case AdminVerified = 'admin:verified';
    case SuperAdmin = 'super_admin';
}
