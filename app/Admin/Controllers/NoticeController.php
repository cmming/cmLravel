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
use App\Notice;

class NoticeController extends Controller
{
	//获取 文章专题页面
	public function index(){
		$notices = Notice::orderBy('id','asc')->paginate(3);
		return view('admin/notice/index',compact(['notices']));
	}
	//添加
	public function create(){
		$formParams = [
				'isEdit'=>true,
				'method'=>'post',
				'url'=>'/admin/notices',
				'title'=>'添加通知'
		];
		return view('admin/notice/create',compact(['formParams']));
	}
	//保存
	public function store(){
		$this->validate(request(),[
			'title'=>'required',
			'content'=>'required'
		]);
		Notice::create(request(['title','content']));
		return redirect('admin/notices');
	}
	//删除
	public function destroy(Notice $notice){
		$notice->delete();
		return [
				'error'=>0,'msg'=>'删除成功！'
		];
	}
	//修改页面
	public function edit(Notice $notice){
		$formParams = [
				'isEdit'=>true,
				'method'=>'put',
				'url'=>'/admin/notices/'.$notice->id,
				'params'=>$notice,
				'title'=>'修改通知'
		];
		return view('admin/notice/create',compact(['formParams']));
	}
	//更新
	public function update(Notice $notice){
		$notice->update(['title'=>request('title'),'content'=>request('content')]);
		return redirect('admin/notices');
	}
}