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
// 工作数据标题 小分类 与 多个小分类
Route::get('workface/subcate/{cateid}','WorkfaceController@subclassify') -> name('workface.subcate');
Route::get('workface/subcates/{cateid}','WorkfaceController@subclassifys') -> name('workface.subcates');


Route::apiResource("user",'UserController');
// 登录验证
Route::post('user/login','UserController@login') -> name('user.login');
// 免登录
Route::post('user/loginfree','UserController@loginFree') -> name('user.loginfree');
// 修改密码
Route::post('user/updatepass','UserController@updatePass') -> name('user.updatepass');
// 注册用户
Route::post('user/reguser','UserController@registerUser') -> name('user.reguser');


//Route::apiResource('offer','OfferController');
// 拒绝 沟通中 待面试 录用 收藏 的全部数据
Route::get('offer','OfferController@index') -> name('offer.index');
// 拒绝 沟通中 待面试 录用 收藏 的数量
Route::post('offer/getcount','OfferController@count') -> name('offer.count');
// 拒绝 沟通中 待面试 录用 收藏 各类信息
Route::get('offer/getcate/{id}/{cateid}','OfferController@offerCate') -> name('offer.cate');

// 简历功能
Route::apiResource('resume','ResumeController');
