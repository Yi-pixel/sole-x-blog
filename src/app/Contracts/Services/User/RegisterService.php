<?php


namespace SoleX\Blog\App\Contracts\Services\User;


use Illuminate\Contracts\Auth\Authenticatable;

interface RegisterService
{
    public function register(): Authenticatable;
}