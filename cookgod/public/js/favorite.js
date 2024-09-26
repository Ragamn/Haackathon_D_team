document.addEventListener("click", (event) => {
    if (event.target.classList.contains("save-button")) {
        const itemElement = event.target.closest(".item");
        if (itemElement) {
            const item = {
                id: itemElement.dataset.id,
                name: itemElement.dataset.name,
                description: itemElement.dataset.description,
                imagePath: itemElement.dataset.imagePath, // 画像のパスを追加
            };

            // localStorageから現在のfavoritesを取得
            let favorites = JSON.parse(localStorage.getItem("favorites")) || [];

            // アイテムが既にfavoritesに存在するか確認
            const index = favorites.findIndex((fav) => fav.id === item.id);

            if (index === -1) {
                // アイテムが存在しない場合、追加
                favorites.push(item);
                localStorage.setItem("favorites", JSON.stringify(favorites));
            } else {
                // アイテムが存在する場合、削除
                favorites.splice(index, 1);
                localStorage.setItem("favorites", JSON.stringify(favorites));
            }
        }
    }
});
