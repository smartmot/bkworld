@extends("layouts/".config("settings.theme"))

@section("keywords", config("settings.keywords"))
@section("description", config("settings.description"))
@section("style")
    .carousel-item {
    height: 100vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    }
@endsection
@section("head")
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection
@section("header")
    <div class="wp_100 p-r h_140 z_x_3">
        <div class="h_100 p-f wp_100 t-0 r-0 bcolor_5">
            <div class="cw h_100">
                <div class="pr_10 pl_10 pb_15 pt_15">
                    <div class="h_70 ds_f">
                        <div>
                            <img class="h_70" src="{{ asset("bkworld_logo.svg") }}" alt="BK WORLD Logo">
                        </div>
                        <div class="flx"></div>
                        <div>
                            <div class="ds_f pb_5 pt_10">
                                <div class="h_50 w_50 lh_50 bcolor_1 color_6 b_r_c t_a_c fs_30">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="h_50 pl_10 color_1 fm-popp lh_20">
                                    <div class="">
                                        <span class="opc_50">St 608, Toul Kork,<br/></span>
                                        <span class="fs_25 fw_b">Phnom Penh</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="ds_f pl_20 pt_10">
                                <div class="h_50 w_50 lh_50 bcolor_1 color_6 b_r_c t_a_c fs_30">
                                    <span class="fa fa-clock-o"></span>
                                </div>
                                <div class="h_50 pl_10 color_1 fm-popp lh_20">
                                    <div class="">
                                        <span class="opc_50">Working day<br/></span>
                                        <span class="fs_25 fw_b">Monday-Friday</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h_40 p-f wp_100 t_100 r-0 bcolor_1 box-s1">
            <div class="cw">
                <div class="pb_5 pt_5 pl_10 pl_10">
                    <nav id="bknav" class="" role="navigation">
                        <div>
                            <!-- Collect the nav links -->
                            <div class="">
                                <ul class="fm-popp fs_18">
                                    <li class="active ">
                                        <a href="{{ route("home") }}" class=" color_5 hcolor_4 t_d_n acolor_4">
                                            <span class="fa fa-home"></span>
                                        </a>
                                    </li>

                                    <li class="" id="">
                                        <a href="" class=" color_5 hcolor_4 t_d_n acolor_4">
                                            <span>Services</span>
                                        </a>
                                    </li>
                                    <li class="" id="">
                                        <a href="" class=" color_5 hcolor_4 t_d_n acolor_4">
                                            <span>News</span>
                                        </a>
                                    </li>
                                    <li class="" id="events">
                                        <a href="" class="menu_events color_5 hcolor_4 t_d_n acolor_4">
                                            <span>Events</span>
                                        </a>
                                    </li>
                                    <li class="" id="about">
                                        <a href="" class="menu_about color_5 hcolor_4 t_d_n acolor_4">
                                            <span>About</span>
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
@endsection

@section("content")
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">First Slide</h2>
                        <p class="lead">This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Second Slide</h2>
                        <p class="lead">This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Third Slide</h2>
                        <p class="lead">This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection

@section("script")
    <script>

    </script>
@endsection
