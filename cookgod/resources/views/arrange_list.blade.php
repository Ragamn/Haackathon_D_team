<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>料理表示ページ</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/list.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('img').forEach(function(element) {
        element.addEventListener('click', function() {
          const arrangeId = this.getAttribute('data-id');
          window.location.href = `/detail?id=${arrangeId}`;
        });
      });
    });
  </script>
    <style>
    .clickable-img {
        cursor: pointer; /* クリック可能にするためのスタイル */
    }
    </style>
</head>
<body>
  <header>
    @include('layouts.header')
  </header>
  <div class="all">
    <?php
$arrange_id = $_GET['id'] ?? null;
?>
<div class="registration-container">
    <h1 class="registration-text">
    @if(isset($cooks))
      {{$cooks->name}}アレンジレシピ
    @else
      アレンジレシピ
    @endif
  </h1>
  <button class="registration-button" onclick="window.location.href='/arrange_register?id=<?php echo $arrange_id; ?>'">レシピ投稿</button>
</div>
    
    @foreach($arranges as $item)
    <div class="container item" data-id="{{$item->arrange_id}}" data-name="{{$item->name}}" data-description="{{$item->description}}" data-image-path="{{$item->image_path}}">
      <div class="image-section">
        <img class="item clickable-img" data-id="{{$item->arrange_id}}" src="{{ asset('storage/img/'.$item->image_path) }}" alt="料理の写真" />
      </div>
      <div class="text-section">
        <div class="title-row">
          <h1 class="title">{{ $item->name }}</h1>
          <button class="bookmark save-button">&#10084;</button>
        </div>
        <div class="description">
          <p>{{ $item->description }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
      <script src="{{asset('js/list.js')}}"></script>
      <script src="{{asset('js/favorite.js')}}"></script>
    </body>
  </html>
</html>
