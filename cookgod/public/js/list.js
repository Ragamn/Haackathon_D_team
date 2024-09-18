document.addEventListener("DOMContentLoaded", () => {
  // querySelectorAllを使って、すべてのbookmarkクラスを持つ要素を取得
  const bookmarks = document.querySelectorAll(".bookmark");

  // すべての要素に対してクリックイベントを設定
  bookmarks.forEach((bookmark) => {
    bookmark.addEventListener("click", () => {
      // 各要素のクラスに 'active' をトグル
      bookmark.classList.toggle("active");
    });
  });
});
