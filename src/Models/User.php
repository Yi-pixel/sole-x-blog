<?php


namespace SoleX\Blog\Models;


use SoleX\Blog\Traits\FileAttachableTrait;

/**
 * @property ?AdminUser $admin
 */
class User extends \SoleX\Auth\Models\User
{
    use FileAttachableTrait;

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

    public function avatar()
    {
        return $this->fileAttachableOne();
    }
}
