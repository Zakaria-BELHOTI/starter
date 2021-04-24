<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name', 'price', 'details'
    ];

    protected $hidden = [
        
    ];

}
