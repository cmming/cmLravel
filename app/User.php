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

    // 获取 自己
    public function fans(){
        return $this->hasMany('App\Fan','start_id','id');
    }

    // 获取 自己的粉丝
    public function stars(){
        return $this->hasMany('App\Fan','fan_id','id');
    }

    // 关联 文章模型

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
