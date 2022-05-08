<?php


namespace SoleX\Blog\Enums;


enum Abilities: string
{
    case AdminVerified = 'admin:verified';
    case SuperAdmin = 'super_admin';

    public function can(self ...$permissions): bool
    {
        return \Gate::check(array_map(fn(self $permission) => $permission->value, [$this, ...$permissions]));
    }

    public function canNot(self ...$permissions): bool
    {
        return !$this->can(...$permissions);
    }

    public function canAny(self ...$permissions): bool
    {
        return \Gate::any(array_map(fn(self $permission) => $permission->value, [$this, ...$permissions]));
    }
}
