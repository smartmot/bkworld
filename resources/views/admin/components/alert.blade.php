<div id="alert" class="w_250 top_of_alert bc4 t_a_c p-f z_x_3 box-s1" style="right: calc(50% - 125px)">
    <div class="fs_20 fm-ubt c4 pb_5 pt_5 bc1">{{ $message }}</div>
    <div class="pr_5 pl_5 pt_10 pb_10">
        @error("alert_message")
        <div class="fs_16 fm-ubt5 c1 pb_10">{{ $message }}</div>
        @enderror
        <div class="h_3 wp_100 bdbtm_1_gra"></div>
        <div class="t_a_c pt_5">
            <label class="pl_20 pr_20 pt_2 pb_2 fm-ubt csr-p us_n bc2 c_whi hc1 box-s1" onclick="$('#alert').fadeOut(80)">OK</label>
        </div>
    </div>
</div>
