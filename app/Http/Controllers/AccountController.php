<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Demands;
use App\Finlservices;
use App\Genlservices;
use APP\Models\E3Email;
use App\News;
use App\Orders;
use App\Qaservices;
use App\Serviceinfo;
use App\Tempemail;
use App\User;
use App\Userinfo;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//处理用户个人中心页面数据
class AccountController extends Controller {

    //个人中心主页
    public function index() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0) {//先登录
            return view('account.login', ['data' => $data]);
        }
//        暂定初始页面需要返回内容
//        个人主页返回 user基本信息、三个最新需求、待处理订单、推荐服务商6个、站内信未读消息个数、网站公告
//        服务主页返回 user基本信息、服务基本信息、最新服务3个、待处理订单、推荐服务商6个、站内信未读消息个数、网站公告
        switch ($data['type']) {
            case 1://需求用户
                //三个最新需求
                $data['demandsList'] = $this->getDemands($data['uid']);
                break;
            case 2://服务用户
                $info = new InfoController();
                $data['serviceInfo'] = $info->getServiceInfo();
                //当前用户最新服务
                $data['servicesList'] = array();
                $data['servicesList'][] = $this->getGenlservices($data['uid']);
                $data['servicesList'][] = $this->getFinlservices($data['uid']);
                $data['servicesList'][] = $this->getQaservices($data['uid']);
                break;
        }
        $info = new InfoController();
        //user基本信息
        $data['personInfo'] = $info->getPersonInfo();
        //未读站内信个数
        $data['messageNum'] = $this->getMessageNum();
        //获取待处理订单
        $data['order'] = $this->getOrder($data['uid']);
        $data['orderNum'] = $this->getOrderNum();
        //网站公告
        $data['news'] = News::orderBy('created_at', 'desc')->take(5)->get();
        //推荐服务商
        $data['adservers'] = Serviceinfo::where('is_urgency', 1)->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
