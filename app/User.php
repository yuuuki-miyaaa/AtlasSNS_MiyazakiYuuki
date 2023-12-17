<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Follow;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'bio', 'images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }
    //リレーションの定義
    //ポストとユーザーをつなげる（一対多の多い側だからhasmanyを使う）
    public function posts()
    {
        return $this->hasMany('App\post');
    }

    //userとfollowを繋げるリレーション定義

    //フォロワーの取得
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'Follows', 'followed_id', 'following_id')
            ->select(['users.id as user_id', 'Follows.following_id', 'Follows.followed_id']);
        //belongsToMany メソッドは多対多のリレーション
    }

    //フォローしているユーザーの取得
    public function follows()
    {
        return $this->belongsToMany('App\User', 'Follows', 'following_id', 'followed_id')
            ->select(['users.id as user_id', 'Follows.following_id', 'Follows.followed_id']);
    }

    // フォローする
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followUsers()->where('following_id', $user_id)->first(['id']);
    }
}
