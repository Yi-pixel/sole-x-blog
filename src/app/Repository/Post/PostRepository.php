<?php


namespace SoleX\Blog\App\Repository\Post;


use SoleX\Blog\App\Model\PostModel;
use SoleX\Blog\App\Repository\BaseRepositoryImpl;

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