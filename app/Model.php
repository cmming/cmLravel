<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    // protected Post
    // 测试 post 这个类是否好用 使用tinker
    protected $guarded = [];//不可以注入

    // protected $fillables = ['title','content'];//可以注入
}
