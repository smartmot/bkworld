@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("partner.create") }}">Add partner</a>
@endsection

@section("content")
    <div>
        <div class="pt_10">
            @foreach($partners as $partner)
                <div class=wp_100">
                    <div class="pr_10 pl_10 pb_10">
                        <div class="ds_f">
                            <div class="w_110 h_110 lh_90 box-s3">
                                <div class="pr_5 pl_5 pt_5 pb_5">
                                    <img class="wp_100" src="{{ asset("photo/".$partner["logo"].".jpg") }}" alt="">
                                </div>
                            </div>
                            <div class="flx h_100">
                                <div class="pl_10 color_5 fm-popp">
                                    <a class="t_d_n color_5 hcolor_4 acolor_4" href="javascript:optz('{{ route("partner.show", $partner->id) }}')">{{ $partner["name"] }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section("script")
    @include("admin.components.complete.options_two", ["view"=>1,"ask"=>"delete this partner?"])
@endsection
