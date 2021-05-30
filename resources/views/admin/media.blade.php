@extends("admin.layouts.default")

@section("content")
    <div>
        <form id="photoform" action="{{ route("media.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("post")
            <input id="file" type="file" name="file" hidden>
        </form>
        <div class="rowc">
            <div class="xl-3 lg-3 md-4 sm-4 fx_6">
                <div>
                    <div class="p-r">
                        <img id="newimg" class="wp_100" src="{{ asset("icon/blank.svg") }}" alt="">
                        <label for="file" class="p-a ds_b csr-p w_30 h_30 lh_30 t_a_c fs_20 hcolor_4 acolor_4" style="top: calc(50% - 15px); right: calc(50% - 15px);">
                            <span class="fa fa-camera"></span>
                        </label>
                        <div id="prog" class="h_3 w_80 bc_red ts_050 mb_15" style="width: 0"></div>
                        <div id="error" class="fm-popp color_4"></div>
                    </div>
                </div>
            </div>
            @foreach($media as $md)
                <div class="xl-3 lg-3 md-4 sm-4 fx_6">
                    <div class="pr_10 pl_10 pb_10">
                        <div>
                            <img class="wp_100" src="{{ asset("photo/".$md["name"]."_thumb.".$md["extension"]) }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript">
        $("#file").change(function (){
            $("#photoform").submit();
        });
        $("#photoform").submit(function (e){
            e.preventDefault();
            f.r({
                d:function (data){
                    alert(JSON.stringify(data));
                    if (!data.error){
                        location.reload();
                    }else{
                        $("#error").text("Choose an image maximum size 12MB");
                    }
                },
                p:function (pro,status){
                    $("#prog").css("width", status+"%");
                },
                r:function (){
                    $("#photoform").find("input[type='reset']").click();
                }
            },{x:f.d(this),m:"post",t:"json",target:"{{ route("media.store") }}"});
        });
    </script>
@endsection
