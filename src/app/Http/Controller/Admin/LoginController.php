<?php


namespace SoleX\Blog\App\Http\Controller\Admin;


use Auth;
use Illuminate\Http\Request;
use SoleX\Blog\App\Http\Controller\BaseController;
use SoleX\Blog\App\Traits\ViewTrait;

class LoginController extends BaseController
{
    use ViewTrait;

    public function __invoke()
    {
        $user = Auth::user();
        dump((string)$user->avatar);
        // return $this->pages('admin.login', compact('user'));
    }

    public function login(Request $request)
    {
        $this->validate($request, ['password' => 'bail|required|min:5']);
    }
}