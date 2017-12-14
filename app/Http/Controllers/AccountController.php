<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Serviceinfo;
use App\User;
use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//处理用户个人中心页面数据
class AccountController extends Controller {

    //个人中心主页
    public function index() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if($data['uid']==0){//先登录
            return view('account.login',['data'=>$data]);
        }
        //暂定初始页面需要返回内容
        //返回已发布的服务列表及需求列表
        //返回个人已发布服务列表
        switch ($data['type']) {
            case 1://需求用户
                $data['demandsList'] = DemandsController::getDemandsList();
                $info = new InfoController();
                $data['personInfo'] = $info->getPersonInfo();
                $data['messageNum'] = $this->getMessageNum();
                $data['orderNum'] = $this->getOrderNum();
                break;
            case 2://服务用户
                $data['type'] = 2;
                $info = new InfoController();
                $data['uid'] = AuthController::getUid();
                $data['enterpriseInfo'] = $info->getEnprInfo();
                $data['positionList'] = $this->getPostionList();
                $data['messageNum'] = $this->getMessageNum();
                $data['applyList'] = $this->getApplyList();
                $data['industry'] = Industry::all();
                break;
        }

        return view('account.index',['data'=>$data]);
    }
    //获取已发布一般服务列表
    public function getGenlservices($uid){
        $genlservices = Genlservices::where('uid',$uid)
            ->where('state',0)
            ->get();
        return $genlservices;
    }
    //获取已发布实习中介服务列表
    public function getFinlservices($uid){
        $finlservices = Finlservices::where('uid',$uid)
            ->where('state',0)
            ->get();
        return $finlservices;
    }
    //获取已发布专业问答服务列表
    public function getQaservices($uid){
        $qaservices = Qaservices::where('uid',$uid)
            ->where('state',0)
            ->get();
        return $qaservices;
    }
    //获取需求列表
    public function getDemands($uid){
        $demands = Demands::where('uid',$uid)
            ->where('state',0)
            ->get();
        return $demands;
    }
    //获取未完成订单个数
    public function getOrderNum(){
        $uid = AuthController::getUid();
        $num = Orders::where(function ($query) use($uid){
            $query->where('s_uid',$uid)
                ->orWhere(function ($query) use ($uid) {
                    $query->where('d_uid',$uid);
                });
        })
            ->where('state','!=',3)
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
    //修改个人基本资料主页
    public function editbaseinfo(Request $request)
    {
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
            $userinfo->real_name = $request->input('real_name');
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
        if ($data['type'] != 1) {
            $data['status'] = 400;
            $data['msg'] = "用户非法，请登录企业号";
            return $data;
        }

        return view('account/edit',['data'=>$data]);
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
        $is_exist = Serviceinfo::where('uid',$data['uid'])->first();
        if(empty($is_exist)){
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
    public function authindex(Request $request,$option) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($data['uid']==0){
            return view('account.login',['data'=>$data]);
        }
        $state = User::where('uid',$data['uid'])
            ->where('status',0)
            ->first();
        if(count($state)>0){//用户合法、存在
            $data['userinfo'] = Userinfo::where('uid',$data['uid'])->first();//取得用户基本信息（电话邮箱之类）
            switch ($option){
                case 0://实名认证
                    //查看用户审核情况(普通用户未验证)
                    //返回用户实名认证情况
                    $situation = Userinfo::where('uid',$data['uid'])->select('realname_statue')->first();
                    $data['is_vertify']=$situation['realname_statue'];
                    break;
                case 1://实习中介认证
                    $situation = Userinfo::where('uid',$data['uid'])->select('finance_statue')->first();
                    $data['is_vertify']=$situation['finance_statue'];
                    break;
                case 2:
                    $situation = Userinfo::where('uid',$data['uid'])->select('majors_statue')->first();
                    $data['is_vertify']=$situation['majors_statue'];
                    break;
                default:
                    return "error";
            }
        }else
            return view('account.login',['data'=>$data]);

        return $data;
        return view("account.vertifyindex", ['data' => $data]);
    }

    //上传实名验证证件照片
    public function uploadauth(Request $request,$option)
    {
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
                if ($request->has('real_name') && $request->has('id_card') && $request->hasFile('idcard_photo')) {
                    $userinfo = Userinfo::find($infoid['id']);
                    if ($request->isMethod('POST')) {
                        $idcard_photo = $request->file('idcard_photo');//取得上传文件信息

                        if ($idcard_photo->isValid()) {//判断文件是否上传成功
                            //原文件名
//                            $originalName1 = $idcard_photo->getClientOriginalName();
                            //扩展名
                            $ext = $idcard_photo->getClientOriginalExtension();
                            //mimetype
                            $type1 = $idcard_photo->getClientMimeType();
                            //临时觉得路径
                            $realPath = $idcard_photo->getRealPath();

                            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . 'idcard_photo' . '.' . $ext;

                            $bool = Storage::disk('authentication')->put($filename, file_get_contents($realPath));
                            if ($bool) {
                                //文件名保存到数据库中
                                $userinfo->idcard_photo = asset('storage/authentication/' . $filename);
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
                                $data['msg'] = "上传失败";
                                return $data;
                                //return redirect('account/enterpriseVerify?eid='.$eid)->with('error', '上传证件失败');
                            }
                        }
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
//                            $originalName1 = $idcard_photo->getClientOriginalName();
                            //扩展名
                            $ext = $finance_photo->getClientOriginalExtension();
                            //mimetype
                            $type1 = $finance_photo->getClientMimeType();
                            //临时觉得路径
                            $realPath = $finance_photo->getRealPath();

                            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . 'finance_photo' . '.' . $ext;

                            $bool = Storage::disk('authentication')->put($filename, file_get_contents($realPath));
                            if ($bool) {
                                //文件名保存到数据库中
                                $userinfo->finance_photo = asset('storage/authentication/' . $filename);
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
//                            $originalName1 = $idcard_photo->getClientOriginalName();
                            //扩展名
                            $ext = $majors_photo->getClientOriginalExtension();
                            //mimetype
                            $type1 = $majors_photo->getClientMimeType();
                            //临时觉得路径
                            $realPath = $majors_photo->getRealPath();

                            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . 'majors_photo' . '.' . $ext;

                            $bool = Storage::disk('authentication')->put($filename, file_get_contents($realPath));
                            if ($bool) {
                                //文件名保存到数据库中
                                $userinfo->majors_photo = asset('storage/authentication/' . $filename);
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
}
