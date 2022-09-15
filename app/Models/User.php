<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'password',
        'userid',
        'last_used_at',
        'updated_at',
        'created_at'

    ];

}
