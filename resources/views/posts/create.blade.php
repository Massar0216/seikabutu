<x-app-layout>

    <body>
        <h1>夜景を投稿</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="綺麗な夜景" />
            </div>
            <div class="spot_name">
                <h2>場所名</h2>
                <input type="text" name="post[spot_name]" placeholder="東京タワー" />
            </div>
            <div class="address">
                <h2>住所</h2>
                <textarea name="post[address]" placeholder="東京都港区芝公園４丁目２−８"></textarea>
            </div>
            <div class="tags">
                <h2>tags</h2>
                <select name="post[tag_id]">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="store" />
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>