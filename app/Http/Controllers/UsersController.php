<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    //
    public function profile(Request $request)
    {
        //プロフィール編集
        if ($request->isMethod('post')) {

            $request->validate([

                'username' => 'required|string|max:12|min:2',
                'mail' => 'required|string|email|max:40|min:5|unique:users,mail,' . auth()->id(),
                'password' => 'nullable|string|max:20|min:8|confirmed',
                'bio' => 'string|max:150',
                'icon_image' => 'image',
                //バリデーションルールのimageでjpg、png、bmp、gif、svg、webpをバリデート？
                // 'icon_image' => 'file|mimes:jpeg,png,bmp,gif,svg',
                //フィールドで指定されたファイルが拡張子のリストの中のMIMEタイプのどれかと一致することをバリデート？⇒mime(マイム)とはテキストデータ以外の各種フォーマットデータを送信できるように定義すること
                //nullableは空の場合でもバリデーションを抜けられる(必須って書いていたけどOK？)

            ]);

            $auth = Auth::id();
            //ログインユーザーのID取得
            $updateData = [];

            if (!empty($request->input('username'))) {
                //もし空じゃなかったら
                $updateData['username'] = $request->input('username');
            }
            if (!empty($request->input('mail'))) {
                $updateData['mail'] = $request->input('mail');
            }
            if (!empty($request->input('password'))) {
                $updateData['password'] = bcrypt($request->input('password'));
            }
            if (!empty($request->input('bio'))) {
                $updateData['bio'] = $request->input('bio');
            }
            if (!empty($request->hasFile('icon_image'))) {
                //hasFileメソッドはリクエストにファイルが存在しているかを調べる

                $iconImage = $request->file('icon_image');
                $icon = time() . '.' . $iconImage->getClientOriginalExtension();
                //上記コードはユニークなファイル名を作成するための
                //time() . '.' .⇒秒数まで記録するタイムスタンプ＝ユニーク
                //getClientOriginalExtension()⇒アップロードされたファイルの拡張子を取得
                $iconImage->storeAs('public/images/', $icon);
                //storeAsメソッドは('保存先のパス','ファイル名','オプション')を指定
                $updateData['images'] = $icon;
            }
            //$icon = $request->input('icon_image');
            //$request->input()は、テキストベースの入力値を取得するためのもので、ファイルのアップロードには適していない
            //$icon = $request->file('icon_image');
            //それぞれrequestで受け取ったものを変数に格納

            User::where('id', $auth)->update($updateData);
            //ログインユーザーを探して、updateDataに格納された値をupdateする
            //$user = User::find($auth);上記では無くこの場合でも、データベースから特定のユーザーのレコードを取得出来る

            return redirect('/top')->with('success', 'プロフィールが更新されました。');
            //Topページにredirect
        }
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

    //フォローボタン
    public function follow(User $user)
    {

        $follower = auth()->user();
        // フォローしているか確認
        $is_following = $follower->isFollowing($user->id);
        if (!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか確認
        $is_following = $follower->isFollowing($user->id);
        if ($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::whereIn('user_id', $id)->orderBy('updated_at', 'desc')->get();

        return view('users.show', compact('user', 'posts'));
    }
}
