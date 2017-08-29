<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 16:05
 */

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Admin\Controllers\Controller;
use App\AdminUser;
use App\AdminRole;

class RoleController extends Controller
{
	//角色列表
	public function index(){
		//所有的角色
		$roles = AdminRole::paginate(10);
		return view('admin/role/index',compact(['roles']));
	}
	//创建角色页面
	public function create(){
		return view('admin/role/create');
	}
	//创建角色的行为
	public function store(){
		$this->validate(request(),[
			'name'=>'required|min:3',
			'desc'=>'required'
		]);
		//保存数据
		AdminRole::create(request(['name','desc']));
		return redirect('/admin/roles');
	}
	//角色与权限的关系页面
	public function premission(){
		return view('admin/role/premission');
	}
	//储存 角色与权限的行为
	public function premissionStore(){}

}