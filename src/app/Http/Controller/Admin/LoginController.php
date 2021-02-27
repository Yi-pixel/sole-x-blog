<?php


namespace SoleX\Blog\App\Http\Controller\Admin;


use Auth;
use Illuminate\Http\Request;
use SoleX\Blog\App\Http\Controller\BaseController;

class LoginController extends BaseController
{
    public function __invoke()
    {

    }

    public function login(Request $request)
    {
        $this->validate($request, ['password' => 'bail|required|min:5']);
    }
}