//        return $data;
        return view('person.home', ['data' => $data]);
    }

    //
    public function getOrder($uid) {
        $data['orderlist'] = Orders::where('state', '!=', 3)
            ->where(function ($query) use ($uid) {
                $query->where('s_uid', $uid)
                    ->orwhere('d_uid', $uid);
            })
            ->orderBy('updated_at', 'desc')
            ->get();
        $data['orderinfo'] = array();
        foreach ( $data['orderlist'] as $order){
            //返回订单对应服务的信息
            if($order->service_id != null || $order->service_id != ""){
                switch ($order->type){
                    case 0:
                        $info = Genlservices::select('id','title','picture')
                            ->where('id',$order->service_id)
                            ->first();
                        break;
                    case 1:
                        $info = Finlservices::select('id','title','picture')
                            ->where('id',$order->service_id)
                            ->first();
                        break;
                    case 2:
                        $info = Qaservices::select('id','title','picture')
                            ->where('id',$order->service_id)
                            ->first();
                        break;
                    default:
                        $info = Genlservices::select('id','title','picture')
                            ->where('id',$order->service_id)
                            ->first();
                        break;
                }
            }else{
               $info = Demands::select('id','title','picture')
                   ->where('id',$order->demand_id)
                   ->first();
            }
            $data['orderinfo'][$order->id] = $info;
        }
        return $data;
    }

    //获取已发布一般服务列表
    public function getGenlservices($uid) {
        $genlservices = Genlservices::where('uid', $uid)
            ->where('state', 0)
            ->orderby('created_at', 'desc')
            ->get();
        return $genlservices;
    }

    //获取已发布实习中介服务列表
    public function getFinlservices($uid) {
        $finlservices = Finlservices::where('uid', $uid)
            ->where('state', 0)
            ->orderby('created_at', 'desc')
            ->get();
        return $finlservices;
    }

    //获取已发布专业问答服务列表
    public function getQaservices($uid) {
        $qaservices = Qaservices::where('uid', $uid)
            ->where('state', 0)
            ->orderby('created_at', 'desc')
            ->get();
        return $qaservices;
    }

    //获取需求列表
    public function getDemands($uid) {
        $demands = Demands::where('uid', $uid)
            ->where('state', 0)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return $demands;
    }

    //获取未完成订单个数
    public function getOrderNum() {
        $uid = AuthController::getUid();
        $num = Orders::where(function ($query) use ($uid) {
            $query->where('s_uid', $uid)
                ->orWhere(function ($query) use ($uid) {
                    $query->where('d_uid', $uid);
                });
        })
            ->where('state', '!=', 3)
            ->count();
        if ($num > 99)
            return 99;
        else
            return $num;
    }

    //获取未读消息个数
    public function getMessageNum() {
        $uid = AuthController::getUid();
        $num = Message::where('to_id', '=', $uid)
            ->where('is_read', '=', '0')
            ->where("is_delete", "=", "0")
            ->count();
        if ($num > 99)
            return 99;
        else
            return $num;
    }

    //查询用户名是否存在
    public function HasUsername(Request $request){
        $data = array();
        if($request->has('username')){
            $username = $request->input('username');
            $is_exist = User::where('username',$username)->get();
            if(count($is_exist) >0){
                $data['status'] = 400;
                $data['msg'] = "用户名已存在";
                return $data;
            }else{
                $data['status'] = 200;
                return $data;
            }

        }
    }

    //修改个人基本资料主页
    public function usersinfo() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($data['uid'] == 0) {//用户未登陆
//            $data['status'] = 400;
//            $data['msg'] = "请先登陆再进行操作";
//            return $data;
            return redirect()->back();
        }

        $data['userinfo'] = Userinfo::where('uid', $data['uid'])->first();

        return view('person.user', ['data' => $data]);
    }

    public function editbaseinfo(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($data['uid'] != 0 && ($data['type'] == 0 || $data['type'] == 1))   //确认为合法个人用户
        {
            if ($data['uid'] == 0) {//用户未登陆
                return view('account.login', ['data' => $data]);
            }
            //上传头像;
            $infoid = Userinfo::where('uid', $data['uid'])->first();
            $userinfo = Userinfo::find($infoid->id);

            if ($request->hasFile('photo')) {
                //验证输入的图片格式,验证图片尺寸比例为一比一
//            $this->validate($request, [
//                'photo' => 'dimensions:ratio=1/1'
//            ]);
                $photo = $request->file('photo');
                if ($photo->isValid()) {//判断文件是否上传成功
                    $ext = $photo->getClientOriginalExtension();
                    //临时觉得路径
                    $realPath = $photo->getRealPath();

                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . 'photo' . '.' . $ext;

                    $bool = Storage::disk('profile')->put($filename, file_get_contents($realPath));
                    if ($bool) {
                        $userinfo->photo = asset('storage/profiles/' . $filename);//个人头像上传位置
                    }
                }
            }
            $userinfo->note = $request->input('note');
            $userinfo->birthday = $request->input('birthday');
            $userinfo->sex = $request->input('sex');
            $userinfo->city = $request->input('city');
            $userinfo->tel = $request->input('tel');
            $userinfo->mail = $request->input('mail');

            if ($userinfo->save()) {
                $user = User::find($data['uid']);
                $user->username = $request->input('username');
                $user->save();
                $data['status'] = 200;
                $data['msg'] = "操作成功";
            } else {
                $data['status'] = 400;
                $data['msg'] = "操作失败";
            }

            return $data;
        }
    }

    //修改服务用户服务相关资料主页
    public function serviceinfo() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0) {//用户未登陆
            $data['status'] = 400;
            $data['msg'] = "请先登陆再进行操作";
            return $data;
        }
        if ($data['type'] != 2) {
            $data['status'] = 400;
            $data['msg'] = "用户非法，请登录企业号";
            return $data;
        }

        return view('person/user', ['data' => $data]);
    }

    public function editserviceinfo(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0) {//用户未登陆
            $data['status'] = 400;
            $data['msg'] = "请先登陆再进行操作";
            return $data;
        }
        if ($data['type'] != 1) {
            $data['status'] = 400;
            $data['msg'] = "用户非法，请登录企业号";
            return $data;
        }
        $is_exist = Serviceinfo::where('uid', $data['uid'])->first();
        if (empty($is_exist)) {
            $data['status'] = 400;
            $data['msg'] = "未存在该用户的服务信息表";
            return $data;
        }
        $serviceinfo = Serviceinfo::find($is_exist->id);
        //接收数据
        if ($request->hasFile('paycode')) {
            //验证输入的图片格式,验证图片尺寸比例为一比一
//            $this->validate($request, [
//                'elogo' => 'dimensions:ratio=1/1'
//            ]);
            $pay = $request->file('paycode');
            if ($pay->isValid()) {//判断文件是否上传成功
                $ext = $pay->getClientOriginalExtension();
                //临时觉得路径
                $realPath = $pay->getRealPath();

                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . 'paycode' . '.' . $ext;

                $bool = Storage::disk('paycode')->put($filename, file_get_contents($realPath));
                if ($bool) {
                    $serviceinfo->paycode = asset('storage/paycode/' . $filename);
                }
            }
        }
        $serviceinfo->city = $request->input('city');
        $serviceinfo->current_edu = $request->input('current_edu');
        $serviceinfo->graduate_edu = $request->input('graduate_edu');
        $serviceinfo->is_offline = $request->input('is_offline');
        $serviceinfo->has_video = $request->input('has_video');
        $serviceinfo->pay_way = $request->input('pay_way');

        if ($serviceinfo->save()) {
            $data['status'] = 200;
            $data['msg'] = "操作成功";
        } else {
            $data['status'] = 400;
            $data['msg'] = "操作失败";
        }

        return $data;
    }

    //实名认证页面\返回对应企业信息
    //如果option  012 分别代表不同的认证上传页面
    //返回值为$data数组
    public function authindex(Request $request, $option) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($data['uid'] == 0) {
            return view('account.login', ['data' => $data]);
        }
        $state = User::where('uid', $data['uid'])
            ->where('status', 0)
            ->first();
        if (count($state) > 0) {//用户合法、存在
            $data['userinfo'] = Userinfo::where('uid', $data['uid'])->first();//取得用户基本信息（电话邮箱之类）
            switch ($option) {
                case 0://实名认证
                    //查看用户审核情况(普通用户未验证)
                    //返回用户实名认证情况
                    $situation = Userinfo::where('uid', $data['uid'])->select('realname_statue')->first();
                    $data['is_vertify'] = $situation['realname_statue'];
                    break;
                case 1://实习中介认证
                    $situation = Userinfo::where('uid', $data['uid'])->select('finance_statue')->first();
                    $data['is_vertify'] = $situation['finance_statue'];
                    break;
                case 2:
                    $situation = Userinfo::where('uid', $data['uid'])->select('majors_statue')->first();
                    $data['is_vertify'] = $situation['majors_statue'];
                    break;
                default:
                    return "error";
            }
        } else {
            return view('account.login', ['data' => $data]);
        }

        //return $data;
        return view("person.idcard", ['data' => $data]);
    }

    //上传实名验证证件照片
    public function uploadauth(Request $request, $option) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        $infoid = Userinfo::where('uid', $data['uid'])->first();
        switch ($option) {
            case 0:
                if ($infoid['realname_statue'] == 0 || $infoid['realname_statue'] == 1) {
                    $data['status'] = 400;
                    $data['msg'] = "用户已提交审核，无需重复提交";
                    return $data;
                }
                if ($request->has('real_name') && $request->has('id_card') && $request->hasFile('idcard1_photo')) {
                    $userinfo = Userinfo::find($infoid['id']);

                    if ($request->isMethod('POST')) {
                        $idcard1_photo = $request->file('idcard1_photo');//取得上传文件信息
                        $idcard2_photo = $request->file('idcard2_photo');//取得上传文件信息

                        if ($idcard1_photo->isValid() && $idcard2_photo->isValid()) {//判断文件是否上传成功
                            //原文件名
//                          //$originalName1 = $idcard1_photo->getClientOriginalName();
                            //扩展名
                            $ext1 = $idcard1_photo->getClientOriginalExtension();
                            $ext2 = $idcard2_photo->getClientOriginalExtension();
                            //mimetype
                            //$type1 = $idcard1_photo->getClientMimeType();
                            //临时觉得路径
                            $realPath1 = $idcard1_photo->getRealPath();
                            $realPath2 = $idcard2_photo->getRealPath();

                            $filename1 = date('Y-m-d-H-i-s') . '-' . uniqid() . 'idcard1_photo' . '.' . $ext1;
                            $filename2 = date('Y-m-d-H-i-s') . '-' . uniqid() . 'idcard2_photo' . '.' . $ext2;

                            $bool1 = Storage::disk('authentication')->put($filename1, file_get_contents($realPath1));
                            $bool2 = Storage::disk('authentication')->put($filename2, file_get_contents($realPath2));

                            if ($bool1 and $bool2) {
                                //文件名保存到数据库中
                                $userinfo->idcard_photo = asset('storage/authentication/' . $filename1) ."+@+".
                                    asset('storage/authentication/' . $filename2);
                            }
                            $userinfo->tel = $request->input('tel');
                            $userinfo->mail = $request->input('mail');
                            $userinfo->real_name = $request->input('real_name');
                            $userinfo->id_card = $request->input('id_card');
                            $userinfo->realname_statue = 0;

                            if ($userinfo->save()) {
                                $data['status'] = 200;
                                $data['msg'] = "上传成功";
                                return $data;
                                //return redirect('account/enterpriseVerify?eid='.$eid)->with('success', '上传证件成功');
                            } else {
                                $data['status'] = 400;
                                $data['msg'] = "保存失败";
                                return $data;
                                //return redirect('account/enterpriseVerify?eid='.$eid)->with('error', '上传证件失败');
                            }
                        }
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "上传失败";
                        return $data;
                    }
                }
                break;
            case 1://实习中介认证
                if ($infoid['realname_statue'] != 1) {
                    $data['status'] = 400;
                    $data['msg'] = "必须先通过实名认证";
                    return $data;
                }
                if ($request->hasFile('finance_photo')) {
                    $userinfo = Userinfo::find($infoid['id']);
                    if ($request->isMethod('POST')) {
                        $finance_photo = $request->file('finance_photo');//取得上传文件信息

                        if ($finance_photo->isValid()) {//判断文件是否上传成功
                            //原文件名
//                            $originalName1 = $idcard1_photo->getClientOriginalName();
                            //扩展名
                            $ext1 = $finance_photo->getClientOriginalExtension();
                            //mimetype
                            $type1 = $finance_photo->getClientMimeType();
                            //临时觉得路径
                            $realPath1 = $finance_photo->getRealPath();

                            $filename1 = date('Y-m-d-H-i-s') . '-' . uniqid() . 'finance_photo' . '.' . $ext1;

                            $bool = Storage::disk('authentication')->put($filename1, file_get_contents($realPath1));
                            if ($bool) {
                                //文件名保存到数据库中
                                $userinfo->finance_photo = asset('storage/authentication/' . $filename1);
                            }
                            $userinfo->tel = $request->input('tel');
                            $userinfo->mail = $request->input('mail');
                            $userinfo->finance_statue = 0;

                            if ($userinfo->save()) {
                                $data['status'] = 200;
                                $data['msg'] = "上传成功";
                                return $data;
                                //return redirect('account/enterpriseVerify?eid='.$eid)->with('success', '上传证件成功');
                            } else {
                                $data['status'] = 400;
                                $data['msg'] = "上传失败";
                                return $data;
                                //return redirect('account/enterpriseVerify?eid='.$eid)->with('error', '上传证件失败');
                            }
                        }
                    }
                }
                break;
            case 2://专业认证
                if ($infoid['realname_statue'] != 1) {
                    $data['status'] = 400;
                    $data['msg'] = "必须先通过实名认证";
                    return $data;
                }
                if ($request->hasFile('majors_photo')) {
                    $userinfo = Userinfo::find($infoid['id']);
                    if ($request->isMethod('POST')) {
                        $majors_photo = $request->file('majors_photo');//取得上传文件信息

                        if ($majors_photo->isValid()) {//判断文件是否上传成功
                            //原文件名
//                            $originalName1 = $idcard1_photo->getClientOriginalName();
                            //扩展名
                            $ext1 = $majors_photo->getClientOriginalExtension();
                            //mimetype
                            $type1 = $majors_photo->getClientMimeType();
                            //临时觉得路径
                            $realPath1 = $majors_photo->getRealPath();

                            $filename1 = date('Y-m-d-H-i-s') . '-' . uniqid() . 'majors_photo' . '.' . $ext1;

                            $bool = Storage::disk('authentication')->put($filename1, file_get_contents($realPath1));
                            if ($bool) {
                                //文件名保存到数据库中
                                $userinfo->majors_photo = asset('storage/authentication/' . $filename1);
                            }
                            $userinfo->tel = $request->input('tel');
                            $userinfo->mail = $request->input('mail');
                            $userinfo->majors_statue = 0;

                            if ($userinfo->save()) {
                                $data['status'] = 200;
                                $data['msg'] = "上传成功";
                                return $data;
                                //return redirect('account/enterpriseVerify?eid='.$eid)->with('success', '上传证件成功');
                            } else {
                                $data['status'] = 400;
                                $data['msg'] = "上传失败";
                                return $data;
                                //return redirect('account/enterpriseVerify?eid='.$eid)->with('error', '上传证件失败');
                            }
                        }
                    }
                }
                break;
            default:
                $data['status'] = 400;
                $data['msg'] = "操作错误";
                return $data;
        }

    }
    public function setemail(){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if($data['uid']==0){
            return view('account/login');
        }
        $data['userinfo'] = User::where('uid',$data['uid'])
            ->select('tel','mail','tel_verify','email_verify','realname_verify','finance_verify','majors_verify')
            ->first();

        return view('person.email',['data'=>$data]);
    }
    public function setphone(){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if($data['uid']==0){
            return view('account/login');
        }
        $data['userinfo'] = User::where('uid',$data['uid'])
            ->select('tel','mail','tel_verify','email_verify','realname_verify','finance_verify','majors_verify')
            ->first();

        return view('person.phone',['data'=>$data]);
    }
    public function sendMailCode(Request $request){
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        $uid = AuthController::getUid();
        if($request->has('email')){
            $email = $request->input('email');
            if($email != "" && $uid != "") {
                $res = Tempemail::where('uid', '=', $uid)
                    ->where('type', '=', 0)//注册验证
                    ->first();
                //获取验证码
                $ecode = ValidationController::generate_rand(6);
                if ($res->count()) {
                    $num = Tempemail::where('uid', '=', $uid)
                        ->update([
                            'code' => $ecode,
                            'deadline' => date('Y-m-d H:i:s', strtotime('+7 day')),
                        ]);
                } else {
                    $temp = new Tempemail();
                    $temp->code = $ecode;
                    $temp->uid = $uid;
                    $temp->type = 0;
                    $temp->deadline = date('Y-m-d H:i:s', strtotime('+7 day'));
                    $temp->save();
                }
                $e3_email = new E3Email();
                $e3_email->from = "631642753@qq.com";
                $e3_email->to = $email;
                $e3_email->subject = "不亦乐乎邮箱验证";
                $e3_email->content = "您正在使用不亦乐乎邮箱验证，验证码：" . $ecode . "如非本人操作请忽略此邮件。";
                //发送纯文本邮件
                Mail::raw($e3_email->content, function ($message) use ($e3_email) {
                    $message->from($e3_email->from, '不亦乐乎官网');
                    $message->subject($e3_email->subject);
                    $message->to($e3_email->to);
                });
                $data['status'] = 200;
                $data['msg'] = "验证邮件发送成功，请登录邮箱查看验证码";
            }
        }
        return $data;
    }
    public function sendSms(Request $request){
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        if($request->has('phone')){
            $phone = $request->input('phone');
            if (ValidationController::sendSMS($phone)) {
                $data['status'] = 200;
                $data['msg'] = "验证码发送成功";
            }else{
                $data['msg'] = "验证码发送失败！";
            }
        }
        return $data;
    }
    public function verifySmsCode(Request $request){
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        if($request->has('phone') &&$request->has('code')){
            $phone = $request->input('phone');
            $code = $request->input('code');
            if (ValidationController::verifySmsCode($phone, $code)) {//验证码正确
                $data['status'] = 200;
                $data['msg'] = "验证码正确";
            }else{
                $data['msg'] = "验证码错误";
            }
        }
        return $data;
    }
    public function verifyEmailCode(Request $request){
        $data = array();
        $uid = AuthController::getUid();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        if($request->has('email') && $request->has('code')){
            $email = $request->input('email');
            $code = $request->input('code');
            $is_exist = Tempemail::where('uid',$uid)->first();
            if($is_exist){
                if($is_exist->code == $code){
                    $searchmail = User::where('mail',$email)->get();
                    if($searchmail->count() >0 ){
                        $data['msg'] = "邮箱已有其他账号绑定，请先解绑";
                    }else{
                        $update_mail = User::where('uid',$uid)
                            ->update(['mail'=>$email,'email_verify'=>1]);
                        $data['status'] = 200;
                        $data['msg'] = "绑定成功";
                    }
                }else
                    $data['msg'] = "验证码错误";
            }else{
                $data['msg'] = "未发送验证码";
            }
        }
        return $data;
    }
    public function update_tel(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        if($request->has('phone')){
            $phone = $request->input('phone');
            $searchphone = User::where('tel',$phone)->get();
            if($searchphone->count() >0 ) {
                $data['msg'] = "该手机已有其他账号绑定，请先解绑";
            }else{
                $settel = User::where('uid',$data['uid'])
                    ->update(['tel' => $phone,'tel_verify' =>1]);
                if($settel){
                    $data['status'] = 200;
                    $data['msg'] = "绑定成功";
                }else{
                    $data['msg'] = "绑定失败";
                }
            }
        }
        return $data;
    }
    //登出函数
    public function logout() {
        Auth::logout();
        Session::flush();   //清除所有缓存

//        return Session::all();
        return redirect('index');
    }

}
