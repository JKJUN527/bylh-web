<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use APP\Models\E3Email;
use App\Tempemail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgetPwController extends Controller {
    //忘记密码页面
    public function index() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();

//        return $data;
        return view('account/recallPassword', ["data" => $data]);
    }
    //重置密码
    public function resetpw(Request $request, $option)
    {
        //option 0:重置第一步发送验证码 1：验证验证码 2：重置密码
        $data = array();
        switch ($option) {
            case '0'://发送验证码
                if ($request->has('phone')) {//手机重置逻辑
                    $tel = $request->input('phone');
                    $uid = User::where('tel', '=', $tel)->first();
                    if($uid){
                        if (ValidationController::sendSMS($tel)) {
                            $data['uid'] = $uid->uid;
                            $data['status'] = 200;
                            $data['msg'] = "验证码发送成功";
                        }else{
                            $data['status'] = 400;
                            $data['msg'] = "验证码发送失败！";
                        }
                    }else{
                        $data['status'] = 400;
                        $data['msg'] = "未注册用户";
                    }
                    return $data;
                } else if ($request->has('email')) {
                    $mail = $request->input('email');
                    $uid = User::where('mail', '=', $mail)->get();
                    $temp = ValidationController::sendForgetMail($mail, $uid[0]['uid']);
                    if ($temp == -1) {
                        $data['status'] = 400;
                        $data['msg'] = "邮箱验证码发送失败";
                        return $data;
                    }
                    $data['uid'] = $uid[0]['uid'];
                    $data['status'] = 200;
                    $data['msg'] = "邮箱验证码发送成功";
                    return $data;
                }
                $data['status'] = 400;
                $data['msg'] = "发送失败";
                return $data;
                break;
            case '1'://验证验证码
                if ($request->has('tel') && $request->has('code')) {
                    $tel = $request->input('tel');
                    $code = $request->input('code');
                    $uid = User::where('tel', '=', $tel)->first();
                    if (ValidationController::verifySmsCode($tel, $code)) {//验证码正确
                        $data['uid'] = $uid->uid;
                        $data['status'] = 200;
                        $data['msg'] = "手机验证码正确";
                        return $data;
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "手机验证码错误";
                        return $data;
                    }
                } else if ($request->has('email') && $request->has('code')) {
                    $mail = $request->input('email');
                    $code = $request->input('code');
                    $uid = User::where('mail', '=', $mail)->first();
//                    $uid = $request->input('uid');
                    //验证邮箱验证码是否正确
                    $num = Tempemail::where('uid', '=', $uid->uid)
                        ->where('type', '=', 0)
                        ->where('code', '=', $code)
                        ->count();
                    $data['uid'] = $uid->uid;
                    if ($num) {
                        $data['status'] = 200;
                        $data['msg'] = "邮箱验证码正确";
                        return $data;
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "邮箱验证码错误";
                        return $data;
                    }
                }
                $data['status'] = 400;
                $data['msg'] = "验证失败";
                return $data;
            case '2'://重置密码
                if ($request->has('password')) {
                    $password = $request->input('password');

                    // todo 这里的uid，前台无法获取，需要后台根据：phone或者email进行查询获取，而且不是在这一步做，而是在发验证码之前就做。
                    $uid = $request->input('uid');
                    $temp = FixPasswordController::forgotPasswordReset($uid, $password);
                    if ($temp) {
                        $data['status'] = 200;
                        $data['msg'] = "重置密码成功";
                        return $data;
                    }
                }
                $data['status'] = 400;
                $data['msg'] = "重置密码失败";
                return $data;
            default:
                $data['status'] = 400;
                $data['msg'] = "未知操作";
                return $data;
        }
    }
    public function sendMailCode(Request $request){
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        if($request->has('email')){
            $email = $request->input('email');
            $uid = User::where('mail',$email)->first();
            if($email != "" && $uid) {
                $res = Tempemail::where('uid', '=', $uid->uid)
                    ->where('type', '=', 0)//注册验证
                    ->first();
                //获取验证码
                $ecode = ValidationController::generate_rand(6);
                if ($res->count()) {
                    $num = Tempemail::where('uid', '=', $uid->uid)
                        ->update([
                            'code' => $ecode,
                            'deadline' => date('Y-m-d H:i:s', strtotime('+7 day')),
                        ]);
                } else {
                    $temp = new Tempemail();
                    $temp->code = $ecode;
                    $temp->uid = $uid->uid;
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
}
