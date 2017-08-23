<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts',function(Blueprint $table){
            // 自增 id
            $table ->increments('id');
            // varchar -> string    default 设置默认值
            $table->string('title', 100)->default("");
            $table->text('content');
            // 外键 int 型
            $table->integer('user_id')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     * 回滚
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('posts');
    }
}
