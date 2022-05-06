<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;
use SoleX\Blog\App\Contracts\Repositories\PostRepository;
use SoleX\Blog\App\Traits\ViewTrait;

class PostController extends BaseController
{
    use ViewTrait;

    public function __construct(
        protected PostRepository $post,
    ) {
    }

    public function __invoke(Request $request, int $id)
    {
        $post = $this->post->find($id);
        return $this->pages('post.show', compact('post'));
    }
}