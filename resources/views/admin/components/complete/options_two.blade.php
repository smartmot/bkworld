<div id="alertz" class="w_250 bcolor_1 ds_n p-f z_x_5 box-s1 oln_n bd_n" onblur="$(this).fadeOut('fast')" style="right: calc(50% - 125px); top: 75px;" tabindex="1">
    <form action="#" method="post">
        @csrf
        @method('delete')
        <input type="submit" id="answer" hidden>
    </form>
    <div class="fs_20 fm-ubt color_1 pb_5 pt_5 bcolor_4 pl_10">Options</div>
    <div class="pr_5 pl_5 pt_10 pb_10">
        <div class="fs_16 fm-ubt5 color_5 pb_10">
            <div>
                <a id="editor" class="ds_f t_d_n color_5 hcolor_4 acolor_4 pr_10 pl_10 pt_3 pb_3 csr-p hbox-s1" href="javascript:void 0">
                    <div class="fa fa-edit w_25 h_25 lh_25"></div>
                    <div class="lh_25">Edit</div>
                </a>
                <div onclick="$('.asker').fadeIn(80).focus();" class="ds_f t_d_n color_5 hcolor_4 acolor_4 pr_10 pl_10 pt_3 pb_3 csr-p hbox-s1">
                    <span class="fa fa-trash w_25 h_25 lh_25 ds_b"></span>
                    <span class="lh_25 ds_b">Delete</span>
                </div>

            </div>
        </div>
        <div class="h_3 wp_100 bdbtm_1_gra"></div>
        <div class="t_a_c pt_10">
            <button class="oln_n bd_n pl_20 pr_20 pt_5 pb_5 fm-ubt csr-p us_n bcolor_5 hbcolor_4 abcolor_4 color_1 hbox-s1 abox-s1" onclick="$('#alertz').fadeOut(80)">Cancel</button>
        </div>
    </div>
</div>
<div class="p-a ds_n asker box-s3 z_x_5 w_250 bcolor_1 oln_n bd_n" tabindex="1" onblur="$(this).fadeOut('fast')" style="top: 75px;right: calc(50% - 125px)">
    <div class="pd-10x15 bcolor_4 color_1">
        <span class="fm-ubt">Delete {{ isset($section) ? $section : "" }}</span>
    </div>
    <div class="bcolor_1 pd-10x15">
        <div class="t_a_c color_5 fm-popp fw_b fs_16 pb_15 h_60">
            <div>Make sure you want to</div>
            <div>{{ isset($ask) ? $ask : "delete?"}}</div>
        </div>
        <div class="wp_100 h_1 bcolor_4"></div>
        <div class="ds_f pt_5">
            <label for="answer" class="bcolor_5 color_1 hbcolor_4 abcolor_4 h_25 w_80 lh_25 t_a_c csr-p input-2 us_n ds_b fm-popp fs_14">Yes</label>
            <div class="flx"></div>
            <label onclick="$('.asker').fadeOut('fast')" class="bcolor_5 color_1 hbcolor_4 abcolor_4 h_25 w_80 lh_25 t_a_c csr-p input-2 us_n ds_b fm-popp fs_14">No</label>
        </div>
    </div>
</div>

<script type="text/javascript">
    let optz = function (member){
        $("#editor").attr('href',member+'/edit');
        $("#alertz").fadeIn(80).focus().children("form").attr("action",member);
    }
</script>
