<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Admin\Controllers\Controller;
use App\Mail;
use App\User;

class MailController extends Controller
{
    //
	public function index(){
		$mails = \App\Mail::orderBy('created_at','desc')->paginate(6);
		return view('admin/mail/index',compact(['mails']));
	}
	public function create(){
		$formParams = [
			'url'=>'admin/mails',
			'method'=>'post',
			'isEdit'=>false,
			'title'=>'添加邮件模版'
		];
		return view('admin/mail/create',compact(['formParams']));
	}
	//添加 保存
	public function store(){
		$this->validate(request(),[
			'title'=>'required|min:5',
			'content'=>'required|min:10',
		]);
		//
		Mail::create(request(['title','content']));

		return redirect('admin/mails');
	}
	//删除
	public function destroy(Mail $mail){
		$mail->delete();
		return redirect('admin/mails');
	}
	//修改

	public function edit(Mail $mail){
		$formParams = [
			'url'=>'admin/mails/'.$mail->id,
			'method'=>'PUT',
			'isEdit'=>true,
			'title'=>'修改邮件模版',
			'params'=>$mail
		];
		return view('admin/mail/create',compact(['formParams']));
	}
	public function update(Mail $mail){
		$this->validate(request(),[
			'title'=>'required|min:5',
			'content'=>'required|min:10',
		]);
		//
		$mail->update(request(['title','content']));

		return redirect('admin/mails');
	}

	public function sendEmail(Mail $mail)
	{
		//获取所有的 用户
		$all_users = User::orderBy('created_at','desc')->get();
		return view('admin/mail/sendEmail',compact(['all_users','mail']));
	}
}
