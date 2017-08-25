<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Model;

class Comment extends Model
{
    //
    // 评论关联 文章
    public function post(){
        return $this->belongsTo('App\Post');
    }
    // 评论关联 用户 1 对 多
    public function user(){
        return $this->belongsTo('App\User');
    }
}
