<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Finlservices;
use App\Genlservices;
use App\Http\Controllers\Controller;
use App\Position;
use App\Qaservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller {
    //显示已发布服务信息
    public function genlservicesIndex(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['genlservices'] = DB::table('bylh_genlservices')
            ->join('bylh_serviceclass1', 'bylh_serviceclass1.id', '=', 'bylh_genlservices.class1_id')
            ->select('bylh_genlservices.id','city','name','describe','state','is_urgency')
            ->where('bylh_genlservices.type',0)
            ->orderBy('bylh_genlservices.updated_at', 'desc')
            ->paginate(10);
//        $data['genlservice'] = Genlservices::where('type',0)
//            ->paginate(10);

        return view('admin.genlservices', ['data' => $data]);
    }
    //显示已发布服务信息
    public function finlservicesIndex(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['finlservices'] = DB::table('bylh_finlservices')
            ->join('bylh_serviceclass1', 'bylh_serviceclass1.id', '=', 'bylh_finlservices.class1_id')
            ->select('bylh_finlservices.id','city','name','describe','state','is_urgency')
            ->where('bylh_finlservices.type',1)
            ->orderBy('bylh_finlservices.updated_at', 'desc')
            ->paginate(10);

        return view('admin.finlservices', ['data' => $data]);
    }
    //显示已发布服务信息
    public function qaservicesIndex(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['qaservices'] = DB::table('bylh_qaservices')
            ->join('bylh_serviceclass1', 'bylh_serviceclass1.id', '=', 'bylh_qaservices.class1_id')
            ->select('bylh_qaservices.id','city','name','describe','state','is_urgency')
            ->where('bylh_qaservices.type',2)
            ->orderBy('bylh_qaservices.updated_at', 'desc')
            ->paginate(10);

        return view('admin.majorservices', ['data' => $data]);
    }
    //根据企业名查询该企业发布的职位
    //传入企业名称
    public function findPosition(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
//        if($request->has('pagesize')){
//            $pagesize = $request->input('pagesize');
//        }else
//            $pagesize = 5;//默认每页显示20页
        if ($request->has('ename')) {
            $ename = $request->input('ename');
        } else
            $ename = '';

        $data['position'] = DB::table('jobs_position')
            ->join('jobs_enprinfo', 'jobs_position.eid', '=', 'jobs_enprinfo.eid')
            ->where('ename', 'like', '%' . $ename . '%')
            ->paginate(20);

        return $data;
    }

    //设置职位是否急聘状态、传入pid
    public function isUrgency(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if ($request->has('id') & $request->has('type')) {
            $id = $request->input('id');
            $type = $request->input('type');
            $urgency = $request->input('urgency');

            switch ($type){
                case 0:
                    $data = Genlservices::find($id);
                    break;
                case 1:
                    $data = Finlservices::find($id);
                    break;
                case 2:
                    $data = Qaservices::find($id);
                    break;
                default:
                    $data = Genlservices::find($id);
                    break;
            }
            $data->is_urgency = (int)$urgency;

            if ($data->save()) {
                $data['status'] = 200;
                $data['msg'] = "设置成功";
                return $data;
            }
        }
        $data['status'] = 400;
        $data['msg'] = "设置失败";
        return $data;
    }

    //上架职位、传入id及type
    public function OffPosition(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $data = array();

        if ($request->has('id')&&$request->has('type')) {
            $serviceid = $request->input('id');
            $type = $request->input('type');
            switch ($type){
                case 0://大学生服务
                    $data = Genlservices::find($serviceid);
                    break;
                case 1:
                    $data = Finlservices::find($serviceid);
                    break;
                case 2:
                    $data = Qaservices::find($serviceid);
                    break;
                default:
                    $data = Genlservices::find($serviceid);
                    break;
            }
            $data->state =1;
            if ($data->save()) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
                $data['msg'] = "下架失败";
            }
            return $data;
        }
        return $data;
    }
    //上架服务、传入id及type
    public function onPosition(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $data = array();

        if ($request->has('id')&&$request->has('type')) {
            $serviceid = $request->input('id');
            $type = $request->input('type');
            switch ($type){
                case 0://大学生服务
                    $data = Genlservices::find($serviceid);
                    break;
                case 1:
                    $data = Finlservices::find($serviceid);
                    break;
                case 2:
                    $data = Qaservices::find($serviceid);
                    break;
                default:
                    $data = Genlservices::find($serviceid);
                    break;
            }
            $data->state =0;
            if ($data->save()) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
                $data['msg'] = "上架失败";
            }
            return $data;
        }
        return $data;
    }
}
