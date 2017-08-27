<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Comment;
use \App\Zan;

class PostController extends Controller
{
    //列表页面
	public function index(){
		$posts = Post::OrderBy("created_at",'desc')->withCount(['comments','zans'])->paginate(6);
		return view('post/index',compact('posts'));
	}

	//详情页面
	public function show(Post $post){
		// 预加载 文章 模型中奖 评论的 作者 进行预加载
		$post->load('comments');
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

		if(!\Auth::check()){
			return \Redirect::back()->withErrors("必须登录才能写文章！");
		}
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
		// 同时要进行关联删除
		$post->zan(\Auth::id())->delete();
		// 关联删除 相关的 评论
		$post->comments()->delete();

		return redirect('/posts');
	}
	// 图片 上传
	public function imageUpload(Request $request){
		$path = $request->file('wangEditorH5File')->storePublicly(md5(\Auth::id() . time()));
		// dd($path);
        return asset('storage/'. $path);
	}

	// 提交 评论
	public function comment(Post $post){

		// 权限验证
		if(!\Auth::check()){
			return \Redirect::back()->withErrors("必须登录才能评论！");
		}

		// 验证
		$this->validate(request(), [
            'content' => 'required|min:10',
        ]);
		// 提交
		// 处理数据
		$comment = new Comment();
		$comment->user_id = \Auth()->id();
		$comment->content = request('content');

		$post->comments()->save($comment);
		// 重定向

		return back();
	}

	public function zan(Post $post){
		if(!\Auth::check()){
			return \Redirect::back()->withErrors("必须登录才能点赞！");
		}
		$params = [
			'user_id'=>\Auth::id(),
			'post_id'=>$post->id
		];
		// dd($params);
		Zan::firstOrCreate($params);
		return back();
	}
	public function unzan(Post $post){
		// post 的zan 模型
		$post->zan(\Auth::id())->delete();

		return back();
	}
}
