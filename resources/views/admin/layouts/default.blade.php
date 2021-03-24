<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", config("settings.name"))</title>
    <link rel="shortcut icon" href="http://bkworld.proj/bkworld.svg">
    <link rel="stylesheet" href="{{ route("soft", "css.colors?ver=".config("settings.color_ver")) }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css">
</head>
<body>
<div class="wp_100 h_70 p-r">
    <div class="wp_100 h_70 p-f t-0 r-0 bcolor_5">
        <div class="cw">
            <div class="pr_10 pl_10 pt_5 pb_5">
                <div class="w_124 h_60">
                    <a href="{{ route("admin.index") }}" class="ds_b t_d_n">
                        <img class="h_60" src="{{ asset("bkworld_logo.svg") }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
