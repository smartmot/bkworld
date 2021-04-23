@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("member.index") }}">Back</a>
@endsection

@section("content")
    <div class="pt_5">
        <form action="{{ route("member.update", $member["id"]) }}" method="post" spellcheck="false" autocomplete="off">
            @csrf
            @method("put")
            <input type="hidden" name="photo" value="{{ old("photo") == "" ? $member["photo"] : old("photo") }}">
            <div class="rowc">
                <div class="xl-6 lg-6 md-12 sm-12 fx_12 us_n">
                    <div class="pr_5 pl_5 pb_10">
                        <div class="fm-popp lh_28 fs_16">Photo
                            @error("photo")
                            <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                            @enderror
                        </div>
                        <div class="p-r">
                            <img id="newimg" class="wp_100 box-s1" src="{{ old("photo") == "" ? asset("photo/".$member["photo"].".jpg") : (old("photo") == $member["photo"] ? asset("photo/".$member["photo"].".jpg") : old("photo")) }}" alt="">
                            <div class="p-a" style="right: calc(50% - 25px); top: calc(50% - 25px)">
                                <label for="thumb" class="fs_30 ds_b w_50 lh_50 h_50 t_a_c color_5 hcolor_4 acolor_4 csr-p">
                                    <span class="fa fa-camera"></span>
                                </label>
                            </div>
                        </div>
                        <div class="t_a_c pt_4 fs_13 fm-popp color_4" id="error"></div>
                    </div>
                </div>
                <div class="xl-6 lg-6 md-12 sm-12 fx_12">
                    <div class="pr_5 pl_5">
                        <div class="pb_5">
                            <div class="fm-popp lh_28 fs_16">Name
                                @error("name")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="name" value="{{ old("name") == "" ? $member["name"] : old("name") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Name">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_28 fs_16">Position
                                @error("position")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="position" value="{{ old("position") == "" ? $member["position"] : old("position") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Position">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_28 fs_16">Team
                                @error("type")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ "Invalid" }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <select name="type" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3">
                                    <option value="">Select Team</option>
                                    <option value="management"{{ old("type") == "management" ? " selected" : ($member["type"] == "management" ? " selected" : "") }}>Management</option>
                                    <option value="operation"{{ old("type") == "operation" ? " selected" : ($member["type"] == "operation" ? " selected" : "") }}>Operation</option>
                                </select>
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_28 fs_16">Facebook
                                @error("facebook")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="facebook" value="{{ old("facebook") == "" ? $member["facebook"] : old("facebook") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Facebook">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_28 fs_16">Instagram
                                @error("instagram")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="instagram" value="{{ old("instagram") == "" ? $member["instagram"] : old("instagram") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="instagram">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_28 fs_16">YouTube
                                @error("youtube")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="youtube" value="{{ old("youtube") == "" ? $member["youtube"] : old("youtube") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="YouTube">
                            </label>
                        </div>
                        <div class="pb_5">
                            <div class="fm-popp lh_28 fs_16">Twitter
                                @error("twitter")
                                <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                                @enderror
                            </div>
                            <label class="ds_f p-r">
                                <input type="text" name="twitter" value="{{ old("twitter") == "" ? $member["twitter"] : old("twitter") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Twitter">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="fx_12 pb_5">
                    <div class="pr_5 pl_5">
                        <label class="fm-popp fs_16 pb_5 ds_b" for="description">
                            Description
                            @error("description")
                            <span class="fs_14">&nbsp;:<span class="color_4"> {{ $message }}</span></span>
                            @enderror
                        </label>
                        <div class="ds_f p-r">
                            <textarea id="description" name="description" rows="5" class="input-1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3 box-s1" placeholder="Description">{{ old("description") == "" ? $member["description"] : old("description") }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div class="t_a_r pr_5 pl_5 pt_15 pb_5">
                            <button class="oln_n bd_n pd-5x20 box-s1 b_r_3 csr-p fm-popp fs_16 color_1 bcolor_5 hbcolor_4 abcolor_4" type="submit">Update Member</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <form id="coverf" action="javascript:void(0)" method="post" enctype="multipart/form-data">
        @csrf
        @method("post")
        <input id="thumb" onchange="$('#coverf').submit()" type="file" name="mphoto" accept="image/jpeg" hidden>
        <input type="reset" hidden>
    </form>
    @error("alert")
    @include("admin.components.alert")
    @enderror
@endsection

@section("script")
    <script>
        $("#coverf").submit(function () {
            let upload = new FormData(this);
            axios.post('{{route("member.photo")}}', upload).then(response=>{
                $("#coverf").find("input[type='reset']").click();
                let data = response.data;
                if (!data.error){
                    $("input[name='photo']").attr("value",'{{ asset("photo").'/' }}'+data.url);
                    $("#error").text("");
                    $("#newimg")
                        .attr("src", '{{ asset("photo").'/' }}'+data.url)
                        .fadeIn();
                }else{
                    $("#error").text('Choose 6:7 ratio image maximum size 5MB');
                }
            });
        });
    </script>
@endsection
