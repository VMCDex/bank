<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['login', 'password', 'is_admin'];
    protected $hidden = ['password'];
}
