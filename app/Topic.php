<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Model;

class Topic extends Model
{
    //
    public function posts(){
        //多对多
        return $this->belongsToMany('\App\Post','post_topics','topic_id','post_id');
    }
    //获取专题的 文章数量
    public function postTopics(){
        return $this->hasMany('\App\PostTopic','topic_id');
    }
}
