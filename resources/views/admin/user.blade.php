@extends("admin.layouts/".config("settings.admin"))

@section("head_link")
    <a class="" href="{{ route("user.create") }}">Add new</a>
@endsection

