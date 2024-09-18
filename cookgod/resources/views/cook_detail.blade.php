<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/detail.css')}}" />
    <title>detail</title>
  </head>
  <body>
  <header>
      @include('layouts.header')
    </header>
    <div class="all">
    <h1>からあげModoKing</h1>
    <div class="detail_img"><img src="からあげ.png" alt="" /></div>
    <h2>材料</h2>
    <div class="material">
      <ul>
        <li>鶏肉</li>
        <li>500g</li>
      </ul>
    </div>
    <div class="material">
      <ul>
        <li>小麦粉</li>
        <li>50g</li>
      </ul>
    </div>
    <div class="material">
      <ul>
        <li>油</li>
        <li>1L</li>
      </ul>
    </div>
    <hr />
    <h2>作り方</h2>
    <div class="make_text">
      <p>油を鍋に注ぎ温める</p>
    </div>
    <div class="make_text">
      <p>鶏肉に小麦粉をまぶす</p>
    </div>
    <div class="make_text">
      <p>油で揚げる</p>
    </div>
    <hr />
    <h2>説明、補足</h2>
    <div class="others_text">
      <p>特になし</p>
    </div>
    </div>
  </body>
</html>
