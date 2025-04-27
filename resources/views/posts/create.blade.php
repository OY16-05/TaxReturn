<x-app-layout> 
    <x-slot name="header"> 
        新規作成画面
    </x-slot>

    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-50">
        <h1 class="text-3xl font-bold mb-8">新規作成</h1>

        <form action="/posts" method="POST" class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-blue-100">
            @csrf

            <div class="mb-6">
                <label class="block text-lg font-semibold text-blue-700 mb-2">Title</label>
                <input
                    type="text"
                    name="post[title]"
                    placeholder="タイトル"
                    value="{{ old('post.title') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-blue-50"
                />
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('post.title') }}</p>
            </div>

            <div class="mb-6">
                <label class="block text-lg font-semibold text-blue-700 mb-2">Body</label>
                <textarea
                    name="post[body]"
                    placeholder="質問の内容"
                    rows="5"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-blue-50"
                >{{ old('post.body') }}</textarea>
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('post.body') }}</p>
            </div>

            <div class="text-right">
                <input
                    type="submit"
                    value="保存"
                    class="bg-black text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition font-semibold"
                />
            </div>
        </form>

        <div class="mt-6">
            <a href="javascript:history.back()" class="text-blue-500 hover:underline">戻る</a>
        </div>
    </div>
</x-app-layout>