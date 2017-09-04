<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 13:32
 */

//添加管理后台的路由
Route::group(['prefix'=>'admin'],function(){
	Route::get('/login','\App\Http\Controllers\Admin\LoginController@index')->name('admin.login');
	Route::post('/login','\App\Http\Controllers\Admin\LoginController@login');
	Route::get('/logout','\App\Http\Controllers\Admin\LoginController@logout');
	//增加一个 MIDDLEWARE 需要登录
	Route::group(['middleware'=>'auth:admin'],function(){
		Route::get('/mail','\App\Http\Controllers\Admin\PostUserController@mail');
		Route::get('/mailHtml','\App\Http\Controllers\Admin\PostUserController@mailHtml');
		//发送邮件的页面
		Route::get('/sendEmail/{mail}','\App\Http\Controllers\Admin\MailController@sendEmail');
        Route::post('/sendEmail','\App\Http\Controllers\Admin\MailController@sendEmailStore');
        //发送邮件的 队列
        Route::get('/queue','\App\Http\Controllers\Admin\MailController@queue');

        //定义页面的 首页
		Route::get('/home','\App\Http\Controllers\Admin\HomeController@index');
		//添加权限管理的控制器
		Route::group(['middleware'=>'can:system'],function(){
			//用户管理
			//管理人员 列表页面
			Route::get('/users','\App\Http\Controllers\Admin\UserController@index');
			//创建用户的页面
			Route::get('/users/create','\App\Http\Controllers\Admin\UserController@create');
			//创建用户的 逻辑操作
			Route::post('/users/store','\App\Http\Controllers\Admin\UserController@store');
			//一个用户的角色
			Route::get('/users/{user}/role','\App\Http\Controllers\Admin\UserController@role');
			//修改用户的角色
			Route::post('/users/{user}/role','\App\Http\Controllers\Admin\UserController@roleStore');
			//修改的页面渲染控制器
			Route::get('/users/{user}/create','\App\Http\Controllers\Admin\UserController@editUser');
			//修改一个用户的信息
			Route::post('/users/{user}/store','\App\Http\Controllers\Admin\UserController@editUserInfo');


			//角色
			Route::get('/roles','\App\Http\Controllers\Admin\RoleController@index');
			Route::get('/roles/create','\App\Http\Controllers\Admin\RoleController@create');
			Route::post('/roles/store','\App\Http\Controllers\Admin\RoleController@store');
			Route::get('/roles/{role}/edit','\App\Http\Controllers\Admin\RoleController@editRole');
			Route::post('/roles/{role}/edit','\App\Http\Controllers\Admin\RoleController@editRoleStore');
			//角色与权限关系
			Route::get('/roles/{role}/premission','\App\Http\Controllers\Admin\RoleController@premission');
			Route::post('/roles/{role}/premission','\App\Http\Controllers\Admin\RoleController@premissionStore');

			//邮件模版页面
			Route::resource('mails','\App\Http\Controllers\Admin\MailController');



			//权限模块
			Route::get('/premissions','\App\Http\Controllers\Admin\AdminPremissionController@index');
			Route::get('/premission/create','\App\Http\Controllers\Admin\AdminPremissionController@create');
			Route::post('/premission/store','\App\Http\Controllers\Admin\AdminPremissionController@store');
			Route::get('/premission/{premission}/edit','\App\Http\Controllers\Admin\AdminPremissionController@edit');
			Route::post('/premission/{premission}/editStore','\App\Http\Controllers\Admin\AdminPremissionController@editStore');
			Route::post('/premission/{premission}/delete','\App\Http\Controllers\Admin\AdminPremissionController@deleteStore');
		});


		//添加文章审核 中间件
		Route::group(['middleware'=>'can:post'],function(){
			//文章管理页面
			Route::get('/posts','\App\Http\Controllers\Admin\PostController@index');
			//修改文章的 状态
			Route::post('/posts/{post}/status','\App\Http\Controllers\Admin\PostController@status');
		});
		//专题模块 列表 增加 修改 使用 资源型(resource) 进行数据的获取
		Route::group(['middleware'=>'can:topic'],function(){
			//专题管理页面
			Route::resource('topics','\App\Http\Controllers\Admin\TopicController',['only'=>['index','create','store','destroy','edit','update']]);
		});
		//通知模块 列表 增加 修改 使用 资源型(resource) 进行数据的获取
		Route::group(['middleware'=>'can:notice'],function(){
			//专题管理页面
			Route::resource('notices','\App\Http\Controllers\Admin\NoticeController',['only'=>['index','create','store','destroy','edit','update']]);
		});
		//通知模块 列表 增加 修改 使用 资源型(resource) 进行数据的获取
		Route::group(['middleware'=>'can:postUser'],function(){
			//使用资源的方式 获取 前台的作者
			Route::resource('postUsers','\App\Http\Controllers\Admin\PostUserController',['only'=>'index']);
			//添加角色
			Route::get('/postUsers/create','\App\Http\Controllers\Admin\PostUserController@create');
			Route::post('/postUsers/store','\App\Http\Controllers\Admin\PostUserController@store');
			Route::get('/postUsers/{postUser}/role','\App\Http\Controllers\Admin\PostUserController@role');
			Route::get('/postUsers/{postUser}/edit','\App\Http\Controllers\Admin\PostUserController@edit');
			Route::put('/postUsers/{postUser}','\App\Http\Controllers\Admin\PostUserController@update');
			//修改用户的角色
			Route::post('/postUsers/{postUser}/role','\App\Http\Controllers\Admin\PostUserController@roleStore');
			//为前端用户发送消息
			Route::get('/postUsers/{postUser}/notice','\App\Http\Controllers\Admin\PostUserController@notice');
			Route::post('/postUsers/{postUser}/notice','\App\Http\Controllers\Admin\PostUserController@noticeStore');
		});
	});
});