<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
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
        return view("admin.password.reset");
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
            $user->code = rand(123456,999999);
            $user->save();
            $code = rand(100000,999999);
            $snack = [
                "code" => $code,
                "email" => $user->email
            ];
            Cookie::queue("reset_code", json_encode($snack), 3);
            $mail = new ResetMail();
            if (
                Mail::to($user->email)
                    ->queue(
                        $mail->with([
                            "name" => $user["name"],
                            "code" => $code
                        ])
                    ) == 0
            ){
                return redirect(route("reset_confirm"));
            }else{
                return redirect(route("reset_password"))->withErrors([
                    "email" => "Sending failed"
                ])->withInput();
            }
        }else{
            $validator->after(function ($validator){
                $validator->errors()->add("email","Your email not match any account!");
            })->validate();
        }
    }

    public function reset_confirm(){
        if (Cookie::has("reset_code")){
            return view("admin.password.reset_verify")->with([
                "email" => json_decode(Cookie::get("reset_code"), true)["email"]
            ]);
        }else{
            return redirect(route("reset_password"))->withErrors([
                "email" => "Expired please try again"
            ])->withInput();
        }
    }

    public function reset_final(Request $request){
        if (Cookie::has("reset_code")){
            $validator = Validator::make($request->all(),[
                "code" => ["required", "numeric"]
            ]);
            $data = $validator->validate();
            $snack = json_decode(Cookie::get("reset_code"), true);
            if ($data["code"] == $snack["code"]){
                Cookie::queue("last_step", $snack["email"], 15);
                return redirect(route("new_password"));
            }else{
                $validator->after(function ($validator){
                    $snack = json_decode(Cookie::get("reset_code"), true);
                    $validator->errors()->add("code","Incorrect code!".$snack["code"]);
                })->validate();
            }
        }else{
            return redirect(route("reset_password"))->withErrors([
                "email" => "Expired. Try again!"
            ])->withInput();
        }
    }

    public function new_password(){
        if (Cookie::has("last_step")){
            return view("admin.password.reset_enter_password");
        }else{
            return redirect(route("reset_password"))->withErrors([
                "email" => "Expired. Try again!"
            ])->withInput();
        }
    }
    public function save_password(Request $request){
        if (Cookie::has("last_step")){
            $email = Cookie::get("last_step");
            $validator = Validator::make($request->all(),[
                "password" => ["required", "confirmed"]
            ]);
            $data = $validator->validate();
            $user = User::query()
                ->where("email", $email)
                ->where("status", "active")
                ->first();
            if ($user == null){
                return redirect(route("reset_password"))->withErrors([
                    "email" => "Error. Try again!"
                ])->withInput();
            }else{
                $user->password = Hash::make($data["password"]);
                $user->updated_by = $user->id;
                $user->save();
                Auth::loginUsingId($user->id);
                return redirect(route("admin.index"));
            }
        }else{
            return redirect(route("reset_password"))->withErrors([
                "email" => "Expired. Try again!"
            ])->withInput();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect(route("login"));
    }
}
