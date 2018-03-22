<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\About;
use App\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplaintController extends Controller {
    //显示投诉信息
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $data = array();
        $data = DashboardController::getLoginInfo();
        $data['complaint'] = Complaint::orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.complaint',['data'=>$data]);
    }
    public function detail(Request $request) {
        $uid = AdminAuthController::getUid();

        $data = array();
        if($request->has('id')){
            $data['complaint'] = Complaint::find($request->input('id'));
            $data['complaint']->is_read =1;
            $data['complaint']->save();
        }
        return $data;
    }
    public function delete(Request $request){
        $uid = AdminAuthController::getUid();

        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        if($request->has('id')){
            $complaint = Complaint::where('id',$request->input('id'))
                ->delete();
            $data['status'] = 200;
            $data['msg'] = "删除成功";
        }else
            $data['msg'] = "参数错误";
        return $data;
    }
}
