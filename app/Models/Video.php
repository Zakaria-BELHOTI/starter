<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name', 'viewer',
    ];

    protected $hidden = [
        
    ];
}
