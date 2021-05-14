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
                        <img class="wp_100 box-s1" src="{{ asset("icon/member.svg") }}" alt="">
                    @else
                        <img class="wp_100 box-s1" src="{{ asset("photo/".auth()->user()->photo.".jpg") }}" alt="">
                    @endif
                    <label for="thumb" class="w_30 h_30 b_r_c bc_red b-5 r-3 p-a t_a_c lh_30 box-s1 c_whi oln_n bd_n csr-p us_n">
                        <span class="fa fa-camera"></span>
                    </label>
                </div>
                <div id="prog" class="h_3 w_80 bc_red ts_050 mb_15" style="width: 0"></div>
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div>
        <form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
            @csrf
            @method("post")
            <input id="thumb" onchange="$('#coverf').submit()" type="file" name="photo" accept="image/jpeg" hidden>
            <input type="reset" hidden>
        </form>
    </div>
@endsection

@section("script")
<script type="text/javascript">
    $("#coverf").submit(function (e) {
        e.preventDefault();
        f.r({
            d:function (data){
                $("#newimg").attr("src", "{{ asset("icon/square_pulse.svg") }}").next().hide();
                if (!data.error){
                    img.load("{{ asset("photo")."/" }}"+data.url, function (){
                        $("input[name='photo']").attr("value",'{{ asset("photo").'/' }}'+data.url);
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
                    $("#newimg").attr("src", "{{ asset("icon/member.svg") }}").next().show();
                    $("#error").text("Choose a square image maximum size 5MB");
                }

            },
            p:function (pro,status){
                $("#prog").css("width", status+"%");
            },
            r:function (){
                $("#coverf").find("input[type='reset']").click();
            }
        },{x:f.d(this),m:"post",t:"json",target:"{{ route("admin.photo") }}"});
    });
</script>
@endsection
