<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile($account_name){
     if(Auth::user()){
          $user = User::find(Auth::user()->id);
        }else{
          return redirect()->route('app.home');
        }
       if($user->account_name != $account_name){
            abort(403);
       }
       config(['app.title' => $user->name]);
       return view("custom.profile.profile",[
        "user"=> $user,
       ]);
    }

    public function update(Request $request){
          $user = User::find(Auth::user()->id);
          $credentials = $request->only("image","name","address","phone_number","account_name");
          $validator = Validator::make($credentials, [
               "image" => "image",
               "name" => "required|string|min:5|max:40|regex:/^[\p{L}\s]+$/u",
               "phone_number" => ["required","regex:/^(?:\+?84|0)(?:\d{9}|\d{10})$/"],
               "account_name" => ["required","regex:/^[a-zA-Z0-9.]+$/"]
          ],
          [
               "image.image" => "Invalid file",
               'name.required' => 'Name cannot be blank',
               'name.regex' => 'Invalid Name',
               "name.min" => "The name is too short!The minimum is 5 characters.",
               "name.max" => "The name is too long!The maximum is 40 characters.",
               "phone_number.required" => "Phone number cannot be blank",
               "phone_number.regex" => "Invalid phone number.",
               "account_name.required" => "Account name cannot be blank",
               "account_name.regex" => "Invalid account name",
               
          ]
          );
          if(User::where('account_name',$credentials['account_name'])->exists()){
               if($credentials['account_name'] != $user->account_name){
                    return redirect()->back()->withErrors(['account_name' => "Account name has existed in the system."])->withInput();
               }
          }
          if($validator->fails()){
               return redirect()->back()->withErrors($validator)->withInput();
          }else{
               if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image_name = time().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('upload/user'), $image_name);
                    $credentials['image'] = $image_name;
               }else{
                    $credentials['image'] = $user->image;
               }             
               $user->update($credentials);
               return redirect()->route('user.profile',$user->account_name)->with('success','Update successful!');
          }
    }

    public function password(string $account_name){
          if(Auth::user()){
               $user = User::find(Auth::user()->id);
          }else{
               return redirect()->route('app.home');
          }
       if($user->account_name != $account_name){
            abort(403);
       }
       config(['app.title' => $user->name.' | '."Update Password"]);
       return view("custom.profile.password",[
        "user"=> $user,
       ]);
    }

    public function updatePassword(Request $request){
          $user = User::find(Auth::user()->id);
          
          $validator = Validator::make($request->all(),
          [
               "old_password" => "required",
               "new_password"=> "required|string|min:8|max:20",
               "retype_password" => "required",
          ],
          [
               "old_password.required" => "Please!Enter this field.",
               "new_password.required" => "Please!Enter this field.",
               "new_password.min" => "Password is too short!The minimum is 8 characters.",
               "new_password.max" => "Password is too long!The maximum is 20 characters.",
               "retype_password.required" => "Please!Enter this field."
          ]
          );
          
          if($validator->fails()){
               return redirect()->back()->withErrors($validator)->withInput();
          }
          elseif(!Hash::check($request->old_password, $user->password)){
               return redirect()->back()->withErrors(["old_password"=>"Old password is incorrect."])->withInput();
               
          }
          elseif($request->new_password != $request->retype_password){
               return redirect()->back()->withErrors(["retype_password" => "Please enter the correct new password."]);
          }
          elseif(Hash::check($request->new_password, $user->password)){
               return redirect()->back()->withErrors(["new_password" => "The new password matches the old password."]);
          }
          else{
               $user->password = Hash::make($request->new_password);
               $user->save();
          return redirect()->back()->with("success","Changed password successfully.");
          }
    }
}
