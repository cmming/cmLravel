<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Model;

class AdminPremission extends Model
{
    //
	protected $table = 'admin_premissions';

	//权限属于哪个角色
	public function roles(){
		//1关联的目标模型 2当前模型 和 关联模型的关系表 3.当前模型 在关系表中外键 4 关联模型在关系表中的外键 5.使用withPivot 获取 关系表中字段
		return $this->belongsToMany('App\AdminRole','admin_premission_role','premission_id','role_id')->withPivot(['premission_id','role_id']);
	}
	//
//	public function

}
