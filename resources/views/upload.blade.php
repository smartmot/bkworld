@extends("layouts.asset")

@section("asset")
<script type="text/javascript" src="{{ asset("js/fx.js") }}"></script>
@endsection

@section("content")
    <div class="cwc">
        <div class="pt_20 pb_20">
            <img id="image" class="wp_100" src="" alt="Upladed Image">
        </div>
        <div id="progress" class="h_3 bc_red mt_10 mb_10" style="width: 0">
        </div>
        <div>
            <form id="upload" action="{{ route("upload.submit") }}" method="post" enctype="multipart/form-data">
                @method("post")
                @csrf
                <div>
                    <input type="file" accept="image/*" name="upload">
                </div>
                <div class="pt_10">
                    <button class="pd-5x20 oln_n bd_n fm-popp bc_red c_whi csr-p" type="submit">Upload</button>
                </div>
            </form>
        </div>
        <div class="pt_20">
            <button onclick="$('#submiter').click()" id="test" class="pd-5x20 oln_n bd_n fm-popp bc_red c_whi csr-p" type="button">Test</button>
        </div>
    </div>
@endsection

@section("script")
<script>
    $("#upload").submit(function (event){
        event.preventDefault();
        f.r({
            d:function (res){
                alert(res.error);
            },
            p:function (pro, status){
                $("#progress").css("width", status+"%");
            }
        },{t:'json',m:"post",target:"{{ route("upload.submit") }}",x:f.d(this)})
    });
</script>
@endsection
