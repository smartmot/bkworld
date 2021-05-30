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
                    $("#newimg").attr("src", "{{ asset("icon/square_pulse.svg") }}");
                    alert(JSON.stringify(data));

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
