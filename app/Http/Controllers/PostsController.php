<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//postテーブルのデータ取得のためにpostクラスを使用

class PostsController extends Controller
{
    //indexメソッドの作成
    public function index()
    {
        $posts = Post::get();
        //Postテーブルから全てのレコード情報を取得する
        return view('posts.index', ['posts' => $posts]);
    }

    public function postCreate(Request $request)
    {

        $request->validate([
            'post' => 'required|string|max:150|min:1',
            //バリデーション設定,必須,文字列,最大150文字,最小1文字
        ]);

        $user_id = $request->user()->id;
        //リクエストインスタンスを利用してログインユーザーidを送る
        //失敗例）$user_id = $request->input('user_id');
        $post = $request->input('post');

        Post::create([
            'user_id' => $user_id,
            'post' => $post,
        ]);
        return redirect('/top');
    }

    public function updateForm($id)
    {
        $post = post::where('id', $id)->first();
        return view('posts.updateForm', ['post' => $post]);
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
