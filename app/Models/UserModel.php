<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users_tables';

    protected $fillable = [
        'name',
        'email',
        'password'

    ];
}
