@extends("admin.layouts.default")

@section("head_link")
    <a class="fm-ubt4 fs_16 pr_10 pl_10 pt_3 pb_4 t_d_n color_1 b_r_3 bcolor_5 hbcolor_4 abcolor_4 box-s1" href="{{ route("page.index") }}">Back</a>
@endsection

@section("content")
<div>
    <div class="pt_10">
        <form action="{{ route("page.store") }}" method="post" spellcheck="false" autocomplete="off">
            @csrf
            @method("post")
            <div>
                <label class="ds_f p-r">
                    <input type="text" name="title" value="{{ old("title") }}" class="input-1 box-s1 fm-popp wp_100 pd-10x15 fs_16 oln_n bd_n b_r_3" placeholder="Page title">
                    @error("title")
                    <span class="p-a b-9 ds_b pr_10 pl_10 bcolor_1 ml_20 b_r_5 fm-popp fs_14 color_4">{{ $message }}</span>
                    @enderror
                </label>
            </div>
        </form>
    </div>
</div>
@endsection
