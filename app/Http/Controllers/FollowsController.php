<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        // //ログインユーザーのid取得
        // $auth = Auth::id();
        // //ログインユーザー以外の全ユーザーを取得
        // $users = User::where('id', '!=', $auth)->get();

        // //Postsテーブルからログインユーザー以外のレコード情報を取得
        // $posts = Post::where('user_id', '!=', $auth)->get();

        $followIds = auth()->user()->follows()->pluck('user_id');
        $posts = Post::whereIn('user_id', $followIds)->get();
        $users = User::whereIn('id', $followIds)->get();

        return view('follows.followList', ['users' => $users, 'posts' => $posts]);
    }

    public function followerList()
    {
        // //ログインユーザーのid取得
        // $auth = Auth::id();
        // //ログインユーザー以外の全ユーザーを取得
        // $users = User::where('id', '!=', $auth)->get();

        // //Postsテーブルからログインユーザー以外のレコード情報を取得
        // $posts = Post::where('user_id', '!=', $auth)->get();

        $followerIds = auth()->user()->followUsers()->pluck('user_id');
        $posts = Post::whereIn('user_id', $followerIds)->get();
        $users = User::whereIn('id', $followerIds)->get();

        return view('follows.followerList', ['posts' => $posts, 'users' => $users]);
    }
}
