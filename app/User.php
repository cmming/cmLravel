<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 获取 自己 粉丝
    public function fans(){
        return $this->hasMany('App\Fan','start_id','id');
    }

    // 获取 自己在关注的 人
    public function stars(){
        return $this->hasMany('App\Fan','fan_id','id');
    }

    // 关注 一个人
    public function doFan($uid){
        $fan = new \App\Fan();
        $fan->start_id = $uid;
        $this->stars()->save($fan);
    }
    // 取消关注
    public function doUnFan($uid){
        $fan = new \App\Fan();
        $fan->start_id = $uid;
        $this->stars()->delete($fan);
    }

    // 获取一个 用户是否是 为当前用户 的粉丝
    public function hasFan($uid){
        return $this->fans()->where('fan_id',$uid)->count();
    }

    // 获取一个用户是否  被 当前用户 关注 

    public function hasStart($uid){
        return $this->stars()->where('start_id',$uid)->count();
    }

    // 关联 文章模型

    public function posts(){
        return $this->hasMany('App\Post','user_id','id');
    }
}
