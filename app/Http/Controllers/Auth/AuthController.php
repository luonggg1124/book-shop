<?php

namespace App\Http\Controllers\Auth;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login_view(){
        config(['app.title' => 'Login']);
        return view('custom.auth.login');
    }
    public function login(Request $request){
        $credentials = $request->only("email","password");

        if(empty($credentials["email"]) || $credentials['email'] == ''){
            return redirect()->back()->with("errorEmail","Email cannot be blank");
        }elseif(empty($credentials["password"]) || $credentials['password'] == ''){
            return redirect()->back()->with("errorPassword","Password cannot be blank");
        }
        // $request->validate([
        //     "email"=> "required|email",
        //     "password"=> "required"
        // ]);
        if(!\App\Models\User::where("email", $credentials["email"])->exists()){
           
            return redirect()->back()->with("errorEmail","Email does not exist in the system");
        }
        


        if(Auth::attempt($credentials)){
            return redirect()->intended();
        }else{
            return redirect()->back()->with("errorPassword","Password is not true");
        }
        
    }
}
