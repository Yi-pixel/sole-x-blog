<?php


namespace SoleX\Blog\Http\Controller\Admin;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\Http\Controller\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        dd(Auth::check());
    }
}
