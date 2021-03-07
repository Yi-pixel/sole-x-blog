<?php


namespace SoleX\Blog\App\Repositories;


use Illuminate\Contracts\Pagination\Paginator;
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

    public function listForPaginate(
        int $page = null,
        int $perPage = 10,
        array $columns = ['*'],
        array $with = []
    ): Paginator {
        return $this->model()->with($with)->where('status', 1)->paginate($perPage, $columns, page: $page);
    }
}