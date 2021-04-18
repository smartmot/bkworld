@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("partner.index") }}">Back</a>
@endsection

@section("content")
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method("post")
            <input id="partner" type="file" name="partner" accept="image/jpeg" hidden>
        </form>
        <form action="{{ route("partner.store") }}" method="post" autocomplete="off">
            @method("post")
            @csrf
            <div class="rowc pt_15">
                <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                    <div class="pr_5 pl_5">
                        <div class="t_a_c pb_5">
                            <label for="partner">
                                <span class="oln_n bd_n pr_10 pl_10 pt_3 pb_3 bcolor_5 hbcolor_4 abcolor_4 color_1 fm-popp b_r_3 us_n csr-p">Upload Logo</span>
                            </label>
                        </div>
                        <div>
                            <div class="pb_5">
                                <label class="fm-popp lh_28 fs_16" for="name">Name
                                    @error("name")
                                    <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                    @enderror
                                </label>
                                <div class="ds_f">
                                    <input type="text" id="name" name="name" value="{{ old("name") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Name">
                                </div>
                            </div>

                            <div class="pb_5">
                                <label class="fm-popp lh_28 fs_16" for="website">Website
                                    @error("website")
                                    <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                    @enderror
                                </label>
                                <div class="ds_f">
                                    <input type="text" id="website" name="website" value="{{ old("website") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Website">
                                </div>
                            </div>

                            <div class="pb_5">
                                <label class="fm-popp lh_28 fs_16" for="email">Email
                                    @error("email")
                                    <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                    @enderror
                                </label>
                                <div class="ds_f">
                                    <input type="text" id="email" name="email" value="{{ old("email") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Email">
                                </div>
                            </div>

                            <div class="pb_5">
                                <label class="fm-popp lh_28 fs_16" for="phone">Phone
                                    @error("phone")
                                    <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                    @enderror
                                </label>
                                <div class="ds_f">
                                    <input type="text" id="phone" name="phone" value="{{ old("phone") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Phone">
                                </div>
                            </div>

                            <div class="pb_10">
                                <label class="fm-popp lh_28 fs_16" for="address">Address
                                    @error("address")
                                    <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                    @enderror
                                </label>
                                <div class="ds_f">
                                    <input type="text" id="address" name="address" value="{{ old("address") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Address">
                                </div>
                            </div>

                            <div class="h_1 bcolor_5" style="opacity: 0.4"></div>
                            <div class="pt_10">
                                <div class="t_a_r">
                                    <button class="oln_n b_r_3 bd_n pr_15 pl_15 pt_5 pb_5 fm-popp bcolor_5 hbcolor_4 abcolor_4 color_1" type="submit">Add partner</button>
                                </div>
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
