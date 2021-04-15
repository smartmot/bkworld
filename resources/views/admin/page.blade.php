@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("page.create") }}">Create page</a>
@endsection

@section("content")
    <div>
        <div class="">
            @foreach($pages as $page)
                <div class="pd-10x15 fm-ubt4 lh_20 bdbtm_1_gra hbox-s1">
                    <div class="rowc">
                        <div class="w_120">
                            <div>{{ date_format(date_create($page["created_at"]), "Y/m/d") }}</div>
                            <div class="fs_12">By :
                                @if($page->user->status == "active")
                                    <a class="c3 ac1 hc1" href="{{ route("user.show", $page["user_id"]) }}">{{ $page["user"]["name"] }}</a>
                                @else
                                    {{ $page->user->name }}
                                @endif
                            </div>
                        </div>
                        <div class="flx">
                            <div>
                                <a class="c_blk t_d_n hc1 ac1" href="{{ route("page.show", $page["id"]) }}">{{ $page["title"] }}</a>
                            </div>
                            <div>
                                <a class="c3 ac1 hc1 fs_12 t_d_n" href="{{ route("page.edit", $page["id"]) }}">Edit</a>&nbsp;.&nbsp;
                                <a class="c3 ac1 hc1 fs_12 t_d_n" href="javascript:fck_page('{{ route("page.destroy", $page["id"]) }}','{{ $page["page_title"] }}')">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @error("alert")
    @include("admin.components.alert")
    @enderror
    <div id="del" class="w_250 top_of_alert bc4 t_a_c p-f z_x_5 box-s1 ds_n" style="right: calc(50% - 125px)">
        <div class="fs_20 fm-ubt c4 pb_5 pt_5 bc1">Delete Page</div>
        <div class="pr_10 pl_10 pt_10 pb_10">
            <div class="fs_14 fm-ubt4 c2 pb_5" id="title"></div>
            <div class="fs_16 fm-ubt5 c1 pb_10">Are you sure ?</div>
            <div class="ds_f pt_5">
                <label for="confirm" class="w_80 fm-ubt csr-p us_n h_25 lh_25 bc2 c_whi hc1 box-s1">Yes</label>
                <div class="flx"></div>
                <div class="w_80 fm-ubt csr-p us_n h_25 lh_25 bc2 c_whi hc1 box-s1" onclick="$('#del').fadeOut(80)">No</div>
            </div>
        </div>
    </div>
    <form action="" method="post" class="ds_n" id="targ">
        @csrf
        @method("delete")
        <input type="submit" id="confirm" hidden>
    </form>
@endsection

@section("script")
    <script>
        function fck_page(page, msg) {
            $("#targ").attr("action", page);$("#del").fadeIn(80);
            $("#title").text(msg);
        }
    </script>
@endsection
