<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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
            "categories" => Category::all()
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
            "category_id" => ["required", "exists:categories,id"],
            "content" => ["required"],
            "keyword" => ["nullable","max:150"],
            "youtube" => ["nullable","max:255"],
            "description" => ["required","max:255"],
            "thumbnail" => ["required","max:255"]
        ]);
        $image = "images/cache/post_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/his");
        $foler = "images/";
        $data = $validator->validate();
        if (Storage::disk("local")->exists($image)) {
            Storage::move($image, $foler.$cover. ".jpg");
            $photo = Image::make("photo/".$cover. ".jpg");
            $photo->resize(320, 180);
            $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
        }else{
            $validator->errors()->add("thumbnail", "Please upload your thumbnail");
        }
        $data["user_id"] = Auth::id();
        $data["thumbnail"] = $cover;

        $post = new Post($data);
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
        if ($post->user_id == Auth::id() or Auth::user() == "admin"){
            return view("admin.post_edit")->with([
                "post" => $post,
                "categories" => Category::all()
            ]);
        }else{
            return redirect(route("post.index"))->withErrors([
                "alert" => "No Permission!",
                "alert_message" => "You don't have permission to edit this post"
            ])->withInput();
        }
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
            "category_id" => ["required", "exists:categories,id"],
            "keyword" => ["nullable","max:150"],
            "youtube" => ["nullable","max:255"],
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
        $post->youtube = $data["youtube"];
        $post->category_id = $data["category_id"];
        $post->thumbnail = $data["thumbnail"];
        $post->description = $data["description"];
        if ($post->user_id == Auth::id() or Auth::user() == "admin"){
            if ($post->isDirty("thumbnail")){
                if (Storage::disk("local")->exists($image)) {
                    Storage::move($image, $foler.$cover. ".jpg");
                    Storage::disk("local")->delete([
                        "images/".$old_thumb.".jpg",
                        "images/".$old_thumb."_thumb.jpg",
                    ]);
                    $photo = Image::make("photo/".$cover. ".jpg");
                    $photo->resize(320, 180);
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
        }else{
            return redirect(route("post.index"))->withErrors([
                "alert" => "No Permission!",
                "alert_message" => "You don't have permission to edit this post"
            ])->withInput();
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
            return redirect(route("post.index"))->with([
                "alert" => "No permission",
                "alert_message" => "You don't have permission to delete this post"
            ]);
        }
    }

    public function thumbnail(Request $request){
        $validator = Validator::make($request->all(),[
            "thumbnail" => ["required", "image", "mimes:jpeg", "max:5125", "min:1", "dimensions:ratio=16/9"]
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

    public function news(Post $post){
        return view("single_post")->with([
            "news" => $post,
            "latest" => Post::query()
                ->where("category_id", $post->category_id)
                ->whereKeyNot($post->id)
                ->orderBy("created_at", "desc")
                ->limit(5)
                ->get()
        ]);
    }

    public function post(Request $request){
        $validator = Validator::make($request->all(),[
            "category" => ["required", "exists:categories,id"],
            "offset" => ["required", "numeric"]
        ]);
        $data = $validator->validate();
        $post = Post::query()
            ->where("category_id", $data["category"])
            ->orderBy("created_at", "desc")
            ->limit(9)
            ->offset($data["offset"])
            ->get();
        $result = [];
        $blade = "components.post";
        foreach ($post as $key => $p){
            $result[$key] = view($blade)->with(["post" => $p, "class"=>"xl-4 lg-4 md-4 sm-12 fx_12"])->render();
        }
        return $result;
    }
}
