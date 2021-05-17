<?php

namespace App\Http\Controllers;

use App\Mail\Notifications;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.message")->with([

        ]);
    }

    /**
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
        $validator = Validator::make($request->all(),[
            "name" => ["required", "max:255"],
            "email" => ["required", "email", "max:255"],
            "message" => ["required", "min:10"]
        ]);
        $data = $validator->validate();
        if (Cookie::has("message")){
            abort(404);
        }else{
            $message = new Message($data);
            $message->save();
            if (config("settings.notifications") != ""){
                $notification = new Notifications();
                Mail::to(config("settings.notifications"))->queue(
                    $notification->with([
                        "email" => $data["email"]
                    ])
                );
            }
            Cookie::queue("message", "sent", 30);
        }
        return redirect(route("contact"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
