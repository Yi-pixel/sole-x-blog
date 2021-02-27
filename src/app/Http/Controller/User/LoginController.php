<?php


namespace SoleX\Blog\App\Http\Controller\User;


use SoleX\Blog\App\Contracts\Services\User\LoginService;
use SoleX\Blog\App\Http\Controller\BaseController;
use SoleX\Blog\App\Requests\User\LoginRequest;
use SoleX\Blog\App\Traits\ViewTrait;

class LoginController extends BaseController
{
    use ViewTrait;

    public function __invoke()
    {
        return $this->pages('user.login');
    }

    public function login(LoginRequest $request, LoginService $loginService)
    {
        $loginService->login($request);
        return redirect()->route('user-profile');
    }
}