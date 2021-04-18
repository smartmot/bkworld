<div id="del" class="w_250 bcolor_1 t_a_c p-f z_x_5 box-s1 ds_n" style="right: calc(50% - 125px); top: 75px;">
    <div class="fs_20 fm-ubt color_1 pb_5 pt_5 bcolor_4">{{ isset($head) ? $head : "Confirm delete" }}</div>
    <div class="pr_10 pl_10 pt_10 pb_10">
        <div class="fs_14 fm-ubt4 c2 pb_5" id="title"></div>
        <div class="fs_16 fm-ubt5 c1 pb_15 pt_5">{{ isset($body) ? $body : "Are you sure ?" }}</div>
        <div class="h_1 bcolor_2"></div>
        <div class="ds_f pt_10">
            <label for="confirm" class="w_80 fm-ubt csr-p us_n h_25 lh_25 bcolor_5 color_1 hbcolor_4 abcolor_4 hbox-s1">Yes</label>
            <div class="flx"></div>
            <div class="w_80 fm-ubt csr-p us_n h_25 lh_25 bcolor_5 color_1 hbcolor_4 abcolor_4 hbox-s1" onclick="$('#del').fadeOut(80)">No</div>
        </div>
    </div>
</div>
<form action="" method="post" class="ds_n" id="targ">
    @csrf
    @method("delete")
    <input type="submit" id="confirm" hidden>
</form>
<script>
    function confirm_del(page, msg) {
        $("#targ").attr("action", page);$("#del").fadeIn(80);
        $("#title").text(msg);
    }
</script>
