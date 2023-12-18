<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//postテーブルのデータ取得のためにpostクラスを使用
use App\User;
use App\Follow;

class PostsController extends Controller
{
    //indexメソッドの作成
    public function index()
    {
        // //Postテーブルから全てのレコード情報を取得する
        // $posts = Post::get();
        $followIds = auth()->user()->follows()->pluck('user_id');
        $followIds[] = auth()->id();
        //PHPで配列の末尾に新しい要素を追加するための構文
        $posts = Post::whereIn('user_id', $followIds)->orderBy('updated_at', 'desc')->get();


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

    public function updateForm(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'post' => 'required|string|max:150|min:1',
            ]);

            $id = $request->input('id');
            $up_post = $request->input('post');
            //postを検索して更新
            Post::where('id', $id)->update([
                'post' => $up_post
            ]);

            return redirect('/top')->with('status', '投稿が更新されました！');
        }
        return view('/top');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
