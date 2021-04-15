@extends("admin.layouts/".config("settings.admin"))
@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("event.create") }}">Add event</a>
@endsection

@section("content")
    <div class="rowc pt_5">
        @foreach($events as $event)
            <div class="xl-4">
                <div class="pr_5 pl_5 pb_10">
                    <div>
                        <img class="wp_100" src="{{ asset("photo/".$event["thumbnail"])."_thumb.jpg" }}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
