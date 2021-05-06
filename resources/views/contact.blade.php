@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw">
        <div class="pt_20">
            @include("components.section", ["section" => "Contact Us"])
        </div>
        <div class="rowc pt_15 pb_20">
            <div class="xl-6 lg-6 md-6 sm-12 fx_12 bc_02">
                <div class="pr_40 pl_40 pb_15">
                    <div class="fm-ubt pb_5 c_blu pb_20 pt_20">
                        <span class="fs_20 t_t_c">Leave us your Message</span>
                    </div>
                    <div class="pt_4">
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
                                    <textarea rows="8" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Message">{{ old("message") }}</textarea>
                                </label>
                            </div>

                            <div class="pb_15 t_a_r">
                                <button class="bcolor_5 color_1 hbcolor_4 abcolor_4 csr-p box-s1 fm-popp pd-5x15 fs_16 oln_n bd_n b_r_3">Send</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                <div class="pr_40 pl_40">
                    <div>
                        <div class="t_a_c fm-ubt fs_20 c_blu t_t_c pb_20">
                            <span>Customer Services</span>
                        </div>
                    </div>
                    <div class="pb_20 fs_18 fm-popp">
                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40 fw_b">
                                Tel
                            </div>
                            <div class="h_40 lh_40">: 010 563 093</div>
                        </div>

                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40 fw_b">
                                Email
                            </div>
                            <div class="h_40 lh_40">: info@bkworld.asia</div>
                        </div>
                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40 fw_b">
                                Address
                            </div>
                            <div class="h_40 lh_40">: #2N, St 608, Toul Kork, Phnom Penh</div>
                        </div>
                    </div>

                    <div class="vdo-ut box-s1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.6586680561236!2d104.90154931475644!3d11.576308991781806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951b017267ee1%3A0x2ccc3fedecb9cb7e!2sBKWORLD%20DEVELOPMENT%20CO.%2CLTD!5e0!3m2!1sen!2skh!4v1619677301784!5m2!1sen!2skh" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
