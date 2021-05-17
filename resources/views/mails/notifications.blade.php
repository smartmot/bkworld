<!doctype html>
<html lang="en">
<div>
    <div style="max-width: 320px; min-width: 290px; margin: 0 auto; border-radius: 6px; background-color: #f1f1f1; margin-top: 10px;">
        <div style="padding: 15px 20px; background-color: #a50000; color: white; border-radius: 6px 6px 0 0;">
            <div style="font-size: 18px;font-family: Arial">New message (1)</div>
        </div>
        <div style="padding: 10px 20px; text-align: center; font-family: Arial; font-size: 16px;color: black;">
            You have 1 new message <br/>from <span style="color: #0101af;">{{ $email }}</span>
        </div>
        <div style="padding-bottom: 20px; padding-top: 10px; text-align: center;">
            <a style="text-decoration: none; padding: 5px 15px; color: #a50000; border-radius: 5px;border: 1px solid #a50000" href="{{ route("message.index") }}">Check Out</a>
        </div>
    </div>
</div>
</html>
