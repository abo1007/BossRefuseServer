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

Route::get('login', function () {
    return view('login');
});

Route::get('main', function () {
    return view('admin.main');
});

Route::get('main/recruit', "Admin\IndexController@getView1");
Route::get('main/enterprise', "Admin\IndexController@getView2");
Route::get('main/user', "Admin\IndexController@getView3");
Route::get('main/advert', "Admin\IndexController@getView4");
Route::get('main/more', "Admin\IndexController@getView5");
Route::get('main/about', "Admin\IndexController@getView6");
