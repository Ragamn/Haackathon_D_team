<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>料理表示ページ</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/favorite.css') }}">
  <style>
    img {
      cursor: pointer; /* クリック可能にするためのスタイル */
    }
  </style>
</head>
<body>
  <header>
    @include('layouts.header')
  </header>
  <div class="all">
    <h1>お気に入り</h1>
    <div id="favorites-container">
      <!-- ここにlocalStorageから取得したお気に入りのアイテムが表示されます -->
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const favoritesContainer = document.getElementById('favorites-container');

      // お気に入りのアイテムを表示する関数
      const displayFavorites = () => {
        favoritesContainer.innerHTML = ''; // コンテナをクリア
        const favorites = JSON.parse(localStorage.getItem('favorites')) || [];

        favorites.forEach(item => {
          const containerDiv = document.createElement('div');
          containerDiv.classList.add('container');

          const imageSectionDiv = document.createElement('div');
          imageSectionDiv.classList.add('image-section');
          const img = document.createElement('img');
          img.src = 'storage/img/' + item.imagePath; // 画像のパスを適宜変更
          img.alt = '料理の写真';
          img.dataset.id = item.id; // 画像にIDを設定
          imageSectionDiv.appendChild(img);

          const textSectionDiv = document.createElement('div');
          textSectionDiv.classList.add('text-section');

          const titleRowDiv = document.createElement('div');
          titleRowDiv.classList.add('title-row');
          const h1 = document.createElement('h1');
          h1.classList.add('title');
          h1.textContent = item.name;
          const button = document.createElement('button');
          button.classList.add('bookmark');
          button.innerHTML = '&#10084;';
          button.dataset.id = item.id; // ボタンにIDを設定
          button.dataset.name = item.name; // ボタンに名前を設定
          button.dataset.description = item.description; // ボタンに説明を設定
          button.dataset.imagePath = item.imagePath; // ボタンに画像パスを設定

          // localStorageに存在するアイテムの場合、ボタンの色を赤に設定
          if (favorites.some(fav => fav.id === item.id)) {
            button.classList.add('active');
          }

          titleRowDiv.appendChild(h1);
          titleRowDiv.appendChild(button);

          const descriptionDiv = document.createElement('div');
          descriptionDiv.classList.add('description');
          const p1 = document.createElement('p');
          p1.textContent = item.description;
          descriptionDiv.appendChild(p1);

          textSectionDiv.appendChild(titleRowDiv);
          textSectionDiv.appendChild(descriptionDiv);

          containerDiv.appendChild(imageSectionDiv);
          containerDiv.appendChild(textSectionDiv);

          favoritesContainer.appendChild(containerDiv);

          // ボタンのクリックイベントを設定
          button.addEventListener('click', (event) => {
            const item = {
              id: event.target.dataset.id,
              name: event.target.dataset.name,
              description: event.target.dataset.description,
              imagePath: event.target.dataset.imagePath
            };

            // localStorageから現在のfavoritesを取得
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

            // アイテムが既にfavoritesに存在するか確認
            const index = favorites.findIndex((fav) => fav.id === item.id);

            if (index === -1) {
              // アイテムが存在しない場合、追加
              favorites.push(item);
              localStorage.setItem('favorites', JSON.stringify(favorites));
              event.target.classList.add('active'); // ボタンの色を赤にする
            } else {
              // アイテムが存在する場合、削除
              favorites.splice(index, 1);
              localStorage.setItem('favorites', JSON.stringify(favorites));
              event.target.classList.remove('active'); // ボタンの色を灰色にする
            }

            // 表示を更新
            displayFavorites();
          });

          // 画像のクリックイベントを設定
          img.addEventListener('click', (event) => {
            const id = event.target.dataset.id;
            window.location.href = `/detail?id=${id}`;
          });
        });
      };

      // 初期表示
      displayFavorites();
    });
  </script>
</body>
</html>
