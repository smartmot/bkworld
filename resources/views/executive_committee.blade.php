@extends("layouts/".config("settings.theme"))

@section("content")
   <div class="cw">
       <div class="pt_20">
           <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
               <span>Our Management Team</span>
           </div>
           <div class="h_1 wp_100 bcolor_4"></div>
       </div>
       <div class="rowc">
           @foreach($members as $member)
               <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                   <div class="pl_20 pr_20 pt_20 pb_10">
                       <div class="">
                           <div class="rowc">
                               <div class="xl-4 lg-4 md-5 sm-12 fx_12">
                                   <img class="wp_100 box-s1" src="{{ asset("photo/".$member["photo"]."_thumb.jpg") }}" alt="">
                               </div>
                               <div class="xl-8 lg-8 md-7 sm-12 fx_12">
                                   <div class="p-r hp_100">
                                       <div class="p-a wp_100 b-0 r-0">
                                           <div class="pr_15 pl_15 pb_5">
                                               <div class="fs_24 fm-ubt">{{ $member["name"] }}</div>
                                               <div class="fm-ubt4">{{ $member["position"] }}</div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="rowc">
                               <div class="xl-4 lg-4 md-5 sm-12 fx_12"></div>
                               <div class="xl-8 lg-8 md-7 sm-12 fx_12" style="width: calc(100% - 200px)">
                                   <div class="pr_15 pl_15 pt_10 pb_15">
                                       <div class="ovfy_h" style="height: 100px;">
                                           <div class="fm-popp">{{ $member["description"] }}</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
       <div class="pt_20">
           <div class="t_a_c fm-ubt fs_26 c_blu t_t_c pb_20">
               <span>Our Operation Team</span>
           </div>
           <div class="pb_20">
               <div class="rowc">
                   @foreach($operations as $opt)
                       <div class="xl-7x lg-2 md-2 sm-4 fx_4">
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