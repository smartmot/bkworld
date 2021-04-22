@extends("layouts/".config("settings.theme"))

@section("keywords", config("settings.keywords"))
@section("description", config("settings.description"))
@section("style")

@endsection
@section("head")

@endsection
@section("header")
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
                                                <a href="" class=" color_5 hcolor_4 t_d_n acolor_4">
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
@endsection

@section("content")
    <div class="">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset("images/slide/01.jpg") }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset("images/slide/02.jpg") }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset("images/slide/03.jpg") }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="cw">
        <div class="pr_10 pl_10 pt_20 pb_10">
            <div class="h_30 wp_100"></div>
            <div class="h-50 wp_100 t_a_c">
                <span class="fm-ubt fs_30 pt_20" style="color: blue">Welcome to BK WORLD DEVELOPMENT CO., LTD</span>
            </div>
            <div class="h_30 wp_100"></div>
            <div class="rowc pt_10 pb_10">
                <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                    <div class="pr_20 pl_20">
                        <div class="vdo-ut">
                            <iframe src="https://www.youtube.com/embed/M0a9C9t0RW8?autoplay=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="pr_10 pl_10 pt_5 pb_10">
                            <h3>Lorem Ipsum is simply dummy text of the printing </h3>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        </div>
                    </div>
                </div>
                <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                    <div class="pr_20 pl_20">
                        <div class="vdo-ut">
                            <iframe src="https://www.youtube.com/embed/nt2_HNhQhLI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="pr_10 pl_10 pt_5 pb_10">
                            <h3>Lorem Ipsum is simply dummy text of the printing </h3>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wp_100 bcolor_1 pt_20">
        <div class="cw">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_10">
                <span>Our Services</span>
            </div>
            <div class="pr_10 pl_10 pt_20">
                <div class="rowc">
                    @foreach($services as $service)
                        <div class="xl-4 lg-4 md-4 sm-6 fx_12">
                            <div class="pr_10 pl_10 pb_15">
                                <div class="bcolor_1 box-s1">
                                    <div>
                                        <img class="wp_100" src="{{ asset("photo/".$service["thumbnail"].".jpg") }}" alt="">
                                    </div>
                                    <div class="pr_15 pl_15 h_100 ovfy_h">
                                        <div class="fm-ubt fs_18">
                                            <span>{{ $service["title"] }}</span>
                                        </div>
                                        <div>
                                            <span>{{ $service["description"] }}</span>
                                        </div>
                                    </div>
                                    <div class="h_15 wp_100"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="wp_100 bcolor_1 pt_10">
        <div class="cw">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_10">
                <span>business activities</span>
            </div>
            <div class="pr_10 pl_10 pt_20 pb_20">
                <div class="rowc">
                    @foreach($activities as $act)
                        <div class="xl-4 lg-4 md-4 sm-6 fx_12">
                            <div class="pr_15 pl_15 pb_15">
                                <div class="bcolor_1 box-s1">
                                    <div>
                                        <img class="wp_100" src="{{ asset("photo/".$act["thumbnail"].".jpg") }}" alt="">
                                    </div>
                                    <div class="pr_10 pl_10 h_100 ovfy_h">
                                        <div class="fm-ubt fs_18">
                                            <span>{{ $act["title"] }}</span>
                                        </div>
                                        <div>
                                            <span>{{ $act["description"] }}</span>
                                        </div>
                                    </div>
                                    <div class="h_15 wp_100"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="wp_100 bcolor_1 pt_10">
        <div class="cw">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_10">
                <span>Vision and Mission</span>
            </div>
            <div class="rowc">
                <div class="xl-6 lg-6 md-6 sm-12 fx_12" style="background-color: #eaeaea">
                    <div class="pr_20 pl_20 pb_15">
                        <div class="">
                            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c">
                                <span>Our Vision</span>
                            </div>
                            <div class="fm-popp">
                                <span>
                                    “To be a globally respected corporation that provides best-of-breed business solutions, leveraging technology, delivered by best-in-class people.”
BK World does not just want to be a corporation which just focuses on increasing its business and revenue, rather its vision is to be a corporation
which provides best business solution by indulging best talented people and eventually to become a reputed and respected corporation.
“To achieve our objectives in an environment of fairness, honesty, and courtesy towards our clients, employees, vendors and society at large.”
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl-6 lg-6 md-6 sm-12 fx_12" style="background-color: #eaeaea">
                    <div class="pr_20 pl_20 pb_15">
                        <div class="">
                            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c">
                                <span>Our Mission</span>
                            </div>
                            <div class="fm-popp">
                                <span>
                                   BK World focuses on maintaining fairness, honesty and courtesy towards their clients, employees, vendors and society in their path of achieving
their objective. They believe that these three key aspects were the main factors in achieving their vision.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="cw">
        <div class="pr_10 pl_10 pt_20 pb_20">

        </div>
    </div>

    <div class="wp_100 h_30"></div>
@endsection


@section("script")
    <script>
        $('.carousel').carousel({
            interval: 1000
        })
    </script>
@endsection
