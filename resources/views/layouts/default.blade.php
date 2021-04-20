<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="@yield("description")" />
    <meta name="keywords" content="@yield("keywords")" />

    <title>@yield("title", config("settings.name"))</title>

    <meta property="og:image" content="{{ asset("bkworld.svg") }}" />
    <meta property="og:title" content="{{ config("settings.name") }}" />
    <meta property="og:url" content="{{ asset("") }}" />
    <meta property="og:description" content="@yield("description")" />
    <meta property="og:type" content="website" />

    <link rel="shortcut icon" href="{{ asset("bkworld.svg") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ route("soft", "css.theme_colors?ver=".config("settings.color_ver")) }}}" type="text/css">
</head>
<body>
@yield("header")


@yield("content")

</body>
</html>
