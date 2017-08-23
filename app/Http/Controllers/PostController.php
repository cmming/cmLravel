<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    //列表页面
	public function index(){
		// $posts =[
		// 	['title' => 'this is title1'],
		// 	['title' => 'this is title2'],
		// 	['title' => 'this is title3'],
		// ];
		// $topics = [];
		//
		$posts = Post::OrderBy("created_at",'desc')->paginate(6);
		return view('post/index',compact('posts'));
	}

	//详情页面
	public function show(Post $post){
		return view('post/show',compact('post'));
	}

	//创建页面
	public function create(){
		return view('post/create');
	}
	//具体的创建逻辑
	public function store(){
		// dd(request('title'));
		// $post = new Post();
		// $post->title = request('title');
		// $post->content = request('content');
		// $post->save();
		// $post = Post::create(['title'=>request('title'),'content'=>request('content')]);

		// 数据进行验证
		$this->validate(request(),[
			'title'=>'required|string|max:100|min:3',
			'content'=>'required|string|min:10',
		]);
		$post = Post::create(request(['title','content']));

		return redirect("/posts");
	}

	//edit
	 public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }

	//编辑的逻辑
	public function update(){}

	//删除
	public function delete(){}
	// 图片 上传
	public function imageUpload(){}
}
