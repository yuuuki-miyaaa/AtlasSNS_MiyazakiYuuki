<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

use App\Http\Controllers\UserController;

//ログアウト中のページ

//use Symfony\Component\Routing\Route;
//急に変わった？突然使えなくなり、下記コードに
// use Illuminate\Support\Facades\Route;
//下記コードも本当は必要なかった、調べたときに余計なコードも記載した？Gitで確認する

Route::get('/login', 'Auth\LoginController@login');
//↑だと(login)が見つからずミドルウェアが機能しない
//↑return route('/login');からreturn url('/login');に変更で機能するように
//Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//名前をつけると機能する
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::group(
  ['middleware' => 'auth'],
  function () {
    //ミドルウェア(認証ユーザーのみ表示される)

    Route::get('/top', 'PostsController@index');
    Route::post('/top', 'PostsController@index');
    //HTTPのPOSTリクエストメソッドを使ってこのルートにアクセス

    Route::post('/post/create', 'PostsController@postCreate');
    //Route::get('/post/{id}/update-form', 'PostsController@updateForm');
    //URLにログインユーザーのIDを入れてgetで送る

    Route::get('/post/{id}/update-form', 'PostsController@updateForm');
    Route::post('/post/{id}/update-form', 'PostsController@updateForm');

    Route::get('/post/{id}/delete', 'PostsController@delete');

    Route::get('/profile', 'UsersController@profile');
    Route::post('/profile', 'UsersController@profile');

    Route::get('/users/{id}', 'UsersController@show');
    Route::post('/users/{user}', 'UsersController@follow')->name('follow');

    // Route::post('/users/{id}', 'UsersController@follow')->name('follow');
    Route::delete('/users/{user}', 'UsersController@unfollow')->name('unfollow');

    Route::get('/search', 'UsersController@search');
    Route::post('/search', 'UsersController@search');

    Route::post('/follow/{user}', 'UsersController@follow')->name('follow');
    Route::delete('/unfollow/{user}', 'UsersController@unfollow')->name('unfollow');
    //Route::post()だと"このルートに対して DELETE メソッドはサポートされていません。サポートされているメソッド: POST"とった

    Route::get('/follow-list', 'FollowsController@followList');
    Route::get('/follower-list', 'FollowsController@followerList');

    Route::get('/logout', 'Auth\LoginController@logout');
  }
);
