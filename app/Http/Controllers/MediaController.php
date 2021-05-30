<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.media")->with([
            "media" => Media::query()->orderBy("created_at", "desc")->paginate()
        ]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "file" => ["required", "image", "min:1", "max:15000"]
        ]);
        if ($request->has("file")){
            $name = date("Y/m/d/his");
            $ext = $request->file("file")->extension();
            $data = [
                "user_id" => Auth::id(),
                "name" => $name,
                "type" => "image",
                "extension" => $ext,
            ];

            if ($validator->fails()){
                $error = $validator->errors()->add("error", true);
                return response($error);
            }else{
                $url = $request->file->storeAs('images', $name.".".$ext, 'local');
                $media = new Media($data);
                $media->save();
                $folder = "storage/app/images/";
                $image = Image::make($folder.$name.".jpg");
                if ($image->width() < $image->height()){
                    $image->resize(150,(150)*($image->height()/$image->width()));
                }else{
                    $image->resize((150)*($image->width()/$image->height()), 150);
                }
                $image->resizeCanvas(150,150);
                $image->save($folder.$name."_thumb.jpg");// save thumbnail
                return response(["url"=>$name."?ver=".date("his"), "error"=>false]);
            }
        }else{
            $error = $validator->errors()->add("error", true);
            return response($error);
        }
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
