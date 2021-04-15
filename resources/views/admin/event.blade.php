@extends("admin.layouts/".config("settings.admin"))
@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("event.create") }}">Add event</a>
@endsection

@section("content")
    <div class="rowc pt_5">
        @foreach($events as $event)
            <div class="xl-4">
                <div class="pr_5 pl_5 pb_10">
                    <div class="p-r box-s1 pb_5 b_r_3 bcolor_1">
                        <img class="wp_100 bdr-tlr-3" src="{{ asset("photo/".$event["thumbnail"])."_thumb.jpg" }}" alt="">
                        <div class="p-a t_10 l_10 w_50 h_40 b_r_3 fm-popp bcolor_1 t_a_c box-s1">
                            <div class="wp_100 bcolor_4 color_1 fs_11 bdr-tlr-3">{{ date_format(date_create($event->start), "M") }}</div>
                            <div class="fm-ubt">{{ date_format(date_create($event->start), "d") }}</div>
                        </div>
                        <div class="p-a t_2 r_2">
                            <a href="{{ route("event.edit", $event["id"]) }}" class="color_5 hcolor_4 acolor_4">
                                <span class="fa fa-edit"></span>
                            </a>
                        </div>
                        <div class="pr_10 pl_10 fm-popp">
                            <a class="t_d_n color_5 hcolor_4 acolor_4" href="{{ route("event.show", $event["id"]) }}">{{ $event->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
