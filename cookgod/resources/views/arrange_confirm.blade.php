<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿画面</title>
    <link rel="stylesheet" href="{{ asset('css/arrange_confirm.css') }}">
</head>
<body>
<div class="center">
        <img src="../../img/cookgod_logo.png" alt="cookgod" id="topLogo">
    </div>
    <p id="toptext">投稿画面</p>
    <div id="confirm">
        <div class="flex-row">
        <span class="tx-md">{{session('name')}}</span><br>
        <p class="cookname">{{session('cookname')}}
        </p>

</div>
<div class="flex-row">
        <span class="tx-md">{{session('material')}}</span><br>
        <p class="cookname">{{session('amount')}}</p>
</div>
        <div class="flex-row">
        <span class="tx-md">作り方・手順</span><br>
        <p class="cookname">{{session('step')}}
パン粉を準備しておく。

2
ささみの筋を取る。

3
ささみを開いてチーズを挟む。

4
ドロをつけ、パン粉をつけて揚げる。</p>
</div>
<div class="flex-row">
        <span class="tx-md">説明補足</span><br>
        <p class="cookname">{{session('description')}}</p>
</div>
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