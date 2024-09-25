<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cook_confirm.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        @include('layouts.header')
    </header>

    <p id="toptext">投稿内容確認</p>
    <div id="confirm">
        <span class="tx-md">料理名</span><br>
        <p class="cookname">{{session('name')}}</p>

        <img class="cookimg" src='{{ asset("storage/tmp/" . $filename ) }}' alt="Uploaded Image">
    </div>
    <div class="flex button-div">

        <div class="w-50 center">
            <a href="/cook_register" class="back">戻る</a>
        </div>

        <div class="w-50 center">
            <a href="/cook_create" class="submit">投稿</a>
        </div>

    </div>
</body>
</html>