@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("page.index") }}">Back</a>
@endsection

@section("content")
    <div>
        <div class="pt_10">
            <form action="{{ route("page.update", $page["id"]) }}" method="post" spellcheck="false" autocomplete="off">
                @csrf
                @method("put")
                <div class="pb_15">
                    <label class="ds_f p-r">
                        <input type="text" name="title" value="{{ old("title") == "" ? $page["title"] : old("title") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Page title">
                    </label>
                    @error("title")
                    <div class="t_a_r">
                        <span class="pr_15 pl_15 bcolor_4 fm-popp fs_14 color_1">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="pb_15">
                    <label class="ds_f p-r">
                        <input type="text" name="slug" value="{{ old("slug") == "" ? $page["slug"] : old("slug") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3 dbcolor_1" placeholder="Slug">
                        <span class="p-a t_8 l_14 fm-popp color_4 fs_17">www.bkworld.asia/c/</span>
                    </label>
                    @error("slug")
                    <div class="t_a_r">
                        <span class="pr_15 pl_15 bcolor_4 fm-popp fs_14 color_1">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="pb_15">
                    <label class="ds_f p-r">
                        <input type="text" name="keyword" value="{{ old("keyword") == "" ? $page["keyword"] : old("keyword") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Keyword">
                    </label>
                    @error("keyword")
                    <div class="t_a_r">
                        <span class="pr_15 pl_15 bcolor_4 fm-popp fs_14 color_1">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="pb_15">
                    <label class="ds_f p-r">
                        <input type="text" name="description" value="{{ old("description") == "" ? $page["description"] : old("description") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Description">
                    </label>
                    @error("description")
                    <div class="t_a_r">
                        <span class="pr_15 pl_15 bcolor_4 fm-popp fs_14 color_1">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="pb_10">
                    <label class="ds_f p-r">
                        <textarea rows="8" name="content" placeholder="Content" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3">{{ old("content") == "" ? $page["content"] : old("content") }}</textarea>
                    </label>
                    @error("content")
                    <div class="t_a_r">
                        <span class="pr_15 pl_15 bcolor_4 fm-popp fs_14 color_1">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="t_a_r">
                    <button class="oln_n bd_n pd-5x20 box-s1 b_r_3 csr-p fm-popp fs_16 color_1 bcolor_5 hbcolor_4 abcolor_4" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
