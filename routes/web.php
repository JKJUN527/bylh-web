<?php

Route::any('/', ['uses' => 'HomeController@index']);
Route::any('/index', ['uses' => 'HomeController@index']);
Route::any('/index/search', ['uses' => 'HomeController@indexSearch']);

//登录注册
Route::get('account/login', ['uses' => 'LoginController@index']);
Route::get('account/register', ['uses' => 'RegisterController@index']);

Route::post('account/register', ['uses' => 'RegisterController@postRegister']);
Route::post('account/login', ['uses' => 'LoginController@postLogin']);

Route::get('account/logout', ['uses' => 'LoginoutController@logout']);
Route::any('account/sms', ['uses' => 'ValidationController@regSMS']);//发送短信验证码
//发送邮箱
Route::any('account/sendemail', ['uses' => 'ValidationController@sendemail']);
//验证邮箱
Route::any('validate_email', ['uses' => 'ValidationController@verifyEmailCode']);

//忘记密码
Route::get('account/findPassword', ['uses' => 'ForgetPwController@index']);
Route::post('account/findPassword/{option}', ['uses' => 'ForgetPwController@resetpw'])->where('option', '[0-2]{1}');

//权限获取
Route::get('account/getType', ['uses' => 'AuthController@getType']);  //完成
Route::get('account/getUid', ['uses' => 'AuthController@getUid']);  //完成
//修改个人资料
Route::get('account/edit', ['uses' => 'AccountController@index']);//个人、企业基本信息修改界面
Route::post('account/edit', ['uses' => 'AccountController@editbaseinfo']);//提交修改

Route::get('account/recommendPosition', ['uses' => 'PersonCenterController@recommendPosition']);

