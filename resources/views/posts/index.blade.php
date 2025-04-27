<x-app-layout>
    <x-slot name="header">
        質問投稿一覧
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">投稿一覧</h1>
    <a href='/posts/create' class="text-green-600 hover:underline">新規作成</a>

    <div class='posts mt-4'>
        @foreach ($posts as $post)
        <div class='post border p-4 rounded mb-4'>
            <h2 class='title text-xl font-semibold mb-2'></h2>
            <a href="{{ route('show', ['post' => $post->id]) }}" class="text-blue-600 hover:underline hover:text-blue-800 transition">
                {{ $post->title }}
            </a>
            <p class='body mb-2'>{{ $post->body }}</p>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                    削除
                </button>
            </form>
        </div>
        @endforeach
    </div>

    <div class='paginate'>
        {{ $posts->links() }}
    </div>
    <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>

</x-app-layout>