<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Redirect;

class LoginController extends Controller {
    use AuthenticatesUsers;

    public function __construct() {
        $this->middleware('guest');
    }

    //打开登陆页面，传递当前用户信息到前端显示
    public function index() {
        $data = array();
        $data['uid'] = AuthController::getUid();
//        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();


//        return $data;
        return view('account/login', ["data" => $data]);
    }

    /*登录验证逻辑*/
    public function postLogin(Request $request) {
        $data = array();
        $input = $request->all();

        //手机登陆
        if ($request->has('phone')) {
            $phone = $input['phone'];
            $password = $input['password'];

            //判断是否存在该用户
            $isexist = User::where('tel', '=', $phone)
                ->where(function ($query) {
                    $query->where('tel_verify',1)
                        ->orWhere('email_verify',1);
                })
                ->get();
            if ($isexist->count()) {
                $validatorTel = Validator::make($input, [
                    'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
                    'password' => 'required|min:6|max:60'
                ]);
                if (!($validatorTel->fails())) {
//                    if (Auth::attempt(array('tel' => $phone, 'password' => $password))) {
                    if (Auth::attempt(array('tel' => $phone, 'password' => $password))) {
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
                    $data['status'] = 400;
                    $data['msg'] = "电话号码或密码错误！";
                    return $data;

                } else {
                    $data['status'] = 400;
                    $data['msg'] = "电话或密码格式不符合要求！";
                    return $data;
                }
            } else {//用户不存在
                $data['status'] = 400;
                $data['msg'] = "该用户未注册！";
                return $data;
            }

        } else if ($request->has('email')) {//邮箱登陆
            $email = $input['email'];
            $password = $input['password'];

            $isexist = User::where('mail', '=', $email)
                ->where(function ($query) {
                    $query->where('tel_verify',1)
                        ->orWhere('email_verify',1);
                })
                ->get();
            if ($isexist->count()) {
                $validatorMail = Validator::make($input, [
                    'email' => 'required|string|email',
                    'password' => 'required|min:6|max:60'
                ]);
                if (!($validatorMail->fails())) {
                    if (Auth::attempt(array('mail' => $email, 'password' => $password))) {

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
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "邮箱或密码错误！";
                        return $data;
                    }
                } else {
                    $data['status'] = 400;
                    $data['msg'] = "电话或密码格式不符合要求！";
                    return $data;
                }
            } else {
                $data['status'] = 400;
                $data['msg'] = "该用户未注册或未激活！";
                return $data;
            }
        } else if($request->has('username')){
            $username = $input['username'];
            $password = $input['password'];

            $isexist = User::where('username', '=', $username)
                ->where(function ($query) {
                    $query->where('tel_verify',1)
                        ->orWhere('email_verify',1);
                })
                ->get();
            if ($isexist->count()) {
                if (Auth::attempt(array('username' => $username, 'password' => $password))) {

                    $uid = Auth::user()->uid;
                    session()->put('frontUid',$uid);
                    $type = User::where('uid', '=', $uid)
                        ->where(function ($query) {
                            $query->where('tel_verify',1)
                                ->orWhere('email_verify',1);
                        })
                        ->select(['type'])
                        ->get();
                    $type = $type[0]['type'];
                    session()->put('type', $type);
                    $data['status'] = 200;
                    $data['msg'] = "登陆成功！";
                    return $data;
                } else {
                    $data['status'] = 400;
                    $data['msg'] = "用户名或密码错误！";
                    return $data;
                }
            }else{
                $data['status'] = 400;
                $data['msg'] = "该用户未注册或未激活！";
                return $data;
            }
        }else {
            $data['status'] = 400;
            $data['msg'] = "登录失败";
            return $data;
        }
    }

}
