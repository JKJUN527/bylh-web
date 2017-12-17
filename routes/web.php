<?php

Route::get('/', function () {
    return view('home2');
});
Route::get('/index',function(){
    return view('home2');
});
Route::any('/needinfo',function(){
    return view('needinfo');
});
Route::any('/sendneed',function(){
    return view('sendneed');
});
Route::any('/sendneed2',function(){
    return view('sendneed2');
});
Route::any('/sendrequest',function(){
    return view('sendrequest');
});
Route::any('/sendrequest2',function(){
    return view('sendrequest2');
});
Route::any('/search',function(){
    return view('search');
});
Route::any('/register',function(){
    return view('account.register');
});
Route::any('/login',function(){
    return view('account.login');
});
Route::any('/message',function(){
    return view('message');
});
Route::any('/need',function(){
    return view('need');
});
Route::any('/request',function(){
    return view('request');
});
Route::any('/requestinfo',function(){
    return view('requestinfo');
});
Route::any('/order',function(){
        return view('order');
});
Route::any('/orderinfo',function(){
    return view('orderinfo');
});
Route::any('/email',function(){
    return view('email');
});
Route::any('/index',function(){
    return view('index');
});
Route::any('/idcard',function(){
    return view('idcard');
});
Route::any('/question',function(){
    return view('question');
});
Route::any('/password',function(){
    return view('password');
});
Route::any('/user',function(){
    return view('user');
});
Route::any('/safety',function(){
    return view('safety');
});
Route::any('/phone',function(){
    return view('phone');
});


//控制器方法
//Route::any('/', ['uses' => 'HomeController@index']);
Route::any('/index', ['uses' => 'HomeController@index']);
Route::any('/index/search', ['uses' => 'HomeController@indexSearch']);

//登录注册
Route::get('account/login', ['uses' => 'LoginController@index']);
Route::get('account/register', ['uses' => 'RegisterController@index']);

Route::post('account/register', ['uses' => 'RegisterController@postRegister']);
Route::post('account/login', ['uses' => 'LoginController@postLogin']);

Route::get('account/logout', ['uses' => 'LoginController@logout']);
Route::any('account/sms', ['uses' => 'ValidationController@regSMS']);//发送短信验证码
//发送邮箱
Route::any('account/sendemail', ['uses' => 'ValidationController@sendemail']);
//验证邮箱
Route::any('validate_email', ['uses' => 'ValidationController@verifyEmailCode']);

//忘记密码
Route::get('account/findPassword', ['uses' => 'ForgetPwController@index']);
Route::post('account/findPassword/{option}', ['uses' => 'ForgetPwController@resetpw'])->where('option', '[0-2]{1}');
//修改密码
Route::get('account/resetPassword', ['uses' => 'FixPasswordController@index']);
Route::post('account/resetPassword', ['uses' => 'FixPasswordController@index']);

//权限获取
Route::get('account/getType', ['uses' => 'AuthController@getType']);  //完成
Route::get('account/getUid', ['uses' => 'AuthController@getUid']);  //完成
//修改个人资料
Route::get('account/baseedit', ['uses' => 'AccountController@index']);//个人、企业基本信息修改界面
Route::post('account/baseedit', ['uses' => 'AccountController@editbaseinfo']);//提交修改
//修改服务用户服务相关信息
Route::get('account/serviceedit', ['uses' => 'AccountController@serviceinfo']);//服务相关信息修改页面
Route::post('account/serviceedit', ['uses' => 'AccountController@editserviceinfo']);//提交修改
//实名认证页面、实习中介认证、专业问答认证
Route::get('account/authentication/{option}', ['uses' => 'AccountController@authindex'])->where('option', '[0-2]{1}');//服务相关信息修改页面
Route::post('account/authentication/{option}', ['uses' => 'AccountController@uploadauth'])->where('option', '[0-2]{1}');//服务相关信息提交页面

