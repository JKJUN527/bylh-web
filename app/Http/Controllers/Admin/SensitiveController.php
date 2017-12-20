<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sensitive;
use Illuminate\Http\Request;

class SensitiveController extends Controller {
    //显示已添加敏感词
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['sensitive'] = Sensitive::orderBy('id', 'desc')
            ->paginate(4);
        return view('admin.sensitive', ['data' => $data]);
    }

    //删除、添加敏感词
    //添加传入name,删除传入id
    public function edit(Request $request, $option) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        switch ($option) {
            case 'add':
                //return 'add';
                if ($request->has('name')) {
                    $name = $request->input('name');
                    $sensitive = new Sensitive();
                    $sensitive->keyword = $name;

                    if ($sensitive->save()) {
                        $data['status'] = 200;
                    } else {
                        $resultData['status'] = 400;
                        $resultData['msg'] = "添加失败";
                    }
                }
                break;
            case 'delete':
                //return 'delete';
                if ($request->has('id')) {
                    $id = $request->input('id');

                    $delsensitive = Sensitive::find($id);
                    $bool = $delsensitive->delete();

                    if ($bool) {
                        $data['status'] = 200;
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "删除失败";
                    }
                }
                break;
            default:
                $data['status'] = 400;
                $data['msg'] = "操作命令未知";
                break;

        }

        return $data;
    }
}
