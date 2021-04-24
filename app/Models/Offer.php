<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name_ar', 'name_en', 'price', 'details_ar', 'details_en',
    ];

    protected $hidden = [
        
    ];

}
