@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("user.create") }}">Add new</a>
@endsection

@section("content")
    <div>
        <div class="rowc">
            <div class="xl-6 lg-6">
                <div class="pr_10 pl_10">
                    <form action="{{ route("user.update", $user["id"]) }}" method="post" autocomplete="off">
                        @method("put")
                        @csrf

                        <label for="name" class="fm-popp fw_b">Full Name</label>
                        <div class="pb_10 ds_f">
                            <input onchange="$('#sname').html($(this).val())" class="wp_100 pd-5x15 oln_n bd_n fm-popp bcolor_1 color_5 box-s1 input-2" id="name" type="text" value="{{ old("name") == "" ? $user["name"] : old("name") }}" name="name" placeholder="Full name" required>
                        </div>

                        <label for="email" class="fm-popp fw_b">E-mail</label>
                        <div class="pb_10 ds_f">
                            <input onchange="$('#semail').html($(this).val())" class="wp_100 pd-5x15 oln_n bd_n fm-popp bcolor_1 color_5 box-s1 input-2" id="email" value="{{ old("email") == "" ? $user["email"] : old("email") }}" type="text" name="email" placeholder="E-mail" required>
                        </div>

                        <label for="role" class="fm-popp fw_b">Role</label>
                        <div class="pb_10 ds_f">
                            <select onchange="$('#srole').html($(this).val())" class="wp_100 pd-5x15 oln_n bd_n fm-popp bcolor_1 color_5 box-s1 input-2" id="role" name="role" required>
                                <option value="admin"{{ old("role") =="" ? ($user["role"] == "admin" ? " checked":"") : (old("role") == "admin" ? "checked" : "") }}>Admin</option>
                                <option value="editor"{{ old("role") =="" ? ($user["role"] == "editor" ? " checked":"") : (old("role") == "editor" ? "checked" : "") }}>Editor</option>
                                <option value="moderator"{{ old("role") =="" ? ($user["role"] == "moderator" ? " checked":"") : (old("role") == "moderator" ? "checked" : "") }}>Moderator</option>
                            </select>
                        </div>

                        <label class="fm-popp fw_b">Gender</label>
                        <div class="pb_10 fm-popp">
                            <label>
                                <input type="radio" name="gender" value="male" required{{ old("gender") == "" ? ($user["gender"] == "male" ? " checked" : ""): (old("gender") == "male" ? " checked" : "")}}> Male
                            </label>&nbsp;&nbsp;&nbsp;
                            <label>
                                <input type="radio" name="gender" value="female" required{{ old("gender") == "" ? ($user["gender"] == "female" ? " checked" : ""): (old("gender") == "female" ? " checked" : "")}}> Female
                            </label>
                        </div>

                        <div class="t_a_c pt_5">
                            <button class="oln_n bd_n bcolor_5 color_1 hbcolor_4 abcolor_4 pd-5x20 csr-p input-2">Update</button>
                        </div>
                    </form>
                    <div class="wp_100 h_10"></div>
                    <div class="wp_100 bdbtm_1_gra"></div>
                    <div class="pt_10 t_a_c">
                        <form action="{{ route("user.destroy", $user["id"]) }}" method="post">
                            @method("delete")
                            @csrf

                            <button class="oln_n bd_n bcolor_5 color_1 hbcolor_4 abcolor_4 pd-5x20 csr-p input-2">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="xl-6">
                <div class="pr_10 pl_10">
                    <div class="_0auto w_100 pt_10">
                        <img class="w_100 b_r_c" src="{{ asset("icon/member.svg") }}" alt="">
                    </div>
                    <div>
                        <div class="t_a_c fm-popp"><span id="sname" class="fw_b fs_16">{{ $user["name"] }}</span>(<span id="srole" class="t_t_c fs_14">{{ $user["role"] }}</span>)</div>
                        <div id="semail" class="t_a_c fs_16 fm-popp">{{ $user["email"] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
