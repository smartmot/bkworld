<?php

use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

if (!function_exists("if_null_is")){
    function if_null_is($str, $str_if_true){
        return is_null($str) ? $str_if_true : $str;
    }
}

if (!function_exists("if_null_na")){
    function if_null_na($str){
        return is_null($str) ? "n/a" : $str;
    }
}

if (!function_exists("if_3")){
    function if_3($check,$if_true,$if_fale){
        return $check ? $if_true : $if_fale;
    }
}

if (!function_exists("if_has")){
    function if_has($array, $key, $if_elase_text=false){
        return isset($array[$key]) ? $array[$key] : ($if_elase_text ? $if_elase_text : "");
    }
}

if (!function_exists("age")){
    function age($date){
        return Carbon::createFromDate($date)->age;
    }
}

if (!function_exists("act_route")){
    function act_route($route){
        return request()->route()->getName() == $route;
    }
}

if (!function_exists("make_thumbnail")){
    function make_thumbnail($image_dir, $new_image="_thumb.jpg" ,$canvas=[150,150]){
        $image = Image::make($image_dir);
        if ($image->width() > $image->height()){
            $image->resize(150, number_format(150*($image->height()/$image->width()),0));
        }else{
            $image->resize(number_format(150*($image->width()/$image->height()),0), 150);
        }
        $image->resizeCanvas($canvas[0], $canvas[1]);
        return $image->save($image->dirname."/".$image->filename.$new_image);
    }
}

if (!function_exists("imgz")){
    function imgz($image_dir,$size=900){
        $image = Image::make($image_dir);
        if ($image->width() > $image->height()){
            $image->resize($size, number_format($size*($image->height()/$image->width()),0, "", ""));
        }else{
            $image->resize(number_format($size*($image->width()/$image->height()),0, "", ""), $size);
        }
        $image->save(null, 100);
    }
}

if (!function_exists("fx_numeric")){
    function fx_numeric($number){
        return number_format($number, 0, "", "");
    }
}
