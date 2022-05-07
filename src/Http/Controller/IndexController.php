<?php


namespace SoleX\Blog\Http\Controller;


use Illuminate\Http\Request;
use SoleX\Blog\Repositories\SettingRepository;
use SoleX\Blog\Traits\ViewTrait;

class IndexController extends BaseController
{
    use ViewTrait;

    public function __invoke(Request $request, SettingRepository $setting)
    {
        return $this->pages();
    }
}
