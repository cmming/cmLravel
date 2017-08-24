<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //页面
    public function index(){
        return view('register/register');
    }
    // 注册的行为
    public function register(){
        // 接受参数 并且验证 数据的 准确性
        
        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|min:3|unique:users,email,email',
            'password'=>'required|min:5|confirmed'
        ]);
        $password = bcrypt(request('password'));
        $name = request('name');
        $email = request('email');
        $user = \App\User::create(compact('name', 'email', 'password'));
        return redirect('/login');
        // 数据库的处理

        // 重定向
    }
}
