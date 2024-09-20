<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <html lang="ja">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>料理表示ページ</title>
      <link rel="stylesheet" href="{{ asset('css/header.css') }}">
      <link rel="stylesheet" href="{{asset('css/list.css')}}" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
      
    <header>
      @include('layouts.header')
    </header>
    <div class="all">
      <h1>料理一覧</h1>
      <div class="container">
        <div class="image-section">
          <img src="からあげ.png" alt="料理の写真" />
        </div>
        <div class="text-section">
          <div class="title-row">
            <h1 class="title">料理の題名</h1>
            <button class="bookmark">&#10084;</button>
          </div>
          <div class="description">
            <p>
              ここに料理の詳細や説明文が入ります。たとえば、材料や作り方などが記載されます。
            </p>
            <p>さらに追加の情報をここに書くこともできます。</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="image-section">
          <img src="からあげ.png" alt="料理の写真" />
        </div>
        <div class="text-section">
          <div class="title-row">
            <h1 class="title">料理の題名</h1>
            <button class="bookmark">&#10084;</button>
          </div>
          <div class="description">
            <p>
              ここに料理の詳細や説明文が入ります。たとえば、材料や作り方などが記載されます。
            </p>
            <p>さらに追加の情報をここに書くこともできます。</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="image-section">
          <img src="からあげ.png" alt="料理の写真" />
        </div>
        <div class="text-section">
          <div class="title-row">
            <h1 class="title">料理の題名</h1>
            <button class="bookmark">&#10084;</button>
          </div>
          <div class="description">
            <p>
              ここに料理の詳細や説明文が入ります。たとえば、材料や作り方などが記載されます。
            </p>
            <p>さらに追加の情報をここに書くこともできます。</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="image-section">
          <img src="からあげ.png" alt="料理の写真" />
        </div>
        <div class="text-section">
          <div class="title-row">
            <h1 class="title">料理の題名</h1>
            <button class="bookmark">&#10084;</button>
          </div>
          <div class="description">
            <p>
              ここに料理の詳細や説明文が入ります。たとえば、材料や作り方などが記載されます。
            </p>
            <p>さらに追加の情報をここに書くこともできます。</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="image-section">
          <img src="からあげ.png" alt="料理の写真" />
        </div>
        <div class="text-section">
          <div class="title-row">
            <h1 class="title">料理の題名</h1>
            <button class="bookmark">&#10084;</button>
          </div>
          <div class="description">
            <p>
              ここに料理の詳細や説明文が入ります。たとえば、材料や作り方などが記載されます。
            </p>
            <p>さらに追加の情報をここに書くこともできます。</p>
          </div>
        </div>
      </div>
      </div>
      <script src="{{asset('js/list.js')}}"></script>
    </body>
  </html>
</html>
