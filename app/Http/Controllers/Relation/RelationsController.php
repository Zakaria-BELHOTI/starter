<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\User;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    public function hasOneRelation(){
        $user = User::with(['phone' => function($q){
            $q->select('code', 'phone', 'user_id');
        }])->find(1);

        //return $user->phone;
        return response()->json($user);
    }

    public function hasOneRelationReverse(){
        $phone = Phone::find(1);
        //$phone = Phone::with('user')->find(1);
        $phone->makeVisible(['user_id']);
        //$phone->makeHidden(['id']);
        return $phone;
    }

    public function hasPhone(){

        // return User::whereHas('phone')->get();
        return User::whereHas('phone', function($q){
            $q -> where('code', '212');
        })->get();
    }
    
    public function hasNotPhone(){

        return User::doesntHave('phone')->get();
    }
    
}
