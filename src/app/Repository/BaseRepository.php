<?php


namespace SoleX\Blog\App\Repository;


interface BaseRepository
{
    public function find(int $id, array $fields = ['*']);

    public function all(array $fields = ['*']);

    public function paginate(...$paginate);
}