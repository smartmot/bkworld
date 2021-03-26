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

if (!function_exists("route_is")){
    function route_is(){
        return request()->route()->getName();
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

if (!function_exists("tab_name")){
    function tab_name(){
        $tabs = [
            "admin.index" => "Admin",

            "user.index" => "Users",
            "user.create" => "Add new User",
            "user.edit" => "Edit User",
            "user.show" => "User",

            "post.index" => "Posts",
            "post.create" => "Add new Post",
            "post.edit" => "Edit Post",
            "post.show" => "Post",

            "page.index" => "Pages",
            "page.create" => "Add new Page",
            "page.edit" => "Edit Page",
            "page.show" => "Page",

            "event.index" => "Events",
            "event.create" => "Add new Event",
            "event.edit" => "Edit Event",
            "event.show" => "Event",

            "message.index" => "Messages",
            "message.show" => "Read Message",

            "member.index" => "Members",
            "member.create" => "Add new Member",
            "member.edit" => "Edit Member",
            "member.show" => "Member",

            "partner.index" => "Partners",
            "partner.create" => "Add new Partner",
            "partner.edit" => "Edit Partner",
            "partner.show" => "Partner",

            "setting.index" => "Settings",
            "setting.edit" => "Update Setting",
        ];
        return (isset($tabs[route_is()]) ? $tabs[route_is()] : config("setting.name"));
    }
}

