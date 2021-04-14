@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("post.create") }}">Add new</a>
@endsection

@section("content")
    <div class="">
        @foreach($posts as $post)
            <div class="pd-10x15 fm-ubt4 lh_20 bdbtm_1_gra hbox-s1">
                <div class="rowc">
                    <div class="w_120">
                        <div>{{ date_format(date_create($post["created_at"]), "Y/m/d") }}</div>
                        <div class="fs_12">By :
                            <a class="c3 ac1 hc1" href="{{ route("user.show", $post["user_id"]) }}">{{ $post["user"]["name"] }}</a>
                        </div>
                    </div>
                    <div class="xl-auto lg-auto md-12 fx_12">
                        <div>
                            <a class="c_blk t_d_n hc1 ac1" href="{{ route("post.show", $post["id"]) }}">{{ $post["title"] }}</a>
                        </div>
                        <div>
                            <a class="c3 ac1 hc1 fs_12 t_d_n" href="{{ route("post.edit", $post["id"]) }}">Edit</a>&nbsp;.&nbsp;
                            <a class="c3 ac1 hc1 fs_12 t_d_n" href="javascript:fck_post('{{ route("post.destroy", $post["id"]) }}', '{{ $post["title"] }}')">Delete</a>&nbsp;.&nbsp;
                            <a href="{{ route("public.single_news", $post["id"]) }}" class="c3 ac1 hc1 fs_12 t_d_n">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @error("alert")
    @include("admin.components.alert")
    @enderror
    <div id="del" class="w_250 top_of_alert bc4 t_a_c p-f z_x_5 box-s1 ds_n" style="right: calc(50% - 125px)">
        <div class="fs_20 fm-ubt c4 pb_5 pt_5 bc1">Delete Post</div>
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
    <script>
        function fck_post(page, msg) {
            $("#targ").attr("action", page);
            $("#del").fadeIn(80);
            $("#title").text(msg);
        }
    </script>

@endsection
