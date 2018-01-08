<?php
//控制器方法
Route::get('/', ['uses' => 'HomeController@index']);
Route::get('/index', ['uses' => 'HomeController@index']);
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
//需求高级搜索
Route::any('demands/advanceSearch',['uses' => 'DemandsController@advanceIndex']);





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



//后台系统
Route::get('admin/login', function () {
    return view('admin/login');
});
Route::post('admin/login', ['uses' => 'Admin\LoginController@postLogin']);
Route::get('admin/logout', ['uses' => 'Admin\LoginController@logout']);
Route::get('admin/', ['uses' => 'Admin\DashboardController@view']);
Route::get('admin/dashboard', ['uses' => 'Admin\DashboardController@view']);
//管理网站信息
Route::any('admin/about', ['uses' => 'Admin\WebinfoController@index']);//显示已发布广告信息
Route::any('admin/about/setPhone', ['uses' => 'Admin\WebinfoController@setPhone']);
Route::any('admin/about/setEmail', ['uses' => 'Admin\WebinfoController@setEmail']);
Route::any('admin/about/setAddress', ['uses' => 'Admin\WebinfoController@setAddress']);
Route::any('admin/about/setContent', ['uses' => 'Admin\WebinfoController@setContent']);

//设置管理员界面OffPosition
//设置管理员界面OffPosition
Route::get('admin/admin', ['uses' => 'Admin\AdminController@view']);
Route::post('admin/register', ['uses' => 'Admin\AdminController@addAdmin']);
Route::any('admin/delete', ['uses' => 'Admin\AdminController@deleteAdmin']);

//审批企业信息
Route::any('admin/verify/{option?}', ['uses' => 'Admin\VerificationController@index'])->where('option', '[A-Za-z]+');//显示待审核或已审核的信息
Route::any('admin/showverify/detail', ['uses' => 'Admin\VerificationController@showDetail']);//显示待审核或已审核的企业信息
Route::any('admin/examine_verify', ['uses' => 'Admin\VerificationController@passVerfi']);//显示待审核或已审核的企业信息

//设置地区
Route::any('admin/region', ['uses' => 'Admin\RegionController@index']);//显示地区
Route::any('admin/region/{option}', ['uses' => 'Admin\RegionController@edit'])->where('option', '[A-Za-z]+');//显示地区
//设置行业-专业
Route::any('admin/industry', ['uses' => 'Admin\IndustryController@index']);//显示行业-专业-服务细分
Route::any('admin/industry/{option}', ['uses' => 'Admin\IndustryController@edit'])->where('option', '[A-Za-z]+');//显示行业
Route::any('admin/occupation/{option}', ['uses' => 'Admin\OccupationController@edit'])->where('option', '[A-Za-z]+');//显示职业
//设置敏感词
Route::any('admin/sensitive', ['uses' => 'Admin\SensitiveController@index']);//显示敏感词
Route::any('admin/sensitive/{option}', ['uses' => 'Admin\SensitiveController@edit'])->where('option', '[A-Za-z]+');//操作敏感词
//发布广告
Route::get('admin/addAds', ['uses' => 'Admin\AdvertsController@addAdView']);//显示已发布广告信息
Route::any('admin/ads', ['uses' => 'Admin\AdvertsController@index']);//显示已发布广告信息
Route::any('admin/ads/detail', ['uses' => 'Admin\AdvertsController@detail']);//显示已发布广告信息
Route::any('admin/ads/add', ['uses' => 'Admin\AdvertsController@addAds']);//新增或修改广告信息
Route::any('admin/ads/find', ['uses' => 'Admin\AdvertsController@findAd']);//查找location位置是否有广告
Route::any('admin/ads/del', ['uses' => 'Admin\AdvertsController@delAd']);//删除广告
//发布新闻
Route::any('admin/news', ['uses' => 'Admin\EditnewsController@index']);//显示已发布新闻信息
Route::any('admin/news/detail', ['uses' => 'Admin\EditnewsController@detail']);//显示已发布新闻信息
Route::get('admin/addNews', ['uses' => 'Admin\EditnewsController@addNewsView']);//新增或修改新闻信息
Route::any('admin/news/add', ['uses' => 'Admin\EditnewsController@addNews']);//新增或修改新闻信息
Route::any('admin/news/del', ['uses' => 'Admin\EditnewsController@delNews']);
//下架服务或设置服务加急
Route::any('admin/genlservices', ['uses' => 'Admin\ServicesController@genlservicesIndex']);
Route::any('admin/finlservices', ['uses' => 'Admin\ServicesController@finlservicesIndex']);
Route::any('admin/majorservices', ['uses' => 'Admin\ServicesController@qaservicesIndex']);
Route::any('admin/services/offposition', ['uses' => 'Admin\ServicesController@OffPosition']);
Route::any('admin/services/onposition', ['uses' => 'Admin\ServicesController@onPosition']);
Route::any('admin/services/urgency', ['uses' => 'Admin\ServicesController@isUrgency']);


