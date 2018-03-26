<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class SendmsgController extends Controller {
    //显示页面
    public function index(Request $request) {
        $uid = AdminAuthController::getUid();
        $data = array();

        $data = DashboardController::getLoginInfo();
        if($request->has('username'))
            $name = $request->input('username');
        else
            $name = "";
        $data['userinfo'] = User::where('username', 'like', '%' . $name . '%')
            ->paginate(20);
        if ($uid == 0) {
            return redirect('admin/login');
        }

        return view('admin.sendmsg',['data'=>$data]);
    }
    public function sendmsg(Request $request){
        $uid = AdminAuthController::getUid();
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        if($uid ==0){
            $data['msg'] = "请先登录";
        }
        //发送站内信
        if ($request->has('uid') && $request->has('content')){
            $user_id = $request->input('uid');
            $content = $request->input('content');
            $mesage = new Message();
            $mesage->from_id = 0;
            $mesage->to_id = $user_id;
            $mesage->content = $content;
            if ($mesage->save()) {
                $data['status'] = 200;
                $data['msg'] = "操作成功";
            }
        }else
            $data['msg'] = "参数错误";
        return $data;
    }

}
