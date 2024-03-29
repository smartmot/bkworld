<!doctype html>
<html lang="en">
<div style="max-width: 320px; min-width: 300px;margin: 0px auto">
    <div style="padding-top: 10px;">
        <div style="display: flex;padding: 0 5px;">
            <div style="height: 30px; width: 41.7px;"><img style="height: 30px; width: 41.7px;" src="{{ asset("bkworld.jpg") }}" alt=""></div>
            <div style="line-height: 30px; padding-left: 10px; font-size: 18px;font-weight: bold;">
                <a href="{{ route("home") }}" style="text-decoration: none; color: black;">{{ config("settings.name") }}</a>
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
</html>
