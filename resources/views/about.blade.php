@extends("layouts/".config("settings.theme"))

@section("content")
    <div class="cw pt_20 pb_20">
        <div class="pt_20">
            <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
                <span>Why is BK World Development ?</span>
            </div>
            <div class="h_1 wp_100 bcolor_4"></div>
        </div>
        <div class="pt_15 fm-popp t_a_j">
            <p>{{ config("settings.about")[0] }}</p>
        </div>

        <div class="wp_100 bcolor_1 pt_10">
            <div class="cw pt_20">
                <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20 pt_20">
                    <span>Vision and Mission</span>
                </div>
                <div class="rowc">
                    <div class="xl-6 lg-6 md-6 sm-12 fx_12" style="background-color: #eaeaea">
                        <div class="pr_20 pl_20 pb_15">
                            <div class="">
                                <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pt_15 pb_20">
                                    <span>Our Vision</span>
                                </div>
                                <div class="fm-popp">
                                    <div class="t_a_j">
                                    “To be a globally respected corporation that provides best-of-breed business solutions, leveraging technology, delivered by best-in-class people.”
BK World does not just want to be a corporation which just focuses on increasing its business and revenue, rather its vision is to be a corporation
which provides best business solution by indulging best talented people and eventually to become a reputed and respected corporation.
“To achieve our objectives in an environment of fairness, honesty, and courtesy towards our clients, employees, vendors and society at large.”
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl-6 lg-6 md-6 sm-12 fx_12" style="background-color: #eaeaea">
                        <div class="pr_20 pl_20 pb_15">
                            <div class="">
                                <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pt_15 pb_20">
                                    <span>Our Mission</span>
                                </div>
                                <div class="fm-popp t_a_j">
                                <span>
                                   BK World focuses on maintaining fairness, honesty and courtesy towards their clients, employees, vendors and society in their path of achieving
their objective. They believe that these three key aspects were the main factors in achieving their vision.
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
