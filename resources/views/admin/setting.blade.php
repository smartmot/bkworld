@extends("admin.layouts/".config("settings.admin"))

@section("content")
    <div class="fm-popp">
        <div class="bd_bs_s bd_bw_1 bdb_color_1 pb_5">
            <div class="color_5 fs_18">
                <span class="opc_50">Webiste name</span>&nbsp;
                <a href="#" class="t_d_n color_5 hcolor_4 acolor_4">
                    <span class="fa fa-edit"></span>
                </a>
            </div>
            <div class="bdw_1 bds-s bdcolor_5 pd-5x15">{{ config("settings.name") }}</div>
        </div>
        <div class="bd_bs_s bd_bw_1 bdb_color_1 pb_5">
            <div class="color_5 fs_18">
                <span class="opc_50">Meta Keyword</span>&nbsp;
                <a href="#" class="t_d_n color_5 hcolor_4 acolor_4">
                    <span class="fa fa-edit"></span>
                </a>
            </div>
            <div class="bdw_1 bds-s bdcolor_5 pd-5x15">{{ config("settings.name") }}</div>
        </div>
    </div>
@endsection
