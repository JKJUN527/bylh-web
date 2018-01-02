<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Admin;
use App\Demands;
use App\Finlservices;
use App\Genlservices;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Qaservices;
use App\User;

class DashboardController extends Controller {
    //后台首页显示网站关于信息
    public function view() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = self::getLoginInfo();
        $data['webinfo'] = About::orderBy('updated_at', 'desc')
            ->take(1)
            ->get()[0];
        //获取订单交易成功量
        $data['order_success'] = Orders::where('state',2)->count();
        $data['order_total'] = Orders::where('state','!=',2)->where('state','!=',3)->count();
        //用户注册量
        $data['user_count'] = User::count();
        //服务发布量
        $genl_count = Genlservices::where('state',0)->count();
        $final_count = Finlservices::where('state',0)->count();
        $qa_count = Qaservices::where('state',0)->count();
        $data['service_count'] = $genl_count+$final_count+$qa_count;
        //需求发布量
        $data['demand_count'] = Demands::where('state',0)->count();
        //return $data;
        return view('admin.dashboard', ["data" => $data]);
    }

    public static function getLoginInfo() {
        $uid = AdminAuthController::getUid();
        $data = array();
        $data['uid'] = $uid;
        $user = Admin::where("aid", $uid)->first();

        if ($user == null)
            return view('admin.login');

        $data['username'] = $user->username;

        return $data;
    }
}
