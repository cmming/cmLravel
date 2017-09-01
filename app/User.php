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

    //用户 与 通知 之间的关联关系

    public function notices(){
        return $this->belongsToMany('App\Notice','user_notice','user_id','notice_id')->withPivot('user_id','notice_id');
    }
    //给用户增加通知
    public function addNotice($notice){
        $this->notices()->save($notice);
    }
    //前台用户的 与权限的 关系表
    public function roles(){
        return $this->belongsToMany('App\AdminRole','user_roles','user_id','roles_id')->withPivot('user_id','roles_id');
    }
    //为用户添加一个角色
    public function addRole($role){
        $this->roles()->save($role);
    }
    //为用户删除一个角色
    public function deleteRole($role){
        $this->roles()->detach($role);
    }
}
