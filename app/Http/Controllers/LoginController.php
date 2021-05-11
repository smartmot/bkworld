<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("login");
    }

    public function login_check(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => ["required","email","exists:users,email"],
            "password" => ["required"]
        ]);
        $login= $validator->validate();
        $login["status"] = "active";
        $pass = Validator::make($request->only("password"),[
            "password" => ["required"]
        ]);
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect(route("admin.index"));
        }else{
            return $pass->after(function ($pass){
                $pass->errors()->add("password","Incorrect Password!");
            })->validate();
        }
    }

    public function reset_password(){
        dd(1);
    }
}
