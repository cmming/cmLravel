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
use App\Post;

class PostController extends Controller
{
	//获取 文章列表页面
	public function index(Post $post){
		$posts = Post::withoutGlobalScope('avaible')->where('status','0')->paginate(1);
		return view('admin.post.index',compact(['posts']));
	}
	public function status(Post $post){
		//验证
		$this->validate(request(),[
			'status'=>'required|in:-1,1'
		]);
		$post->status = request('status');
		$post->save();
		return [
			'error'=>'0',
			'msg'=>''
		];
	}
}