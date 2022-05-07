<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;
use SoleX\Blog\App\Repositories\SettingRepository;
use SoleX\Blog\App\Traits\ViewTrait;

class IndexController extends BaseController
{
    use ViewTrait;

    public function __invoke(Request $request, SettingRepository $setting)
    {
        return $this->pages();
    }
}
