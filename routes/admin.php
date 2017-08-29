<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 13:32
 */

//添加管理后台的路由
Route::group(['prefix'=>'admin'],function(){
	Route::get('/login','\App\Admin\Controllers\LoginController@index')->name('login');
	Route::post('/login','\App\Admin\Controllers\LoginController@login');
	Route::get('/logout','\App\Admin\Controllers\LoginController@logout');
	//增加一个 MIDDLEWARE 需要登录
	Route::group(['middleware'=>'auth:admin'],function(){
		//定义页面的 首页
		Route::get('/home','\App\Admin\Controllers\HomeController@index');

		//用户管理
		//管理人员 列表页面
		Route::get('/users','\App\Admin\Controllers\UserController@index');
		//创建用户的页面
		Route::get('/users/create','\App\Admin\Controllers\UserController@create');
		//创建用户的 逻辑操作
		Route::post('/users/store','\App\Admin\Controllers\UserController@store');
		//一个用户的角色
		Route::get('/users/{user}/role','\App\Admin\Controllers\UserController@role');
		//修改用户的角色
		Route::get('/users/{user}/roleStore','\App\Admin\Controllers\UserController@roleStore');


		//角色
		Route::get('/roles','\App\Admin\Controllers\RoleController@index');
		Route::get('/roles/create','\App\Admin\Controllers\RoleController@create');
		Route::post('/roles/store','\App\Admin\Controllers\RoleController@store');
		//角色与权限关系
		Route::get('/roles/{role}/premission','\App\Admin\Controllers\RoleController@premission');
		Route::post('/roles/{role}/premission','\App\Admin\Controllers\RoleController@premissionStore');



		//权限模块
		Route::get('/premissions','\App\Admin\Controllers\PremissionController@index');
		Route::get('/premission/create','\App\Admin\Controllers\PremissionController@create');
		Route::post('/premission/store','\App\Admin\Controllers\PremissionController@store');
		Route::get('/premission/{premission}/edit','\App\Admin\Controllers\PremissionController@edit');
		Route::post('/premission/edit','\App\Admin\Controllers\PremissionController@editStore');


		//文章管理页面
		Route::get('/posts','\App\Admin\Controllers\PostController@index');
		//修改文章的 状态
		Route::post('/posts/{post}/status','\App\Admin\Controllers\PostController@status');

	});
});