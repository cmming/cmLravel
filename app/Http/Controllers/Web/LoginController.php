<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // //页面的渲染
	// public function index()
	// {
	// 	if(\Auth::check()) {
	// 		return redirect("/posts");
	// 	}

	// 	return view("login/index");
	// }
	// 登录页面的渲染
	public function index(){
		return view('login/login');
	}
	// 登录的逻辑部分
	public function login(Request $request){
		// 对数据 进行验证
		$this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:30',
            'is_remember' => '',
        ]);

        $user = request(['email', 'password']);
        $remember = boolval(request('is_remember'));
        if (true == \Auth::attempt($user, $remember)) {
           return redirect('/posts');
        }

        return \Redirect::back()->withErrors("用户名密码错误");

		// 修改用户的登录 状态
		// dd(request());
	}
	
	public function logout(){
		\Auth::logout();

		return redirect('/login');
	}
}
