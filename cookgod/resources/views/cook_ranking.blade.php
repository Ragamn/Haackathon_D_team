<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/cook_ranking.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <style>
        .clickable-img {
            cursor: pointer; /* クリック可能にするためのスタイル */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.flex-margin-child').forEach(function(element) {
                element.addEventListener('click', function() {
                    const cookingId = this.getAttribute('data-id');
                    window.location.href = `/cook_arrange?id=${cookingId}`;
                });
            });
        });
    </script>
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
            <p class="list-title">料理人気順</p>
            <div class="flex-margin">
              @foreach($cooks as $item)
                <div class="flex-margin-child"data-id="{{ $item->cooking_id }}">
                    <div class="cookdiv">
                        <img class="clickable-img" src="{{ asset('storage/img/'.$item->image_path) }}" alt="">
                        <div class="flex">
                            <p class="name">{{ $item->name }}</p>
                        </div>
                        <p class="detail">
                            {{$item->description}}
                        </p>
                    </div>
                </div>
              @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
