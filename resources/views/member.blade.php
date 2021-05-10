@extends("layouts/".config("settings.theme"))

@section("keywords", "BK WORLD, ".$member["name"].", ".$member["position"])
@section("description", $member["description"])

@section("content")
    <div class="cw">
        <div class="rowc pt_20 pb_20 hp_100">
            <div class="xl-8 lg-8 md-7 sm-12 fx_12 hp_100">
                <div>
                    <div class="rowc">
                        <div class="xl-4 lg-4 md-4 sm-12 fx_12">
                            <div class="pr_10 pl_10">
                                <img class="wp_100 box-s1" src="{{ asset("photo/".$member["photo"].".jpg") }}" alt="">
                            </div>
                        </div>
                        <div class="xl-8 lg-8 md-8 sm-12 fx_12 bc_02 pb_20">
                            <div class="pr_15 pl_15">
                                <div class="fm-ubt fs_20 pt_15">{{ $member["name"] }}</div>
                                <div class="fm-popp pb_5 bdbtm_1_gra">{{ $member["position"] }}</div>
                            </div>
                            <div class="pr_15 pl_15 fm-popp pt_10 pb_20">{{ $member["content"] }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl-4 lg-4 md-5 sm-12 fx_12">
                <div class="pr_15 pl_15">
                    <div class="pr_10 pb_10 pt_10 pl_10 bc_02 mb_15 c_blu">
                        <div class="fm-ubt fs_18">Related</div>
                    </div>
                    @foreach($relates as $member)
                        <div>
                            <div class="pb_15">
                                <div class="rowc">
                                    <div class="xl-4 lg-4 md-3 sm-3 fx_3">
                                        <img class="wp_100" src="{{ asset("photo/".$member["photo"].".jpg") }}" alt="">
                                    </div>
                                    <div class="xl-8 lg-8 md-9 sm-9 fx_9">
                                        <div class="pr_10 pl_10 pt_10">
                                            <div class="fm-ubt">
                                                <a class="t_d_n c_blu hc_red" href="{{ route("member.single", $member["id"]) }}">{{ $member["name"] }}</a>
                                            </div>
                                            <div class="fs_14 fm-popp">{{ $member["position"] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
