<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset("bkworld.svg") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css?ver=").date("y.m.d.his") }}" type="text/css">
    <link rel="stylesheet" href="{{ route("soft", "css.theme_colors?ver=".config("settings.color_ver")) }}" type="text/css">
    <script src="{{ asset("js/app.js") }}"></script>
    <title>@yield("title")</title>
    @yield("asset")
</head>
<body>
@yield("content")
</body>
@yield("script")
</html>
