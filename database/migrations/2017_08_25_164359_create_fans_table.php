<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fans',function(Blueprint $table){
            // 自增 id
            $table ->increments('id');
            // varchar -> string    default 设置默认值
            //  关注人的 id
            $table->integer('fan_id')->default(0);
            // 关联用户 被关注人的 id
            $table->integer('start_id')->default(0);
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
        Schema::dropIfExists('fans');
    }
}
