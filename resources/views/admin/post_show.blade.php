@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("post.index") }}">Back</a>
@endsection

@section("content")
    <div class="pt_10">
        <div>
            <img class="wp_100" src="{{ asset("photo/".$post->thumbnail.".jpg") }}" alt="">
        </div>
    </div>
@endsection