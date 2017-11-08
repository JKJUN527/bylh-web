<?php
/**
 * Created by PhpStorm.
 * User: Lishuai
 * Date: 2017/9/6
 * Time: 19:45
 */

namespace App\Http\Controllers;

use App\User;
use App\Userinfo;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    //个人、企业基本信息修改、新增页面
    public function index()
    {
        $data = array();

        $uid = AuthController::getUid();
        $username = InfoController::getUsername();
        $type = AuthController::getType();
        $data['username'] = $username;
        $data['type'] = $type;
        $data['uid'] = $uid;
        if ($uid == 0) {
            return redirect('index');
        }
        if ($type == 1) {
            //返回个人资料修改界面的个人信息资料
            $data['personinfo'] = Personinfo::where('uid', '=', $uid)->first();
            $data['personinfo']['username'] = User::where('uid', $uid)->select('username')->first();
            //return $data;
        } else if ($type == 2) {
            //返回企业修改基本资料的企业信息资料
            $data['enprinfo'] = Enprinfo::where('uid', $uid)->first();
        }
//        return $data;
        return view('account.edit', ['data' => $data]);

    }

    public static function getUsername()
    {
        $uid = AuthController::getUid();
        if ($uid == 0)
            return null;

        $user = User::where("uid", $uid)->first();
        return $user->username;
    }

    public function getPersonInfo()
    {
        $auth = new AuthController();
        $uid = $auth->getUid();
        if ($uid == 0) {
            return redirect('index');
        }
        $type = $auth->getType();
        if ($uid) {
            $personInfo = Userinfo::where('uid', '=', $uid)
                ->get();
            return $personInfo;
        }

        return null;
    }
}
