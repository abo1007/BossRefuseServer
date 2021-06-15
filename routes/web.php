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

//Route::get('main', function () {
//    return view('admin.main');
//});
Route::get('admin', "Admin\IndexController@getView");

Route::get('admin/recruit', "Admin\IndexController@getView1");
Route::get('admin/enterprise', "Admin\IndexController@getView2");
Route::get('admin/user', "Admin\IndexController@getView3");
Route::get('admin/advert', "Admin\IndexController@getView4");
Route::get('admin/more', "Admin\IndexController@getView5");
Route::get('admin/about', "Admin\IndexController@getView6");

Route::get('admin/recruit/toshow/{id}', "Admin\RecruitController@toShow");
Route::get('admin/recruit/noshow/{id}', "Admin\RecruitController@noShow");
Route::get('admin/recruit/del/{id}', "Admin\RecruitController@toDel");
