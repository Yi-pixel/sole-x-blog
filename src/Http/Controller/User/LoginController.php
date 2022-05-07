<?php


namespace SoleX\Blog\Http\Controller\User;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\Services\User\LoginService;
use SoleX\Blog\Http\Controller\BaseController;
use SoleX\Blog\Traits\ViewTrait;

class LoginController extends BaseController
{
    use ViewTrait;

    public function __invoke()
    {
        return $this->pages('user.login');
    }

    public function login(LoginService $loginService)
    {
        $loginService->login();
        return redirect()->route('user.profile');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
