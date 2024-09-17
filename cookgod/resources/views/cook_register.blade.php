<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/cook_register.css') }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
  <div class="center">
    <img src="../../img/cookgod_logo.png" alt="cookgod">
  </div>
  <p>料理登録</p>
  <form action="">
    <span class="tx-md">メニュー名</span><br>
    <input name="name" id="name" type="text">

    <span class="tx-md">写真</span><br>
    <!-- フォームで選択した画像 -->
    <img id="img-preview" accept="image/*" style="max-width: 300px; max-height: 300px; display: none;">

    <div class="buttons">
      <!-- フォーム -->
      <input type="file" name="img" id="file-input" accept=".jpg, .jpeg, .png, .gif">
    </div>
    <div class="center"><input type="submit" id="submit" value="投稿"></div>
  </form>

  <!-- 画像プレビューjs -->
  <script>
    document.getElementById('file-input').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const imgPreview = document.getElementById('img-preview');
          imgPreview.src = e.target.result;
          imgPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    });
  </script>

</body>
</html>
