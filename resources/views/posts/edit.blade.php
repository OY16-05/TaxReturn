<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿編集画面</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen p-6 font-sans text-sm text-gray-900">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-900">投稿の編集</h1>

    <div class="max-w-md mx-auto bg-white p-6 rounded-2xl shadow-md border border-gray-200">
        <form action="/posts/{{ $post->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- タイトル -->
            <div>
                <label class="block text-base font-medium text-gray-800 mb-1" for="title">タイトル</label>
                <input
                    type="text"
                    id="title"
                    name="post[title]"
                    value="{{ $post->title }}"
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            </div>

            <!-- 本文 -->
            <div>
            <label class="block text-base font-medium text-gray-800 mb-1" for="body">本文</label>
                <textarea
                    id="body"
                    name="post[body]"
                    rows="5"
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ $post->body }}</textarea>
            </div>

            <!-- 保存ボタン -->
            <div class="text-right">
                <button
                    type="submit"
                    class="bg-black text-white px-5 py-2 text-sm font-semibold rounded-lg hover:bg-gray-800 transition shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    保存する
                </button>
            </div>
        </form>
    </div>
</body>


</html>