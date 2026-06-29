<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWilayahAccess extends Model
{
    protected $table = 'user_wilayah_accesses';

    protected $fillable = [
        'user_id',
        'wilayah_id',
    ];
}