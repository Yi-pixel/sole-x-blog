<?php


namespace SoleX\Blog\App\Http\Controller\User;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\App\Traits\ViewTrait;

class IndexController
{
    use ViewTrait;

    public function __invoke()
    {
        var_dump(Auth::user());
        return $this->pages('user.index');
    }
}