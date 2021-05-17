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
                                    <input class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" type="text" name="name" value="{{ old("name") }}" placeholder="Name" spellcheck="false"{{ cooki_ceck("message") ? " disabled" : "" }}>
                                </label>
                            </div>

                            <div class="pb_15">
                                <label class="ds_f">
                                    <input class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" type="text" name="email" value="{{ old("email") }}" placeholder="Email" spellcheck="false"{{ cooki_ceck("message") ? " disabled" : "" }}>
                                </label>
                            </div>

                            <div class="pb_15">
                                <label class="ds_f">
                                    <textarea rows="8" name="message" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Message"{{ cooki_ceck("message") ? " disabled" : "" }}>{{ old("message") }}</textarea>
                                </label>
                            </div>

                            <div class="pb_15 t_a_r">
                                <button id="senderer" class="bcolor_5 color_1 hbcolor_4 abcolor_4 csr-p box-s1 fm-popp pd-5x15 fs_16 oln_n bd_n b_r_3"{{ cooki_ceck("message") ? " disabled" : "" }}>Send</button>
                            </div>
                            @if(cooki_ceck("message"))
                                <div class="fm-ubt color_4 t_a_c">Your message has been sent.</div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
            <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                <div class="pr_40 pl_40">
                    <div>
                        <div class="t_a_c fm-ubt fs_20 c_blu t_t_c pb_20 pt_20">
                            <span>Customer Services</span>
                        </div>
                    </div>
                    <div class="pb_20 fs_18 fm-popp">
                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40 fw_b">
                                Tel
                            </div>
                            <div class="h_40 lh_40">: {{ config("settings.tel") }}</div>
                        </div>

                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40 fw_b">
                                Email
                            </div>
                            <div class="h_40 lh_40">: {{ config("settings.email") }}</div>
                        </div>
                        <div class="ds_f wp_100">
                            <div class="w_80 h_40 lh_40 fw_b">
                                Address
                            </div>
                            <div class="lh_40">: {{ config("settings.address") }}</div>
                        </div>
                    </div>

                    <div class="vdo-ut box-s1">
                        {!! config("settings.map") !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        $("#senderer").click(function (){
            setTimeout(function (){
                $(this).attr("disabled", '1');
            },10);
        });
    </script>
@endsection
