<textarea rows="8" class="input-4 b_r_3 wp_100 pd-10x15 ph-tt_c" type="text" name="{{ request("setting") }}" placeholder="{{ request("setting") }}">{{ old(request("setting")) == "" ? config("settings.".request("setting")) : old(request("setting")) }}</textarea>
@section("script")
    <script type="text/javascript">
        $("#ajx").submit(function (e){
            var data = {
                _method:"put",
                _token:"{{ csrf_token() }}",
                "{{ request("setting") }}": _e.n('{{ request("setting") }}').value,
            }
            axios.put("{{ route("setting.item_update", request("setting")) }}", data)
            .then(response=>{

            });
        });
    </script>
@endsection
