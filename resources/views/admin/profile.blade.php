@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("admin.edit") }}">Edit Profile</a>
@endsection

@section("content")
    <div>
        <div class="rowc pt_10">
            <div class="xl-4 lg-4 md-12 sm-12 fx_12">
                <div class="mb_15 pr_10 pl_10">
                    @if(auth()->user()->photo == "")
                        <img class="wp_100 box-s1" src="{{ asset("icon/member.svg") }}" alt="">
                    @else
                        <img class="wp_100 box-s1" src="{{ asset("photo/".auth()->user()->photo.".jpg") }}" alt="">
                    @endif
                </div>
            </div>
            <div class="xl-8 lg-8 md-12 sm-12 fx_12">
                <div class="pr_10 pl_10">
                    <div class="fm-ubt pd-5x15 bcolor_1 lh_30 fs_18">{{ auth()->user()->name }}</div>

                    <div class="pd-5x15 mt_10 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-envelope"></span></div>
                        <div class="fm-popp">{{ auth()->user()->email }}</div>
                    </div>

                    <div class="pd-5x15 mt_10 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-birthday-cake"></span></div>
                        <div class="fm-popp">
                            @if(auth()->user()->birth_date == "")
                                <span class="opc_40">None</span>
                            @else
                                <span>{{ date_format(date_create(auth()->user()->birth_date), "d, M Y") }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="pd-5x15 mt_10 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-venus-mars"></span></div>
                        <div class="fm-popp t_t_c">{{ auth()->user()->gender }}</div>
                    </div>

                    <div class="pd-5x15 mt_9 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-lock"></span></div>
                        <div class="fm-popp t_t_c">{{ auth()->user()->role }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pr_10 pl_10 pt_10">
            <div class="fm-popp pb_2">Security</div>
            <div class="h_1 wp_100 bcolor_5 opc_30"></div>
            <div>
                <div class="pt_5">
                    <ul class="pl_15 ml_0">
                        <li>
                            <a class="color_5 fs_14 fm-popp t_d_n hcolor_4 acolor_4" href="{{ route("admin.pw_form") }}">Change password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
