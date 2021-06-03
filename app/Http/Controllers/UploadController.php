<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function image(Request $request){
        $validator = Validator::make($request->all(),[
            "upload" => ["required", "image", "max:16125", "min:5"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors()->add("error", true);
            return response($error);
        }else{
            $name = "cache/upload_". Auth::id() . ".jpg";
            $request->upload->storeAs('images', $name, 'local');
            $file = "photo/".$name;

            $image = Image::make($file);

            $class = "";
            if ($image->getWidth() > $image->getHeight()){
                $class = "hor";
            }else{
                $class = "ver";
            }
            $image->save();

            return response(
                [
                    "url"=>$name."?ver=".date("his"),
                    "error"=>false,
                    "class" => $class
                ]
            );
        }
    }
}
