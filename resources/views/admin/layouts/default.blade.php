<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", config("settings.name"))</title>
    <link rel="shortcut icon" href="http://bkworld.proj/bkworld.svg">
    <link rel="stylesheet" href="{{ route("soft", "css.colors?ver=".config("settings.color_ver")) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css">
</head>
<body>
<div class="wp_100 h_70 p-r">
    <div class="wp_100 h_70 p-f t-0 r-0 bcolor_5">
        <div class="cw">
            <div class="pr_10 p-r">
                <div class="w_124 h_60 pt_5 pb_5 pl_10 p-a t-0 l-0">
                    <a href="{{ route("admin.index") }}" class="ds_b t_d_n">
                        <img class="h_60" src="{{ asset("bkworld_logo.svg") }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: calc(100% - 70px)">
    <div class="cw hp_100">
        <div class="rowc hp_100">
            <div class="xl-4 hp_100">
                <div class="">
                    <div class="">
                        <a href="{{ route("admin.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("admin.index") ? " bcolor_4 color_1":" color_5" }}">Home</a>
                    </div>
                    <div class="">
                        <a href="{{ route("user.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("user.index") ? " bcolor_4 color_1" : " color_5" }}">Users</a>
                    </div>
                    <div>
                        <a href="{{ route("post.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("post.index") ? " bcolor_4 color_1" : " color_5" }}">Posts</a>
                    </div>
                    <div>
                        <a href="{{ route("page.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("page.index") ? " bcolor_4 color_1" : " color_5" }}">Pages</a>
                    </div>
                    <div>
                        <a href="{{ route("event.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("event.index") ? " bcolor_4 color_1" : " color_5" }}">Events</a>
                    </div>
                    <div>
                        <a href="{{ route("message.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("message.index") ? " bcolor_4 color_1" : " color_5" }}">Messages</a>
                    </div>
                    <div>
                        <a href="{{ route("member.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("member.index") ? " bcolor_4 color_1" : " color_5" }}">Members</a>
                    </div>
                    <div>
                        <a href="{{ route("partner.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("partner.index") ? " bcolor_4 color_1" : " color_5" }}">Partners</a>
                    </div>
                    <div>
                        <a href="{{ route("setting.index") }}" class="ds_b t_d_n h_60 fs_18 fm-popp fw_b abcolor_4 acolor_1 hbcolor_4 hcolor_1 pl_30 lh_60{{ act_route("setting.index") ? " bcolor_4 color_1" : " color_5" }}">Settings</a>
                    </div>
                </div>
            </div>
            <div class="xl-8 bcolor_2 prt_right afbcolor_4 hp_100 box-s1">
                <div class="wp_100 box-s1 h_60">
                    <div class="pl_30 fm-ubt fs_24 lh_60 color_5">
                        {{ tab_name() }}
                    </div>
                </div>
                <div class="pr_10 pl_15 pt_10 pb_20">
                    <div>
                        @yield("content")
                    </div>
                    <div class="wp_100 h_30"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
