<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/cook_ranking.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
    <header>
      @include('layouts.header')
    </header>
    <form action="" class="center">
        <input type="text" placeholder="料理名">
        <input type="submit" value="検索">
    </form>
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