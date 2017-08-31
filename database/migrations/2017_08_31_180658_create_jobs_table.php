<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {

            $table->bigIncrements('id');
            //队列的名称
            $table->string('queue');
            //队列的数据存储的位置
            $table->longText('payload');
            //尝试的次数
            $table->unsignedTinyInteger('attempts');
            //保留时间
            $table->unsignedInteger('reserved_at')->nullable();
            //
            $table->unsignedInteger('available_at');
            //创建时间
            $table->unsignedInteger('created_at');

            $table->index(['queue', 'reserved_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
