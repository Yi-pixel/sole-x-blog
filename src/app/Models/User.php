<?php


namespace SoleX\Blog\App\Models;


class User extends \SoleX\Auth\Models\User
{
    protected $table = 'users';

    protected $fillable = ['name', 'password', 'email', 'nickname'];

    public function admin()
    {
        return $this->hasOne(AdminUser::class);
    }

    public function isAdmin(): bool
    {
        return once(fn() => $this->admin instanceof AdminUser);
    }
}