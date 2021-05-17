<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", config("settings.name"))</title>
    <link rel="shortcut icon" href="{{ asset("bkworld.svg") }}">
    <link rel="stylesheet" href="{{ route("soft", "css.colors?ver=".config("settings.color_ver")) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/style.css")."?ver=".date('y.m.d.his') }}" type="text/css">
    <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/fx.js") }}"></script>
</head>
<body>
<div class="wp_100 h_70 p-r">
    <div class="wp_100 h_70 p-f t-0 r-0 bcolor_5">
        <div class="cw">
            <div class="pr_10 pl_10 p-r ds_f">
                <div class="w_124 h_60 pt_5 pb_5 pl_10">
                    <a href="{{ route("admin.index") }}" class="ds_b t_d_n">
                        <img class="h_60" src="{{ asset("bkworld_logo.svg") }}" alt="">
                    </a>
                </div>
                <div class="flx"></div>
                <div>
                    <div class="h_60 lh_60 mt_7">
                        <button class="color_1 fs_30 pr_10 pl_10 bcolor_4 oln_n bd_n csr-p us_n hbcolor_3" type="button" onclick="$('.main_page').toggleClass('active')">
                            <span class="fa fa-bars"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$confim = in_array(auth()->user()->role, ["admin"])
?>
<div style="height: calc(100% - 70px)">
    <div class="cw hp_100">
        <div class="ds_f hp_100 wp_100 ovfx_h main_page">
            <div class="xl-4 lg-4 md-4 sm-12 fx_12 ts_030 hp_100 prt_left">
                <div class="">
                    <div class="">
                        <a href="{{ route("admin.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent() == "admin" ? " bcolor_4 color_1":" color_5" }}">Profile</a>
                    </div>
                    @if($confim)
                        <div class="">
                            <a href="{{ route("user.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="user" ? " bcolor_4 color_1" : " color_5" }}">Users</a>
                        </div>
                    @endif
                    <div>
                        <a href="{{ route("post.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="post" ? " bcolor_4 color_1" : " color_5" }}">Posts</a>
                    </div>
                    <div>
                        <a href="{{ route("page.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="page" ? " bcolor_4 color_1" : " color_5" }}">Pages</a>
                    </div>
                    <div>
                        <a href="{{ route("event.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="event" ? " bcolor_4 color_1" : " color_5" }}">Events</a>
                    </div>
                    <div>
                        <a href="{{ route("message.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="message" ? " bcolor_4 color_1" : " color_5" }}">Messages</a>
                    </div>
                    @if($confim)
                        <div>
                            <a href="{{ route("member.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="member" ? " bcolor_4 color_1" : " color_5" }}">Members</a>
                        </div>
                        <div>
                            <a href="{{ route("partner.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="partner" ? " bcolor_4 color_1" : " color_5" }}">Partners</a>
                        </div>
                        <div>
                            <a href="{{ route("setting.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ route_parent()=="setting" ? " bcolor_4 color_1" : " color_5" }}">Settings</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="xl-8 lg-8 md-8 sm-12 fx_12 ts_030 bcolor_2 prt_right afbcolor_4 hp_100 box-s1 ovfy_a ">
                <div class="wp_100 box-s1 h_60 ds_f">
                    <div class="pl_30 fm-ubt fs_24 lh_60 color_5">
                        @yield("tab_name", tab_name())
                    </div>
                    <div class="fx"></div>
                    <div class="lh_60 pr_15">
                        @yield("head_link")
                    </div>
                </div>
                <div class="pr_10 pl_15 pt_10 pb_20">
                    <div>
                        @yield("content")
                    </div>
                    <div class="wp_100 h_20"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield("script")
@yield("script1")
@yield("script2")
</body>
</html>
