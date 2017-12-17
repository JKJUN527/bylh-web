<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */
namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
//    public function __construct() {
//        $this->middleware('guest')->except('logout','index');  //除了logout、index方法
//    }
    public function index() {
        $data = array();
        $data['uid'] = AdminAuthController::getUid();
        $data['username'] = $this->getUsername();
        return view('admin/login', ["data" => $data]);
    }
    public function postLogin(Request $request)
    {
        $data = array();
        $input = $request->all();
        $username = $input['username'];
        $password = $input['password'];
        $isexist = Admin::where('username', '=', $username)->get();
        if($isexist->count())
        {
            $res = Admin::where('username','=',$username)->first();
            if(Hash::check($password, $res->password))
            {
                $aid = $res->aid;
                session()->put('backUid',$aid);

                session()->put('adminType',$res->role);
                $last_login = date('Y-m-d H-i-s',time());
                $affectedRows = Admin::where('aid',$aid)
                    ->update(['last_login'=>$last_login]);
                if($affectedRows)
                {
                    $data['status'] = 200;
                    $data['msg'] = '登录成功';
                }else{
                    $data['status'] = 400;
                    $data['msg'] = '数据库更新失败';
                }
            } else{
                $data['status'] = 400;
                $data['msg'] = '密码错误';
            }
        }else{
            $data['status'] = 400;
            $data['msg'] = '用户名不存在';
        }
        return $data;
    }
    //登出函数
    public function logout(){
        Auth::logout();
        Session::flush();   //清除所有缓存
        return redirect('admin/login');
    }
    //获取用户名
    public function getUsername() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return null;
        $user = Admin::find($uid);
        return $user->username;
    }
}
