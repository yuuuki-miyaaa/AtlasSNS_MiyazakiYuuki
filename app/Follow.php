<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $fillable = [
        'following_id', 'followed_id'
        //この指定したカラムに対してのみ、 createやupdateなどが可能
        //ちゃんとcontrollerのカラムと一致させること
    ];

    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
}
