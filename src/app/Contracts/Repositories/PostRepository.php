<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Contracts\Pagination\Paginator;

interface PostRepository extends BaseRepository
{
    public function listForPaginate(int $page = 1, int $perPage = 10): Paginator;
}