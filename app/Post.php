<?php

namespace App;

use App\Model;

class Post extends Model
{
    // protected Post
    // 测试 post 这个类是否好用 使用tinker
    // 文章关联用户 模型关联 遵循 表名 _id  外键  id 作为内建
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    // 文章进行关联 评论模块
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }

    // 将文章和 赞 的关联
    public function zan($user_id){
        return $this->hasOne('App\Zan')->where('user_id',$user_id);
    }

    public function zans(){
        return $this->hasMany('App\Zan');
    }
    
    
}
