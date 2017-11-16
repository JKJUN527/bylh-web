<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Adverts;
use App\Demands;
use App\Finlservices;
use App\Genlservices;
use App\News;
use App\Qaservices;
use App\Serviceclass1;
use App\Serviceclass2;
use App\Serviceclass3;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller {
    //一般服务发布主页
    public function genlserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($data['uid']==0 || $data['type']!=1){//先登录|登录用户非服务用户
            return view('account.login',['data'=>$data]);
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->realname_verify){//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/1');
        }else{
            //返回一般服务页面所需数据
            $data['serviceclass1']=Serviceclass1::where('type',0)->orderBy('updated_at','asc')->get();
            $data['serviceclass2']=Serviceclass2::where('type',0)->orderBy('updated_at','asc')->get();
            $data['serviceclass3']=Serviceclass3::where('type',0)->orderBy('updated_at','asc')->get();
        }

        return $data;
        return view('service.genlindex', ["data" => $data]);
    }
    //实习中介服务发布主页
    public function finlserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        $data['uid']=1;
        $data['type']=1;
        if($data['uid']==0 || $data['type']!=1){//先登录|登录用户非服务用户
            return view('account.login',['data'=>$data]);
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->finance_verify ||!$is_vertify->realname_verify){//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/2');
        }else{
            //返回一般服务页面所需数据
            $data['serviceclass1']=Serviceclass1::where('type',1)->orderBy('updated_at','asc')->get();
            $data['serviceclass2']=Serviceclass2::where('type',1)->orderBy('updated_at','asc')->get();
            $data['serviceclass3']=Serviceclass3::where('type',1)->orderBy('updated_at','asc')->get();
        }


        return $data;
        return view('service.finlindex', ["data" => $data]);
    }
    //专业问答服务发布主页
    public function qaserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($data['uid']==0 || $data['type']!=1){//先登录|登录用户非服务用户
            return view('account.login',['data'=>$data]);
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->majors_verify ||!$is_vertify->realname_verify){//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/3');
        }else{
            //返回一般服务页面所需数据
            $data['serviceclass1']=Serviceclass1::where('type',2)->orderBy('updated_at','asc')->get();
            $data['serviceclass2']=Serviceclass2::where('type',2)->orderBy('updated_at','asc')->get();
            $data['serviceclass3']=Serviceclass3::where('type',2)->orderBy('updated_at','asc')->get();
        }

        return $data;
        return view('service.qaindex', ["data" => $data]);
    }

    //一般服务发布方法
    public function genlservicePublic(Request $request){
        $data= array();
        $data['status']=400;
        $data['msg']="未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->realname_verify){
            $data['msg']="实名认证未通过";
            return $data;
        }
        //需进行关键词检测
        if($request->has('title')&&$request->has('city')&&$request->has('describe')){
            $str = $request->input('title').' '.$request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if($is_sensitive['flag']==1){
                $data['status']=400;
                $data['msg']="发布内容含有敏感词:".$is_sensitive['word'];
                return $data;
            }else{//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。

                        $pic = $request->file('pic' . $Item);//取得上传文件信息
                        if ($pic->isValid()) {//判断文件是否上传成功
                            //扩展名
                            $ext1 = $pic->getClientOriginalExtension();
                            //临时觉得路径
                            $realPath = $pic->getRealPath();
                            //生成文件名
                            $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'genlservice' . $Item . '.' . $ext1;

                            $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                            $bool = Storage::disk('genlservicespic')->put($picname, file_get_contents($realPath));
                        }
                    }
                    $genlser->picture = asset('storage/genlservicespic/' . $picfilepath);
                }
                    //保存都数据库
                    $genlser->type = 0;
                    $genlser->uid = $data['uid'];
                    $genlser->title = $request->input('title');
                    $genlser->city = $request->input('city');
                    $genlser->class1_id = $request->input('class1_id');
                    $genlser->class2_id = $request->input('class2_id');
                    $genlser->class3_id = $request->input('class3_id');
                    $genlser->describe = $request->input('describe');
                    $genlser->home_page = $request->input('home_page');
                    $genlser->experience = $request->input('experience');
                    if ($genlser->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "操作成功";
                        return $data;
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "操作失败";
                        return $data;
                    }
                }
                return $data;
        }
        return $data;
    }

    //实习中介服务发布方法
    public function finlservicePublic(Request $request){
        $data= array();
        $data['status']=400;
        $data['msg']="未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->finance_verify){
            $data['msg']="实习中介认证未通过";
            return $data;
        }
        //需进行关键词检测
        if($request->has('title')&&$request->has('city')&&$request->has('describe')){
            $str = $request->input('title').' '.$request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if($is_sensitive['flag']==1){
                $data['status']=400;
                $data['msg']="发布内容含有敏感词:".$is_sensitive['word'];
                return $data;
            }else{//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。

                        $pic = $request->file('pic' . $Item);//取得上传文件信息
                        if ($pic->isValid()) {//判断文件是否上传成功
                            //扩展名
                            $ext1 = $pic->getClientOriginalExtension();
                            //临时觉得路径
                            $realPath = $pic->getRealPath();
                            //生成文件名
                            $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'finlservice' . $Item . '.' . $ext1;

                            $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                            $bool = Storage::disk('finlservicespic')->put($picname, file_get_contents($realPath));
                        }
                    }
                    $genlser->picture = asset('storage/finlservicespic/' . $picfilepath);
                }
                //保存都数据库
                $genlser->type = 1;
                $genlser->uid = $data['uid'];
                $genlser->title = $request->input('title');
                $genlser->city = $request->input('city');
                $genlser->class1_id = $request->input('class1_id');
                $genlser->class2_id = $request->input('class2_id');
                $genlser->class3_id = $request->input('class3_id');
                $genlser->describe = $request->input('describe');
                $genlser->home_page = $request->input('home_page');
                $genlser->experience = $request->input('experience');
                if ($genlser->save()) {
                    $data['status'] = 200;
                    $data['msg'] = "操作成功";
                    return $data;
                } else {
                    $data['status'] = 400;
                    $data['msg'] = "操作失败";
                    return $data;
                }
            }
            return $data;
        }
        return $data;
    }

    //问答服务发布方法
    public function qaservicePublic(Request $request){
        $data= array();
        $data['status']=400;
        $data['msg']="未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->majors_verify){
            $data['msg']="专业认证未通过";
            return $data;
        }
        //需进行关键词检测
        if($request->has('title')&&$request->has('city')&&$request->has('describe')){
            $str = $request->input('title').' '.$request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if($is_sensitive['flag']==1){
                $data['status']=400;
                $data['msg']="发布内容含有敏感词:".$is_sensitive['word'];
                return $data;
            }else{//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。

                        $pic = $request->file('pic' . $Item);//取得上传文件信息
                        if ($pic->isValid()) {//判断文件是否上传成功
                            //扩展名
                            $ext1 = $pic->getClientOriginalExtension();
                            //临时觉得路径
                            $realPath = $pic->getRealPath();
                            //生成文件名
                            $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'qaservice' . $Item . '.' . $ext1;

                            $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                            $bool = Storage::disk('qaservicespic')->put($picname, file_get_contents($realPath));
                        }
                    }
                    $genlser->picture = asset('storage/qaservicespic/' . $picfilepath);
                }
                //保存都数据库
                $genlser->type = 2;
                $genlser->uid = $data['uid'];
                $genlser->title = $request->input('title');
                $genlser->city = $request->input('city');
                $genlser->class1_id = $request->input('class1_id');
                $genlser->class2_id = $request->input('class2_id');
                $genlser->class3_id = $request->input('class3_id');
                $genlser->describe = $request->input('describe');
                $genlser->home_page = $request->input('home_page');
                $genlser->experience = $request->input('experience');
                if ($genlser->save()) {
                    $data['status'] = 200;
                    $data['msg'] = "操作成功";
                    return $data;
                } else {
                    $data['status'] = 400;
                    $data['msg'] = "操作失败";
                    return $data;
                }
            }
            return $data;
        }
        return $data;
    }
    //编辑服务主页
    //传入sid值及对应的type值
    public function editserviceIndex(Request $request){
        $data =array();
        $data['uid']=AuthController::getUid();
        $data['type']=AuthController::getType();
        $data['username']= InfoController::getUsername();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return view('account.login',['data'=>$data]);
        }
        if($request->has('sid') && $request->has('type')){
            switch ($request->input('type')){
                case 0:
                    $data['service'] = Genlservices::where('id',$request->input('sid'))
                        ->where('uid',$data['uid'])
                        ->where('type',0)
                        ->where('state',0)
                        ->first();
                    break;
                case 1:
                    $data['service'] = Finlservices::where('id',$request->input('sid'))
                        ->where('uid',$data['uid'])
                        ->where('type',1)
                        ->where('state',0)
                        ->first();
                    break;
                case 2:
                    $data['service'] = Qaservices::where('id',$request->input('sid'))
                        ->where('uid',$data['uid'])
                        ->where('type',2)
                        ->where('state',0)
                        ->first();
                    break;
                default:
                    $data['service']=null;
                    break;
            }
        }
        $data['serviceclass1']= Serviceclass1::all();
        $data['serviceclass2']= Serviceclass2::all();
        $data['serviceclass3']= Serviceclass3::all();

        return $data;
        return view('service/editservice',['data'=>$data]);
    }



}
