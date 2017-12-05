<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Finlservices;
use App\Genlservices;
use App\Orders;
use App\Qaservices;
use App\Region;
use App\Serviceclass1;
use App\Serviceclass2;
use App\Serviceclass3;
use App\Serviceinfo;
use App\Servicereviews;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller {
   //购买服务
    //传入服务id及服务类型
    //当用户点击购买服务后调用，成功则打开用户收款二维码。
    public function createOrder(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0) {//用户未登陆
            return view('account.login', ['data' => $data]);
        }
        //查询服务发布者id
        if($request->has('type') && $request->has('sid')){
            switch ($request->input('type')){
                case 0:
                    $s_uid = Genlservices::find($request->input('sid'));
                    break;
                case 1:
                    $s_uid = Finlservices::find($request->input('sid'));
                    break;
                case 2:
                    $s_uid = Qaservices::find($request->input('sid'));
                    break;
                default:
                    $data['status'] =400;
                    $data['msg'] = "调用参数type错误";
                    return $data;
            }
            //新建订单
            $order = new Orders();
            $order->s_uid = $s_uid['uid'];
            $order->d_uid = $data['uid'];
            $order->create_uid = $data['uid'];
            $order->type = $request->input('type');
            $order->service_id = $request->input('sid');
            $order->price = $s_uid['price'];
            //订单未支付有效期暂定7天
            $order->vaildity = date('Y-m-d H:i:s', strtotime('+7 day'));

            if($order->save()){
                $data['status'] =200;
                $data['order_id'] =$order->id;
                $data['msg'] = "初始化订单成功";
                return $data;
            }

        }else{
            $data['status'] =400;
            $data['msg'] = "调用参数错误";
            return $data;
        }

    }
    //个人用户点击确认付款后，修改订单状态
    //传入订单号，
    public function ConfirmPayment(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0) {//用户未登陆
            return view('account.login', ['data' => $data]);
        }
        $data["status"] = 400;
        if($request->has('order_id')){
            $order = Orders::find($request->input('order_id'));
            $order->state =1;
            if($order->save()){
                $data['status']=200;
                $data['msg'] = "确认付款成功";
                $content = "有人购买了您的服务，请尽快收款并处理订单";
                //发送站内信到服务用户，通知确认收款
                MessageController::sendMessage($request,$order->s_uid,$content);
            }
        }else{
            $data['msg'] = "传入参数错误";
        }
        return $data;

    }
    //服务用户点击确认收款后，修改订单状态
    public function ConfirmGetPayment(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

    }

    //预约需求
    public function reservationDemand(){
        $data = array();

    }



}
