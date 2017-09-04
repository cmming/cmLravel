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
use App\User;
use App\AdminRole;
use App\Notice;
use Illuminate\Contracts\Mail;

class PostUserController extends Controller
{
	public function index(){
		//
		//获取所有的 用户
		$postUsers = user::orderBy('created_at','desc')->paginate(6);
		return view('/admin/postUser/index',compact(['postUsers']));
	}
	//添加用户的页面
	public function create(){
		$formParams = [
				'title'=>'添加用户信息',
				'isEdit'=>false,
				'method'=>'post',
				'url'=>'admin/postUsers/store',
		];
		return view('admin/postUser/create',compact(['formParams']));
	}
	//添加用户的页面
	public function store(){
		$this->validate(request(),[
				'name'=>'required|min:3|unique:users,name',
				'email'=>'required|min:3|unique:users,email,email',
				'password'=>'required|min:5|confirmed'
		]);
		User::create(request(['name','email','password']));
		return redirect('admin/postUsers');
	}
	public function role(user $postUser){
		$roles = AdminRole::all();
		$myroles = $postUser->roles;
		return view('admin/postUser/role',compact(['roles','postUser','myroles']));
	}
	// 保存 用户的权限
	public function roleStore(user $postUser){
		//接收参数
		$this->validate(request(),[
			'roles'=>'required|array',
		]);
		//该用户已经拥有的 角色
		$myRoles = $postUser->roles;
		//选中的角色
		$checkRoles = AdminRole::findMany(request('roles'));
		//要增加的角色
		$addRoles = $checkRoles->diff($myRoles);
		foreach($addRoles as $addRole){
			$postUser->addRole($addRole);
		}
		//要删除的角色
		$deleteRoles = $myRoles->diff($checkRoles);
		foreach($deleteRoles as $deleteRole){
			$postUser->deleteRole($deleteRole);
		}

		return redirect('admin/postUsers');
	}
	//为 用户修改信息 页面
	public function edit(User $postUser){
		$formParams = [
			'title'=>'修改用户信息',
			'isEdit'=>true,
			'method'=>'put',
			'url'=>'admin/postUsers/'.$postUser->id,
			'params'=>$postUser
		];
		return view('admin/postUser/create',compact(['formParams']));
	}
	public function update(User $postUser){
//		dd(request());
		$this->validate(request(),[
			'name'=>'required|min:2'
		]);
		$postUser->update(request(['name']));
		return redirect('admin/postUsers');
	}
	//用户与通知的关联
	public function notice(User $postUser)
	{
		//获取所有的通知模版
		$notices = Notice::orderBy('created_at','desc')->paginate(6);
		//已经拥有的通知
		$mynotices = $postUser->notices;
		//跳转到通知模版页面
		return view('admin/postUser/notice',compact(['notices','postUser','mynotices']));
	}
	//为用户发送通知
	public function noticeStore(User $postUser){
		//验证数据
		$this->validate(request(),[
			'notices'=>'array'
		]);
		//已经选中的通知
		$check_notice = Notice::findMany(request('notices'));
		//已经发送了的通知
		$my_notice = $postUser->notices;
		//需要添加的
		$add_notices = $check_notice->diff($my_notice);
		foreach ($add_notices as $item) {
			$postUser->addNotice($item);
		}
		//要删除的通知
		$delete_notice = $my_notice->diff($check_notice);
		foreach($delete_notice as $item){
			$postUser->deleteNotice($item);
		}
		return redirect('admin/postUsers');
	}
	public function mail(){
		\Mail::raw('邮件内容',function($message){
			$message->from('13037125104@163.com','陈明');
			$message->subject('主题');
			$message->to('294225707@qq.com');
		});
	}
	//发送 html 的邮件
	public function mailHtml(){
		\Mail::send('mail.index',['name'=>'chenming'],function($message){
			$message->from('13037125104@163.com','陈明');
			$message->subject('html邮件');
			$message->to('294225707@qq.com');
		});
	}

}