@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("setting.index") }}">Back</a>
@endsection

@section("content")
    <div class="cwc bc_whi mt_10 b_r_5">
        <div class="pr_10 pl_10 pt_20 pb_20">
            <div class="fm-ubt t_t_c">{{ request("setting") }}</div>
            <div>
                <form action="{{ route("setting.item_update", request("setting")) }}" method="post" autocomplete="off">
                    @csrf
                    @method("put")
                    <label class="ds_f mt_5 mb_10">
                        @include("admin.components.setting_editor.".settings(request("setting")))
                    </label>
                    <div class="h_05 wp_100 bcolor_5 opc_30 mb_5"></div>
                    <div class="t_a_r">
                        <button class="oln_n bd_n pd-2x15 b_r_3 bcolor_5 color_1 hbcolor_4 abcolor_4 us_n csr-p fm-popp" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
