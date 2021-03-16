<!DOCTYPE html>
<html>
<head>
    <style>
        .email {
            width: 100%;
            max-width: 570px;
            margin: auto;
            box-shadow: 0 2px 0 rgb(0 0 150 / 3%), 2px 4px 0 rgb(0 0 150 / 2%);
            background: #fff;
            padding: 30px;
        }

        .text-blue-color {
            color: #244062;
        }

        pre code {
            display: none;
            font-family: inherit;
            white-space: pre-wrap;
        }

        .email a {
            background: #274062;
            color: #FFF;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            vertical-align: middle;
            width: auto;
            min-width: 110px;
            text-align: center;
            margin-top: 10px;
            border: 0;
        }

    </style>
</head>
<body style="background-color: #edf2f7; margin: 50px auto;">
<div class="email">
    <div style="text-align: left;" class="text-blue-color">
        <strong>Hi {{ $user->name }},</strong>
    </div>
    @component('mail::button',['url' => $url])
        Your Login Link
    @endcomponent
</div>
</body>
</html>
