<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 16:05
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;
use App\AdminRole;

class UserController extends Controller
{
	public function index(){
		//获取所有的 用户
		$adminUsers = AdminUser::orderBy('created_at','desc')->paginate(6);
		return view('/admin/user/index',compact(['adminUsers']));
	}
	//管理员创建页面
	public function create(){
		$formParams = [
			'isEdit'=>false,
			'method'=>'post',
			'url'=>'/admin/users/store',
			'title'=>'添加用户'
		];
		return view('/admin/user/create',compact(['formParams']));
	}
	//添加 管理员的记录
	public function store(){
		$this->validate(request(),[
				'name'=>'required|min:3|unique:users,name',
				'password'=>'required|min:5|confirmed'
		]);
		$password = bcrypt(request('password'));
		$name = request('name');
		$email = request('email');
		$user = \App\AdminUser::create(compact('name', 'password'));
		return redirect('/admin/users');
	}
	//用户角色页面
	public function role(AdminUser $user){
		//获取所有的角色
		$roles = AdminRole::all();
		//获取当前 user 拥有的权限
		$myroles = $user->roles;
		return view('admin/user/role',compact(['roles','myroles','user']));
	}
	//修改用户的角色行为
	public function roleStore(AdminUser $user){
		$this->validate(request(),[
			'roles'=>'required|array',
		]);
		//选中的所遇角色
        $roles = AdminRole::findMany(request('roles'));
        //已经拥有的角色
        $myRoles = $user->roles;
        //要增加
        $addRoles = $roles->diff($myRoles);

        foreach($addRoles as $addRole){
            $user->assignRole($addRole);
		}
		//要删除的
		$deleteRoles = $myRoles->diff($roles);
		foreach($deleteRoles as $deleteRole){
            $user->deleteRole($deleteRole);
		}

		return redirect('/admin/users');

	}
	//用户信息修改的 渲染页面
	public function editUser(AdminUser $user){
		$formParams = [
				'isEdit'=>true,
				'method'=>'post',
				'url'=>'/admin/users/'.$user->id.'/store',
				'params'=>$user,
				'title'=>'修改用户信息'
		];
		return view('/admin/user/create',compact(['formParams']));
	}
	//修改用户的信息
	public function editUserInfo(AdminUser $user){
		//
		$this->validate(request(),[
				'name'=>'required|min:3|unique:users,name',
				'password'=>'required|min:5|confirmed'
		]);
		$password = bcrypt(request('password'));
		$name = request('name');
		$email = request('email');
		$user->update(compact('name', 'password'));
		return redirect('/admin/users');

	}
}