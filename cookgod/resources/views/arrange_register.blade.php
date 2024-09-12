<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アレンジ投稿</title>
  <link rel="stylesheet" href="{{ asset('css/arrange_register.css') }}">

</head>
<body>
  <h1>アレンジ画面</h1>

  <form action="#" method="post">
	<p>メニュー名</p>
	<input type="text" name="name" class="menu-input"><br>
	<select name="プルダウンメニュー名" class="wide-select">
    <option value="" selected>
		<option value="">項目名１</option>
		<option value="">項目名２</option>
	</select>
</form>

    <!-- フォームで選択した画像 -->
    <img id="img-preview" accept="image/*" style="max-width: 200px; max-height: 200px; display: none;">

    <div class="buttons">
      <!-- フォーム -->
      <input type="file" name="logo" id="file-input" class="centered-file-input" accept=".jpg, .jpeg, .png, .gif">
    </div>

<p>材料(1人前)</p>
<div class="materials-container">
    <input type="text" id="name1" name="name1" class="material-input1" equired minlength="4" maxlength="8" size="10" /><br>
    <input type="text" id="name2" name="name2" class="material-input2"required minlength="4" maxlength="8" size="5" /><br>
</div>

    <div id="additional-inputs"></div>

    <button type="button" id="add-button">追加</button>
    <button type="button" id="remove-button">削除</button>

<p>作り方・手順</p>
<div id="steps" class="large-steps">
    <label for="step1">①</label>
    <input type="text" id="step1" name="step1" required minlength="4" maxlength="100" size="50" /><br>
  </div>

  <button type="button" id="add-step-button">手順追加</button>
  <button type="button" id="remove-step-button">手順削除</button>

  <p>説明補足</p>
  <textarea id="description" name="description" class="square-textarea" placeholder="味、おすすめポイント、きっかけ、楽しみ方 等" rows="6" cols="60" required></textarea><br>

  <a href="" class="btn btn--orange">投稿</a>

  </form>

  <script>
        let inputCount = 2;
    let stepCount = 1;

    document.getElementById('add-button').addEventListener('click', function() {
      inputCount++;
      const newInput = document.createElement('div');
      newInput.classList.add('materials-container');
      newInput.innerHTML = `<input type="text" id="name${inputCount}" name="name${inputCount}" class="material-input1" required minlength="4" maxlength="8" size="10" />
                            <input type="text" id="name${inputCount + 1}" name="name${inputCount + 1}" class="material-input2" required minlength="4" maxlength="8" size="5" />`;
      document.getElementById('additional-inputs').appendChild(newInput);
      inputCount += 2;
    });

    document.getElementById('remove-button').addEventListener('click', function() {
      if (inputCount > 2) {
        const additionalInputs = document.getElementById('additional-inputs');
        additionalInputs.removeChild(additionalInputs.lastChild);
        inputCount -= 2;
      }
    });

    document.getElementById('add-step-button').addEventListener('click', function() {
      stepCount++;
      const newStep = document.createElement('div');
      newStep.innerHTML = `<label for="step${stepCount}"> ${convertToCircledNumber(stepCount)} </label>
                           <input type="text" id="step${stepCount}" name="step${stepCount}" required minlength="4" maxlength="100" size="50" /><br>`;
      document.getElementById('steps').appendChild(newStep);
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
    
  </script>

  
 
</body>
</html>
