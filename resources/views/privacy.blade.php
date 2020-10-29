<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 30px;
            margin-top: 35px;
            padding: 25px;
            text-align: justify;
        }

    </style>
</head>
<body>
<div class=" position-ref full-height">

    <div class="content">
        <div class="title">
            {!! \App\Models\Setting::where('key','terms')->first()->value_ar !!}
        </div>
    </div>
</div>
</body>
</html>
