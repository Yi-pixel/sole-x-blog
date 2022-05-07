<?php


namespace SoleX\Blog\Services;


use Illuminate\Http\Request;
use SoleX\Blog\Models\Page;
use SoleX\Blog\Repositories\PageRepository;

class PageService
{
    public function __construct(private PageRepository $pageRepository, private Request $request)
    {
    }

    public function handle(): Page
    {
        $prefix = config('blog.url_prefix') ?: '';
        $url = $this->request->getRequestUri();

        if (!empty($prefix) && str_starts_with($url, $prefix)) {
            $url = substr($url, strlen($prefix));
        }

        return $this->pageRepository->findByUrl($url);
    }
}
