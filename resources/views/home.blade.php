@extends("layouts/".config("settings.theme"))

@section("keywords", config("settings.keywords"))
@section("description", config("settings.description"))
@section("style")

@endsection
@section("head")
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection

@section("content")
    <div class="">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset("images/slide/01.jpg") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset("images/slide/02.jpg") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset("images/slide/03.jpg") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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
            <div class="wp_100">
                <div class="ds_f ovfx_h ovfy_h" id="partners" style="display: -ms-flexbox;display: flex;-ms-flex-wrap: nowrap;flex-wrap: nowrap;">
                    @foreach($partners as $key => $partner)
                        <div class="xl-8x lg-2 md-3 sm-3 fx_4 partner {{ $key==0?" ds_n":"" }}">
                            <div class="pr_10 pl_10">
                                <div>
                                    <div class="w_90 h_90 _0auto" style="line-height: 90px;">
                                        <img class="wp_100" src="{{ asset("photo/".$partner["logo"]).".jpg" }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="wp_100 h_30"></div>
@endsection


@section("script")
    <script>
        var html = document.getElementsByClassName("partner")[0];
        setInterval(function (){
            html = document.getElementsByClassName("partner")[0];
            document.getElementsByClassName("partner")[0].remove();
            $("#partners").append(html);
        },5000);
        var myCarousel = document.querySelector('#carouselExampleDark')
        var carousel = new bootstrap.Carousel(myCarousel)
    </script>
@endsection
