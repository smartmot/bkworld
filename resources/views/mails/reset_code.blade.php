<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        body{margin: 0px;padding: 0px; position: relative;}
        * { padding: 0; margin: 0; }
        html, body {
            min-height: 100% !important;
            height: 100%;
        }
        .cwm {width: 100%;margin-right: auto;margin-left: auto;}
        @media (min-width: 576px) {
            .cwm {max-width: 100%;}
        }
        @media (min-width: 768px) {
            .cwm {max-width: 600px;}
        }
        @media (min-width: 992px) {
            .cwm {max-width: 600px;}
        }
        @media (min-width: 1200px) {
            .cwm {max-width: 600px;}
        }
        .c_official2 {color: #E30913;}
        .c_official {color: #005A81;}
        .bc_official {background-color: #005A81;}
        .bc_official2 {background-color: #E30913;}
        .c_4txt{color: white;}
        .bc_4txt{background-color: white;}
        .rowc {display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;}
        .mail-body-style{
            width: 100% !important;
            background-color: red;
        }
        .style-padding-10{
            padding: 10px;
        }
        .ccasasas{
            padding: 5px 18px 5px 18px;
            background-color: #faf7f7;
            color: black;
            outline: 1px solid #a5a5a5;
        }
    </style>
</head>
<body>
<div class="" style="max-width: 320px; min-width: 300px;margin: 0px auto">
    <div class="style-padding-10">
        <div class="rowc">
            <div><img style="height: 30px;" src="{{ asset("bkworld.svg") }}" alt="" /></div>
            <div class="c_official" style="line-height: 30px; padding-left: 10px; font-size: 18px;font-weight: bold">
                <a href="{{ route("home") }}" style="text-decoration: none" class="c_official">{{ config("settings.name") }}</a>
            </div>
        </div>
        <div style="padding-left: 5px; padding-right: 5px;">
            <div style="height: 6px;width: 100%; border-bottom: 1px solid #d7d7d7"></div>
        </div>
        <div style="line-height: 24px; padding: 10px; font-size: 16px;color: black;">
            <div style="padding-top: 10px;">
                Hello <b>{{ $name }}</b>,
            </div>
            <div style="margin: 10px 0">
                We received a request to reset your password.
            </div>
            <div>
                Here is password reset code :
            </div>
            <div style="margin: 10px 0;">
                <div style="width: 100px; margin: 0 auto; height: 30px; line-height: 30px; text-align: center; background-color: #d4d4d4;">{{ $code }}</div>
            </div>
            <div>
                Thanks, <br/>
                {{ config("settings.name") }}
            </div>
        </div>
        <div style="padding-left: 5px; padding-right: 5px;">
            <div style="height: 6px;width: 100%; border-bottom: 1px solid #d7d7d7"></div>
        </div>
        <div style="font-size: 12px; padding: 10px;color: black;">
            <ul style="margin: 0;padding: 0 10px;">
                <li>
                    <a style="color: blue;text-decoration: none;" href="{{ route("home") }}">{{ config("settings.website") }}</a>
                </li>
                <li>{{ config("settings.address") }}</li>
                <li>{{ config("settings.tel") }}</li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
