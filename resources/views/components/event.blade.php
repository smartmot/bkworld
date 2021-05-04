<div class="{{ isset($class) ? $class : "xl-4 lg-4 md-6 sm-12 fx_12" }}">
    <div class="pr_15 pl_15 pb_20">
        <div class="p-r">
            <div>
                <img class="wp_100" src="{{ asset("photo/".$event["thumbnail"]."_thumb.jpg") }}" alt="AA">
            </div>
            <div>
                <h3 class="fm-ubt">
                    <a class="c_blu hc_red t_d_n" href="{{ route("event.single", $event["id"]) }}">{{ $event["title"] }}</a>
                </h3>
            </div>
            <div class="p-a t_10 l_10 w_50 h_40 b_r_3 fm-popp bcolor_1 t_a_c box-s1">
                <div class="wp_100 bcolor_4 color_1 fs_11 bdr-tlr-3">{{ date_format(date_create($event["start"]), "M") }}</div>
                <div class="fm-ubt">{{ date_format(date_create($event["start"]), "d") }}</div>
            </div>
            <div class="ds_n">
                <div class="fm-ubt4 t_a_j">{{ $event["description"] }}</div>
            </div>
            <div class="">
                <div class="fm-popp fw_b fs_24 w_50 t_a_c">Jan</div>
                <div class="fm-popp fw_b fs_24 w_50 t_a_c">03</div>
            </div>
        </div>
    </div>
</div>
