@extends("layouts.asset")

@section("title", "Reset password _ ".config("app.name"))

@section("content")
    <div class="cwc bc_blk">
        <div class="pd-20x25">
            <div class="w_120 _0auto">
                <img class="wp_100" src="{{ asset("bkworld_logo.svg") }}" alt="">
            </div>
            <div class="c_whi pt_20 t_a_c pb_10">
                <span class="fm-ubt fs_24">Enter new password</span>
            </div>
            <div class="c_whi">
                <form action="{{ route("new_password.save") }}" method="post" spellcheck="false" autocomplete="off">
                    @method("put")
                    @csrf
                    @error("password")
                    <div class="pb_5 fm-ubt4 c_yel fs_14">{{ $message }}</div>
                    @enderror
                    <label class="ds_f pb_10">
                        <input class="input-3 pd-10x15 wp_100 fm-ubt5 fs_16 b_r_5" value="" type="password" placeholder="New password" name="password">
                    </label>

                    @error("password_confirmation")
                    <div class="pb_5 fm-ubt4 c_yel fs_14">{{ $message }}</div>
                    @enderror
                    <label class="ds_f pb_10">
                        <input class="input-3 pd-10x15 wp_100 fm-ubt5 fs_16 b_r_5" value="" type="password" placeholder="Confirm new password" name="password_confirmation">
                    </label>

                    <div class="pt_15 t_a_c">
                        <button class="oln_n pd-10x20 fm-ubt b_r_3 bd_n csr-p hbc_red hc_whi" type="submit">Save change</button>
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
