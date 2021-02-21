<?php


namespace SoleX\Blog\App\Http\Controller;


use SoleX\Blog\App\Traits\ViewTrait;

class UserRegisterController extends BaseController
{
    use ViewTrait;

    public function __invoke()
    {
        return $this->pages('user.register');
    }

    public function register()
    {
    }
}