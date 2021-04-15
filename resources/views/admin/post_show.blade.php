@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("post.index") }}">Back</a>
@endsection

@section("content")
    <div class="pt_10">
        <div>
            <img class="wp_100" src="{{ asset("photo/".$post->thumbnail.".jpg") }}" alt="">
        </div>
        <div class="color_5">
            <h3 class="fm-popp">{{ $post->title }}</h3>
        </div>
        <div>
            <span class="color_5">{{ date_format(date_create($post->created_at), "d, M, Y") }}</span>
        </div>
        <div class="fm-popp pt_5 pb_20 color_5">
            <span>{!! $post->content !!}</span>
        </div>
        <div class="fm-popp bcolor_5 pl_10">
            <span class="color_1">Details:</span>
        </div>
        <div class="fm-popp pb_10 color_5">
            <div class="fw_b">Keyword :</div>
            <div>{{ $post->keyword == "" ? "null" : $post->keyword }}</div>
        </div>
        <div class="fm-popp pb_10 color_5">
            <div class="color_5 fw_b">Description :</div>
            <div>{{ $post->description == "" ? "null" : $post->description }}</div>
        </div>
        <div class="fm-popp pb_10 color_5">
            <div class="fw_b">Posted date :</div>
            <div>{{ date_format(date_create($post->created_at), "Y/m/d H:i:s") }}</div>
        </div>
        <div class="fm-popp pb_10">
            <div class="color_5 fw_b">Posted by :</div>
            <div>
                @if($post->user->status == "active")
                    <a class="color_5 t_d_n hcolor_4 acolor_4" href="{{ route("user.show", $post->user_id) }}">{{ $post->user["name"] }}</a>
                @else
                    <span class="color_5">{{ $post->user->name }}</span>
                @endif
            </div>
        </div>

        @if($post->updated_at != "")
            <div class="fm-popp pb_10 color_5">
                <div class="fw_b">Last update date :</div>
                <div>{{ date_format(date_create($post->updated_at), "Y/m/d H:i:s") }}</div>
            </div>
        @endif
        <div class="fm-popp pb_10">
            <div class="color_5 fw_b">Last updated by :</div>
            <div>
                @if($post->updated_by == "")
                    <span class="color_5 fm-popp">null</span>
                @else
                    @if($post->updater->status == "active")
                        <a class="color_5 t_d_n hcolor_4 acolor_4" href="{{ route("user.show", $post->updated_by) }}">{{ $post->updater["name"] }}</a>
                    @else
                        <span class="color_5">{{ $post->updater->name }}</span>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
