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
		//添加权限管理的控制器
		Route::group(['middleware'=>'can:system'],function(){
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
			Route::post('/users/{user}/role','\App\Admin\Controllers\UserController@roleStore');
			//修改的页面渲染控制器
			Route::get('/users/{user}/create','\App\Admin\Controllers\UserController@editUser');
			//修改一个用户的信息
			Route::post('/users/{user}/store','\App\Admin\Controllers\UserController@editUserInfo');


			//角色
			Route::get('/roles','\App\Admin\Controllers\RoleController@index');
			Route::get('/roles/create','\App\Admin\Controllers\RoleController@create');
			Route::post('/roles/store','\App\Admin\Controllers\RoleController@store');
			Route::get('/roles/{role}/edit','\App\Admin\Controllers\RoleController@editRole');
			Route::post('/roles/{role}/edit','\App\Admin\Controllers\RoleController@editRoleStore');
			//角色与权限关系
			Route::get('/roles/{role}/premission','\App\Admin\Controllers\RoleController@premission');
			Route::post('/roles/{role}/premission','\App\Admin\Controllers\RoleController@premissionStore');



			//权限模块
			Route::get('/premissions','\App\Admin\Controllers\AdminPremissionController@index');
			Route::get('/premission/create','\App\Admin\Controllers\AdminPremissionController@create');
			Route::post('/premission/store','\App\Admin\Controllers\AdminPremissionController@store');
			Route::get('/premission/{premission}/edit','\App\Admin\Controllers\AdminPremissionController@edit');
			Route::post('/premission/{premission}/editStore','\App\Admin\Controllers\AdminPremissionController@editStore');
			Route::post('/premission/{premission}/delete','\App\Admin\Controllers\AdminPremissionController@deleteStore');
		});


		//添加文章审核 中间件
		Route::group(['middleware'=>'can:post'],function(){
			//文章管理页面
			Route::get('/posts','\App\Admin\Controllers\PostController@index');
			//修改文章的 状态
			Route::post('/posts/{post}/status','\App\Admin\Controllers\PostController@status');
		});
		//专题模块 列表 增加 修改 使用 资源型(resource) 进行数据的获取
		Route::group(['middleware'=>'can:topic'],function(){
			//专题管理页面
			Route::resource('topics','\App\Admin\Controllers\TopicController',['only'=>['index','create','store','destroy','edit','update']]);
		});
		//通知模块 列表 增加 修改 使用 资源型(resource) 进行数据的获取
		Route::group(['middleware'=>'can:notice'],function(){
			//专题管理页面
			Route::resource('notices','\App\Admin\Controllers\NoticeController',['only'=>['index','create','store','destroy','edit','update']]);
		});
		//通知模块 列表 增加 修改 使用 资源型(resource) 进行数据的获取
		Route::group(['middleware'=>'can:postUser'],function(){
			//使用资源的方式 获取 前台的作者
			Route::resource('postUsers','\App\Admin\Controllers\PostUserController',['only'=>'index']);
			//添加角色
			Route::get('/postUsers/create','\App\Admin\Controllers\PostUserController@create');
			Route::post('/postUsers/store','\App\Admin\Controllers\PostUserController@store');
			Route::get('/postUsers/{postUser}/role','\App\Admin\Controllers\PostUserController@role');
			Route::get('/postUsers/{postUser}/edit','\App\Admin\Controllers\PostUserController@edit');
			Route::put('/postUsers/{postUser}','\App\Admin\Controllers\PostUserController@update');
			//修改用户的角色
			Route::post('/postUsers/{postUser}/role','\App\Admin\Controllers\PostUserController@roleStore');
		});
	});
});