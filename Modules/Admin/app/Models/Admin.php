<?php

namespace Modules\Admin\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $fillable = ['name','username','password'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];
}
