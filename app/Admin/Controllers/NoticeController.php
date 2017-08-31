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
use App\Jobs\SendNotice;

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
				'isEdit'=>false,
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
		$notice = Notice::create(request(['title','content']));
		//在这里 让通知在创建的时候默认发给前台的每一个用户(触发队列任务) dispatch
		dispatch(new SendNotice($notice));
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