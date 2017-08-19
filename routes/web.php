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
Route::get('/','\APP\Http\Controllers\LoginController@index');

/**
 * 文章路由部分
 * 1.文章列表
 * 2.添加
 * 3.修改
 * 4.删除
 * 5.详情
 */

//1.列表页面
Route::get("/posts",'\App\Http\Controllers\PostController@index');

//2.文章的详情页面

Route::get("/posts/{post}","\App\Http\Controllers\PostController@show");

//创建
Route::get("/posts/create","\App\Http\Controllers\PostController@create");
Route::post("/posts","\App\Http\Controllers\PostController@store");

//编辑
Route::get("/posts/{posts}/edit","\App\Http\Controllers\PostController@edit");
//提交
Route::put("/posts/{posts}","\App\Http\Controllers\PostController@update");

//删除
Route::get("/posts/delete","\App\Http\Controllers\PostController@delete");




