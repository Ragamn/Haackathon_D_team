<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/cook_register.css') }}">
</head>
<body>
  <img src="../../img/cookgod_logo.png" alt="cookgod">
  <p>料理登録</p>
  <form action="">
    メニュー名<br>
    <input type="text">

    <!-- フォームで選択した画像 -->
    <img id="img-preview" accept="image/*" style="max-width: 300px; max-height: 300px; display: none;">

    <div class="buttons">
      <!-- フォーム -->
      <input type="file" name="logo" id="file-input" accept=".jpg, .jpeg, .png, .gif">
    </div>
    <input type="submit" id="submit">
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
