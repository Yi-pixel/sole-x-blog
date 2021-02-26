<?php


namespace SoleX\Blog\App\Models;


class User extends \SoleX\Auth\Models\User
{
    protected $table = 'users';

    protected $fillable = ['name', 'password', 'email', 'nickname'];

    protected bool $isAdmin;

    public function isAdmin(): bool
    {
        if (empty($this->id)) {
            return false;
        }

        return $this->isAdmin = once(fn() => app(AdminUser::class)->where('user_id', $this->id)->exists());
    }
}