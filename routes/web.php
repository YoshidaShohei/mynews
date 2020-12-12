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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
});

// PHP/Laravel 09 Routingについて理解する
// 課題3

Route::get('XXX','Adomin\AAAController@bbb');

// 課題4

Route::group(['prefix'=>'admin'],function(){
Route::get('admin/profile/create','admin\ProfileController@add');
Route::get('admin/edit','admin\ProfileController@edit');
});
