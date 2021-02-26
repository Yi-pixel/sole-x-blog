<?php


namespace SoleX\Blog\App\Services\User;


use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use SoleX\Blog\App\Contracts\Services\User\LoginService as ILoginService;
use SoleX\Blog\App\Exceptions\BusinessException;
use SoleX\Blog\App\Repositories\UserRepository;
use SoleX\Blog\App\Traits\LangTrait;

class LoginService implements ILoginService
{
    use LangTrait;

    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function login(array $attribute): Authenticatable
    {
        if (!Auth::attempt($attribute)) {
            throw new AuthenticationException();
        }
        $user = $this->userRepository->findByEmail($attribute['email']);
        $blackList = $user->blackList;
        assert($blackList instanceof Collection);
        throw_if($blackList->isNotEmpty(), new BusinessException($this->__('tips.auth.is-blacked')));
        Auth::login($user);
        return $user;
    }
}