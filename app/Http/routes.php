<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login']
/*Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'web'],function(){

	Route::get('login','Login@login');

});
*/
/*Route::get('/login', function () {
    return view('welcome',array('name'=>'❤️'));
});*/
/*Route::get('/login', function () {
    return view('welcome');
});
*/

//laravel版本大于 5.2.27的 web 中间件为全局自动加载,无需手动加载
Route::group(['middleware'=>[]],function(){
	Route::get('/admin','Admin\Login@index');        	//登录控制器
	Route::post('/admin/login','Admin\Login@login');
	Route::get('/admin/code','Admin\Login@code');
	//Route::get('/admin/getCode','Admin\Login@getCode');

});

//Admin.login中间件登录验证
Route::group(['middleware'=>['Admin.login'],'namespace'=>'Admin'],function(){
	Route::get('/admin/index','Admin@index');  	//后台管理页面
	Route::get('/admin/info','Admin@info');  		//info页面
	Route::get('/logout','Common@logout');         //退出
	Route::any('/admin/pass','Admin@pass');			//密码编辑
	Route::post('/admin/cate/changeorder','Category@changeOrder'); //改变排序
	Route::resource('/admin/category','Category'); //为category控制器注册资源
});