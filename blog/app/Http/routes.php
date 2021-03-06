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