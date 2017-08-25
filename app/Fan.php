<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Model;

class Fan extends Model
{
    //获取 一个 fan_id 下的 粉丝用户
    public function fuser(){
        return $this->hasOne('App\User','id','fan_id');
    }
    // 获取 被关注的用户
     public function suser(){
        return $this->hasOne('App\User','id','start_id');
    }
}
