<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        return view("password.reset");
    }

    public function reset_check(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => ["email", "required", "exists:users,email"]
        ]);
        $data = $validator->validate();
        $user = User::query()
            ->where("email", $data["email"])
            ->where("status", "active")
            ->first();
        if ($user != null){
            $mail = new ResetMail();
            return Mail::to("lyelmot@gmail.com")
                ->queue(
                    $mail->with([
                        "name" => $user["name"],
                        "code" => "23x709"
                    ])
                );
        }else{

        }
    }
}
