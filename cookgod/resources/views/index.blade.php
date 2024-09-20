<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
  <header>
    @include('layouts.header')
  </header>

  <div class="container">
      <!-- 左側：1位 -->
      <div class="left">
        <h1>1位</h1>
        <img src="../../img/karaage.png" alt="1位の画像" />
        <p class="mesi">からあげ</p>
      </div>

      <!-- 右側：2位 -->
      <div class="right">
        <h1>2位</h1>
        <img src="../../img/karaage.png" alt="2位の画像" />
        <p class="mesi">麻婆豆腐</p>
      </div>
    </div>

  <div id="content">
        <div class="inner">
            <p class="list-title">人気順一覧</p>
            <div class="flex-margin">
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
            </div>

            <p class="list-title">新着順一覧</p>
            <div class="flex-margin">
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
                
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
                <div class="flex-margin-child">
                    <div class="cookdiv">
                        <img src="../../img/karaage.png" alt="">
                        <div class="flex">
                            <p class="name">からあげ</p>
                            <button class="bookmark">&#10084;</button>
                        </div>
                        <p class="detail">
                            ここに説明が入りますああああ
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script src="{{asset('js/list.js')}}"></script>
</body>
</html>