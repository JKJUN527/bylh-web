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
//        $type = $auth->getType();
        if ($uid) {
            $personInfo = Userinfo::where('uid', '=', $uid)
                ->get();
            return $personInfo;
        }

        return null;
    }
}
