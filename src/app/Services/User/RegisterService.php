<?php


namespace SoleX\Blog\App\Services\User;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher;
use SoleX\Auth\Models\User;
use SoleX\Blog\App\Contracts\Repositories\UserRepository;
use SoleX\Blog\App\Contracts\Services\User\RegisterService as IRegisterService;

class RegisterService implements IRegisterService
{
    public string $email;
    public string $password;

    public function __construct(private Hasher $hasher, private UserRepository $userRepository)
    {
    }

    public function register(): Authenticatable
    {
        $user = $this->userRepository->register([
            'name'     => $this->email,
            'email'    => $this->password,
            'nickname' => substr($this->email, 0, 5),
            'password' => $this->hasher->make($this->password),
        ]);
        return $user;
    }

}