<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Serviceinfo;
use App\User;
use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller {

    //显示审核过或待审核的企业信息 option=2 审核失败 option=1 审核通过 option=0 未审核
    public function index(Request $request, $option = -1) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();

        switch ($option){
            case 'realname':
                $data['realname'] = Userinfo::where('id_card', '!=', '')
                    ->where('idcard_photo', '!=', '')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);//每页显示10条
                return view('admin/realname', ['data' => $data]);
                break;
            case 'finance':
                $data['finance'] = Userinfo::where('realname_statue', 1)
                    ->where('finance_photo', '!=', '')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);//每页显示10条
                return view('admin/finance', ['data' => $data]);
                break;
            case 'major':
                $data['major'] = Userinfo::where('realname_statue', 1)
                    ->where('majors_photo', '!=', '')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);//每页显示10条
                return view('admin/majors', ['data' => $data]);
                break;
        }
//        return $data;
    }
    //显示用户信息详情
    //传入用户uid、返回用户信息。
    public function showDetail(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $data = array();
        if ($request->has('uid')) {
            $uid = $request->input('uid');

//            $data['enprinfo'] = Enprinfo::find($eid);
//            $data['industry'] = Industry::all();
            $data['userinfo'] = Userinfo::where('uid',$uid)->first();
        }
        return $data;
    }
    //审核通过函数
    //审核通过，修改数据库，并发布对应的审核消息到企业用户站内信。
    //传入参数enprinfo[‘eid’] ['states'] ['reason']

    public function passVerfi(Request $request) {
        $userid = AdminAuthController::getUid();
        if ($userid == 0) {
            return redirect('admin/login');
        }

        $data = array();
        $data['status'] = 400;
        $data['msg'] = "操作失败";

        if ($request->has('uid') && $request->has('status') && $request->has('type')) {

            $isPass = Userinfo::find($request->input('uid'));
            if (empty($isPass)) {
                $data['msg'] = "无此用户";
                return $data;
            }
            if($request->input('type') == "realname"){
                $is_verify = "realname_statue";
                $user_verify = "realname_verify";
                $mes = "实名认证";
            }elseif ($request->input('type') == "finance"){
                $is_verify = "finance_statue";
                $user_verify = "finance_verify";
                $mes = "实习中介认证";
            }else{
                $is_verify = "majors_statue";
                $user_verify = "majors_verify";
                $mes = "专业问答认证";
            }

            if ($request->has('reason')) {
                $reason = $request->input('reason');
            } else {
                $reason = "你的信息不符合要求";
            }

            switch ($request->input('status')) {
                case '0'://审核拒绝
                    $isPass->$is_verify = 2;//审核拒绝
                    $isPass->save();
//                    发送站内信
                    $content = "很抱歉！由于" . $reason . "您的".$mes."审核未通过,尝试重新发布";
                    $mesage = new Message();
                    $mesage->from_id = 0;//uid=0 固定为管理员用户
                    $mesage->to_id = $request->input('uid');
                    $mesage->content = $content;
                    if ($mesage->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "操作成功";
                    }
                    break;
                case '1': //审核通过
                    $isPass->$is_verify = 1;//审核通过
                    $isPass->save();
                    //如果通过了实名认证，则用户成为一般服务用户。
                    //新建一般服务用户信息表
                    if($is_verify =="realname_statue"){
                        $serviceinfo = new Serviceinfo();
                        $serviceinfo->uid = $isPass->uid;
                        $serviceinfo->city = $isPass->city;
                        $serviceinfo->save();
                    }
                    //设置用户登录信息表
                    $set_user = User::find($isPass->uid);
                    $set_user->$user_verify = 1;
                    $set_user->save();

//                    发送站内信
                    $content = "恭喜您！您的".$mes."审核通过！";
                    $mesage = new Message();
                    $mesage->from_id = 0;
                    $mesage->to_id = $request->input('uid');
                    $mesage->content = $content;
                    if ($mesage->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "操作成功";
                    }
                    break;
                default:
                    $data['status'] = 400;
                    $data['msg'] = "操作命令未知";
            }
        }

        return $data;
    }
}
