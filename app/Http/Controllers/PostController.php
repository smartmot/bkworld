<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.post")->with([
            "posts" => Post::query()->orderBy("created_at", "desc")->paginate()
        ]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.post_create")->with([

        ]);
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
            "title" => ["required","max:255"],
            "content" => ["required"],
            "keyword" => ["nullable","max:150"],
            "description" => ["required","max:255"],
            "thumbnail" => ["required","max:255"]
        ]);
        $image = "images/cache/post_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/his");
        $foler = "images/";

        if (Storage::disk("local")->exists($image)) {
            Storage::move($image, $foler.$cover. ".jpg");
            $photo = Image::make("photo/".$cover. ".jpg");
            $photo->resize(300, 225);
            $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
        }else{
            $validator
                ->after(function ($validator){
                    $validator->errors()->add("thumbnail","Please upload a thumbnail");
                })->validate();
        }
        $data = $validator->validate();
        $data["user_id"] = Auth::id();
        $data["thumbnail"] = $cover;

        $post = new Post($data);
        $post->thumbnail = $cover;
        $post->description = $data["description"];
        $post->save();
        return redirect(route("post.index"));
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.post_show")->with([
            "post" => $post
        ]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.post_edit")->with([
            "post" => $post
        ]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $old_thumb = $post->thumbnail;
        $validator = Validator::make($request->all(), [
            "title" => ["required","max:255"],
            "content" => ["required"],
            "keyword" => ["nullable","max:150"],
            "description" => ["required","max:255"],
            "thumbnail" => ["required","max:255"]
        ]);
        $image = "images/cache/post_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/his");
        $foler = "images/";

        $data = $validator->validate();
        $post->title = $data["title"];
        $post->content = $data["content"];
        $post->keyword = $data["keyword"];
        $post->updated_by = Auth::id();
        $post->thumbnail = $data["thumbnail"];
        $post->description = $data["description"];

        if ($post->isDirty("thumbnail")){
            if (Storage::disk("local")->exists($image)) {
                Storage::move($image, $foler.$cover. ".jpg");
                Storage::disk("local")->delete([
                    "images/".$old_thumb.".jpg",
                    "images/".$old_thumb."_thumb.jpg",
                ]);
                $photo = Image::make("photo/".$cover. ".jpg");
                $photo->resize(300, 225);
                $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
                $post->thumbnail = $cover;
            }else{
                $validator
                    ->after(function ($validator){
                        $validator->errors()->add("thumbnail","Please upload a thumbnail");
                    })->validate();
            }
        }

        if (count($post->getDirty()) == 0){
            return redirect(route("post.index"));
        }else{
            $post->updated_by = Auth::id();
            $post->update($post->getDirty());
            return redirect(route("post.index"));
        }
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() == $post->user_id){
            Storage::disk("local")->delete([
                "images/".$post->thumbnail.".jpg",
                "images/".$post->thumbnail."_thumb.jpg",
            ]);
            $post->delete();
            return redirect(route("post.index"));
        }elseif (Auth::user()->role == "admin"){
            Storage::disk("local")->delete([
                "images/".$post->thumbnail.".jpg",
                "images/".$post->thumbnail."_thumb.jpg",
            ]);
            $post->delete();
            return redirect(route("post.index"));
        }else{
            return redirect(route("post.index"));
        }
    }

    public function thumbnail(Request $request){
        $validator = Validator::make($request->all(),[
            "thumbnail" => ["required", "image", "mimes:jpeg", "max:5000", "min:1", "dimensions:ratio=4/3"]
        ]);
        if ($validator->fails()){
            $error = $validator->errors()->add("error", true);
            return response($error);
        }else{
            $name = "cache/post_". Auth::id() . ".jpg";
            $url = $request->thumbnail->storeAs('images', $name, 'local');
            return response(["url"=>$name."?ver=".date("his"), "error"=>false]);
        }
    }
}
