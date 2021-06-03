<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            $image->save();

            return response(
                [
                    "url"=>$name."?ver=".date("his"),
                    "error"=>false,
                ]
            );
        }
    }

    public function crop(Request $request){
        $folder = "images/";
        $file = "cache/upload_". Auth::id() . ".jpg";
        $resp = [
            "url" => $file."?ver=".date("hisymd"),
            "error" => false
        ];
        if ($request->has("cord") && Storage::disk("local")->exists($folder.$file)){
            $cord = json_decode($request->get("cord"), true);
            $image= Image::make("photo/".$file);
            if (isset($cord["r"]) && $cord["r"]!=0){
                switch ($cord["r"]){
                    case -90:
                        $image->rotate(90);
                        break;
                    case 90:
                        $image->rotate(-90);
                        break;
                    default:
                        $image->rotate($cord["r"]);
                        break;
                }
            }
            $image->crop(
                number_format($cord["width"], 0, "", ""),
                number_format($cord["height"], 0,"",""),
                number_format($cord["x"], 0, "", ""),
                number_format($cord["y"], 0, "",""),
            );
            $image->save();
            
            return response($resp);
        }else{
            $resp["error"] = true;
            return response($resp);
        }
    }
}
