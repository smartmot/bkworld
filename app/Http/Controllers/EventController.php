<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.event")->with([
            "events" => Event::query()->orderBy("created_at", "desc")->paginate()
        ]);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.event_create")->with([

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
        $validator = Validator::make($request->all(),[
            "title" => ["required"],
            "start" => ["required", "after:now"],
            "end" => ["required", "after:start"],
            "content" => ["required"],
            "thumbnail" => ["required"],
            "keyword" => ["nullable"],
            "description" => ["nullable"],
        ]);
        $image = "images/cache/post_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/his");
        $foler = "images/";
        $data = $validator->validate();
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
        $data["thumbnail"] = $cover;
        $data["user_id"] = Auth::id();
        $event = new Event($data);
        $event->save();
        return redirect(route("event.index"));
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view("admin.event_show")->with([
            "event" => $event
        ]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view("admin.event_edit")->with([
            "event" => $event
        ]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $old_thumb = $event->thumbnail;
        $validator = Validator::make($request->all(),[
            "title" => ["required"],
            "start" => ["required", "after:now"],
            "end" => ["required", "after:start"],
            "content" => ["required"],
            "thumbnail" => ["required"],
            "keyword" => ["nullable"],
            "description" => ["nullable"],
        ]);
        $image = "images/cache/post_". Auth::id() . ".jpg";

        $cover = date("Y/m/d/his");
        $foler = "images/";
        $data = $validator->validate();
        $event->title = $data["title"];
        $event->start = $data["start"];
        $event->end = $data["end"];
        $event->content = $data["content"];
        $event->keyword = $data["keyword"];
        $event->description = $data["description"];
        $event->thumbnail = $cover;
        $event->updated_by = Auth::id();

        if ($event->isDirty("thumbnail")){
            if (Storage::disk("local")->exists($image)) {
                Storage::move($image, $foler.$cover. ".jpg");
                Storage::disk("local")->delete([
                    "images/".$old_thumb.".jpg",
                    "images/".$old_thumb."_thumb.jpg",
                ]);
                $photo = Image::make("photo/".$cover. ".jpg");
                $photo->resize(300, 225);
                $photo->save($photo->dirname."/".$photo->filename."_thumb.".$photo->extension);
            }else{
                $validator
                    ->after(function ($validator){
                        $validator->errors()->add("thumbnail","Please upload a thumbnail");
                    })->validate();
            }
        }

        $event->update($data);
        $event->save();
        return redirect(route("event.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
