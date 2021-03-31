@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("user.create") }}">Add new</a>
@endsection

@section("content")
    <div>
        <div class="rowc pt_10">
            @foreach($users as $user)
                <div class="xl-4">
                    <div class="pr_10 pl_10 pb_10">
                        <div class="bcolor_1 pr_10 pl_10 pt_20 pb_10 box-s1 p-r">
                            <div class="p-a t_10 r_10">
                                <a class="t_d_n color_5 hcolor_4 acolor_4" href="{{ route("user.edit", $user["id"]) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            </div>
                            <div class="w_100 _0auto">
                                <img class="w_100 box-s1 b_r_c" src="{{ asset("icon/member.svg") }}" alt="">
                            </div>
                            <div class="fm-popp t_a_c">
                                <span class="fs_18">{{ $user["name"] }}</span>
                            </div>
                            <div class="fm-popp t_a_c pb_10">{{ $user["email"] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
