<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function show(){
        return view("upload");
    }

    public function uplaod(Request $request){
        $validator = Validator::make($request->all(),[
            "upload" => ["required", "image"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors()->add("error", true);
            return response($error);
        }else{
            $name = "cache/post_". Auth::id() . ".jpg";
            $url = $request->upload->storeAs('images', $name, 'local');
            return response(["url"=>$name."?ver=".date("his"), "error"=>false]);
        }
    }
}
