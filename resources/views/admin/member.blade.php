@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("member.create") }}">Add member</a>
@endsection

@section("content")
    <div>
        <div class="rowc pt_5">
            @foreach($members as $member)
                <div class="xl-4 lg-4 md-6 sm-6 fx_12">
                    <div class="pr_5 pl_5 pb_10">
                        <div class="box-s2">
                            <div class="p-r">
                                <div>
                                    <img class="wp_100" src="{{ asset("photo/".$member["photo"]."_thumb.jpg") }}" alt="">
                                </div>
                                <div class="pb_10 p-a b-0 r-0 afbcolor_5 box-s2 color_1 z_x_2 wp_100 pt_5 member_box">
                                    <div class="fm-ubt t_a_c">
                                        <a class="t_d_n color_1 hcolor_4 acolor_4" href="{{ route("member.show", $member["id"]) }}">{{ $member["name"] }}</a>
                                    </div>
                                    <div class="fm-ubt4 fs_13 t_a_c">{{ $member["position"] }}</div>
                                </div>
                                <div class="p-a t_2 r_5">
                                    <a class="color_5 hcolor_4 acolor_4" href="javascript:optz('{{ route('member.show', $member["id"]) }}')">
                                        <span class="fa fa-ellipsis-h"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @error("alert")
    @include("admin.components.alert")
    @enderror
@endsection
@section("script")
    @include("admin.components.complete.options_two",["section"=>"Member", "ask" => "delete this member?"])
@endsection
