<?php
//z正式网站路由开始
//Route::get('index', function () {//主页返回四类广告（大图、小图、文字、急聘广告、最新新闻（5个）），
//    return view('index');
//});
//测试生成session uid
Route::any('session', ['uses' => 'PositionController@test1']);
//
Route::any('/', ['uses' => 'HomeController@index']);//完成
Route::any('/index', ['uses' => 'HomeController@index']);//完成
Route::any('/index/search', ['uses' => 'HomeController@indexSearch']);//完成

//登录注册
Route::get('account/login', ['uses' => 'LoginController@index']);
Route::get('account/register', ['uses' => 'RegisterController@index']);

Route::post('account/register', ['uses' => 'RegisterController@postRegister']);  //完成
Route::post('account/login', ['uses' => 'LoginController@postLogin']);   //完成

Route::get('account/logout', ['uses' => 'LoginoutController@logout']);   //完成
Route::any('account/sms', ['uses' => 'ValidationController@regSMS']);//发送短信验证码
//发送邮箱
Route::any('account/sendemail', ['uses' => 'ValidationController@sendemail']);
//验证邮箱
Route::any('validate_email', ['uses' => 'ValidationController@verifyEmailCode']);


Route::get('account/findPassword', ['uses' => 'ForgetPwController@view']);
Route::post('account/findPassword/{option}', ['uses' => 'ForgetPwController@index'])->where('option', '[0-2]{1}');

//Route::get('account/findPassword', function () {
//    return view('account.findPassword');
//});
//Route::any('account/resetPassword', ['uses' => 'FixPasswordController@resetPassword']);
//Route::any('account/forgotPasswordReset', ['uses' => 'FixPasswordController@forgotPasswordReset']);
Route::get('account/recommendPosition', ['uses' => 'PersonCenterController@recommendPosition']);

//权限获取
Route::get('account/getType', ['uses' => 'AuthController@getType']);  //完成
Route::get('account/getUid', ['uses' => 'AuthController@getUid']);  //完成
//个人信息获取、新增、更新
//Route::get('account/edit', function () {//进入方法，返回修改界面，带上个人信息。
//    return view('account.edit');
//});
Route::get('account/edit', ['uses' => 'InfoController@index']);//个人、企业基本信息修改界面
Route::get('account/getPersonInfo', ['uses' => 'InfoController@getPersonInfo']);
Route::get('account/getEnprInfo', ['uses' => 'InfoController@getEnprInfo']);

