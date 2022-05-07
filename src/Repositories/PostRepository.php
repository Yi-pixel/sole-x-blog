<?php


namespace SoleX\Blog\Repositories;



use Illuminate\Contracts\Pagination\Paginator;
use SoleX\Blog\Models\Post as PostModel;

class PostRepository extends BaseRepository
{
    protected string $model = PostModel::class;

    public function find(int $id, array $fields = ['*'])
    {
        return $this->model()->with([
            'user',
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
