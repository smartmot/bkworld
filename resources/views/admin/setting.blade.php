@extends("admin.layouts/".config("settings.admin"))

@section("content")
    <div class="fm-popp">
        <div>
            @foreach(config("settings") as $key => $value)
                <div>
                    <div class="mb_10 mt_5 oln_w bc_whi pd-5x15">
                        <a class="color_5 hcolor_4 acolor_4 t_d_n t_t_c" href="{{ route("setting.item", $key) }}">{{ $key }}</a>
                    </div>
                </div>
            @endforeach
                <div>
                    <div class="mb_10 mt_5 oln_w bc_whi pd-5x15">
                        <a class="color_5 hcolor_4 acolor_4 t_d_n t_t_c" href="{{ route("setting.edit", 1) }}">Featured Videos 1</a>
                    </div>
                </div>
                <div>
                    <div class="mb_10 mt_5 oln_w bc_whi pd-5x15">
                        <a class="color_5 hcolor_4 acolor_4 t_d_n t_t_c" href="{{ route("setting.edit", 2) }}">Featured Videos 2</a>
                    </div>
                </div>
        </div>
    </div>
@endsection
