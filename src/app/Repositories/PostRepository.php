<?php


namespace SoleX\Blog\App\Repositories;


use SoleX\Blog\App\Models\Post as PostModel;

class PostRepository extends BaseRepository implements \SoleX\Blog\App\Contracts\Repositories\PostRepository
{
    protected string $model = PostModel::class;

    public function find(int $id, array $fields = ['*'])
    {
        return $this->model()->with([
            'author',
            'category',
            'tags',
        ])->find($id, $fields);
    }
}