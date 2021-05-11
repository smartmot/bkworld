@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("admin.index") }}">Back</a>
@endsection

@section("content")
    <div>
        <div class="rowc pt_10">
            <div class="xl-4 lg-4 md-12 sm-12 fx_12">
                <div class="mb_10 pr_10 pl_10">
                    @if(auth()->user()->photo == "")
                        <img class="wp_100 box-s1" src="{{ asset("icon/member.svg") }}" alt="">
                    @else
                        <img class="wp_100 box-s1" src="{{ asset("photo/".auth()->user()->photo.".jpg") }}" alt="">
                    @endif
                </div>
            </div>
            <div class="xl-8 lg-8 md-12 sm-12 fx_12">
                <form action="{{ route("admin.update") }}" method="post">
                    @method("put")
                    @csrf
                    <div class="pr_10 pl_10">
                        <div class="bcolor_1 lh_40 h_40 ds_f">
                            <div class="w_40 t_a_c"><span class="fa fa-user"></span></div>
                            <input class="input-2 flx pr_10 pl_10" type="text" name="name" value="{{ old("name") == "" ? $user->name : old("name") }}">
                        </div>

                        <div class="mt_10 bcolor_1 lh_40 h_40 ds_f">
                            <div class="w_40 t_a_c"><span class="fa fa-envelope"></span></div>
                            <input class="input-2 flx pr_10 pl_10" type="email" name="email" value="{{ old("email") == "" ? $user->email : old("email") }}">
                        </div>

                        <div class="mt_10 bcolor_1 lh_40 h_40 ds_f">
                            <div class="w_40 t_a_c"><span class="fa fa-birthday-cake"></span></div>
                            <input class="input-2 flx pr_10 pl_10" type="date" name="birth_date" value="{{ old("birth_date") == "" ? $user->birth_date : old("birth_date") }}">
                        </div>

                        <div class="mt_10 bcolor_1 lh_40 h_40 ds_f">
                            <div class="w_40 t_a_c"><span class="fa fa-venus-mars"></span></div>
                            <select class="input-2 flx pr_10 pl_10" name="gender">
                                <option>Gender</option>
                                <option value="male"{{ $user->gender == "male" ? " selected" : (old("gender") == "male" ? " selected":"") }}>Male</option>
                                <option value="female"{{ $user->gender == "female" ? " selected" : (old("gender") == "female" ? " selected":"") }}>Female</option>
                            </select>
                        </div>

                        <div class="mt_9 bcolor_1 lh_40 h_40 ds_f">
                            <div class="w_40 t_a_c"><span class="fa fa-lock"></span></div>
                            <div class="fm-popp t_t_c fs_14" title="You can't not edit your role">{{ $user->role }}</div>
                        </div>

                        <div class="mt_10 t_a_r">
                            <button class="pr_20 pl_20 fs_15 h_35 bcolor_5 hbcolor_4 abcolor_4 box-s1 color_1 csr-p us_n oln_n bd_n " type="submit">
                                <span class="fa fa-save"></span><span>&nbsp;&nbsp;Save</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
