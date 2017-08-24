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
    
    
}
