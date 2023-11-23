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
}
