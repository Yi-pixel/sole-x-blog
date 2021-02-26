<?php


namespace SoleX\Blog\App\Contracts\Services\User;


interface LoginService
{
    public function login(array $attribute);
}