<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;

interface User extends BaseRepository
{
    public function findByEmail($email): Authenticatable;

    public function register($attributes): Authenticatable;
}