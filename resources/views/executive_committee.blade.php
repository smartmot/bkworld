@extends("layouts/".config("settings.theme"))

@section("content")
   <div class="cw pt_20">
       @include("components.section", ["section" => "Our Management Team"])
       <div class="rowc">
           @foreach($members as $member)
               <div class="xl-6 lg-6 md-12 sm-12 fx_12">
                   <div class="pl_20 pr_20 pt_20 pb_10">
                       <div class="bc_02 box-s1">
                           <div class="rowc">
                               <div class="xl-4 lg-5 md-5 sm-12 fx_12">
                                   <a class="t_d_n" href="{{ route("member.single", $member["id"]) }}">
                                       <img class="wp_100 box-s1 member_fade ts_020 opc_90" src="{{ asset("photo/".$member["photo"]."_thumb.jpg") }}" alt="">
                                   </a>
                               </div>
                               <div class="xl-8 lg-7 md-7 sm-12 fx_12 p-r">
                                  <div class="pt_10">
                                      <div class="pr_25 pl_25 pb_5">
                                          <div>
                                              <div class="fs_24 fm-ubt pb_10">
                                                  <a class="t_d_n c_blu hc_red" href="{{ route("member.single", $member["id"]) }}">{{ $member["name"] }}</a>
                                              </div>
                                              <div class="fm-ubt4 pb_10">{{ $member["position"] }}</div>
                                          </div>
                                          <div>
                                              <div class="ovfy_h" style="height: 100px;">
                                                  <div class="fm-popp ">{{ $member["description"] }}</div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="t_a_r pr_20 pb_10">
                                       <a href="{{ route("member.single", $member["id"]) }}" class="t_d_n pb_5 pt_5 c_blu hc_red h_25 box-s1 bc_whi b_r_3 lh_25 fs_11 fm-popp">
                                           <span class="pr_10 pl_10">Read more&nbsp;<span class="fa fa-angle-double-right"></span></span>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
       <div class="pt_20">
           @include("components.section", ["section"=>"Our Operation Team"])
           <div class="pb_20 pt_20">
               <div class="rowc">
                   @foreach($operations as $opt)
                       <div class="xl-7x lg-2 md-2 sm-4 fx_6">
                           <div class="pr_10 pl_10 pb_20">
                               <div class="pb_10">
                                   <div>
                                       <img class="wp_100 box-s1" src="{{ asset("photo/".$opt["photo"]."_thumb.jpg") }}" alt="">
                                   </div>
                                   <div class="t_a_c b">
                                       <div class="fm-ubt fs_16">{{ $opt["name"] }}</div>
                                       <div class="fm-popp fs_12">{{ $opt["position"] }}</div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach
               </div>
           </div>
       </div>
   </div>
@endsection
