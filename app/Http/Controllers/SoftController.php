<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoftController extends Controller
{

    public function index($soft){
        if (view()->exists("as_files/css/colors")){
            $path = "files/colors.php";
            $visibility = Storage::disk("local")->getVisibility($path);

            Storage::disk("local")->setVisibility($path, 'public');
            return Storage::url("app/files/colors.php");
        }else{
            return "No Fuck!";
        }
    }

}
