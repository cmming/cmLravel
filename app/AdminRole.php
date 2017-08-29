<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Model;
class AdminRole extends Model
{
    //
	protected $table = 'admin_roles';
	//获取角色 和权限的关联
	public function premissions(){
		//1.关联的模型 2.产生关联的关系表 3.当前对象在关系表中对应的字段 4.获取对象在关系表中外键 5.使用withPivot 获取关系表中字段
		return $this->belongsToMany('App\AdminPremission','admin_premission_role','role_id','premission_id')->withPivot(['role_id','premission_id']);
	}
	//给角色 赋予权限
	public function grantPremission($premission){
		return $this->premissions()->save($premission);
	}
	//删除 角色中的一个权限
	public function deletePremission($premission){
		return $this->premissions()-detach($premission);
	}
	//判断 角色是否 拥有一个权限
	public function hasPremission($premission){
		//使用集合
		return $this->premissions->contains($premission->roles);
	}
}
