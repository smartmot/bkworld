<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class SoftController extends Controller
{

    public function index($soft){
        if (view()->exists("as_files/".$soft)){
            return Response::view("as_files/".$soft)->header('Content-Type', " text/css");
        }else{
            return abort(404);
        }
    }

}
