<div class="{{ $class }}"><div class="pr_15 pl_15 pb_20"><div><div>@if($post->youtube == "")<img class="wp_100" src="{{ asset("photo/".$post->thumbnail."_thumb.jpg") }}" alt="">@else<div class="vdo-ut"><iframe src="{{ $post->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>@endif</div><div class="pr_10 pl_10"><div><a class="t_d_n c_blu hc_red" href="{{ route("news.show", $post["id"]) }}"><h3 class="fm-ubt">{{ $post["title"] }}</h3></a></div><div class="fm-popp">{{ $post["description"] }}</div></div></div></div></div>
