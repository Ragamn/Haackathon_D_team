<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <style>
    .clickable-img {
        cursor: pointer; /* クリック可能にするためのスタイル */
    }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.clickable-img').forEach(function(img) {
        img.addEventListener('click', function() {
            const cookingId = this.closest('.flex-margin-child').getAttribute('data-id');
            window.location.href = `/cook_arrange?id=${cookingId}`;
        });
    });

    document.querySelectorAll('.clickable-img').forEach(function(img) {
        img.addEventListener('click', function() {
            const arrangeId = this.closest('.flex-margin-child.item').getAttribute('data-id');
            window.location.href = `/detail?id=${arrangeId}`;
        });
    });
});
  function redirectToDetail(arrangeId) {
    window.location.href = `/detail?id=${arrangeId}`;
  }
    </script>
</head>
<body>
  <header>
    @include('layouts.header')
  </header>
  <div class="container">
      <!-- 左側：1位 -->
      <div class="left"onclick="redirectToDetail({{ $top[0]->arrange_id }})">
        <h1>1位</h1>
        <img src="{{ asset('storage/img/'.$top[0]->image_path) }}" alt="1位の画像" />
        <p class="mesi">{{ $top[0]->name }}</p>
      </div>

      <!-- 右側：2位 -->
      <div class="right"onclick="redirectToDetail({{ $top[1]->arrange_id }})">
        <h1>2位</h1>
        <img src="{{ asset('storage/img/'.$top[1]->image_path) }}"  alt="2位の画像" />
        <p class="mesi">{{ $top[1]->name}}</p>
      </div>
    </div>

  <div id="content">
        <div class="inner">
            <a class="list-title" href="/cook_ranking">料理人気順</a>
            <div class="flex-margin">
            @foreach($cooks as $item)
                <div class="flex-margin-child" data-id="{{$item->cooking_id}}" id="cooking-item">
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

            <a class="list-title" href="/arrange_list">アレンジレシピ新着順</a>
            <div class="flex-margin">
                @foreach($arranges as $item)
                <div class="flex-margin-child item" id="arrange-item" data-id="{{$item->arrange_id}}" data-name="{{$item->name}}" data-description="{{$item->description}}" data-image-path="{{$item->image_path}}">
                    <div class="cookdiv">
                        <img class="clickable-img" src="{{ asset('storage/img/'.$item->image_path) }}" alt="">
                        <div class="flex">
                            <p class="name">{{ $item->name }}</p>
                            <button class="bookmark save-button">&#10084;</button>
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
  <script src="{{asset('js/list.js')}}"></script>
  <script src="{{asset('js/favorite.js')}}"></script>
</body>
</html>
