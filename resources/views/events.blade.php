@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw">
        <div class="pt_20 pb_15">
            @include("components.section", ["section"=>"Events"])
        </div>
        <div class="rowc">
            @foreach($events as $event)
                @include("components.event")
            @endforeach
        </div>
    </div>
@endsection
