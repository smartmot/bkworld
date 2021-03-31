@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("user.create") }}">Add new</a>
@endsection

@section("content")
    <div>
        <div class="pt_10">
            @foreach($users as $user)
                <div class="pr_10 pl_10 pb_10">
                    <div class="ds_f bcolor_1 box-s2 pr_10 pl_10 pt_10 pb_10">
                        <div class="w_50">
                            <img class="w_50 box-s2 b_r_c" src="{{ asset("icon/member.svg") }}" alt="">
                        </div>
                        <div class="lh_20">
                            <div class="fm-popp pl_10 fs_18 pt_5">{{ $user["name"] }}</div>
                            <div class="fm-popp fs_14 pl_10 t_t_c">{{ $user["role"] }}</div>
                        </div>
                        <div class="flx"></div>
                        <div class="lh_50">
                            <a class="t_d_n color_5 hcolor_4 acolor_4" href="{{ route("user.edit", $user["id"]) }}">
                                <span class="fa fa-edit"></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
