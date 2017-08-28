<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    // protected Post
    // 测试 post 这个类是否好用 使用tinker
    // 文章关联用户 模型关联 遵循 表名 _id  外键  id 作为内建
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    // 文章进行关联 评论模块
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }

    // 将文章和 赞 的关联
    public function zan($user_id){
        return $this->hasOne('App\Zan')->where('user_id',$user_id);
    }

    public function zans(){
        return $this->hasMany('App\Zan');
    }
    //属于 属于作者的文章 作用域
    public function scopeAuthorBy(Builder $query,$user_id)
    {
        return $query->where('user_id',$user_id);
    }
    //topic 和 post 的关系模型
    public function postTopics(){
        return $this->hasMany('\App\PostTopic','post_id','id');
    }
    public function scopeTopicNotBy(Builder $query,$topic_id){
        //匿名 函数 的使用方法
        return $query->doesntHave('postTopics','and',function($q) use($topic_id){
            $q->where('topic_id',$topic_id);
        });
    }
    //使用全局 scope
    protected static function boot(){
        parent::boot();
        static::addGlobalScope('avaible',function(Builder $builder){
            $builder->whereIn('status',[0,1]);
        });
    }


}
