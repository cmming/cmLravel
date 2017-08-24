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
		// 添加用户
		$user_id = \Auth::id();
		$parpams = array_merge(request(['title','content']),compact('user_id'));

		// dd($parpams);
		$post = Post::create($parpams);

		return redirect("/posts");
	}

	//edit
	 public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }

	//编辑的逻辑
	public function update(Request $request, Post $post){
		// 数据验证
		 $this->validate($request, [
            'title' => 'required|max:255|min:4',
            'content' => 'required|min:10',
        ]);

		// 编辑权限的添加
		$this->authorize('update',$post);

        $post->update(request(['title', 'content']));
        return redirect("/posts/{$post->id}");
	}

	//删除
	public function delete(Post $post){

		// TODO 用户的 权限
		// 编辑权限的添加
		$this->authorize('delete',$post);
		
		$post->delete();

		return redirect('/posts');
	}
	// 图片 上传
	public function imageUpload(Request $request){
		$path = $request->file('wangEditorH5File')->storePublicly(md5(\Auth::id() . time()));
		// dd($path);
        return asset('storage/'. $path);
	}
}
