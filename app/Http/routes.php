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
Route::group(['middleware'=>'web'],function(){
	Route::get('/admin/index','Admin\Login@index');
	Route::post('/admin/login','Admin\Login@login');
	Route::get('/admin/code','Admin\Login@code');
	Route::get('/admin/getCode','Admin\Login@getCode');

});