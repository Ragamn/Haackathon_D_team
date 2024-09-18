<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/cook_confirm.css') }}">
</head>
<body>
    <div class="center">
        <img src="../../img/cookgod_logo.png" alt="cookgod" id="topLogo">
    </div>
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