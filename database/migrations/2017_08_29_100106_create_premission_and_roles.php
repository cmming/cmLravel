<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremissionAndRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //管理员角色表
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','30')->default('');
            $table->string('desc','100')->default('');
            $table->string('password',100);
            $table->timestamps();
        });
        //权限表
        Schema::create('admin_premissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','30')->default('');
            $table->string('desc','100')->default('');
            $table->string('password',100);
            $table->timestamps();
        });
        //权限角色 关系表
        Schema::create('admin_premission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('premission_id');
            $table->timestamps();
        });
        //用户角色表
        Schema::create('admin_role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('admin_roles');
        Schema::dropIfExists('admin_premissions');
        Schema::dropIfExists('admin_premission_role');
        Schema::dropIfExists('admin_role_user');
    }
}
