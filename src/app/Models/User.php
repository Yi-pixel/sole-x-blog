<?php


namespace SoleX\Blog\App\Models;


class User extends \SoleX\Auth\Models\User
{
    protected $table = 'users';

    protected $fillable = ['name', 'password', 'email', 'nickname'];

}