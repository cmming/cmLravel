<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comments',function(Blueprint $table){
            // 自增 id
            $table ->increments('id');
            // varchar -> string    default 设置默认值
            // 外键 int 型 关联文章
            $table->integer('post_id')->default(0);
            // 评论的内容
            $table->text('content');
            // 关联用户
            $table->integer('user_id')->default(0);
            // 时间戳
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('comments');
    }
}
