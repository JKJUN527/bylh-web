<?php
/**
 * Created by PhpStorm.
 * User: Lishuai
 * Date: 2017/9/16
 * Time: 21:09
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FixPasswordController extends Controller
{
    //安全设置主页
    public function index(){
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if($data['uid']==0){
            return view('account/login');
        }
//        $data['userinfo'] = User::where('uid',$data['uid'])
        $data['userinfo'] = DB::table('bylh_users')
            ->where('bylh_users.uid',$data['uid'])
            ->leftjoin('bylh_userinfo','bylh_userinfo.uid','bylh_users.uid')
            ->select('bylh_users.tel','bylh_users.mail','tel_verify','email_verify','realname_statue','finance_statue','majors_statue')
            ->first();

//        return $data;
        return view('person/safety',['data'=>$data]);
    }
    public function resetPWindex(){
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if($data['uid']==0){
            return view('account/login');
        }

        return view('person.findPassword',['data'=>$data]);
    }
    //重置密码需要再账户登录的状态下
    public function resetPassword(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $input = $request->all();
        $rules = [
            'oldPassword'=>'required|between:6,60',
            'password' => 'required|between:6,60',
            'passwordConfirm' =>'required|same:password'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $data['status'] =400;
            $data['msg']="输入密码不符合规范或不相等";
            return $data;
        }

        $oldPassword = $request->input('oldPassword');
        $password = $request->input('password');
        $res = DB::table('bylh_users')->where('uid','=',$data['uid'])->select('password')->first();
        if(!Hash::check($oldPassword, $res->password)){
            $data['status'] = 400;
            $data['msg'] = '原密码不正确';
            return $data;
        }
        $update = array(
            'password' =>bcrypt($password),
        );
        $result = DB::table('bylh_users')->where('uid',$data['uid'])->update($update);
        if($result){
            $data['status'] = 200;  //更改密码成功
            $data['msg'] = '密码重置成功';
        }else{
            $data['status'] = 400;  //更改密码失败
            $data['msg'] = '密码重置失败';
        }
        return $data;

    }
    public static function forgotPasswordReset($uid, $password) {
        $update = array(
            'password' =>bcrypt($password),
        );
        $result = DB::table('bylh_users')->where('uid',$uid)->update($update);
        if($result){
            return 1;     //密码重置成功
        }else{
            return 0;     //密码重置失败
        }
    }
}
