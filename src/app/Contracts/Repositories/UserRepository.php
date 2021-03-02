<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;

interface UserRepository extends BaseRepository
{
    public function findByEmail(string $email): Authenticatable;

    public function register(array $attributes): Authenticatable;
}