<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','\App\Http\Controllers\Web\LoginController@index');

/**
 * 文章路由部分
 * 1.文章列表
 * 2.添加
 * 3.修改
 * 4.删除
 * 5.详情
 * 路由 注册注册的 顺序从特殊到普通。否则会报错，http://cache.baiducontent.com/c?m=9f65cb4a8c8507ed4fece763101d8c24431697634b868d4a6291c4188e3a08011422b4e53a7c434480812b3916af3f08aaad6933200357eddd97d65e98e6d27e20d47a23706dc506459352b8cb37659661d704afee0ee7cba46fd3b9d2a28009059d0d127af1e78b2b1715ba3cb25626e2d68e4f644811caaf6d24b94e7758882337&p=90759a46d6c919fc57efd52c1741c1&newp=9a7dc54ad5c34bdd10be9b7c500acd231610db2151d1da01298ffe0cc4241a1a1a3aecbf21251405d8c77b6100a5485bebfb3c71310434f1f689df08d2ecce7e5dc0&user=baidu&fm=sc&query=No+query+results+for+model+%5BApp%5CPost%5D%2E&qid=b71c008a0007380f&p1=2
 * 路由传递对象的时候 也应该是用单数形式 要不报错
 */
Route::get("/",'\App\Http\Controllers\Web\PostController@index');
// 页面的注册
Route::get("/register",'\App\Http\Controllers\Web\RegisterController@index');
// 注册的行为
Route::post("/register",'\App\Http\Controllers\Web\RegisterController@register');
// 登录页面
Route::get("/login",'\App\Http\Controllers\Web\LoginController@index');
// 登录行为
Route::post("/login",'\App\Http\Controllers\Web\LoginController@login')->name('login');
// 登出行为
Route::get("/logout",'\App\Http\Controllers\Web\LoginController@logout');


Route::group(['middleware' => 'auth:web'], function() {
	Route::group(['middleware' =>'can:post'],function(){
		//创建页面
		Route::get("/posts/create", "\App\Http\Controllers\Web\PostController@create");
		//创建 的逻辑
		Route::post("/posts", "\App\Http\Controllers\Web\PostController@store");
		//编辑
		Route::get("/posts/{post}/edit", "\App\Http\Controllers\Web\PostController@edit");
		//提交
		Route::put("/posts/{post}", "\App\Http\Controllers\Web\PostController@update");
		//删除
		Route::get("/posts/{post}/delete", "\App\Http\Controllers\Web\PostController@delete");
	});
});

	// 个人 设置 中心
	Route::get("/user/me/setting", '\App\Http\Controllers\Web\UserController@index');
	// 个人 设置 操作
	Route::post("/user/me/setting", '\App\Http\Controllers\Web\UserController@settingStore');


	//1.列表页面
	Route::get("/posts", '\App\Http\Controllers\Web\PostController@index')->name('post.default');
	// 图片上传
	Route::get("/posts/image/upload", "\App\Http\Controllers\Web\PostController@imageUpload");
	//2.文章的详情页面
	Route::get("/posts/{post}", "\App\Http\Controllers\Web\PostController@show");
	// 提交评论
	Route::post("/posts/{post}/comment", '\App\Http\Controllers\Web\PostController@comment');
	// 赞
	Route::get("/posts/{post}/zan", '\App\Http\Controllers\Web\PostController@zan');
	Route::get("/posts/{post}/unzan", '\App\Http\Controllers\Web\PostController@unzan');
	// 个人中心
	Route::get("/user/{user}", '\App\Http\Controllers\Web\UserController@index');
	// 个人设置 页面
	Route::get("/user/{user}/setting", '\App\Http\Controllers\Web\UserController@setting');
	//关注一个用户
	Route::post("/user/{user}/fan", '\App\Http\Controllers\Web\UserController@fan');
	Route::post("/user/{user}/unFan", '\App\Http\Controllers\Web\UserController@unFan');
	//文章专题的详情页面 路由
	Route::get("/topic/{topic}", '\App\Http\Controllers\Web\TopicController@show');
	//文章专题投稿
	Route::post("/topic/{topic}/submit", '\App\Http\Controllers\Web\TopicController@submit');

//添加通知 模块
	Route::get("/notices", '\App\Http\Controllers\Web\NoticeController@index');



//添加管理后台的路由
include_once "admin.php";
//错误的路由
Route::get("/error/404", '\App\Http\Controllers\Web\ErrorController@error404')->name('error.404');






