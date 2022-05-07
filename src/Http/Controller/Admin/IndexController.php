<?php


namespace SoleX\Blog\App\Http\Controller\Admin;


use Illuminate\Support\Facades\Auth;
use SoleX\Blog\App\Http\Controller\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        dd(Auth::check());
    }
}