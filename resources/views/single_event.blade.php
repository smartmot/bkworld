@extends("layouts.default")

@section("content")
    <div class="cw pt_20 pb_20">
        <div class="rowc">
            <div class="xl-8 lg-8 md-7 sm-12 fx_12">
                <div class="pr_15 pl_15">
                    <div>
                        <img class="wp_100" src="{{ asset("photo/".$event->thumbnail.".jpg") }}" alt="">
                    </div>
                    <div class="fm-ubt4">
                        <h3>{{ $event["title"] }}</h3>
                    </div>
                    <div class="fm-popp">{!! $event["content"] !!}</div>
                </div>
            </div>
            <div class="xl-4 lg-4 md-5 sm-12 fx_12">
                <div class="pr_15 pl_15">
                    @foreach($relates as $evnt)
                        <div>
                            <div>
                                <img class="wp_100" src="{{ asset("photo/".$evnt["thumbnail"].".jpg") }}" alt="">
                            </div>
                            <div class="fm-ubt5">
                                <a class="fm-ubt5 c_blu hc_red t_d_n" href="{{ route("event.single", $evnt["id"]) }}">{{ $evnt["title"] }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
