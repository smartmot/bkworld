@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("admin.edit") }}">Edit Profile</a>
@endsection

@section("content")
    <div>
        <div class="rowc pt_10">
            <div class="xl-4 lg-4 md-12 sm-12 fx_12">
                <div class="pr_10 pl_10 p-r">
                    @if(auth()->user()->photo == "")
                        <img id="newimg" class="wp_100 box-s1" src="{{ asset("icon/member.svg") }}" alt="">
                    @else
                        <img id="newimg" class="wp_100 box-s1" src="{{ asset("photo/".auth()->user()->photo.".jpg") }}" alt="">
                    @endif
                    <label for="thumb" class="w_30 h_30 b_r_c bc_red b-5 r-3 p-a t_a_c lh_30 box-s1 c_whi oln_n bd_n csr-p us_n">
                        <span class="fa fa-camera"></span>
                    </label>
                </div>
                <div class="pr_10 pl_10">
                    <div id="prog" class="h_3 w_80 bc_red ts_050 mb_15" style="width: 0"></div>
                </div>
                <div class="t_a_c pt_4 fs_13 fm-popp color_4" id="error"></div>
            </div>
            <div class="xl-8 lg-8 md-12 sm-12 fx_12">
                <div class="pr_10 pl_10">
                    <div class="fm-ubt pd-5x15 bcolor_1 lh_30 fs_18">{{ auth()->user()->name }}</div>

                    <div class="pd-5x15 mt_10 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-envelope"></span></div>
                        <div class="fm-popp">{{ auth()->user()->email }}</div>
                    </div>

                    <div class="pd-5x15 mt_10 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-birthday-cake"></span></div>
                        <div class="fm-popp">
                            @if(auth()->user()->birth_date == "")
                                <span class="opc_40">None</span>
                            @else
                                <span>{{ date_format(date_create(auth()->user()->birth_date), "d, M Y") }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="pd-5x15 mt_10 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-venus-mars"></span></div>
                        <div class="fm-popp t_t_c">{{ auth()->user()->gender }}</div>
                    </div>

                    <div class="pd-5x15 mt_9 bcolor_1 lh_30 ds_f">
                        <div class="w_30"><span class="fa fa-lock"></span></div>
                        <div class="fm-popp t_t_c">{{ auth()->user()->role }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pr_10 pl_10 pt_10">
            <div class="fm-popp pb_2">Security</div>
            <div class="h_1 wp_100 bcolor_5 opc_30"></div>
            <div>
                <div class="pt_5">
                    <ul class="pl_15 ml_0">
                        <li>
                            <a class="color_5 fs_14 fm-popp t_d_n hcolor_4 acolor_4" href="{{ route("admin.pw_form") }}">Change password</a>
                        </li>
                        <li class="mt_10 ls_n">
                            <form method="post" action="{{ route("logout") }}">
                                @csrf
                                @method("post")
                                <button class="oln_n bd_n color_1 bcolor_5 hbcolor_4 abcolor_4 pd-5x15 csr-p b_r_3">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div>
        <form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
            @csrf
            @method("post")
            <input id="thumb" onchange="$('#coverf').submit()" type="file" name="upload" accept="image/jpeg" hidden>
            <input type="reset" hidden>
        </form>
    </div>
@endsection


@section("fixed")
@include("admin.include.crop")
@endsection

@section("script")
    <script>
        var url = "{{ asset("icon/16x9_pulse.svg") }}",
            image = document.getElementById("tocrop"),
            crop, cdata ={},
            save = function (){
            f.r({
                d:function (resp){
                    alert(JSON.stringify(resp))
                    if (resp.error){
                        $("#error").text("Update failed!");
                    }
                }
            },{m:"post", t:"json", target:"{{ route("admin.photo") }}"});
            };
        $("#cropbtn").click(function (){
            f.r({
                d:function (resp){
                    if (!resp.error){
                        $("#newimg").attr("src", "{{ asset("icon/1x1_pulse.svg") }}").next().hide();
                        $(".cropx").fadeOut();
                        crop.destroy();
                        img.load("{{ asset("photo")."/" }}"+resp.url, function (){
                            $("#error").text("");
                            $("#newimg")
                                .attr("src", '{{ asset("photo").'/' }}'+resp.url).next().show();
                            $("#prog")
                                .removeClass("ts_050")
                                .css("width", "0");
                            setTimeout(function (){
                                $("#prog").addClass("ts_050");
                            },1000);
                            save();
                        });
                    }else {
                        crop.destroy();
                    }
                },
                p:function (pro,status){
                    $("#prog").css("width", status+"%");
                },
            },{x:f.f($("#cordform")),m:"post",t:"json",target:"{{ route("upload.crop") }}"});
        })
            .prev().click(function (){
            crop.rotateTo(cdata.r + 90);
        })
            .prev().click(function (){
            crop.rotateTo(cdata.r - 90);
        });
        $("#coverf").submit(function (e) {
            e.preventDefault();
            f.r({
                d:function (data){
                    if (!data.error){
                        url = "{{ asset("photo") }}/" + data.url;
                        $(".cropx").fadeIn();
                        image.src = "{{ asset("icon/16x9_pulse.svg") }}";
                        img.load("{{ asset("photo")."/" }}"+data.url, function (){
                            image.src = url;
                            setTimeout(function (){
                                crop = $f.x(image,function (cord){
                                    $("#cord").attr("value", JSON.stringify(cord));
                                },{
                                    ratio:1
                                });
                            }, 200);
                        });
                    }else{
                        $("#prog")
                            .removeClass("ts_050")
                            .css("width", "0");
                        setTimeout(function (){
                            $("#prog").addClass("ts_050");
                        },1000);
                        $("#newimg").attr("src", "{{ asset("icon/blank.svg") }}").next().show();
                        $("#error").text(data.upload[0]);
                    }
                },
                p:function (pro,status){
                    $("#prog").css("width", status+"%");
                },
                r:function (){
                    $("#coverf").find("input[type='reset']").click();
                }
            },{x:f.d(this),m:"post",t:"json",target:"{{ route("upload.image") }}"});
        });
    </script>
@endsection
