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
                                <input id="partner" type="file" name="partner" accept="image/jpeg" hidden>
                            </form>
                            <label for="partner">
                                <span class="oln_n bd_n pr_10 pl_10 pt_3 pb_3 bcolor_5 hbcolor_4 abcolor_4 color_1 fm-popp b_r_3 us_n csr-p">Upload Logo</span>
                            </label>
                        </div>
                        <div>
                            <div class="pb_5">
                                <div class="fm-popp lh_28 fs_16">Instagram
                                    @error("instagram")
                                    <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                    @enderror
                                </div>
                                <label class="ds_f p-r">
                                    <input type="text" name="instagram" value="{{ old("instagram") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="instagram">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl-6 lg-6 md-6 sm-12 fx_12">

                </div>
            </div>
        </form>
    </div>
@endsection
