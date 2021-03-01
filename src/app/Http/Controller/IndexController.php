<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;
use SoleX\Blog\App\Contracts\Repositories\Setting;
use SoleX\Blog\App\Traits\ViewTrait;

class IndexController extends BaseController
{
    use ViewTrait;

    public function __invoke(Request $request, Setting $setting)
    {
        return $this->pages();
    }
}