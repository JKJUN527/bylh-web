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

        //暂定初始页面需要返回内容

        return view('account.index',['data'=>$data]);
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

        switch ($option){
            case 0://实名认证
                $state = User::where('uid',$data['uid'])
                    ->where('status',0)
                    ->first();
                if(!$state->realname_verify && $data['type']==0){
                    //查看用户审核情况
                }
                return 0;
            case 1:
                return 1;
            case 2:
                return 2;
            default:
                return "error";
        }

        //return $data;
        return view("account.enterpriseVerify", ['data' => $data]);
    }

    //上传企业验证证件照片
    public function uploadauth(Request $request) {
        $data = array();
        $uid = AuthController::getUid();
        $username = InfoController::getUsername();
        $eid = Enprinfo::where('uid', $uid)->first();
        if($eid['is_verification']==0||$eid['is_verification']==1){
            $data['status']=400;
            $data['msg']="用户已提交审核，无需重复提交";
            return $data;
        }
        if ($request->has('ename') && $request->has('enature') && $request->has('industry')) {
            $enprinfo = Enprinfo::find($eid['eid']);

            if ($request->isMethod('POST')) {
                $ecertifi = $request->file('ecertifi');//取得上传文件信息
                $lcertifi = $request->file('lcertifi');//取得上传文件信息

                if ($ecertifi->isValid() && $lcertifi->isValid()) {//判断文件是否上传成功
                    //原文件名
                    //echo '文件上传成功';
                    $originalName1 = $ecertifi->getClientOriginalName();
                    $originalName2 = $lcertifi->getClientOriginalName();
                    //扩展名
                    $ext1 = $ecertifi->getClientOriginalExtension();
                    $ext2 = $lcertifi->getClientOriginalExtension();
                    //mimetype
                    $type1 = $ecertifi->getClientMimeType();
                    $type2 = $lcertifi->getClientMimeType();
                    //临时觉得路径
                    $realPath1 = $ecertifi->getRealPath();
                    $realPath2 = $lcertifi->getRealPath();

                    $filename1 = date('Y-m-d-H-i-s') . '-' . uniqid() . 'ecertifi' . '.' . $ext1;
                    $filename2 = date('Y-m-d-H-i-s') . '-' . uniqid() . 'lcertifi' . '.' . $ext2;

                    $bool1 = Storage::disk('authentication')->put($filename1, file_get_contents($realPath1));
                    $bool2 = Storage::disk('authentication')->put($filename2, file_get_contents($realPath2));
                    //var_dump($bool);
                    if($bool1 && $bool2){
                        //文件名保存到数据库中
                        $enprinfo->ecertifi = asset('storage/authentication/' . $filename1);
                        $enprinfo->lcertifi = asset('storage/authentication/' . $filename2);
                    }
                    $enprinfo->ename = $request->input('ename');
                    $enprinfo->enature = $request->input('enature');
                    $enprinfo->industry = $request->input('industry');
                    $enprinfo->email = $request->input('email');
                    $enprinfo->etel = $request->input('etel');
                    $enprinfo->address = $request->input('address');
                    $enprinfo->is_verification = 0;


                    if ($enprinfo->save()) {
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
    }
}
