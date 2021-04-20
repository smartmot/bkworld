@extends("layouts/".config("settings.theme"))

@section("keywords", config("settings.keywords"))
@section("description", config("settings.description"))

@section("header")
    <div class="wp_100 p-r h_140">
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
                    <nav id="menu" class="navbar navbar-inverse navbar-static-top " role="navigation">
                        <div>
                            <!-- Collect the nav links -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active home">
                                        <a href="https://news.sabay.com.kh"><i class="fa fa-home"></i></a>
                                    </li>

                                    <li class=" category " id="">
                                        <a href="" class="">
                                            <span>Services</span>
                                        </a>
                                    </li>
                                    <li class=" category " id="">
                                        <a href="" class="">
                                            <span>News</span>
                                        </a>
                                    </li>
                                    <li class=" category " id="events">
                                        <a href="" class="menu_events">
                                            <span>Events</span>
                                        </a>
                                    </li>
                                    <li class=" category " id="about">
                                        <a href="" class="menu_about">
                                            <span>About</span>
                                        </a>
                                    </li>
                                    <li class=" category " id="contact">
                                        <a href="" class="menu_contact">
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

@endsection
