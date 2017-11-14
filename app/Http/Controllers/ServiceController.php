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
        $data['uid'] = AuthController::getUid();

        //需进行关键词检测


        return $data;
    }




}
