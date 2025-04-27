// ⾮同期でいいね機能を実装

// 全てのいいねボタン(ハートアイコン)の要素を取得
const likeBtns = document.querySelectorAll(".like-btn");
console.log("call");
 likeBtns.forEach((likeBtn) => {
    console.log("called");
    // どれかのいいねボタンがクリックされた時の処理
    likeBtn.addEventListener("click", async (e) => {
        // クリックされたいいねボタンのid(comment id)を取得
        const commentId = e.target.id;
        // /posts/{commentId}/likeにPOSTリクエストを送信
        await fetch(`/comments/${commentId}/like`, {
            method: "POST", // リクエストメソッドはPOST
            headers: {
                //Content-Typeでサーバーに送るデータの種類を伝える。今回はapplication/json
                "Content-Type": "application/json",
                //csrfトークンを付与
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((res) => res.json()) // レスポンスをJSON形式に変換;
            .then((data) => {
                // いいねの数を更新
                e.target.nextElementSibling.innerHTML = data.likes_count;
                // いいねの状態によってハートアイコンの⾊を変更
                // クラスにtext-pink-500が含まれている場合はいいね済み
                if (e.target.classList.contains("text-pink-500")) {
                    e.target.classList.remove("text-pink-500");
                    e.target.setAttribute("name", "heart-outline");
                } else {
                    e.target.classList.add("text-pink-500");
                    e.target.setAttribute("name", "heart");
                }
            })
            // 失敗した場合はアラートを表⽰
            .catch(() => alert("いいね処理が失敗しました"));
    });
});