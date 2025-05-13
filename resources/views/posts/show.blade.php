<x-app-layout>

    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>場所</h3>
                <p>{{ $post->spot_name }}</p>
                <p>{{ $post->address}}</p>
            </div>
            <div>
                <h3>画像</h3>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>