@extends("layouts.asset")

@section("title", "Reset password _ ".config("app.name"))

@section("content")
    <div class="cwc bc_blk">
        <div class="pd-20x25">
            <div class="w_120 _0auto">
                <img class="wp_100" src="{{ asset("bkworld_logo.svg") }}" alt="">
            </div>
            <div class="c_whi pt_20 t_a_c pb_10">
                <span class="fm-ubt fs_24">Reset Password</span>
            </div>
            <div class="c_whi">
                <form id="resetform" action="{{ route("update_password") }}" method="post" spellcheck="false">
                    @method("post")
                    @csrf
                    @error("email")
                    <div class="pb_5 fm-ubt4 c_yel fs_14">{{ $message }}</div>
                    @enderror
                    <label class="ds_f pb_10">
                        <input class="input-3 pd-10x15 wp_100 fm-ubt5 fs_16 b_r_5" value="{{ old("email") }}" type="text" placeholder="Enter your email" name="email">
                    </label>

                    <div class="pt_15 t_a_c">
                        <button onclick="$(this).attr('disabled')" class="oln_n pd-10x20 fm-ubt b_r_3 bd_n csr-p hbc_red hc_whi" type="submit">Send Request</button>
                    </div>
                </form>
            </div>
            <div class="pr_10 pl_10 bdbtm_1_whi pt_20">
            </div>
            <div class="pb_20 pt_10">
                <a href="{{ route("login") }}" class="t_d_n c_whi ac-danger hc-danger fm-ubt4">Login</a>
            </div>
        </div>
    </div>
@endsection
