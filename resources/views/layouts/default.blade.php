<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", config("app.name"))</title>
    <link rel="shortcut icon" href="{{ asset("bkworld.svg") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css">
</head>
<body>
<div class="wp_100 h_70 p-r z_x_2">
    <div class="wp_100 h_70 p-f t-0 r-0 bc_whi box-s1">
        <div class="wp_100 h_20 bc-bk">
            <div class="cw">
                <div class="t_a_r lh_20 fm-ubt4 fs_14 pr_10 uplink">
                    <a class="c_whi hc-body ac-body" href="{{ route("home") }}">Our Services</a>
                    <a class="c_whi hc-body ac-body" href="{{ route("home") }}">Events</a>
                    <a class="c_whi hc-body ac-body" href="{{ route("home") }}">About</a>
                    <a class="c_whi hc-body ac-body" href="{{ route("home") }}">Contact</a>
                </div>
            </div>
        </div>
        <div class="cw lh_50">
            <div class="ds_f">
                <div class="h_50 pl_10">
                    <a href="{{ route("home") }}">
                        <img class="h_50" src="{{ asset("bkworld.svg") }}" alt="">
                    </a>
                </div>
                <div class="flx h_50">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="cw">
    <div class="pr_10 pl_10">
        <div class="p-r">
            <img class="wp_100 ttimg1" src="{{ asset("images/003.jpg") }}" alt="">
            <img class="wp_100 ttimg2" src="{{ asset("images/005.jpg") }}" alt="">
            <div class="p-a t_slogan bc_b60 c_whi fm-ubt">
                <div class="pd-20x25">
                    <div class="titlex">
                        <span>BK WORLD DEVELOPMENT</span>
                    </div>
                    <div class="sloganx">
                        <span>Dream to future....</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
