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

class UserController extends Controller
{
	public function index(){
		//获取所有的 用户
		$adminUsers = AdminUser::orderBy('created_at','desc')->paginate(6);
		return view('/admin/user/index',compact(['adminUsers']));
	}
	//管理员创建页面
	public function create(){
		return view('/admin/user/create');
	}
	//添加 管理员的记录
	public function store(){
//		dd()
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
}