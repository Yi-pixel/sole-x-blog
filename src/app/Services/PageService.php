<?php


namespace SoleX\Blog\App\Services;


use Illuminate\Http\Request;
use SoleX\Blog\App\Repositories\PageRepository;

class PageService implements \SoleX\Blog\App\Contracts\Services\PageService
{
    public function __construct(private PageRepository $pageRepository, private Request $request)
    {
    }

    public function handle()
    {

    }
}