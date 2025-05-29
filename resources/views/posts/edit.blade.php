<x-app-layout>

    <body>
        <h1>夜景を投稿</h1>
        <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" value="{{ $post->title }}" />
            </div>
            <div class="spot_name">
                <h2>場所名</h2>
                <input type="text" name="post[spot_name]" value="{{ $post->spot_name }}" />
            </div>
            <div class="address">
                <h2>住所</h2>
                <textarea name="post[address]">{{ old('post.address', $post->address) }} </textarea>
            </div>
            <div class="tags">
                <h2>tags</h2>
                <select name="post[tag_id]">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ old('post.tag_id', $post->tag_id) == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <p>現在の画像：</p>
                <img src="{{ $post->image_url }}" alt="current image" style="max-width:200px;">
            </div>
            <div>
                <label for="image">画像を差し替える</label>
                <input type="file" name="image" id="image">
            </div>
            <input type="submit" value="store" />
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>