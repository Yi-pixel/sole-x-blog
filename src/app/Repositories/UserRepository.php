<?php


namespace SoleX\Blog\App\Repositories;


use Illuminate\Contracts\Auth\Authenticatable;
use SoleX\Blog\App\Models\User;

class UserRepository extends BaseRepository implements
    \SoleX\Blog\App\Contracts\Repositories\User
{
    protected string $model = User::class;

    public function register($attributes): Authenticatable
    {
        $model = $this->model()->create($attributes);
        assert($model instanceof Authenticatable);
        return $model;
    }

    public function findByEmail($email): User
    {
        $model = $this->model()->where('email', $email)->firstOrFail();
        assert($model instanceof User);
        return $model;
    }
}