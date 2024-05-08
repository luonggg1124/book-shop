<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile($account_name){
       $user = Auth::user();
       if(empty($user)){
            abort(403);
       }
       if($user->account_name != $account_name){
            abort(403);
       }
       return view("custom.profile.profile",[
        "user"=> $user,
       ]);
    }
}
