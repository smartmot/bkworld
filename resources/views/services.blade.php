@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw">
        <div class="pt_20">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                <span>Our Services</span>
            </div>
            <div class="h_1 wp_100 bcolor_4"></div>
        </div>
        <div class="rowc">
            @foreach($services as $service)
                <div class="xl-6 lg-6 md-12 sm-12 fx_12">
                    <div class="pr_15 pl_15 pt_10 pb_10">
                        <div class="b">
                            <div class="bc_02">
                                <img class="wp_100" src="{{ asset("photo/".$service["thumbnail"].".jpg") }}" alt="">
                            </div>
                            <div class="pr_10 pl_10 bc_02 h_100 pb_15">
                                <div class="fm-ubt">
                                    <h3>{{ $service["title"] }}</h3>
                                </div>
                                <div class="fm-popp">{{ $service["description"] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
