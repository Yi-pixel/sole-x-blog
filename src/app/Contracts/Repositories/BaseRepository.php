<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    public function model(): Model;
}