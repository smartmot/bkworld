@extends("admin.layouts/".config("settings.admin"))
@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("event.index") }}">Back</a>
@endsection


@section("content")
    <div class="pt_5">
        <form action="{{ route("event.store") }}" method="post" spellcheck="false" autocomplete="off">
            @csrf
            @method("post")
            <input type="hidden" name="thumbnail" value="{{ old("thumbnail") }}">
            <div class="rowc">
                <div class="xl-6 lg-6 md-12 sm-12 fx_12 us_n">
                    <div class="pr_5 pl_5 pb_10">
                        <div class="fm-popp lh_xn fs_16">Thumbnail
                            @error("thumbnail")
                            <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                            @enderror
                        </div>
                        <div class="p-r">
                            <img id="newimg" class="wp_100 box-s1" src="{{ old("thumbnail") == "" ? asset("icon/blank2.svg") : old("thumbnail") }}" alt="">
                            <div class="p-a" style="right: calc(50% - 25px); top: calc(50% - 25px)">
                                <label for="thumb" class="fs_30 ds_b w_50 lh_50 h_50 t_a_c color_5 hcolor_4 acolor_4 csr-p">
                                    <span class="fa fa-camera"></span>
                                </label>
                            </div>
                        </div>
                        <div class="t_a_c pt_4 fs_13 fm-popp color_4" id="error"></div>
                    </div>
                </div>
                <div class="xl-6 lg-6 md-12 sm-12 fx_12">
                    <div class="pr_5 pl_5">
                        <div class="pb_5">
                            <div class="fm-popp lh_xn fs_16">Title
                                @error("title")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="title" value="{{ old("title") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Event title">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_xn fs_16">Start date
                                @error("start")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="datetime-local" name="start" value="{{ old("start") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_xn fs_16">End date
                                @error("end")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="datetime-local" name="end" value="{{ old("end") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_xn fs_16">Keywords
                                @error("keyword")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="keyword" value="{{ old("keyword") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Keywords">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="fx_12 pb_5">
                    <div class="pr_5 pl_5">
                        <div class="pb_5">
                            <label class="fm-popp fs_16 pb_5 ds_b" for="desc">Description
                                @error("description")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </label>
                            <div class="ds_f">
                                <textarea rows="2" id="desc" type="text" name="description" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Description">{{ old("description") }}</textarea>
                            </div>
                        </div>

                        <label class="fm-popp fs_16 pb_5 ds_b" for="content">
                            Contents
                            @error("content")
                            <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                            @enderror
                        </label>
                        <div class="ds_f p-r">
                            <textarea id="content" name="content" rows="5" class="input-1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3 box-s1" placeholder="Content">{{ old("content") }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div class="t_a_r pr_5 pl_5 pt_15 pb_5">
                            <button class="oln_n bd_n pd-5x20 box-s1 b_r_3 csr-p fm-popp fs_16 color_1 bcolor_5 hbcolor_4 abcolor_4" type="submit">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
        @csrf
        @method("post")
        <input id="thumb" onchange="$('#coverf').submit()" type="file" name="thumbnail" accept="image/jpeg" hidden>
        <input type="reset" hidden>
    </form>
@endsection

@section("script")
    <script>
        $("#coverf").submit(function () {
            let upload = new FormData(this);
            axios.post('{{route("post.thumb")}}', upload).then(response=>{
                $("#coverf").find("input[type='reset']").click();
                let data = response.data;
                if (!data.error){
                    $("input[name='thumbnail']").attr("value",'{{ asset("photo").'/' }}'+data.url);
                    $("#error").text("");
                    $("#newimg")
                        .attr("src", '{{ asset("photo").'/' }}'+data.url)
                        .fadeIn();
                }else{
                    $("#error").text("Choose 4:3 ratio image maximum size 2MB");
                }
            });
        });
    </script>
@endsection
