@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("member.index") }}">Back</a>
@endsection

@section("content")
    <div class="pt_5">
        <div class="rowc">
            <div class="xl-4 lg-4 md-4 sm-12 fx_12 bcolor_1">
                <div class="pr_10 pl_10 pt_15 pb_10">
                    <div class="p-r">
                        <div><img class="wp_100 bds-s bdcolor_4 bdw_2" src="{{ asset("photo/".$member["photo"].".jpg") }}" alt=""></div>
                        <div class="p-a b-0 r-0 wp_100 pt_10 pb_10">
                            <div class="pr_2 pl_2 t_a_j">
                                <div class="ds_f">
                                    <div class="fx_3 t_a_c">
                                        <a class="t_d_n" href="{{ $member->facebook == "" ? "javascript: void 0":$member->facebook }}">
                                        <div class="w_30 h_30 lh_30 t_a_c c_whi bc3 b_r_c box-s1">
                                            <span class="fa fa-facebook-f"></span>
                                        </div>
                                    </a>
                                    </div>

                                    <div class="fx_3 t_a_c">
                                        <a class="t_d_n" href="{{ $member->youtube == "" ? "javascript: void 0":$member->facebook }}">
                                        <div class="w_30 h_30 lh_30 t_a_c c_whi bc_hooli b_r_c box-s1">
                                            <span class="fa fa-youtube-play"></span>
                                        </div>
                                    </a>
                                    </div>

                                    <div class="fx_3 t_a_c">
                                        <a class="t_d_n" href="{{ $member->twitter == "" ? "javascript: void 0":$member->twitter }}">
                                        <div class="w_30 h_30 lh_30 t_a_c c_whi bc-info b_r_c box-s1">
                                            <span class="fa fa-twitter"></span>
                                        </div>
                                    </a>
                                    </div>

                                    <div class="fx_3 t_a_c">
                                        <a class="t_d_n" href="{{ $member->instagram == "" ? "javascript: void 0":$member->instagram }}">
                                        <div class="w_30 h_30 lh_30 t_a_c c_whi bc_red b_r_c box-s1">
                                            <span class="fa fa-instagram"></span>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="t_a_c pt_5 pb_5">
                        <div><span class="fm-ubt fs_18 color_5">{{ $member->name }}</span></div>
                        <div class="pb_5">
                            <span class="fm-ubt4 fs_16 color_5">{{ $member->position }}</span>
                        </div>
                        <div class="h_1 bcolor_4" style="opacity: 0.5"></div>
                        <div class="pt_8">
                            <button onclick="$('#detailz').fadeIn(80).focus()" class="oln_g bd_n bcolor_5 color_1 fm-popp pr_20 pl_20 pt_3 pb_3 csr-p hbcolor_4 abcolor_4 hbox-s1">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl-8 lg-8 md-8 sm-12 fx_12 bcolor_1">
                <div class="pr_5 pl_5">
                    <div class="pr_10 pl_10 pt_15 pb_10">
                        <span class="color_5">{{ $member->description }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="detailz" class="w_300 bcolor_1 p-f z_x_5 box-s1 oln_n bd_n ds_n" onblur="$(this).fadeOut('fast')" style="right: calc(50% - 150px); top: 75px;" tabindex="1">
        <div class="fs_20 fm-ubt color_1 pb_5 pt_5 bcolor_4 pl_10">Details</div>
        <div class="pr_5 pl_5 pt_10 pb_10">
            <div class="fs_16 fm-ubt5 color_5 pb_10">
                <div class="fm-popp pl_10 pr_10">
                    <div class="fs_16 fw_b">Created by</div>
                    <div class="pl_10 pb_5">
                        @if($member->user->status == "active")
                            <a class="t_d_n color_5 hcolor_4 acolor_4" href="{{ route("user.show", $member->user_id) }}">{{ $member->user->name }}</a>
                        @else
                            <span>{{ $member->user->name }}</span>
                        @endif
                    </div>
                    <div class="h_1 bcolor_2"></div>
                </div>

                <div class="fm-popp pl_10 pr_10">
                    <div class="fs_16 fw_b">Created date</div>
                    <div class="pl_10 pb_5">
                        <span>{{ date_format(date_create($member->created_at), "d, m, Y - h:i a") }}</span>
                    </div>
                    <div class="h_1 bcolor_2"></div>
                </div>

                @if($member->updated_by != "")
                    <div class="fm-popp pl_10 pr_10">
                        <div class="fs_16 fw_b">Last updated by</div>
                        <div class="pl_10 pb_5">
                            <span>{{ date_format(date_create($member->updated_at), "d, m, Y - h:i a") }}</span>
                        </div>
                        <div class="h_1 bcolor_2"></div>
                    </div>
                    <div class="fm-popp pl_10 pr_10">
                        <div class="fs_16 fw_b">Last updated date</div>
                        <div class="pl_10 pb_5">
                            @if($member->updater->status == "active")
                                <a class="t_d_n color_5 hcolor_4 acolor_4" href="{{ route("user.show", $member->user_id) }}">{{ $member->updater->name }}</a>
                            @else
                                <span>{{ $member->updater->name }}</span>
                            @endif
                        </div>
                        <div class="h_1 bcolor_2"></div>
                    </div>
                @endif

                <div class="fm-popp pl_10 pr_10">
                    <div class="fs_16 fw_b t_t_c">facebook</div>
                    <div class="pl_10 pb_5">
                        <span>{!! $member->facebook == "" ? "<span class='color_2'>None</span>" : $member->facebook !!}</span>
                    </div>
                    <div class="h_1 bcolor_2"></div>
                </div>

                <div class="fm-popp pl_10 pr_10">
                    <div class="fs_16 fw_b t_t_c">instagram</div>
                    <div class="pl_10 pb_5">
                        <span>{!! $member->instagram == "" ? "<span class='color_2'>None</span>" : $member->instagram !!}</span>
                    </div>
                    <div class="h_1 bcolor_2"></div>
                </div>

                <div class="fm-popp pl_10 pr_10">
                    <div class="fs_16 fw_b t_t_c">youtube</div>
                    <div class="pl_10 pb_5">
                        <span>{!! $member->youtube == "" ? "<span class='color_2'>None</span>" : $member->youtube !!}</span>
                    </div>
                    <div class="h_1 bcolor_2"></div>
                </div>

                <div class="fm-popp pl_10 pr_10">
                    <div class="fs_16 fw_b t_t_c">twitter</div>
                    <div class="pl_10 pb_5">
                        <span>{!! $member->twitter == "" ? "<span class='color_2'>None</span>" : $member->twitter !!}</span>
                    </div>
                </div>
            </div>
            <div class="h_3 wp_100 bdbtm_1_gra"></div>
            <div class="t_a_c pt_10">
                <button class="oln_n bd_n pl_20 pr_20 pt_5 pb_5 fm-ubt csr-p us_n bcolor_5 hbcolor_4 abcolor_4 color_1 hbox-s1 abox-s1" onclick="$('#detailz').fadeOut(80)">Close</button>
            </div>
        </div>
    </div>
@endsection
@section("script")

@endsection
