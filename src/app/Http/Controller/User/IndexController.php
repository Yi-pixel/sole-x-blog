<?php


namespace SoleX\Blog\App\Http\Controller\User;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\App\Traits\ViewTrait;

class IndexController
{
    use ViewTrait;

    public function __invoke()
    {
        $user = Auth::user();
        return $this->pages('user.index',compact('user'));
    }
}