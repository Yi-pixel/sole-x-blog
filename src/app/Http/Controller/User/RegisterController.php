<?php


namespace SoleX\Blog\App\Http\Controller\User;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\App\Contracts\Services\User\RegisterService;
use SoleX\Blog\App\Http\Controller\BaseController;
use SoleX\Blog\App\Requests\User\RegisterRequest;
use SoleX\Blog\App\Traits\ViewTrait;

class RegisterController extends BaseController
{
    use ViewTrait;

    public function __invoke()
    {
        return $this->pages('user.register');
    }

    public function register(RegisterRequest $request, RegisterService $service)
    {
        ['email' => $email, 'password' => $password] = $request->all();
        $service->email = $email;
        $service->password = $password;
        $user = $service->register();
        Auth::login($user);
        return $this->pages('user.register_success', compact('user'));
    }
}