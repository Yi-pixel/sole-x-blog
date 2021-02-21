<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SoleX\Blog\App\Contracts\Repositories\Page;
use SoleX\Blog\App\Traits\LangTrait;
use SoleX\Blog\App\Traits\ViewTrait;

class PageController
{
    use ViewTrait;
    use LangTrait;

    public function __construct(private Page $page, private Request $request)
    {
    }

    public function __invoke(): Response|null|string|array
    {
        $page = $this->page->findByUrl($this->request->getRequestUri());
        return $this->view('pages.page', compact('page'));
    }
}