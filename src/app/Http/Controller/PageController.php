<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SoleX\Blog\App\Repositories\PageRepository;
use SoleX\Blog\App\Services\PageService;
use SoleX\Blog\App\Traits\LangTrait;
use SoleX\Blog\App\Traits\ViewTrait;

class PageController
{
    use ViewTrait;
    use LangTrait;

    public function __construct(private PageRepository $page, private Request $request,private PageService $pageService)
    {
    }

    public function __invoke(): Response|null|string|array
    {
        $page = $this->pageService->handle();
        return $this->view('pages.page', compact('page'));
    }
}
