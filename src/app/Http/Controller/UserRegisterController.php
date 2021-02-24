<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\App\Contracts\Services\User\RegisterService;
use SoleX\Blog\App\Requests\UserRegisterRequest;
use SoleX\Blog\App\Traits\ViewTrait;

class UserRegisterController extends BaseController
{
    use ViewTrait;

    public function __invoke()
    {
        return $this->pages('user.register');
    }

    public function register(UserRegisterRequest $request, RegisterService $service)
    {
        ['email' => $email, 'password' => $password] = $request->all();
        $service->email = $email;
        $service->password = $password;
        $user = $service->register();
        Auth::login($user);
        return $this->pages('user.register_success', compact('user'));
    }
}