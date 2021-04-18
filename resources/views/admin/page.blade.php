@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("page.create") }}">Create page</a>
@endsection

@section("content")
    <div>
        <div class="">
            @foreach($pages as $page)
                <div class="pd-10x15 fm-ubt4 lh_20 bdbtm_1_gra hbox-s1">
                    <div class="rowc">
                        <div class="w_120">
                            <div>{{ date_format(date_create($page["created_at"]), "Y/m/d") }}</div>
                            <div class="fs_12">By :
                                @if($page->user->status == "active")
                                    <a class="c3 ac1 hc1" href="{{ route("user.show", $page["user_id"]) }}">{{ $page["user"]["name"] }}</a>
                                @else
                                    {{ $page->user->name }}
                                @endif
                            </div>
                        </div>
                        <div class="flx">
                            <div>
                                <a class="c_blk t_d_n hc1 ac1" href="{{ route("page.show", $page["id"]) }}">{{ $page["title"] }}</a>
                            </div>
                            <div>
                                <a class="c3 ac1 hc1 fs_12 t_d_n" href="{{ route("page.edit", $page["id"]) }}">Edit</a>&nbsp;.&nbsp;
                                <a class="c3 ac1 hc1 fs_12 t_d_n" href="javascript:confirm_del('{{ route("page.destroy", $page["id"]) }}','{{ $page["title"] }}')">Delete</a>
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
    @include("admin.components.confirm_del")
@endsection
