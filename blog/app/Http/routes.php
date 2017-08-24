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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('hello',function(){
	echo "ok";
}); 

Route::get('authentication/getRegister',['as'=>'getRegister','uses'=>'Auth\AuthController@getRegister']);
Route::post('authentication/postRegister',['as'=>'postRegister','uses'=>'Auth\AuthController@postRegister']);


Route::get('authentication/getLogin',['as'=>'getLogin','uses'=>'Auth\AuthController@getLogin']);
Route::post('authentication/postLogin',['as'=>'postLogin','uses'=>'Auth\AuthController@postLogin']);
Route::get('authentication/home',function(){
	return view('home');
});

Route::get('test',function(){
	return view('admin.wallet.add');
});

Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'wallet'],function(){
		Route::get('list',['as'=>'admin.wallet.list','uses'=>'WalletController@getList']);
		Route::get('add',['as'=>'admin.wallet.getAdd','uses'=>'WalletController@getAdd']);
		Route::post('add',['as'=>'admin.wallet.postAdd','uses'=>'WalletController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.wallet.getDelete','uses'=>'WalletController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.wallet.getEdit','uses'=>'WalletController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.wallet.postEdit','uses'=>'WalletController@postEdit']);


	});
});