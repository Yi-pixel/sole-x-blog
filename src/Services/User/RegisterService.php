<?php


namespace SoleX\Blog\App\Services\User;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Str;
use SoleX\Blog\App\Repositories\UserRepository;

class RegisterService
{
    public string $email;
    public string $password;

    public function __construct(private Hasher $hasher, private UserRepository $userRepository)
    {
    }

    public function register(): Authenticatable
    {
        return $this->userRepository->register([
            'name'     => $this->email,
            'email'    => $this->email,
            'nickname' => Str::random(9),
            'password' => $this->hasher->make($this->password),
        ]);
    }

}
