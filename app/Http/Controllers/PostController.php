<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        $cover = "photo/".date("Y/mdhis") . ".jpg";

        if (Storage::disk("local")->exists($image)) {
            Storage::move($image, $cover);
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
        $post->save();
        return redirect(route("post.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
