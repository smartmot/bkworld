@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("setting.index") }}">Back</a>
@endsection
@section("tab_name", "Update Featured Video ". $setting->id)
@section("content")
    <div class="cwc bc_whi mt_10 b_r_5">
        <div class="pr_10 pl_10 pt_20 pb_20">
            <div>
                <form action="{{ route("setting.update", $setting->id) }}" method="post" autocomplete="off">
                    @csrf
                    @method("put")
                    <label class="rowc mt_5 mb_10">
                        <span class="ds_b wp_100 pb_2 fm-ubt">Title</span>
                        <input class="input-4 b_r_3 wp_100 pd-10x15 ph-tt_c" type="text" name="title" placeholder="Title" value="{{ old("title") == "" ? $setting->data["title"] : old("title")}}">
                    </label>

                    <label class="rowc mt_5 mb_10">
                        <span class="ds_b wp_100 pb_2 fm-ubt">Embed Code</span>
                        <textarea rows="7" class="input-4 b_r_3 wp_100 pd-10x15 ph-tt_c" name="video" placeholder="Embed code">{{ $setting->data["video"] }}</textarea>
                    </label>

                    <label class="rowc mt_5 mb_10">
                        <span class="ds_b wp_100 pb_2 fm-ubt">Description</span>
                        <textarea rows="8" class="input-4 b_r_3 wp_100 pd-10x15 ph-tt_c" name="content" placeholder="Description">{{ $setting->content }}</textarea>
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
