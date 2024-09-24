<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アレンジ画面</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('css/arrange_register.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    @include('layouts.header')
  </header>

  <div class="movable-container">
    <h1>アレンジ画面</h1>

    <form action="/arrange_confirm" method="post" enctype="multipart/form-data">
      @csrf
          <p>メニュー名</p>
          <input type="text" name="name" class="menu-input">
        <p>参考にした料理を選択してください。</p>
        <select name="cookname" class="wide-select">
          <option value="" selected>選択してください</option>
          @foreach($arrange as $item)
            <option value="{{ $item['cooking_id'] }}">{{ $item['name'] }}</option>
          @endforeach
        </select>

      <!-- フォームで選択した画像 -->
      <img id="img-preview" style="display: none;">


        <!-- フォーム -->
        <input type="file" name="img" id="file-input" class="centered-file-input" accept=".jpg, .jpeg, .png, .gif">

      <p>材料(1人前)</p>
      <div class="materials-container">
        <input type="text" id="name1" name="material[0]" class="material-input1" required size="10" />
        <input type="text" id="name2" name="amount[0]"  placeholder="大さじ1"class="material-input2" required size="5" />
      </div> 

      <div id="additional-inputs"></div>

      <div class="button-container">
      <button type="button" id="add-button" class="button_black">＋</button>
      <button type="button" id="remove-button" class="button_black">ー</button>
    </div>

      <p>作り方・手順</p>
      <div id="steps" class="large-steps">
        <div class="label-input-group">
          <label for="step1">①</label>
          <input type="text" id="step1" name="step[0]" class="step-input" required size="50" />
        </div>
      </div>

      <div class="button-container">
          <button type="button" id="add-step-button" class="button_black">＋</button>
          <button type="button" id="remove-step-button"class="button_black">ー</button>
      </div>

      <p>説明補足</p>
      <textarea id="description" name="description" class="square-textarea" placeholder="味、おすすめポイント、きっかけ、楽しみ方 等" rows="6" cols="60" required></textarea>

      <div class="submit-button-container">
        <input type="submit" value="投稿" class="btn btn--orange">
      </div>

    </form>
  </div>

  <script>
  let inputCount = 1;
  let stepCount = 1;

  document.addEventListener('DOMContentLoaded', function() {
    // ローカルストレージから保存された材料と手順の数を取得
    const inputCount = localStorage.getItem('inputCount') || 1;
    const stepCount = localStorage.getItem('stepCount') || 1;

    // 材料のフォームを復元
    for (let i = 1; i < inputCount; i++) {
      addInputInput();
    }

    // 手順のフォームを復元
    for (let i = 1; i < stepCount; i++) {
      addStepInput();
    }
  });

  // 材料追加ボタンのイベントリスナー
  document.getElementById('add-button').addEventListener('click', function() {
      addMaterialInput();
      localStorage.setItem('inputCount', document.querySelectorAll('.materials-container input').length / 2);
    });

    // 手順追加ボタンのイベントリスナー
    document.getElementById('add-step-button').addEventListener('click', function() {
      addStepInput();
      localStorage.setItem('stepCount', document.querySelectorAll('#steps .label-input-group').length);
    });

  document.getElementById('add-button').addEventListener('click', function() {
    const newInput = document.createElement('div');
    newInput.classList.add('materials-container');
    newInput.innerHTML = `<input type="text" id="name${inputCount}" name="material[${inputCount}]" class="material-input1" required minlength="4" maxlength="8" size="10" />
                          <input type="text" id="name${inputCount}" name="amount[${inputCount}]" class="material-input2" required minlength="4" maxlength="8" size="5" />`;
    document.getElementById('additional-inputs').appendChild(newInput);
    inputCount += 1;
  });

  document.getElementById('remove-button').addEventListener('click', function() {
    if (inputCount > 1) {
      const additionalInputs = document.getElementById('additional-inputs');
      additionalInputs.removeChild(additionalInputs.lastChild);
      inputCount -= 1;
    }
  });

  document.getElementById('add-step-button').addEventListener('click', function() {
    const newStep = document.createElement('div');
    newStep.classList.add('label-input-group');
    newStep.innerHTML = `<label for="step${stepCount}">${convertToCircledNumber(stepCount)}</label>
                         <input type="text" id="step${stepCount}" name="step[${stepCount}]" class="step-input" required minlength="4" maxlength="100" size="50" />`;
    document.getElementById('steps').appendChild(newStep);
    stepCount += 1;
  });

  document.getElementById('remove-step-button').addEventListener('click', function() {
    if (stepCount > 1) {
      const steps = document.getElementById('steps');
      steps.removeChild(steps.lastChild);
      stepCount--;
    }
  });

  function convertToCircledNumber(num) {
    const circledNumbers = ['①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧', '⑨', '⑩'];
    return circledNumbers[num - 1] || num;
  }

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