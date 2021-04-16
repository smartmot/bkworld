@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("event.index") }}">Back</a>
@endsection

@section("content")
    <div>
        <div>
            <img class="wp_100" src="{{ asset("photo/".$event->thumbnail.".jpg") }}" alt="">
        </div>
        <div>
            <h3 class="fm-popp color_5">{{ $event->title }}</h3>
        </div>
        <div>
            <span class="color_5">{{ date_format(date_create($event->created_at), "d, M, Y") }}</span>
        </div>
        <div class="pb_10 pt_15 fm-popp">
            <div class="color_5 fw_b">Start date</div>
            <div>
                <span>{{ date_format(date_create($event->start), "d, M, Y - h:i:s a") }}</span>
            </div>
        </div>
        <div class="pb_10 fm-popp">
            <div class="color_5 fw_b">End date</div>
            <div>
                <span>{{ date_format(date_create($event->end), "d, M, Y - h:i:s a") }}</span>
            </div>
        </div>
        <div class="pb_10 fm-popp">
            <div class="color_5 fw_b">Keywords</div>
            <div>
                <span>{{ $event->keyword }}</span>
            </div>
        </div>

        <div class="pb_10 fm-popp">
            <div class="color_5 fw_b">Description</div>
            <div>
                <span>{{ $event->description }}</span>
            </div>
        </div>

        <div class="pb_10 fm-popp">
            <div class="fw_b pr_5 pl_5 pt_2 pb_2 bcolor_5 color_1">Contents</div>
            <div>
                <span>{!! $event->content !!}</span>
            </div>
        </div>
    </div>
@endsection
