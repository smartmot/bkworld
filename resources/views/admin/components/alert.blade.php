<div id="alert" class="w_250 bcolor_1 t_a_c p-f z_x_3 box-s1" style="right: calc(50% - 125px); top: 75px;">
    <div class="fs_20 fm-ubt color_1 pb_5 pt_5 bcolor_4">{{ $message }}</div>
    <div class="pr_5 pl_5 pt_10 pb_10">
        @error("alert_message")
        <div class="fs_16 fm-ubt5 color_5 pb_10">{{ $message }}</div>
        @enderror
        <div class="h_3 wp_100 bdbtm_1_gra"></div>
        <div class="t_a_c pt_10">
            <button class="pl_20 oln_n bd_n pr_20 pt_4 pb_4 fm-ubt csr-p us_n bcolor_5 hbcolor_4 abcolor_4 color_1 box-s1" onclick="$('#alert').fadeOut(80)">Close</button>
        </div>
    </div>
</div>
