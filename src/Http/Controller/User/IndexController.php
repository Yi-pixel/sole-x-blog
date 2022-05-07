<?php


namespace SoleX\Blog\Http\Controller\User;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\Traits\ViewTrait;

class IndexController
{
    use ViewTrait;

    public function __invoke()
    {
        $user = Auth::user();
        return $this->pages(data: compact('user'));
    }
}
