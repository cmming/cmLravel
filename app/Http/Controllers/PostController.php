<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //列表页面
	public function index(){
		return view('post/index');
	}

	//详情页面
	public function show(){}

	//创建页面
	public function create(){}
	//具体的创建逻辑
	public function store(){}

	//edit
	public function edit(){}

	//编辑的逻辑
	public function update(){}

	//删除
	public function delete(){}
}
