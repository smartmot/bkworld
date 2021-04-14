@extends("admin.layouts.default")

@section("content")
    <div class="pt_10">
        <form action="{{ route("post.store") }}" method="post">
            @csrf
            @method("post")
            <div class="rowc">
                <div class="xl-6 lg-6 md-12 sm-12 fx_12 us_n">
                    <div class="pr_5 pl_5 pb_10">
                        <div class="p-r">
                            <img id="newimg" class="wp_100 box-s1" src="{{ asset("icon/blank2.svg") }}" alt="">
                            <div class="p-a" style="right: calc(50% - 25px); top: calc(50% - 25px)">
                                <div class="fs_30 w_50 lh_50 h_50 t_a_c color_5 hcolor_4 acolor_4 csr-p">
                                    <span class="fa fa-camera"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl-6 lg-6 md-12 sm-12 fx_12">
                    <div class="pr_5 pl_5">
                        <div class="pb_15">
                            <label class="ds_f">
                                <input type="text" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Post title">
                            </label>
                        </div>
                        <div class="pb_15">
                            <label class="ds_f">
                                <input type="text" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Keywords">
                            </label>
                        </div>
                        <div class="pb_15">
                            <label class="ds_f">
                                <textarea type="text" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3 haxx" placeholder="Description"></textarea>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="fx_12 pb_15">
                    <div class="pr_5 pl_5">
                        <label class="fm-popp fs_16 pb_5 ds_b" for="content">
                            Contents
                        </label>
                        <div class="ds_f">
                            <textarea id="content" rows="5" class="input-1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3 box-s1" placeholder="Content"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
