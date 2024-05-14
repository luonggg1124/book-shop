<?php

namespace App\Http\Controllers\Auth;



use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register_view(){
        config(['app.title' => 'Register']);
        return view('custom.auth.register');
    }

    public function register(Request $request){
        $credentials = $request->all();
        $validator = Validator::make($credentials,
            [
                "email"=> "required|email|max:100",
                "password"=> "required|string|min:8|max:20",
                "name" => "required|string|min:5|max:40|regex:/^[\p{L}\s]+$/u"
            ],
            [
                "email.required" => "Email cannot be blank.",
                'email.email' => 'Invalid Email.',
                "email.max" => "EMail is too long!The maximum is 100 characters.",
                'password.required' => 'Password cannot be blank.',
                'password.min' => "Password is too short!The minimum is 8 characters.",
                "password.max" => "Password is too long!The maximum is 20 characters.",
                'name.required' => 'Name cannot be blank',
                'name.regex' => 'Invalid Name',
                "name.min" => "The name is too short!The minimum is 5 characters.",
                "name.max" => "The name is too long!The maximum is 40 characters."
            ]
        );
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else if(User::where("email", $credentials["email"])->exists()){
            return redirect()->back()->withErrors(["email"=>"The email has existed in the system"]);            
        }else{
             $user = User::create($credentials);
             Auth::login($user);
             return redirect()->route('app.home')->with("success","Đăng ký thành công!");
        }


       
    }
    public function login_view(){
        config(['app.title' => 'Login']);
        return view('custom.auth.login');
    }
    public function login(Request $request){
        $credentials = $request->only("email","password");
        $validator = $request->validate(
            [
                "email"=> "required|email",
                "password"=> "required"
            ],
            [
                'email.required' => 'Email cannot be blank',
                'email.email' => 'Invalid Email',
                'password.required' => 'Password cannot be blank'
            ]
        );
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(!\App\Models\User::where("email", $credentials["email"])->exists()){
            return redirect()->back()->with("errorEmail","Email does not exist in the system");
        }
        if(Auth::attempt($credentials)){
            return redirect()->intended();
        }else{
            return redirect()->back()->with("errorPassword","Password is not true");
        }
        

    }

    public function logout(){
        $email = null;
        if(Auth::check()) {
            $email = Auth::user()->email;
        }
        Session::put('last_logged_out_email', $email);
            Auth::logout();
        return redirect('/login');
    }
}
