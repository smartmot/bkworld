@extends("layouts.default")

@section("content")
   <div class="cw">
       <div class="rowc">
           @foreach($members as $member)
               <div class="xl-6 lg-6 md-6 sm-12 fx_12">
                   <div class="pl_20 pr_20 pt_10 pb_10">
                       <div>
                           <div class="ds_f">
                               <div class="w_200">
                                   <img class="wp_100" src="{{ asset("photo/".$member["photo"].".jpg") }}" alt="">
                               </div>
                               <div class="fx">
                                   <div class="pr_10 pl_10">
                                       <div>{{ $member["name"] }}</div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
@endsection
