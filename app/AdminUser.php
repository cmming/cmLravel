<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    //
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
	//用户 关联角色 (用户有哪些角色)
	public function roles(){
		//多对多 1.目标类 2.中间的关系表 3.当前对象 在关系表中的外键  4获取对象在关系表中外键 5 获取关系表中数据，使用withPivot
		return $this->belongsToMany('App\AdminRole','admin_role_user','user_id','role_id')->withPivot(['user_id','role_id']);
	}
	//判断一个用户是否拥有 一个或多个 角色
	public function isInRoles($roles){
		//intersect 将两个 集合进行做交集
		return !$roles->intersect($this->roles)->count();
	}
	//给用户分配角色
	public function assignRole($roles){
		return $this->roles()->save($roles);
	}
	//给用户 取消 分配的角色
	public function deleteRole($roles){
		//detach 删除关系
		return $this->roles()->detach($roles);
	}
	//用户 是否有权限
	public function hasPremission($premission){
		// 判断用户的角色 和  这个权限所属有的角色是否 拥有重叠 即可
		return $this->isInRoles($premission->roles);
	}


}
