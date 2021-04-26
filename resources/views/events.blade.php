@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw">
        <div class="pt_20 pb_15">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                <span>Our Events</span>
            </div>
            <div class="h_1 wp_100 bcolor_4"></div>
        </div>
        <div class="rowc">
            @foreach($events as $event)
                <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                    <div class="pr_15 pl_15 pb_20">
                        <div class="p-r">
                            <div>
                                <img class="wp_100" src="{{ asset("photo/".$event["thumbnail"].".jpg") }}" alt="AA">
                            </div>
                            <div>
                                <h3 class="fm-ubt">{{ $event["title"] }}</h3>
                            </div>
                            <div class="p-a t_10 l_10 w_50 h_40 b_r_3 fm-popp bcolor_1 t_a_c box-s1">
                                <div class="wp_100 bcolor_4 color_1 fs_11 bdr-tlr-3">{{ date_format(date_create($event["start"]), "M") }}</div>
                                <div class="fm-ubt">{{ date_format(date_create($event["start"]), "d") }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
