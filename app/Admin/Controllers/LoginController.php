<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 13:47
 */

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Admin\Controllers\Controller;

class LoginController extends Controller
{
	//渲染 一个登录的页面
	public function index(){
		return view('admin.login.index');
	}
	//登录操作
	public function login(){
		$this->validate(request(), [
				'name' => 'required|min:2',
				'password' => 'required|min:6|max:30',
		]);

		$user = request(['name', 'password']);
		if (true == \Auth::guard('admin')->attempt($user)) {
			return redirect('/admin/home');
		}

		return \Redirect::back()->withErrors("用户名密码错误");
	}

	/**
	 * 退出 登录
	 */
	public function logout(){
		\Auth::guard('admin')->logout();
		return redirect('/admin/login');
	}
}