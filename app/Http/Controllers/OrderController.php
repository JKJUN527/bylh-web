<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Datetemp;
use App\Demandreviews;
use App\Demands;
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

class OrderController extends Controller {
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
    //传入收款金额
    public function ConfirmGetPayment(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        $data["status"] = 400;

        if ($data['uid'] == 0) {//用户未登陆
            return view('account.login', ['data' => $data]);
        }
        if($data['type']==0 ||$data['type']==1){ //只能服务用户点击确认收款
            $data['msg'] = "非法用户";
            return $data;
        }

        if($request->has('order_id') && $request->has('money')){
            $order = Orders::find($request->input('order_id'));
            if($order){
                $order->state =2;
                $order->price = $request->input('money');//默认相信服务方提供的收款价格
                if($order->save()){
                    $data['status']=200;
                    $data['msg'] = "确认收款成功";
                    $content = "我已收到你的付款，请尽快与我联系！";
                    //发送站内信到服务用户，通知确认收款
                    MessageController::sendMessage($request,$order->d_uid,$content);
                }
            }else{
                $data['status'] = 400;
                $data['msg'] = "未查询到相关订单";
                return $data;
            }

        }else{
            $data['msg'] = "传入参数错误";
        }
        return $data;

    }
    //评价服务
    //传入订单id,及评价内容
    public function reviewService(Request $request){
        $data = array();
        $uid = AuthController::getUid();
        $data['status']=400;
        $data['msg']="参数错误";

        if($request->has('order_id') && $request->has('review')){
            $order_id = $request->input('order_id');
            $review = $request->input('review');
            $order = Orders::find($order_id);
            if($order){//找到订单
                $servicereview  = new Servicereviews();
                $servicereview->uid = $uid;
                $servicereview->sid = $order->service_id;
                $servicereview->type = $order->type;
                $servicereview->comments = $review;
                if($servicereview->save()){
                    $data['status'] = 200;
                    $data['msg'] = "评论成功";
                    return $data;
                }else{
                    $data['msg'] = "评论失败";
                }
            }else{
                $data['msg']="未找到对应订单信息";
            }

        }
        return $data;
    }
    //回答需求
    //传入需求id,及评价内容
    public function reviewDemand(Request $request){
        $data = array();
        $uid = AuthController::getUid();
        $data['status']=400;
        $data['msg']="参数错误";

        if($request->has('did') && $request->has('review')){
            $did = $request->input('did');
            $review = $request->input('review');
            $demandreview = new Demandreviews();
            $demandreview->uid = $uid;
            $demandreview->did = $did;
            $demandreview->comments = $review;
            if($demandreview->save()){
                //发送站内信给需求发布者
                $toid = Demands::find($did);
                $content = "我回答了你的需求，请尽快查看！";
                MessageController::sendMessage($request,$toid->uid,$content);

                $data['status'] = 200;
                $data['msg'] = "评论成功";
                return $data;
            }else{
                $data['msg'] = "评论失败";
            }

        }
        return $data;
    }
    //预约需求
    public function reservationDemand(Request $request){
        $data = array();
        $uid = AuthController::getUid();
//        $data['username'] = InfoController::getUsername();
        $type = AuthController::getType();
        $data['status'] = 400;

        if ($uid == 0) {//用户未登陆
            return view('account.login', ['data' => $data]);
        }
        if($type==0 ||$type==1){ //只能服务用户点击预约服务
            $data['msg'] = "非法用户";
            return $data;
        }
        //每一个服务用户预约一个需求，创建临时预约表。
        //传入预约留言及报价、预约需求id、返回预约状态
        if($request->has('msg') && $request->has('did') && $request->has('price')){
            //查询当前需求的状态，
            $demand = Demands::find($request->input('did'));
            if($demand){
                if($demand->state == 1)//需求下架
                {
                    $data['msg'] = "该需求已下架，请查看后处理";
                    return $data;
                }else{
                    $datetemp = new Datetemp();
                    $datetemp->sid = $uid;
                    $datetemp->did = $demand->uid;
                    $datetemp->demand_id = $demand->id;
                    $datetemp->price = $request->input('price');
                    if($datetemp->save()){
                        $data['status'] = 200;
                        $data['msg'] = "预约成功！";
                        return $data;
                    }
                }
            }else{
                $data['msg'] = "查无此需求，请检查后重试！";
                return $data;
            }
        }


    }

    //获取订单详情页面
    //传入订单id
    public function getdetail(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($request->has('order_id')){
            $data['order']->find($request->input('order_id'));
        }
        return view('order/getdetail',['data'=>$data]);
    }

    //需求用户选择服务商主页
    //传入需求id
    public function selectServiceIndex(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($request->has('did')){
            $demand = Demands::find($request->input('did'));
            if($demand->uid != $data['uid']){//用户不能查看非自己发布需求
                return redirect()->back();
            }
            $data['selectlist'] = Datetemp::where('did',$data['uid'])
                ->where('demand_id',$request->input('did'))
                ->where('state',0)
                ->paginate(20);//默认每页显示20条报价记录
        }
        return view('demands/selectindex',['data'=>$data]);
    }
    //需求发布用户，选择相应的服务商后，删除对应的其他服务提供temp信息。
    //选择对应服务商后，生成订单。
    public function selectServicer(Request $request){
        $data = array();
        $data['status'] = 400;
        $uid = AuthController::getUid();

        if($request->has('s_id') && $request->has('demand_id')){
            $sid = $request->input('s_id');
            $demand_id = $request->input('demand_id');
            $servicer = Datetemp::where('sid',$sid)
                ->where('demand_id',$demand_id)
                ->where('did',$uid)->where('state',0)
                ->get();
            if($servicer->count()>=1){
                $neworder = new Orders();
                $neworder->s_uid = $sid;
                $neworder->d_uid = $uid;
                $neworder->create_uid = $sid;
                $neworder->type = 0;
                $neworder->demand_id = $demand_id;
                $neworder->price = $servicer->price;
                $neworder->vaildity = date('Y-m-d H:i:s', strtotime('+7 day'));

                if($neworder->save()){
                    $deltemp = Datetemp::where('demand_id',$demand_id)->update(['state' => 1]);
                    $data['status'] = 200;
                    $data['msg'] = "已成功选择服务用户！创建订单成功";
                    return $data;
                }
            }else{
                $data['msg'] = "此服务用户未预约该需求";
            }
        }
    }

    //查看与自己相关订单列表
    public function orderlist(){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        $uid = $data['uid'];

//        if ($uid == 0) {//用户未登陆
//            return view('account.login', ['data' => $data]);
//        }
//        $data['orderlist'] = Orders::where(function ($query) use($uid){
//            $query->where('s_uid',$uid)
//                ->orWhere(function ($query) use ($uid) {
//                    $query->where('d_uid',$uid);
//                });
//        })
//        ->paginate(20);

        return view('order/index',['data'=>$data]);

    }



}
