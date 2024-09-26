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
            document.getElementById('search-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const query = document.getElementById('search-query').value;
                fetch(`/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const cookList = document.getElementById('cook-list');
                        cookList.innerHTML = '';
                        data.forEach(item => {
                            const cookDiv = document.createElement('div');
                            cookDiv.classList.add('flex-margin-child');
                            cookDiv.setAttribute('data-id', item.cooking_id);
                            cookDiv.innerHTML = `
                                <div class="cookdiv">
                                    <img class="clickable-img" src="/storage/img/${item.image_path}" alt="">
                                    <div class="flex">
                                        <p class="name">${item.name}</p>
                                    </div>
                                </div>
                            `;
                            cookList.appendChild(cookDiv);
                        });
                    });
            });
        });
    </script>
</head>
<body>
    <header>
      @include('layouts.header')
    </header>
    <form class="form-container" id="search-form" action="" class="center">
        <input type="text" id="search-query" placeholder="料理名">
        <input type="submit"class="registration-button" value="検索">
    </form>
    <div id="content">
        <div class="inner">
            <p class="list-title">料理人気順</p>
            <div class="flex-margin" id="cook-list">
              @foreach($cooks as $item)
                <div class="flex-margin-child"data-id="{{ $item->cooking_id }}">
                    <div class="cookdiv">
                        <img class="clickable-img" src="{{ asset('storage/img/'.$item->image_path) }}" alt="">
                        <div class="flex">
                            <p class="name">{{ $item->name }}</p>
                        </div>
                    </div>
                </div>
              @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
