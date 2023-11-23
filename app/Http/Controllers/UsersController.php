<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class UsersController extends Controller
{
    //
    public function profile()
    {
        return view('users.profile');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        //requestからkeywordを受け取り変数$keywordに
        $auth = Auth::id();
        //ログインユーザーのid取得
        $word = "";
        //変数$wordの中身は空と定義しないと、keywordが空の時compactで変数が見つからないエラーになる

        if (!empty($keyword)) {
            $word = "検索ワード：" . $keyword;
            //検索後に表示するためにkeywordとまとめて変数に
            $users = User::where('username', 'like', '%' . $keyword . '%')->get();
            //keywordを含むあいまい検索で取得
        } else {
            $users = User::where('id', '!=', $auth)->get();
            //ログインユーザー以外の全ユーザーを取得
        }
        return view('users.search', compact('word', 'users'));
    }
}
