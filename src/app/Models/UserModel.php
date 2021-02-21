<?php


namespace SoleX\Blog\App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable;

class UserModel extends BaseModel implements Authorizable
{
    use \Illuminate\Foundation\Auth\Access\Authorizable;
    use Authenticatable;

    protected $table = 'user';
}