//一般服务发布主页、实习中介服务发布主页、专业问答服务发布主页
Route::get('service/genlpublish', ['uses' => 'ServiceController@genlserviceindex']);//一般服务发布主页
Route::get('service/finlpublish', ['uses' => 'ServiceController@finlserviceindex']);//实习中介发布主页
Route::get('service/qapublish', ['uses' => 'ServiceController@qaserviceindex']);//专业问答发布主页
//一般服务发布、实习中介服务发布、专业问答服务发布 数据提交
Route::post('service/genlpublish', ['uses' => 'ServiceController@genlservicePublic']);//一般服务发布
Route::post('service/finlpublish', ['uses' => 'ServiceController@finlservicePublic']);//实习中介发布
Route::post('service/qapublish', ['uses' => 'ServiceController@qaservicePublic']);//专业问答发布

//服务编辑页面暂时不要
//服务编辑主页：传入服务id及服务type
//Route::get('service/edit',['uses' => 'ServiceController@editserviceIndex']);
////服务编辑页提交
//Route::post('service/edit',['uses' => 'ServiceController@editservicePost']);
//服务下架
Route::post('service/delete',['uses' => 'ServiceController@deleteservice']);

//服务高级搜索
Route::any('service/advanceSearch',['uses' => 'ServiceController@advanceIndex']);

//服务详情页
Route::any('service/detail',['uses' => 'ServiceController@detail']);
//评论服务
Route::any('service/reviewService',['uses' => 'serviceController@reviewService']);

//订单模块

//获取订单列表
Route::get('order/index',['uses' => 'OrderController@orderlist']);
Route::get('order/',['uses' => 'OrderController@orderlist']);
//点击购买服务
Route::any('order/createOrder',['uses' => 'OrderController@createOrder']);
//点击确认付款
Route::any('order/ConfirmPayment',['uses' => 'OrderController@ConfirmPayment']);
//点击确认收款
Route::post('order/ConfirmGetPayment',['uses' => 'OrderController@ConfirmGetPayment']);
//获取订单详情
Route::get('order/getdetail',['uses' => 'OrderController@getdetail']);
//服务用户预约需求
Route::post('order/reservationDemand',['uses' => 'OrderController@reservationDemand']);

//需求用户查看报价列表\并选择服务商
Route::get('order/selectServiceIndex',['uses' => 'OrderController@selectServiceIndex']);
Route::post('order/selectServicer',['uses' => 'OrderController@selectServicer']);

//需求模块
//发布需求页面及post方法
Route::get('demands/demandPublishIndex',['uses' => 'DemandsController@demandPublishIndex']);
Route::post('demands/PublishPost',['uses' => 'DemandsController@PublishPost']);
//编辑需求页面
Route::get('demands/editdemandIndex',['uses' => 'DemandsController@editdemandIndex']);
//删除需求
Route::post('demands/deletedemand',['uses' => 'DemandsController@deletedemand']);
//获取需求详情页
Route::get('demands/detail',['uses' => 'DemandsController@detail']);
//回答需求
Route::get('demands/reviewDemand',['uses' => 'OrderController@reviewDemand']);





//站内信模块
//发送站内信
Route::post('message/sendMessage',['uses' => 'MessageController@sendMessage']);
//获取站内信列表
Route::get('message/index',['uses' => 'MessageController@index']);
Route::get('message/',['uses' => 'MessageController@index']);
//获取站内信详情
Route::get('message/detail',['uses' => 'MessageController@detail']);
//删除站内信--整个对话
Route::post('message/delDialog',['uses' => 'MessageController@delDialog']);
//标记站内信为已读
Route::post('message/isread',['uses' => 'MessageController@isRead']);
//删除站内信单条消息
Route::post('message/delmessage',['uses' => 'MessageController@delMessage']);




//获取订单列表
Route::get('order/orderlist',['uses' => 'OrderController@orderlist']);



Route::get('account/recommendPosition', ['uses' => 'PersonCenterController@recommendPosition']);
//测试方法
Route::get('sensitive', ['uses' => 'SensitiveController@test']);





