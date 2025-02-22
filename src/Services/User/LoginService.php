<?php


namespace SoleX\Blog\Services\User;


use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use SoleX\Blog\Exceptions\BusinessException;
use SoleX\Blog\Repositories\UserRepository;
use SoleX\Blog\Traits\LangTrait;

class LoginService
{
    use LangTrait;


    public function __construct(private UserRepository $userRepository, private Request $request)
    {
    }

    public function login(): Authenticatable
    {
        $email = $this->request->input('email');
        $remember = $this->request->has('remember');
        $attribute = $this->request->only(['email', 'password']);
        Auth::attempt($attribute, $remember) || throw new AuthenticationException();

        $user = $this->userRepository->findByEmail($email);

        /**
         * 黑名单的用户将禁止登陆
         */
        $blackList = $user->blackList;
        assert($blackList instanceof Collection);
        $blackList->isNotEmpty() && throw new BusinessException($this->__('tips.auth.is-blacked'));

        Auth::login($user, $remember);

        return $user;
    }
}
