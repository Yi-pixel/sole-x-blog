<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
    }
}