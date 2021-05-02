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
        if ($event->user_id == Auth::id() or Auth::user() == "admin") {
            return view("admin.event_edit")->with([
                "event" => $event
            ]);
        }else{
            return redirect(route("event.index"))->withErrors([
                "alert" => "No permission!",
                "alert_message" => "You are not allowed to edit this event"
            ])->withInput();
        }
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
        $event->thumbnail = $data["thumbnail"];
        if ($event->user_id == Auth::id() or Auth::user() == "admin") {
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
                    $event->thumbnail = $cover;
                }else{
                    $validator
                        ->after(function ($validator){
                            $validator->errors()->add("thumbnail","Please upload a thumbnail");
                        })->validate();
                }
            }

            if (count($event->getDirty()) == 0){
                return redirect(route("event.index"));
            }else{
                $event->updated_by = Auth::id();
                $event->update($event->getDirty());
                return redirect(route("event.index"));
            }
        }else{
            return redirect(route("event.index"))->withErrors([
                "alert" => "No permission!",
                "alert_message" => "You are not allowed to edit this event"
            ])->withInput();
        }
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if ($event->user_id == Auth::id() or Auth::user() == "admin") {
            Storage::disk("local")->delete([
                "images/".$event->thumbnail.".jpg",
                "images/".$event->thumbnail."_thumb.jpg",
            ]);
            $event->delete();
            return redirect(route("event.index"));
        }else{
            return redirect(route("event.index"))->withErrors([
                "alert" => "No permission!",
                "alert_message" => "You are not allowed to edit this event"
            ])->withInput();
        }
    }

    public function event(Event $event){
        return view("single_event")->with([
            "event" => $event,
            "relates" => Event::query()
                ->whereKeyNot($event->id)
                ->orderBy("created_at", "desc")
                ->limit(5)
                ->get()
        ]);
    }
}
