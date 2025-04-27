<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細画面</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- アイコンの読み込み -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js">

    </script>
</head>


<body class="bg-gray-50 text-gray-800 p-6">
    <h1 class="text-3xl font-bold mb-6">
        {{ $post->title }}
    </h1>
    <div class="mb-8 bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
            <h3 class="text-lg font-semibold mb-2">質問の内容</h3>
            <p class="text-gray-700">{{ $post->body }}</p>
        </div>
    </div>
    <div class="mb-6">
        <a href="/posts/{{ $post->id }}/edit" class="text-blue-600 hover:underline">編集</a>
    </div>
    <div class="mb-8">
        <a href="/posts/index" class="text-blue-600 hover:underline">一覧画面へ</a>
    </div>
    <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST" class="mb-10 bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="comment" class="block text-gray-700 font-medium mb-2">コメント</label>
            <textarea name="comment" id="comment" rows="4" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-blue-600 transition">投稿</button>
    </form>
    <hr class="my-8 border-gray-300">
    <h3 class="text-2xl font-semibold mb-4">コメント一覧</h3>
    @forelse ($post->comments as $comment)
    <div class="mb-6 bg-white shadow-sm rounded-md p-4 border border-gray-200">
        <strong class="block mb-1 text-gray-800">{{ $comment->user->name ?? '（退会ユーザー）' }}</strong>
        <p class="mb-3 text-gray-700">{{ $comment->comment }}</p>
        <div class="flex items-center gap-3">
            <h2 class='text-lg font-semibold text-blue-600'>
                <a href="/posts/{{ $comment->id }}" class="hover:underline">{{ $comment->title }}</a>
            </h2>
            @auth
            @if(Auth::user()->likes()->where('comment_id', $comment->id)->exists())
            <ion-icon name="heart" class="like-btn cursor-pointer text-pink-500 text-2xl" id="{{ $comment->id }}"></ion-icon>
            @else
            <ion-icon name="heart-outline" class="like-btn cursor-pointer text-gray-500 text-2xl hover:text-pink-500" id="{{ $comment->id }}"></ion-icon>
            @endif
            <p class="text-sm text-gray-600">{{ $comment->likes->count() }}</p>
            @endauth
        </div>
    </div>
    @empty
    <p class="text-gray-500">コメントはまだありません。</p>
    @endforelse
</body>












</html>