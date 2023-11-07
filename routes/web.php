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


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top', 'PostsController@index');
Route::post('/top', 'PostsController@index');
//HTTPのPOSTリクエストメソッドを使ってこのルートにアクセス

Route::get('/profile', 'UsersController@profile');

Route::get('/search', 'UsersController@search');

Route::get('/follow-list', 'FollowsController@followList');
Route::get('/follower-list', 'FollowsController@followerList');


Route::get('/logout', 'Auth\LoginController@logout');
