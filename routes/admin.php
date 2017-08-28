<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 13:32
 */

//添加管理后台的路由
Route::group(['prefix'=>'admin'],function(){
	Route::get('/login','\App\Admin\Controllers\LoginController@index');
	Route::post('/login','\App\Admin\Controllers\LoginController@login');
	Route::get('/logout','\App\Admin\Controllers\LoginController@logout');
	//增加一个 middleware 需要登录
	Route::group(['middleware'=>'auth:admin'],function(){
		//定义页面的 首页
		Route::get('/home','\App\Admin\Controllers\HomeController@index');
		//管理人员 列表页面
		Route::get('/users','\App\Admin\Controllers\UserController@index');
		//创建用户的页面
		Route::get('/users/create','\App\Admin\Controllers\UserController@create');
		//创建用户的 逻辑操作
		Route::post('/users/store','\App\Admin\Controllers\UserController@store');

		//文章管理页面
		Route::get('/posts','\App\Admin\Controllers\PostController@index');
		//修改文章的 状态
		Route::post('/posts/{post}/status','\App\Admin\Controllers\PostController@status');

	});
});