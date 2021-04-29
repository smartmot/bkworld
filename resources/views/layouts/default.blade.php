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
            <div class="pt_5 pb_5 pr_5 pl_5">
                <div class="h_60 ds_f">
                    <div>
                        <img class="h_60" src="{{ asset("bkworld.svg") }}" alt="">
                    </div>
                    <div class="flx"></div>
                    <div class="lh_60 h_60 p-r">
                        <div class="menubtnx">
                            <button class="oln_n bd_n fs_30 pr_15 pl_15" onclick="$('#bknav').hasClass('open_ed') ? void 0 : $('#bknav').slideDown('fast').focus().addClass('open_ed')">
                                <span class="fa fa-bars"></span>
                            </button>
                        </div>
                        <nav id="bknav" class="oln_n bd_n" role="navigation" tabindex="1" onblur="$(this).hasClass('open_ed') ? $(this).slideUp('fast',function (){$('#bknav').removeClass('open_ed')}) : void 0">
                            <div>
                                <!-- Collect the nav links -->
                                <div class="">
                                    <ul class="fm-popp fs_18">
                                        <li class="" id="">
                                            <a href="{{ route("home") }}" class=" color_5 hcolor_4 t_d_n acolor_4{{ route_is() == "home" ? " active" : "" }}">
                                                <span>Home</span>
                                            </a>
                                        </li>

                                        <li class="" id="">
                                            <a href="{{ route("home.two") }}" class=" color_5 hcolor_4 t_d_n acolor_4{{ route_is() == "home.two" ? " active" : "" }}">
                                                <span>Executive Committee</span>
                                            </a>
                                        </li>
                                        <li class="" id="">
                                            <a href="{{ route("services") }}" class=" color_5 hcolor_4 t_d_n acolor_4{{ route_is() == "services" ? " active" : "" }}">
                                                <span>Services</span>
                                            </a>
                                        </li>
                                        <li class="" id="events">
                                            <a href="{{ route("events") }}" class="menu_events color_5 hcolor_4 t_d_n acolor_4{{ route_is() == "events" ? " active" : "" }}">
                                                <span>Events</span>
                                            </a>
                                        </li>
                                        <li class="" id="">
                                            <a href="{{ route("news") }}" class=" color_5 hcolor_4 t_d_n acolor_4{{ route_is() == "news" ? " active" : "" }}">
                                                <span>News</span>
                                            </a>
                                        </li>
                                        <li class="" id="about">
                                            <a href="{{ route("about") }}" class="menu_about color_5 hcolor_4 t_d_n acolor_4{{ route_is() == "about" ? " active" : "" }}">
                                                <span>About Us</span>
                                            </a>
                                        </li>
                                        <li class="" id="contact">
                                            <a href="{{ route("contact") }}" class="menu_contact color_5 hcolor_4 t_d_n acolor_4{{ route_is() == "contact" ? " active" : "" }}">
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

<div class="wp_100 pb_20 box-s1 pt_15">
    <div class="cw">
        <div class="pr_10 pl_10">
           <div class="rowc">
               <div class="xl-3 lg-3 md-3 sm-4 fx_12">
                   <div class="w_80">
                       <img class="wp_100" src="{{ asset("bkworld.svg") }}" alt="">
                   </div>
                   <div class="fs_12">
                       <span>BK WORLD DEVELOPMENT CO., LTD</span>
                   </div>
               </div>
               <div class="xl-3 lg-3 md-3 sm-4 fx_12">
                   <div class="pb_10">
                       <div class="fm-popp fs_18 fw_b">Company</div>
                   </div>
                   <ul class="pl_10">
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("events") }}">Events</a>
                       </li>
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("services") }}">Services</a>
                       </li>
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("about") }}">About</a>
                       </li>
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("contact") }}">Contact</a>
                       </li>
                   </ul>
               </div>
               <div class="xl-3 lg-3 md-3 sm-4 fx_12">
                   <div class="pb_10">
                       <div class="fm-popp fs_18 fw_b">Company</div>
                   </div>
                   <ul class="pl_10">
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("events") }}">Events</a>
                       </li>
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("services") }}">Services</a>
                       </li>
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("about") }}">About</a>
                       </li>
                       <li class="ls_n pl_0 pr_0">
                           <a class="t_d_n fm-popp c_blk hcolor_4 acolor_4" href="{{ route("contact") }}">Contact</a>
                       </li>
                   </ul>
               </div>
               <div class="xl-3 lg-3 md-3 sm-12 fx_12">
                   <div class="pb_10">
                       <div class="fm-popp fs_18 fw_b">Social Media</div>
                   </div>
                   <div>
                       <div class="ds_b">
                           <a href="#" class="t_d_n ds_ib">
                               <div class="w_30 h_30 lh_30 t_a_c color_1 bc-a b_r_c">
                                   <span class="fa fa-facebook"></span>
                               </div>
                           </a>&nbsp;

                           <a href="#" class="t_d_n ds_ib">
                               <div class="w_30 h_30 lh_30 t_a_c bc_red color_1 b_r_c">
                                   <span class="fa fa-instagram"></span>
                               </div>
                           </a>&nbsp;

                           <a href="#" class="t_d_n ds_ib">
                               <div class="w_30 h_30 lh_30 t_a_c bc-primary color_1 b_r_c">
                                   <span class="fa fa-twitter"></span>
                               </div>
                           </a>

                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>

@yield("script")
@yield("script1")
@yield("script2")
@yield("script3")
@yield("script4")
</body>
</html>
