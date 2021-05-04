@extends("layouts.default")

@section("keywords", $event["keywords"])
@section("description", $event["description"])

@section("content")
    <div class="cw pt_20 pb_20">
        <div class="rowc">
            <div class="xl-8 lg-8 md-7 sm-12 fx_12">
                <div class="pr_15 pl_15">
                    <div class="">
                        <img class="wp_100 box-s2" src="{{ asset("photo/".$event->thumbnail.".jpg") }}" alt="">
                    </div>
                    <div class="pr_20 pl_20 pt_15 pb_15 bc_03">
                        <div class="fm-ubt4 c_whi">
                            <h3>{{ $event["title"] }}</h3>
                        </div>
                    </div>
                    <div>

                    </div>
                    <div class="fm-popp">{!! $event["content"] !!}</div>
                </div>
            </div>
            <div class="xl-4 lg-4 md-5 sm-12 fx_12">
                <div class="pr_15 pl_15">
                    <div class="bc_02 c_blu pr_15 pl_15 fm-ubt pt_10 pb_10 p-r">
                        <div>Recent Events</div>
                    </div>
                    <div class="h_10"></div>
                    @foreach($relates as $event)
                        @include("components.event",["class"=>"wp_100"])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
