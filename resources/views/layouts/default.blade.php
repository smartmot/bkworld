<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="@yield("description")" />
    <meta name="keywords" content="@yield("keywords")" />

    <title>@yield("title", config("settings.name"))</title>

    <meta property="og:image" content="{{ asset("bkworld.svg") }}" />
    <meta property="og:title" content="{{ config("settings.name") }}" />
    <meta property="og:url" content="{{ asset("") }}" />
    <meta property="og:description" content="@yield("description")" />
    <meta property="og:type" content="website" />

    <link rel="shortcut icon" href="{{ asset("bkworld.svg") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ route("soft", "css.theme_colors?ver=".config("settings.color_ver")) }}}" type="text/css">
    <script src="{{ asset("js/app.js") }}"></script>
    @yield("head")
    <style>
        @yield("style")
        @yield("style1")
        @yield("style2")
        @yield("style3")
        @yield("style4")
    </style>
</head>
<body>
<div class="wp_100 h_70">
    <div class="wp_100 h_70 p-f t-0 r-0 bcolor_1 box-s2 z_x_3">
        <div class="cw h_70">
            <div class="pt_5 pb_5">
                <div class="h_60 ds_f">
                    <div>
                        <img class="h_60" src="{{ asset("bkworld.svg") }}" alt="">
                    </div>
                    <div class="flx"></div>
                    <div class="lh_60">
                        <nav id="bknav" class="" role="navigation">
                            <div>
                                <!-- Collect the nav links -->
                                <div class="">
                                    <ul class="fm-popp fs_18">
                                        <li class="" id="">
                                            <a href="{{ route("home") }}" class=" color_5 hcolor_4 t_d_n acolor_4">
                                                <span>Home</span>
                                            </a>
                                        </li>

                                        <li class="" id="">
                                            <a href="{{ route("home.two") }}" class=" color_5 hcolor_4 t_d_n acolor_4">
                                                <span>Executive Committee</span>
                                            </a>
                                        </li>
                                        <li class="" id="">
                                            <a href="" class=" color_5 hcolor_4 t_d_n acolor_4">
                                                <span>Services</span>
                                            </a>
                                        </li>
                                        <li class="" id="events">
                                            <a href="" class="menu_events color_5 hcolor_4 t_d_n acolor_4">
                                                <span>Events</span>
                                            </a>
                                        </li>
                                        <li class="" id="">
                                            <a href="" class=" color_5 hcolor_4 t_d_n acolor_4">
                                                <span>News</span>
                                            </a>
                                        </li>
                                        <li class="" id="about">
                                            <a href="" class="menu_about color_5 hcolor_4 t_d_n acolor_4">
                                                <span>About Us</span>
                                            </a>
                                        </li>
                                        <li class="" id="contact">
                                            <a href="" class="menu_contact color_5 hcolor_4 t_d_n acolor_4">
                                                <span>Contact Us</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield("header")


@yield("content")
@yield("script")
@yield("script1")
@yield("script2")
@yield("script3")
@yield("script4")
</body>
</html>
