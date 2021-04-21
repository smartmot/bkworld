<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view("home")->with([
            "activities" => Post::query()->where("category_id",2)->get(),
            "services" => Post::query()->where("category_id",1)->get()
        ]);
    }
}
