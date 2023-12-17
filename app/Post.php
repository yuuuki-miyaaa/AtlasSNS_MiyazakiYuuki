<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Symfony\Component\CssSelector\Node\FunctionNode;

class Post extends Model
{

    protected $fillable = [
        'user_id', 'post'
        //この指定したカラムに対してのみ、 createやupdateなどが可能
        //ちゃんとcontrollerのカラムと一致させること
    ];

    //リレーションを定義
    //ユーザーとポストをつなげる（一対多の一側だからbelongsToを使う）
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //postとfollowを繋げるリレーション定義
    public function followPosts()
    {
        return $this->belongsToMany('App\Post', 'Follows', 'followed_id', 'following_id')
            ->select(['posts.id as user_id', 'Follows.following_id', 'Follows.followed_id']);
        //belongsToMany メソッドは多対多のリレーション
    }
    public function followerPosts()
    {
        return $this->belongsToMany('App\Post', 'Follows', 'following_id', 'followed_id')
            ->select(['posts.id as user_id', 'Follows.following_id', 'Follows.followed_id']);
    }
}
