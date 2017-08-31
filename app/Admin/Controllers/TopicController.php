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
use App\Topic;

class TopicController extends Controller
{
	//获取 文章专题页面
	public function index(){
		$topics = Topic::orderBy('id','asc')->paginate(3);
		return view('admin/topic/index',compact(['topics']));
	}
	//添加
	public function create(){
		$formParams = [
				'isEdit'=>false,
				'method'=>'post',
				'url'=>'/admin/topics',
				'title'=>'添加专题'
		];
		return view('admin/topic/create',compact(['formParams']));
	}
	//保存
	public function store(){
		$this->validate(request(),[
			'name'=>'required|string:2:10'
		]);
		Topic::create(['name'=>request('name')]);
		return redirect('admin/topics');
	}
	//删除
	public function destroy(Topic $topic){
		$topic->delete();
		return [
				'error'=>0,'msg'=>'删除成功！'
		];
	}
	//修改页面
	public function edit(Topic $topic){
		$formParams = [
				'isEdit'=>true,
				'method'=>'put',
				'url'=>'/admin/topics/'.$topic->id,
				'params'=>$topic,
				'title'=>'修改专题'
		];
		return view('admin/topic/create',compact(['formParams']));
	}
	//更新
	public function update(Topic $topic){
		$topic->update(request(['name']));
		return redirect('admin/topics');
	}
}