<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('workface','WorkfaceController');

// 工作数据标题 分类
Route::get('workface/cate/{cateid}','WorkfaceController@classify') -> name('workface.cate');
// 工作数据标题 小分类
Route::get('workface/subcate/{cateid}','WorkfaceController@subclassify') -> name('workface.subcate');

Route::apiResource("user",'UserController');
// 登录验证
Route::post('user/login','UserController@login') -> name('user.login');
// 免登录
Route::post('user/loginfree','UserController@loginFree') -> name('user.loginfree');

