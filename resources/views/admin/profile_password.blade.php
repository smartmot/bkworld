@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("admin.index") }}">Back</a>
@endsection

@section("content")
    <div>
        <div class="rowc pt_10">
            <div class="xl-4 lg-4 md-12 sm-12 fx_12">
                <div class="mb_10 pr_10 pl_10">
                    @if(auth()->user()->photo == "")
                        <img class="wp_100 box-s1" src="{{ asset("icon/member.svg") }}" alt="">
                    @else
                        <img class="wp_100 box-s1" src="{{ asset("photo/".auth()->user()->photo.".jpg") }}" alt="">
                    @endif
                </div>
            </div>
            <div class="xl-8 lg-8 md-12 sm-12 fx_12">
                <form action="{{ route("admin.pw_update") }}" method="post">
                    @method("put")
                    @csrf
                    <div class="pr_10 pl_10">
                        <div class="bcolor_1 lh_40 h_40 ds_f">
                            <div class="w_40 t_a_c"><span class="fa fa-lock"></span></div>
                            <input class="input-2 flx pr_10 pl_10" type="password" name="password" value="" placeholder="Current Password">
                        </div>
                        @error("password")
                        <div class="fm-popp pb_5 color_4 fs_14">{{ $message }}</div>
                        @enderror

                        <div class="bcolor_1 lh_40 h_40 ds_f mt_10">
                            <div class="w_40 t_a_c"><span class="fa fa-lock"></span></div>
                            <input class="input-2 flx pr_10 pl_10" type="password" name="new_password" value="" placeholder="New Password">
                        </div>
                        @error("new_password")
                        <div class="fm-popp pb_5 color_4 fs_14">{{ $message }}</div>
                        @enderror

                        <div class="bcolor_1 lh_40 h_40 ds_f mt_10">
                            <div class="w_40 t_a_c"><span class="fa fa-lock"></span></div>
                            <input class="input-2 flx pr_10 pl_10" type="password" name="new_password_confirmation" value="" placeholder="Confirm New Password">
                        </div>
                        @error("new_password_confirmation")
                        <div class="fm-popp pb_5 color_4 fs_14">{{ $message }}</div>
                        @enderror

                        <div class="mt_10 t_a_r">
                            <button class="pr_20 pl_20 fs_15 h_35 bcolor_5 hbcolor_4 abcolor_4 box-s1 color_1 csr-p us_n oln_n bd_n " type="submit">
                                <span class="fa fa-save"></span><span>&nbsp;&nbsp;Save Changes</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
