@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw pt_20 pb_20">
        <div class="pt_20">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                <span>Our Business Activities</span>
            </div>
            <div class="h_1 wp_100 bcolor_4"></div>
        </div>
        <div class="rowc pt_15" id="news">
            @foreach($news as $post)
                @include("components.post",["class"=>"xl-4 lg-4 md-4 sm-12 fx_12"])
            @endforeach
        </div>
        <div class="t_a_c pt_15">
            <form action="javascript: void 0" method="post" id="load_more">
                @csrf
                @method("post")
                <input type="hidden" name="offset" value="9" id="offset">
                <input type="hidden" name="category" value="2">
                <div>
                    <button id="load_btn" type="submit" class="oln_n bd_n pd-10x20 b_r_3 bc_02 c_blk fm-ubt fs_18 csr-p hc_red">Load more</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript">
        var offset = 9;
        $("#load_more").submit(function (e){
            e.preventDefault();
            var data = new FormData(this);
            axios.post('{{ route("post.load") }}', data).then(response=>{
                let result = response.data;
                if (result.length < offset){
                    $('#load_btn').hide();
                }
                for (i =0; i< result.length; i++){
                    $("#news").append(result[i]);
                }
            }).then(function (){
                offset = offset + 9;
                $("#offset").attr("value", offset);
            });
        });
    </script>
@endsection
