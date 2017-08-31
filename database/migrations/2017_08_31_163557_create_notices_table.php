<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //系统 通知表
        Schema::create('notices',function(Blueprint $table){
            $table->integer('id');
            $table->string('title',30)->default('');
            $table->string('content',1000)->default('');
            $table->timestamps();
        });
        //系统通知与用户的关系表
        Schema::create('user_notice',function(Blueprint $table){
            $table->integer('id');
            $table->integer('user_id');
            $table->integer('notice_id');
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
        Schema::dropIfExists('notices');
        Schema::dropIfExists('user_notice');
    }
}
