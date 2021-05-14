@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("post.index") }}">Back</a>
@endsection

@section("content")
    <form action="{{ route("post.store") }}" method="post" spellcheck="false" autocomplete="off">
        @csrf
        @method("post")
        <input type="hidden" name="thumbnail" value="{{ old("thumbnail") }}">
        <div class="rowc pt_5">
            <div class="xl-6 lg-6 md-12 sm-12 fx_12 us_n">
                <div class="pr_5 pl_5 pb_10">
                    <div class="p-r">
                        <img id="newimg" class="wp_100 box-s1" src="{{ old("thumbnail") == "" ? asset("icon/blank_16x9.svg") : old("thumbnail") }}" alt="">
                        <div class="p-a" style="right: calc(50% - 25px); top: calc(50% - 25px)">
                            <label for="thumb" class="fs_30 ds_b w_50 lh_50 h_50 t_a_c color_5 hcolor_4 acolor_4 csr-p">
                                <span class="fa fa-camera"></span>
                            </label>
                        </div>
                    </div>
                    <div id="prog" class="h_3 w_80 bc_red ts_050" style="width: 0"></div>
                    <div class="t_a_c pt_4 fs_13 fm-popp color_4" id="error"></div>
                    @error("thumbnail")
                    <div class="t_a_c pt_4 fs_13 fm-popp color_4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="xl-6 lg-6 md-12 sm-12 fx_12">
                <div class="pr_5 pl_5">
                    <div class="pb_15">
                        <label class="ds_f p-r">
                            <input type="text" name="title" value="{{ old("title") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Post title">
                            @error("title")
                            <span class="p-a b-9 ds_b pr_10 pl_10 bcolor_1 ml_20 b_r_5 fm-popp fs_14 color_4">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="pb_15">
                        <label class="ds_f p-r">
                            <input type="text" name="keyword" value="{{ old("keyword") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Keywords">
                            @error("keyword")
                            <span class="p-a b-9 ds_b pr_10 pl_10 bcolor_1 ml_20 b_r_5 fm-popp fs_14 color_4">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="pb_15">
                        <label class="ds_f p-r">
                            <input type="text" name="youtube" value="{{ old("youtube") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Embed youtube">
                            @error("youtube")
                            <span class="p-a b-9 ds_b pr_10 pl_10 bcolor_1 ml_20 b_r_5 fm-popp fs_14 color_4">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="pb_15">
                        <label class="ds_f p-r">
                            <select name="category_id" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3">
                                <option value="">Select Category</option>
                                @foreach($categories as $categ)
                                    <option value="{{ $categ["id"] }}"{{ old("category_id") == "" ? "" : (old("category_id") == $categ["id"] ? " selected" : "" ) }}>{{ $categ["name"] }}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                            <span class="p-a b-9 ds_b pr_10 pl_10 bcolor_1 ml_20 b_r_5 fm-popp fs_14 color_4">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="pb_15">
                        <label class="ds_f p-r">
                            <textarea type="text" name="description" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3 haxx" placeholder="Description">{{ old("description") }}</textarea>
                            @error("description")
                            <span class="p-a b-9 ds_b pr_10 pl_10 bcolor_1 ml_20 b_r_5 fm-popp fs_14 color_4">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </div>
            </div>
            <div class="fx_12 pb_15">
                <div class="pr_5 pl_5">
                    <label class="fm-popp fs_16 pb_5 ds_b" for="content">
                        Contents
                    </label>
                    <div class="ds_f p-r">
                        <textarea id="content" name="content" rows="5" class="input-1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3 box-s1" placeholder="Content">{{ old("content") }}</textarea>
                        @error("content")
                        <span class="p-a b-9 ds_b pr_10 pl_10 bcolor_1 ml_20 b_r_5 fm-popp fs_14 color_4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="t_a_r pr_5 pl_5 pt_15 pb_5">
                        <button class="oln_n bd_n pd-5x20 box-s1 b_r_3 csr-p fm-popp fs_16 color_1 bcolor_5 hbcolor_4 abcolor_4">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
        @csrf
        @method("post")
        <input id="thumb" onchange="$('#coverf').submit()" type="file" name="thumbnail" accept="image/jpeg" hidden>
        <input type="reset" hidden>
    </form>
@endsection

@section("script")
    <script>
        $("#coverf").submit(function (e) {
            e.preventDefault();
            f.r({
                d:function (data){
                    $("#newimg").attr("src", "{{ asset("icon/16x9_loading.gif") }}").next().hide();
                    if (!data.error){
                        img.load("{{ asset("photo")."/" }}"+data.url, function (){
                            $("input[name='thumbnail']").attr("value",'{{ asset("photo").'/' }}'+data.url);
                            $("#error").text("");
                            $("#newimg")
                                .attr("src", '{{ asset("photo").'/' }}'+data.url).next().show();
                            $("#prog")
                                .removeClass("ts_050")
                                .css("width", "0");
                            setTimeout(function (){
                                $("#prog").addClass("ts_050");
                            },100);
                        });
                    }else{
                        $("#prog")
                            .removeClass("ts_050")
                            .css("width", "0");
                        setTimeout(function (){
                            $("#prog").addClass("ts_050");
                        },100);
                        $("#newimg").attr("src", "{{ asset("icon/blank_16x9.svg") }}").next().show();
                        $("#error").text("Choose 16:9 ratio image maximum size 5MB");
                    }

                },
                p:function (pro,status){
                    $("#prog").css("width", status+"%");
                },
                r:function (){
                    $("#coverf").find("input[type='reset']").click();
                }
            },{x:f.d(this),m:"post",t:"json",target:"{{ route("post.thumb") }}"});
        });
    </script>
@endsection
