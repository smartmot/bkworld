<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Partner;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view("home")->with([
            "activities" => Post::query()->where("category_id",2)->get(),
            "services" => Post::query()->where("category_id",1)->get(),
            "partners" => Partner::all()
        ]);
    }

    public function two(){
        return view("executive_committee")->with([
            "members" => Member::query()->where("type", "management")->get(),
            "operations" => Member::query()->where("type", "operation")->get(),
        ]);
    }

    public function services(){
        return view("services")->with([
            "services" => Post::query()->where("category_id",1)->get(),
        ]);
    }

    public function events(){
        return view("events")->with([
            "events" => Event::query()->orderBy("created_at", "desc")->get()
        ]);
    }

    public function about(){
        return view("about")->with([

        ]);
    }
    public function news(){
        return view("news")->with([
            "news" => Post::query()
                ->where("category_id", 2)
                ->orderBy("created_at", "desc")->limit(6)->get()
        ]);
    }
    public function contact(){
        return view("contact")->with([

        ]);
    }
}
