<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;
use SoleX\Blog\App\Contracts\Repositories\Setting;

class IndexController extends BaseController
{
    public function __invoke(Request $request, Setting $setting)
    {
        $setting->refresh();
    }
}