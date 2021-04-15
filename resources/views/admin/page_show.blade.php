@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("page.index") }}">Back</a>
@endsection

@section("content")
    <div class="fm-popp">
        <div class="pb_10">
            <div class="color_5 fw_b">Title</div>
            <div>{{ $page->title }}</div>
        </div>
        <div class="pb_10">
            <div class="color_5 fw_b">Keyword</div>
            <div>{{ $page->keyword }}</div>
        </div>
        <div class="pb_10">
            <div class="color_5 fw_b">Description</div>
            <div>{{ $page->description }}</div>
        </div>
        <div class="pb_10">
            <div class="color_5 fw_b">Posted date</div>
            <div>{{ date_format(date_create($page->created_at), "d, M, Y") }}</div>
        </div>
        <div class="pb_10">
            <div class="color_5 fw_b">Posted by</div>
            <div>
                <a class="t_d_n fm-popp color_5 acolor_4 hcolor_4" href="{{ route("user.show", $page->user_id) }}">{{ $page->user->name }}</a>
            </div>
        </div>
        @if($page->updated_by != "")
            <div class="pb_10">
                <div class="color_5 fw_b">Last updated date</div>
                <div>{{ date_format(date_create($page->updated_at), "d, M, Y") }}</div>
            </div>
            <div class="pb_10">
                <div class="color_5 fw_b">Last updated by</div>
                <div>
                    <a class="t_d_n fm-popp color_5 acolor_4 hcolor_4" href="{{ route("page.show", $page->updated_by) }}">{{ $page->updater->name }}</a>
                </div>
            </div>
        @endif
        <div class="pb_10">
            <div class="pr_10 pl_10 pt_5 pb_5 fm-popp bcolor_5 color_1">Contents</div>
        </div>
        <div>{!! $page->content !!}</div>
    </div>
@endsection
