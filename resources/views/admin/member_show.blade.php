@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("member.index") }}">Back</a>
@endsection

@section("content")
    <div>
        <div class="rowc">
            <div class="xl-4">
                <img class="wp_100" src="{{ asset("photo/".$member["photo"].".jpg") }}" alt="">
            </div>
        </div>
    </div>

    <div id="detailz" class="w_300 bcolor_1 p-f z_x_5 box-s1 oln_n bd_n" onblur="$(this).fadeOut('fast')" style="right: calc(50% - 150px); top: 75px;" tabindex="1">
        <form action="#" method="post">
            @csrf
            @method('delete')
            <input type="submit" id="answer" hidden>
        </form>
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
