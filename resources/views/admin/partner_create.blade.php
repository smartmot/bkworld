@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("partner.index") }}">Back</a>
@endsection

@section("content")
    <div>
        <form action="{{ route("partner.store") }}" method="post">
            @method("post")
            @csrf
            <div class="rowc pt_10">
                <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                    <div class="pr_10 pl_10">
                        <div class="t_a_c">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("post")
                                <input type="file" name="partner" accept="image/jpeg" hidden>
                            </form>
                            <label>
                                <button class="oln_n bd_n pr_10 pl_10 pt_3 pb_3 bcolor_1" type="button">Upload Logo</button>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="xl-6 lg-6 md-6 sm-12 fx_12">

                </div>
            </div>
        </form>
    </div>
@endsection
