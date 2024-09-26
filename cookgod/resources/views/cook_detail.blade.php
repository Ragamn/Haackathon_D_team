<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/detail.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>detail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
  <header>
      @include('layouts.header')
    </header>
    <div class="all">
    <h1>{{$arrange->name}}</h1>
    <div class="detail_img"><img src="{{asset('storage/img/'.$arrange->image_path)}}" alt="" /></div>
    <h2>材料</h2>
    @foreach($materials as $item)
    <div class="material">
      <ul>
        <li>{{$item->material_name}}</li>
        <li>{{$item->amount}}</li>
      </ul>
    </div>
    @endforeach
    <hr />
    <h2>作り方</h2>
    @foreach($processes as $item)
    <div class="make_text">
      <p>{{$item->process}}</p>
    </div>
    @endforeach
    <hr />
    <h2>説明、補足</h2>
    <div class="others_text">
      <p>{{$arrange->description}}</p>
    </div>
    </div>
  </body>
</html>
