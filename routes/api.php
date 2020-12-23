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
Route::get('workface/cate/{cateid}','WorkfaceController@classify');
// 工作数据标题 小分类
Route::get('workface/subcate/{cateid}','WorkfaceController@subclassify');

