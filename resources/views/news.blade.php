@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw pt_20 pb_20">
        <div class="pt_20">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                <span>Our Business Activities</span>
            </div>
            <div class="h_1 wp_100 bcolor_4"></div>
        </div>
        <div class="rowc pt_15">
            @foreach($news as $ns)
                <div class="xl-4 lg-4 md-4 sm-12 fx_12">
                    <div class="pr_15 pl_15 pb_20">
                        <div>
                            <div>
                                <img class="wp_100" src="{{ asset("photo/".$ns["thumbnail"]."_thumb.jpg") }}" alt="">
                            </div>
                            <div class="pr_10 pl_10">
                                <div>
                                    <a class="t_d_n c_blu hc_red" href="{{ route("news.show", $ns["id"]) }}">
                                        <h3 class="fm-ubt">{{ $ns["title"] }}</h3>
                                    </a>
                                </div>
                                <div class="fm-popp">{{ $ns["description"] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
