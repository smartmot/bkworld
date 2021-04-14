@extends("admin.layouts.default")

@section("content")
    <div class="pr_10 pl_10">
        <div class="pt_10">
            <div class="w_300 _0auto h_225 box-s1 p-r">
                <img id="newimg" class="wp_100 ds_n" src="http://localhost/fta/public/product/1.jpg" alt="">
                <form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <label class="p-a csr-p us_n hc1 ac1 c2" style="top: calc(50% - 20px); left: calc(50% - 50px);">
                        <span class="ds_b fs_16 fm-ubt t_a_c">Thumbnail</span>
                        <span class="fs_24 fa fa-camera w_100 h_40 lh_40 t_a_c"></span>
                        <input id="thumb" onchange="$('#coverf').submit()" type="file" name="thumbnailz" accept="image/jpeg" hidden>
                    </label>
                    <input type="reset" hidden>
                </form>
            </div>
            @error("thumbnailz")
            <div class="t_a_c pt_8">
                <span class="fm-ubt5 c1">{{ $message }}</span>
            </div>
            @enderror
            <div class="t_a_c pt_8 fm-ubt5 c1" id="error"></div>
        </div>
        <form action="{{ route("post.store") }}" method="post" autocomplete="off" spellcheck="false">
            @csrf
            @method("post")
            <input type="hidden" name="thumbnail" value="{{ old("thumbnail") }}" id="nthumb">
            <label for="ip1" class="fm-ubt pt_20 pb_5 ds_b">
                Post title
                @error("title")
                <span class="fa fa-angle-right"></span>
                <span class="c1 fs_12 fm-ubt3">{{ $message }}</span>
                @enderror
            </label>
            <div class="ds_f">
                <input id="ip1" class="wp_100 pd-10x15 h_30 apprn_n fs_16 fm-ubt4 input-1 b_r_3" type="text" name="title" value="{{ old("title") }}" placeholder="Title" required>
            </div>

            <label for="ip2" class="fm-ubt pt_20 pb_5 ds_b">
                Keywords(Optional)
                @error("keyword")
                <span class="fa fa-angle-right"></span>
                <span class="c1 fs_12 fm-ubt3">{{ $message }}</span>
                @enderror
            </label>
            <div class="ds_f">
                <input id="ip2" class="wp_100 pd-10x15 h_30 apprn_n fs_16 fm-ubt4 input-1 b_r_3" type="text" name="keyword" value="{{ old("keyword") }}" placeholder="keyword" required>
            </div>

            <label for="ip3" class="fm-ubt pt_20 pb_5 ds_b">
                Description
                @error("news_description")
                <span class="fa fa-angle-right"></span>
                <span class="c1 fs_12 fm-ubt3">{{ $message }}</span>
                @enderror
            </label>
            <div class="ds_f">
                <input id="ip3" class="wp_100 pd-10x15 h_30 apprn_n fs_16 fm-ubt4 input-1 b_r_3" type="text" name="news_description" value="{{ old("news_description") }}" placeholder="Description" spellcheck="true" required>
            </div>


            <label for="ip5" class="fm-ubt pt_20 pb_5 ds_b">
                Contents
                @error("news_content")
                <span class="fa fa-angle-right"></span>
                <span class="c1 fs_12 fm-ubt3">{{ $message }}</span>
                @enderror
            </label>
            <div class="h_25 wp_100 ds_f">
                <div></div>
                <div class="pr_10 flx t_a_r">
                    <span class="fm-ubt4 c2 pr_10 pl_10 pt_3 pb_3 hbc4 fs_14 csr-p maxi_mini">
                        <span class="fa fa-clone rot-90" title="Maximize"></span>
                    </span>
                </div>
            </div>
            <div id="editor" class="">
                <div class="editor_menu h_40 wp_100">
                    <div class="pcw h_40">
                        <div class="ds_f">
                            <div></div>
                            <div class="flx t_a_r">
                                <button type="button" class="pr_10 pl_10 pt_3 pb_3 input-1 hbc1 hc4 maxi_mini" title="Minimize">
                                    <span class="fa fa-window-minimize"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="editor_cw">
                    <textarea class="wp_100 pd-10x15 hp_100 apprn_n fs_16 fm-ubt4 input-1 b_r_3" id="ip5" placeholder="Contents" rows="10" name="news_content" spellcheck="true">{{old("news_content")}}</textarea>
                </div>
            </div>
            <div class="t_a_c pt_20 pb_20">
                <label class="pr_20 pl_20 pt_5 pb_5 bc1 abc2 hbc2 fm-ubt c_whi csr-p b_r_3">Create
                    <input type="submit" hidden>
                </label>
            </div>
            <div class="h_20 wp_100"></div>
        </form>
    </div>
    <script>
        $(".maxi_mini").click(function () {
            $("#editor").toggleClass("activated");
        });

        $("#coverf").submit(function () {
            let upload = new FormData(this);
            axios.post('{{ '' }}', upload).then(response=>{
                $("#coverf").find("input[type='reset']").click();
                let data = response.data;
                if (!data.error){
                    $("input[name='thumbnail']").attr("value",'{{ asset("public").'/' }}'+data.url);
                    $("#error").text("");
                    $("#newimg")
                        .attr("src", '{{ asset("public").'/' }}'+data.url)
                        .fadeIn();
                }else{
                    $("#error").text("Choose 4:3 ratio image maximum size 2MB");
                }
            });
        });
    </script>
@endsection
