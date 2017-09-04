<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topic;

class TopicController extends Controller
{
    //文章 专题详情页面
    public function show(Topic $topic){
        //专题的文章数量
        $topic = Topic::withCount('postTopics')->find($topic->id);
        //专题文章列表的数据
        $posts = $topic->posts()->orderBy('created_at','desc')->take(10)->get();

        //获取属于作者 但是不属于 该专题的文章列表
        $myposts = \App\Post::authorBy(\Auth::id())->topicNotBy($topic->id)->get();
        return view('topic/show',compact('topic','posts','myposts'));
    }
    public function submit(Topic $topic){
        $this->validate(request(),[
            'post_ids'=>'required|array'
        ]);
        $post_ids = request('post_ids');
        $topic_id = $topic->id;
        foreach ($post_ids as $post_id){
            \App\PostTopic::firstOrCreate(compact('topic_id','post_id'));
        }
        return back();
    }
}
