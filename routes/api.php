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
// 企业发布的招聘信息
Route::get('workface/com/{comid}','WorkfaceController@comShow') -> name('workface.comShow');
// 搜索职位数据
Route::get('workface/search/{searchValue}','WorkfaceController@searchTitle') -> name('workface.search');


Route::apiResource("user",'UserController');
// 登录验证
Route::post('user/login','UserController@login') -> name('user.login');
// 免登录
Route::post('user/loginfree','UserController@loginFree') -> name('user.loginfree');
// 修改密码
Route::post('user/updatepass','UserController@updatePass') -> name('user.updatepass');
// 注册用户
Route::post('user/reguser','UserController@registerUser') -> name('user.reguser');
// 获得昵称
Route::get('user/getnickname/{id}','UserController@nickname') -> name('user.nickname');


Route::apiResource('offer','OfferController');
// 拒绝 沟通中 待面试 录用 收藏 的全部数据
Route::get('offer','OfferController@index') -> name('offer.index');
// 拒绝 沟通中 待面试 录用 收藏 的数量
Route::post('offer/getcount','OfferController@count') -> name('offer.count');
// 拒绝 沟通中 待面试 录用 收藏 各类信息
Route::get('offer/getcate/{id}/{cateid}','OfferController@offerCate') -> name('offer.cate');
Route::get('offer/getcomcate/{id}/{cateid}','OfferController@comOfferCate') -> name('offer.comCate');
// 更新offer状态
Route::post('offer/updatetype','OfferController@comUpdateOfferType') -> name('offer.updateType');


// 简历功能
Route::apiResource('resume','ResumeController');
// 通过id获得简历id
Route::get('resume/getresumeid/{id}','ResumeController@getResumeID') -> name('resume.getid');

// 企业信息
Route::apiResource('cominfo','CominfoController');
// 获取一段60位随机字符串
Route::get('getsha','UserController@getsha');

Route::post('msg/userid','MsgController@chatMsgByUserId');
