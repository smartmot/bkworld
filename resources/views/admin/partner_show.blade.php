@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("partner.index") }}">Back</a>
@endsection

@section("content")
    <div class="rowc pt_10">
        <div class="xl-6 lg-6 md-6 sm-12 fx_12">
            <div class="w_120 _0auto pb_5">
                <img class="wp_100" src="{{ asset("photo/".$partner->logo.".jpg") }}" alt="">
            </div>
            <div class="color_5 fm-popp">
                <div>Name &nbsp;:</div>
                <div class="pl_15">{{ $partner->name }}</div>
            </div>
            <div class="color_5 fm-popp">
                <div class="t_t_c">website &nbsp;:</div>
                <div class="pl_15">{{ $partner->website }}</div>
            </div>
            <div class="color_5 fm-popp">
                <div class="t_t_c">email &nbsp;:</div>
                <div class="pl_15">{{ $partner->email }}</div>
            </div>
            <div class="color_5 fm-popp">
                <div class="t_t_c">phone &nbsp;:</div>
                <div class="pl_15">{{ $partner->phone }}</div>
            </div>
            <div class="color_5 fm-popp">
                <div class="t_t_c">address &nbsp;:</div>
                <div class="pl_15">{{ $partner->address }}</div>
            </div>
        </div>
    </div>
@endsection

@section("script")
@endsection
