<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/cook_register.css') }}">
</head>
<body>
  <img src="" alt="">
  <h1>料理登録</h1>
  <form action="">
  <p>メニュー名</p>
    <div class="input_file">
      <div class="preview">
        <input accept="image/*" id="imgFile" type="file">
      </div>
      <p class="btn_upload">
        画像ファイルを選択してアップロード
      </p>
    </div>
    <input type="submit">
  </form>
  <script src="../js/cook_register.js"></script>
</body>
</html>
