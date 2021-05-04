@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw">
        <div class="pt_20 pb_15">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                <span>Our Events</span>
            </div>
            <div class="h_1 wp_100 bcolor_4"></div>
        </div>
        <div class="rowc">
            @foreach($events as $event)
                @include("components.event")
            @endforeach
        </div>
    </div>
@endsection
