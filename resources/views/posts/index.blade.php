<x-app-layout>

    <body class="font-sans antialiased bg-gray-100 text-gray-900 min-h-screen flex flex-col items-center py-10">
        <h1 class="text-5xl font-extrabold text-blue-700 mb-12 drop-shadow-lg">Blog Name</h1>

        <div class="posts w-full max-w-2xl px-4">
            @foreach ($posts as $post)
            <div class="post bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden mb-8 p-6 border border-gray-200">
                <h2 class="title text-3xl font-bold text-gray-800 mb-3 leading-tight">
                    <a href="/posts/{{ $post->id }}" class="hover:text-blue-600 transition-colors duration-200 block">
                        {{ $post->title }}
                    </a>
                </h2>
            </div>
            @endforeach
        </div>
    </body>
</x-app-layout>