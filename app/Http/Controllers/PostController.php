<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showCreateForm()
    {
        return view('posts.create');
    }

    public function create(Request $request)
    {
        //Postモデルのインスタンスを作成する
        $post = new Post();
        //タイトル
        $post->title = $request->title;
        //コンテンツ
        $post->content = $request->content;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        //インスタンス状態をデータベースに書き込む
        $post->save();
        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト
        return redirect()->route('posts.detail', [
            'post' => $post->id,
        ]);
        //'post'はパラメータと一致
    }

    public function detail(Post $post)
    {
        return view('posts.detail', [
            'title' => $post->title,
            'content' => $post->content,
            'user_id' => $post->user_id,
        ]);
    }
}
