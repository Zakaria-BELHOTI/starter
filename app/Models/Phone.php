<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'code', 'phone', 'user_id', 
    ];

    protected $hidden = [
        'user_id', 
    ];

    ############## Begin Relations ###############
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    ############## End Relations ###############
}
