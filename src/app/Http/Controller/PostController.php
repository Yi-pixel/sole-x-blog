<?php


namespace SoleX\Blog\App\Http\Controller;


use Illuminate\Http\Request;
use SoleX\Blog\App\Contracts\Repositories\PostRepository;

class PostController extends BaseController
{
    public function __construct(
        protected PostRepository $post,
    ) {
    }

    public function __invoke(Request $request, int $id)
    {
        $post = $this->post->find($id);
        return $post;
    }
}