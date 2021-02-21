<?php


namespace SoleX\Blog\App\Contracts\Repositories;


interface BaseRepository
{
    public function find(int $id, array $fields = ['*']);

    public function all(array $fields = ['*']);

    public function paginate(...$paginate);
}