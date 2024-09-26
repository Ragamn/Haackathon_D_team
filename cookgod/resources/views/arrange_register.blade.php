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
<?php
  $selectedId = request()->query('id');
  ?>
  <div class="movable-container">
    <h1>アレンジ画面</h1>

    <form action="/arrange_confirm" method="post" enctype="multipart/form-data">
      @csrf
          <p>メニュー名</p>
          <input type="text" name="name" class="menu-input" value="{{session('name')}}">
        <p>参考にした料理を選択してください。</p>
        <select name="cookname" class="wide-select">
        <option value="" {{ is_null($selectedId) ? 'selected' : '' }}>選択してください</option>
        @foreach($arrange as $item)
          <option value="{{ $item['cooking_id'] }}" {{ $item['cooking_id'] == $selectedId ? 'selected' : '' }}>
            {{ $item['name'] }}
          </option>
        @endforeach
        </select>

      <!-- フォームで選択した画像 -->
      <img id="img-preview" style="display: none;">


        <!-- フォーム -->
        <input type="file" name="img" id="file-input" class="centered-file-input" accept=".jpg, .jpeg, .png, .gif" value="{{session('img')}}">

        <div class="materials-container">
    @if (session('material') && session('amount'))
      @foreach (session('material') as $index => $material)
        <div class="material-group">
          <input type="text" name="material[{{ $index }}]" class="material-input1" value="{{ $material }}" required />
          <input type="text" name="amount[{{ $index }}]" class="material-input2" value="{{ session('amount')[$index] }}" placeholder="大さじ1" required />
        </div>
      @endforeach
    @else
      <div class="material-group">
        <input type="text" name="material[0]" class="material-input1" required />
        <input type="text" name="amount[0]" class="material-input2" placeholder="大さじ1" required />
      </div>
    @endif
  </div>

      <div id="additional-inputs">
      </div>

      <div class="button-container">
      <button type="button" id="add-button" class="button_black">＋</button>
      <button type="button" id="remove-button" class="button_black">ー</button>
    </div>

      <p>作り方・手順</p>
      <div id="steps" class="large-steps">
  @if (session('step'))
    @foreach (session('step') as $index => $step)
      <div class="label-input-group">
        <label for="step{{ $index + 1 }}">{{ $index + 1 }}</label>
        <input type="text" id="step{{ $index + 1 }}" name="step[{{ $index }}]" class="step-input" value="{{ $step }}" required size="50" />
      </div>
    @endforeach
  @else
    <div class="label-input-group">
      <label for="step1">1</label>
      <input type="text" id="step1" name="step[0]" class="step-input" required size="50" />
    </div>
  @endif
</div>

      <div class="button-container">
          <button type="button" id="add-step-button" class="button_black">＋</button>
          <button type="button" id="remove-step-button"class="button_black">ー</button>
      </div>

      <p>説明補足</p>
      <textarea id="description" name="description" class="square-textarea" placeholder="味、おすすめポイント、きっかけ、楽しみ方 等" rows="6" cols="60" required >{{session('description')}}</textarea>

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
  // addInputInput();
  inputCount++;
  // localStorage.setItem('inputCount', inputCount);
});

// 手順追加ボタンのイベントリスナー
document.getElementById('add-step-button').addEventListener('click', function() {
  addStepInput();
  stepCount++;
  // localStorage.setItem('stepCount', stepCount);
});

  document.getElementById('add-button').addEventListener('click', function() {
    const newInput = document.createElement('div');
    newInput.classList.add('materials-container');
    newInput.innerHTML = `<input type="text" id="name${inputCount+1}" name="material[${inputCount+1}]" class="material-input1" required size="10" />
                          <input type="text" id="name${inputCount+1}" name="amount[${inputCount+1}]" class="material-input2" required size="5" />`;
    document.getElementById('additional-inputs').appendChild(newInput);
    // inputCount += 1;
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
    newStep.innerHTML = `<label for="step${stepCount+1}">${convertToCircledNumber(stepCount+1)}</label>
                         <input type="text" id="step${stepCount+2}" name="step[${stepCount+2}]" class="step-input" required minlength="4" maxlength="100" size="50" />`;
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
    return num += 1;
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

  // クラス名が'submit-button-container'の全ての要素を取得
  const submitButtonContainers = document.getElementsByClassName('submit-button-container');

  for (let i = 0; i < submitButtonContainers.length; i++) {
    submitButtonContainers[i].addEventListener('click', function(event) {
      localStorage.setItem('stepCount', stepCount);
      localStorage.setItem('inputCount', inputCount);
      console.log('Submit button clicked');
    });
  }


  function saveToLocalStorage() {
    const materials = [];
    const amounts = [];
    document.querySelectorAll('.materials-container .material-group').forEach(group => {
      materials.push(group.querySelector('.material-input1').value);
      amounts.push(group.querySelector('.material-input2').value);
    });
    localStorage.setItem('materials', JSON.stringify(materials));
    localStorage.setItem('amounts', JSON.stringify(amounts));

    const steps = [];
    document.querySelectorAll('#steps .label-input-group').forEach(group => {
      steps.push(group.querySelector('.step-input').value);
    });
    localStorage.setItem('steps', JSON.stringify(steps));

    const description = document.getElementById('description').value;
    localStorage.setItem('description', description);
  }

  function loadFromLocalStorage() {
    const materials = JSON.parse(localStorage.getItem('materials') || '[]');
    const amounts = JSON.parse(localStorage.getItem('amounts') || '[]');
    const steps = JSON.parse(localStorage.getItem('steps') || '[]');
    const description = localStorage.getItem('description') || '';

    const materialsContainer = document.querySelector('.materials-container');
    materialsContainer.innerHTML = '';
    materials.forEach((material, index) => {
      const materialGroup = document.createElement('div');
      materialGroup.classList.add('material-group');
      materialGroup.innerHTML = `
        <input type="text" name="material[${index}]" class="material-input1" value="${material}" required />
        <input type="text" name="amount[${index}]" class="material-input2" value="${amounts[index]}" placeholder="大さじ1" required />
      `;
      materialsContainer.appendChild(materialGroup);

      const inputElement = document.querySelector('.material-input1');
      const nameValue = inputElement.getAttribute('value');
    });

    const stepsContainer = document.getElementById('steps');
    stepsContainer.innerHTML = '';
    steps.forEach((step, index) => {
      const stepGroup = document.createElement('div');
      stepGroup.classList.add('label-input-group');
      stepGroup.innerHTML = `
        <label for="step${index + 1}">${convertToCircledNumber(index + 1)}</label>
        <input type="text" id="step${index + 1}" name="step[${index}]" class="step-input" value="${step}" required size="50" />
      `;
      stepsContainer.appendChild(stepGroup);
    });

    document.getElementById('description').value = description;
  }

  document.getElementById('arrange-form').addEventListener('submit', function(event) {
      saveToLocalStorage();
      localStorage.setItem('stepCount', stepCount);
      localStorage.setItem('inputCount', inputCount);
    });

    // function addInputInput() {
    //   const newInput = document.createElement('div');
    //   newInput.classList.add('material-group');
    //   newInput.innerHTML = `<input type="text" id="name${inputCount}" name="material[${inputCount}]" class="material-input1" required size="10" />
    //                         <input type="text" id="amount${inputCount}" name="amount[${inputCount}]" class="material-input2" required size="5" />`;
    //   document.querySelector('.materials-container').appendChild(newInput);
    // }

</script>
</body>
  </html>
