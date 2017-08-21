<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //列表页面
	public function index(){
		$posts =[
			['title' => 'this is title1'],
			['title' => 'this is title2'],
			['title' => 'this is title3'],
		];
		$topics = [];
		//
		return view('post/index',compact('posts','topics'));
	}

	//详情页面
	public function show(){
		return view('post/show');
	}

	//创建页面
	public function create(){
		return view('post/create');
	}
	//具体的创建逻辑
	public function store(){}

	//edit
	public function edit(){
		return view('post/edit');
	}

	//编辑的逻辑
	public function update(){}

	//删除
	public function delete(){}
}
