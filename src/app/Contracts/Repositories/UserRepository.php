<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;
use SoleX\Blog\App\Models\User;

class UserRepository extends \SoleX\Blog\App\Repositories\BaseRepository
{
    protected string $model = User::class;

    public function register($attributes): Authenticatable
    {
        $model = $this->model()->create($attributes);
        assert($model instanceof Authenticatable);
        return $model;
    }
}