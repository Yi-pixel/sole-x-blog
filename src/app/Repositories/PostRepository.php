<?php


namespace SoleX\Blog\App\Repositories;


use SoleX\Blog\App\Contracts\Repositories\Post\Post;
use SoleX\Blog\App\Models\PostModel;
use SoleX\Blog\App\Repositories\BaseRepositoryImpl;

class PostRepository extends BaseRepositoryImpl implements Post
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