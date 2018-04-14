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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();

        return view('account/register', ["data" => $data]);
    }

    /*注册验证逻辑*/
    public function postRegister (Request $request)
    {
        $data = array();
        $input = $request->all();
        if ($request->has('phone'))     //手机注册
        {
            //手机短信验证码匹配???
            $code = $request->input('code');
            $validator = Validator::make($input, [
                'phone' => 'required|regex:/^1[34578][0-9]{9}$/'
            ]);
            if ($validator->fails()) {
                $data['status'] = 400;
                $data['msg'] = "手机号格式输入错误";
                return $data;
            }
            if (ValidationController::verifySmsCode($input['phone'], $code)) {//验证码正确
                $user = new User();
                $user->tel = $input['phone'];
                $user->password = bcrypt($input['password']);
                $user->username = substr($input['phone'], -4);
                $user->tel_verify = 1;

                if ($user->save()) {
                    //注册成功用户需一并建立userinfo表
                    $userinfo = new Userinfo();
                    $userinfo->uid = $user->uid;
                    $userinfo->tel = $user->tel;
                    $userinfo->save();

                    $this->afterRegister($user->tel,$input['password'],0);
                    $data['status'] = 200;
                    $data['msg'] = "注册成功！";
                    return $data;
                }

                $data['status'] = 400;
                $data['msg'] = "数据库插入错误！";
                return $data;
            } else {
                $data['status'] = 400;
                $data['msg'] = "验证码错误";
                return $data;
            }

        } else if ($request->has('email'))     //邮箱注册
        {
            //邮箱验证码匹配???
            $validator = Validator::make($input, [
                'email' => 'required|string|email'
            ]);
            if ($validator->fails()) {
                $data['status'] = 400;
                $data['msg'] = "邮箱信息格式有误";
                return $data;
            }else{
                //检查该邮箱是否已经被注册
                $isexist = User::where('mail','=',$input['email'])->get();
                if($isexist->count()) {
                    if ($isexist[0]->email_vertify == 1){//已注册{
                        $data['status'] = 400;
                        $data['msg'] = "该用户已注册！请直接登录";
                        return $data;
                     }
                  //邮箱已发送过验证码，重新发送验证码
                    $mailAgain = ValidationController::sendemail($input['email'],$isexist[0]->uid);
                    if($mailAgain == -1){
                        $data['status'] = 400;
                        $data['msg'] ="验证邮件发送失败！";
                        return $data;
                    }
                    $data['status'] = 200;
                    $data['msg'] ="验证邮件发送成功！";
                    return $data;
                }
                $username = explode('@',$input['email']);
                $user = new User();
                $user->mail = $input['email'];
                $user->password = bcrypt($input['password']);
                $user->username = $username[0];

                if ($user->save()) {
                    $perinfo = new Userinfo();
                    $perinfo->uid = $user->uid;
                    $perinfo->mail = $user->mail;
                    $perinfo->save();

                    //发送验证邮件
                    $mailstatus = ValidationController::sendemail($input['email'],$user->uid);
                    if($mailstatus ==-1 || $mailstatus ==0){
                        $data['status'] = 400;
                        $data['msg'] ="验证邮件发送失败！";
                        return $data;
                    }
//                    $this->afterRegister($user->mail,$input['password'],1);
                    $data['status'] = 200;
                    $data['msg'] ="注册成功";
                    return $data;
                } else {
                    $data['status'] = 400;
                    $data['msg'] ="数据库插入错误!";
                    return $data;
                }
            }

        }
    }
    //注册成功后自动登录
    public function afterRegister($account,$passwd,$type){
        if($type == 0){
            if (Auth::attempt(array('tel' => $account, 'password' => $passwd))) {
                $uid = Auth::user()->uid;
                session()->put('frontUid',$uid);
                $type = User::where('uid', '=', $uid)
                    ->select('type')
                    ->get();
                $type = $type[0]['type'];
                session()->put('type', $type);
                $data['status'] = 200;
                $data['msg'] = "登陆成功！";
                return $data;
            }
        }elseif ($type == 1){
            if (Auth::attempt(array('mail' => $account, 'password' => $passwd))) {

                $uid = Auth::user()->uid;
                session()->put('frontUid',$uid);
                $type = User::where('uid', '=', $uid)
                    ->where('email_verify','=',1)
                    ->select(['type'])
                    ->get();
                $type = $type[0]['type'];
                session()->put('type', $type);
                $data['status'] = 200;
                $data['msg'] = "登陆成功！";
                return $data;
            }
        }
       return 0;
    }
}
