<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Cloudinary;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(Tag $tag)
    {
        return view('posts.create')->with(['tags' => $tag->get()]);
    }


    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->get()]);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }

    public function store(Request $request, Post $post)
    {
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();


        $apiKey = config('services.google_maps.key');
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $request['post']['address'],
            'key'     => $apiKey,
        ]);

        if (! $response->ok() || empty($response['results'])) {
            return back()
                ->withInput()
                ->withErrors(['address' => '住所のジオコーディングに失敗しました。']);
        }

        $result = $response['results'][0];
        $locationData = $result['geometry']['location'];


        $input = $request['post'];
        $input['latitude']  = $locationData['lat'];
        $input['longitude'] = $locationData['lng'];
        $input['user_id'] = Auth::id();
        $input['image_url'] = $image_url;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
