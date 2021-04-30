@extends("layouts.default")

@section("keywords", $news->keywords)
@section("description", $news->description)
@section("title", $news->title)


@section("content")
    <div class="cw">
        <div class="rowc pt_20 pb_20">
            <div class="xl-8 lg-8">
                <div class="pt_10 pr_15 pl_15">
                    <div>
                        <img class="wp_100{{ $news->youtube != "" ? " ds_n" : "" }}" src="{{ asset("photo/".$news->thumbnail.".jpg") }}" title="{{ $news->title }}" alt="">
                        @if($news->youtube != "")
                            <div class="vdo-ut">
                                <iframe src="{{ $news->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        @endif
                    </div>
                    <div>
                        <div><h3 class="fm-ubt5">{{ $news->title }}</h3></div>
                        <div>{{ date_format(date_create($news->created_at), "d M, Y") }}</div>
                    </div>
                    <div>
                        <div class="fm-popp t_a_j pt_10">{!! $news->content !!}</div>
                    </div>
                </div>
            </div>
            <div class="xl-4 lg-4">
                <div class="">
                    <div>
                        @foreach($latest as $post)
                            <div class="pb_10 pt_10">
                                <div class="pr_15 pl_15">
                                    <div class="pr_2 pl_2 pt_2 pb_2 bc_02">
                                        <div>
                                            @if($post->youtube == "")
                                                <img class="wp_100" src="{{ asset("photo/".$post->thumbnail."_thumb.jpg") }}" alt="">
                                            @else
                                                <div class="vdo-ut">
                                                    <iframe src="{{ $post->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="pr_10 pl_10 pt_5 pb_10">
                                            <div class="fm-ubt">
                                                <a class="t_d_n c_blu hc_red" href="{{ route("news.show", $post->id) }}">{{ $post->title }}</a>
                                            </div>
                                            <div class="fm-popp">
                                                {{ $post->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
