<?php

use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;

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

if (!function_exists("route_parent")){
    function route_parent(){
        $route = request()->route()->getName();
        return explode(".", $route)[0];
    }
}

if (!function_exists("item_first")){
    function item_first($array=[]){
        return explode(".", $array);
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
            "admin.index" => auth()->user()->name,
            "admin.edit" => "Update profile",
            "admin.pw_form" => "Change Password",

            "user.index" => "Users",
            "user.create" => "Add new User",
            "user.edit" => "Edit User",
            "user.show" => "User",

            "post.index" => "Posts",
            "post.create" => "Add new Post",
            "post.edit" => "Edit Post",
            "post.show" => "Post",

            "page.index" => "Pages",
            "page.create" => "Create new Page",
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
            "setting.item" => "Edit " . request("setting"),
        ];
        return (isset($tabs[route_is()]) ? $tabs[route_is()] : config("setting.name"));
    }
}

if (!function_exists("settings")) {
    function settings($key = "")
    {
        $items = [
            "name" => "text",
            "address" => "text",
            "tel" => "text",
            "website" => "text",
            "email" => "text",
            "facebook" => "text",
            "youtube" => "text",
            "twitter" => "text",
            "instagram" => "text",
            "notifications" => "text",
            "admin" => "admin",
            "admin_header" => "admin_header",
            "colors" => "",
            "theme_color" => "",
            "color_ver" => "",
            "theme" => "theme",
            "description" => "textarea",
            "keywords" => "textarea",
            "map" => "textarea",
        ];
        return $items[$key];
    }
}

if (!function_exists("cooki_ceck")) {
    function cooki_ceck($key){
        return Cookie::has($key);
    }
}
