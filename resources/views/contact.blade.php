@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw">
        <div class="pt_20">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                <span>Contact Us</span>
            </div>
            <div class="h_1 wp_100 bcolor_4"></div>
        </div>
        <div class="rowc pt_15">
            <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                <div class="pr_10 pl_10 pb_15">
                    <div class="fm-popp pb_5">
                        <h2>Leave us a Message</h2>
                    </div>
                    <form action="{{ route("message.store") }}" method="post" autocomplete="off">
                        @method("post")
                        @csrf
                        <div class="pb_15">
                            <label class="ds_f">
                                <input class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" type="text" name="name" value="{{ old("name") }}" placeholder="Name" spellcheck="false">
                            </label>
                        </div>

                        <div class="pb_15">
                            <label class="ds_f">
                                <input class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" type="text" name="email" value="{{ old("email") }}" placeholder="Email" spellcheck="false">
                            </label>
                        </div>

                        <div class="pb_15">
                            <label class="ds_f">
                                <textarea rows="3" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Message">{{ old("message") }}</textarea>
                            </label>
                        </div>

                        <div class="pb_15 t_a_r">
                            <button class="bcolor_5 color_1 hbcolor_4 abcolor_4 csr-p box-s1 fm-popp pd-5x15 fs_16 oln_n bd_n b_r_3">Send</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                <div class="pr_10 pl_10 pb_10">
                    <div>
                        <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                            <span>Customer Services</span>
                        </div>
                    </div>
                    <div>
                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40">
                                Tel
                            </div>
                            <div class="h_40 lh_40">: 010 563 093</div>
                        </div>

                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40">
                                Email
                            </div>
                            <div class="h_40 lh_40">: info@bkworld.asia</div>
                        </div>
                        <div class="ds_f wp_100">
                            <div class="wp_100 h_40 lh_40">
                                Social Media
                            </div>
                        </div>

                        <div class="t_a_c ds_b">
                            <a href="#" class="t_d_n ds_ib">
                                <div class="w_30 h_30 lh_30 t_a_c color_1 bc-a b_r_c">
                                    <span class="fa fa-facebook"></span>
                                </div>
                            </a>&nbsp;

                            <a href="#" class="t_d_n ds_ib">
                                <div class="w_30 h_30 lh_30 t_a_c color_1 bc-a b_r_c">
                                    <span class="fa fa-instagram"></span>
                                </div>
                            </a>&nbsp;

                            <a href="#" class="t_d_n ds_ib">
                                <div class="w_30 h_30 lh_30 t_a_c color_1 bc-a b_r_c">
                                    <span class="fa fa-twitter"></span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
