<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿画面</title>
    <link rel="stylesheet" href="{{ asset('css/arrange_confirm.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="center">
        <img src="../../img/cookgod_logo.png" alt="cookgod" id="topLogo">
    </div>
    <p id="toptext">投稿画面</p>
    <div id="confirm">
        <div class="flex-row">
        <span class="tx-md">メニュー名</span><br>
        <p class="cookname">{{session('name')}}
        </p>
        <span class="tx-md">選択した料理</span><br>
        <p class="cookname">{{session('cookking_name')}}
        </p>
    </div>
    <img class="cookimg" src='{{ asset("storage/tmp/" . $filename ) }}' alt="Uploaded Image">

    
<div class="flex-row">
        <span class="tx-md">材料</span><br>
        <p class="cookname">
            @if(session('material') && session('amount'))
                @foreach(session('material') as $index => $material)
                    {{ $material }}: {{ session('amount')[$index]}}<br>
                @endforeach
            @endif
        </p>
        
</div>
        <div class="flex-row">
        <span class="tx-md">作り方・手順</span><br>
        <p class="cookname">
            @if(session('step'))
                @foreach(session('step') as $step)
                    {{ $step }}<br>
                @endforeach
            @endif
        </p>
</div>
<div class="flex-row">
        <span class="tx-md">説明補足</span><br>
        <p class="cookname">{{session('description')}}
</div>
    </div>

    
    <div class="flex button-div">

        <div class="w-50 center">
            <a href="/arrange_register" class="back">戻る</a>
        </div>

        <div class="w-50 center">
            <a href="/arrange_create" class="submit"id="submit-button">投稿</a>
        </div>
</div>
<script>
  document.getElementById('submit-button').addEventListener('click', function() {
    localStorage.removeItem('stepCount');
    localStorage.removeItem('inputCount');
  });
</script>
</body>
</html>
