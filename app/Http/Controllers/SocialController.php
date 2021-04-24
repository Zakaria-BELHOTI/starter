<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service){
        
        return Socialite::driver($service)->redirect();
    }
    
    public function callback($service, Request $request){
        // $user = Socialite::driver($service)->user();
        $user = Socialite::with($service)->user();
        return response()->json($user);
    }
}
