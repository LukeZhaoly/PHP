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

/**
 * 前端路由
 */

Route::get('/', function () {
    return redirect("/blog");
});

Route::get('/blog','BlogController@index')->name('blog.home');
Route::get('/blog/{slug}',"BlogController@showPost")->name("blog.detail");


/**
 * 创建后台路由
 */
Route::middleware('auth')->namespace('Admin')->group(function (){
    Route::resource('admin/post','PostController',['except'=>'show']);
    Route::resource('admin/tag','TagController',['except'=>'show']);
    Route::get('admin/upload','UploadController@index');

    //增加删除文件
    Route::post("admin/upload/file","UploadController@uploadfile");
    Route::delete("admin/upload/file","UploadController@deletefile");

    //增加删除文件夹
    Route::post("admin/upload/folder","UploadController@createfolder");
    Route::delete("admin/upload/folder","UploadController@deletefolder");
});

//登录退出
Route::get('/login','AdminController@showLoginForm')->name('login');
Route::post('/login','AdminController@login');
Route::get('/logout','AdminController@logout')->name('logout');

