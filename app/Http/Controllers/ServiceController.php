<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Adverts;
use App\Demands;
use App\Finlservices;
use App\Genlservices;
use App\News;
use App\Qaservices;
use App\Serviceclass1;
use App\Serviceclass2;
use App\Serviceclass3;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller {
    //一般服务发布主页
    public function genlserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($data['uid']==0 || $data['type']!=1){//先登录|登录用户非服务用户
            return view('account.login',['data'=>$data]);
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->realname_verify){//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/1');
        }else{
            //返回一般服务页面所需数据
            $data['serviceclass1']=Serviceclass1::where('type',0)->orderBy('updated_at','asc')->get();
            $data['serviceclass2']=Serviceclass2::where('type',0)->orderBy('updated_at','asc')->get();
            $data['serviceclass3']=Serviceclass3::where('type',0)->orderBy('updated_at','asc')->get();
        }

        return $data;
        return view('service.genlindex', ["data" => $data]);
    }
    //实习中介服务发布主页
    public function finlserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        $data['uid']=1;
        $data['type']=1;
        if($data['uid']==0 || $data['type']!=1){//先登录|登录用户非服务用户
            return view('account.login',['data'=>$data]);
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->finance_verify ||!$is_vertify->realname_verify){//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/2');
        }else{
            //返回一般服务页面所需数据
            $data['serviceclass1']=Serviceclass1::where('type',1)->orderBy('updated_at','asc')->get();
            $data['serviceclass2']=Serviceclass2::where('type',1)->orderBy('updated_at','asc')->get();
            $data['serviceclass3']=Serviceclass3::where('type',1)->orderBy('updated_at','asc')->get();
        }


        return $data;
        return view('service.finlindex', ["data" => $data]);
    }
    //专业问答服务发布主页
    public function qaserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($data['uid']==0 || $data['type']!=1){//先登录|登录用户非服务用户
            return view('account.login',['data'=>$data]);
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->majors_verify ||!$is_vertify->realname_verify){//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/3');
        }else{
            //返回一般服务页面所需数据
            $data['serviceclass1']=Serviceclass1::where('type',2)->orderBy('updated_at','asc')->get();
            $data['serviceclass2']=Serviceclass2::where('type',2)->orderBy('updated_at','asc')->get();
            $data['serviceclass3']=Serviceclass3::where('type',2)->orderBy('updated_at','asc')->get();
        }

        return $data;
        return view('service.qaindex', ["data" => $data]);
    }

    //一般服务发布方法
    public function genlservicePublic(Request $request){
        $data= array();
        $data['status']=400;
        $data['msg']="未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->realname_verify){
            $data['msg']="实名认证未通过";
            return $data;
        }
        //需进行关键词检测
        if($request->has('title')&&$request->has('city')&&$request->has('describe')){
            $str = $request->input('title').' '.$request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if($is_sensitive['flag']==1){
                $data['status']=400;
                $data['msg']="发布内容含有敏感词:".$is_sensitive['word'];
                return $data;
            }else{//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。

                        $pic = $request->file('pic' . $Item);//取得上传文件信息
                        if ($pic->isValid()) {//判断文件是否上传成功
                            //扩展名
                            $ext1 = $pic->getClientOriginalExtension();
                            //临时觉得路径
                            $realPath = $pic->getRealPath();
                            //生成文件名
                            $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'genlservice' . $Item . '.' . $ext1;

                            $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                            $bool = Storage::disk('genlservicespic')->put($picname, file_get_contents($realPath));
                        }
                    }
                    $genlser->picture = asset('storage/genlservicespic/' . $picfilepath);
                }
                    //保存都数据库
                    $genlser->type = 0;
                    $genlser->uid = $data['uid'];
                    $genlser->title = $request->input('title');
                    $genlser->city = $request->input('city');
                    $genlser->class1_id = $request->input('class1_id');
                    $genlser->class2_id = $request->input('class2_id');
                    $genlser->class3_id = $request->input('class3_id');
                    $genlser->describe = $request->input('describe');
                    $genlser->home_page = $request->input('home_page');
                    $genlser->experience = $request->input('experience');
                    if ($genlser->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "操作成功";
                        return $data;
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "操作失败";
                        return $data;
                    }
                }
                return $data;
        }
        return $data;
    }

    //实习中介服务发布方法
    public function finlservicePublic(Request $request){
        $data= array();
        $data['status']=400;
        $data['msg']="未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->finance_verify){
            $data['msg']="实习中介认证未通过";
            return $data;
        }
        //需进行关键词检测
        if($request->has('title')&&$request->has('city')&&$request->has('describe')){
            $str = $request->input('title').' '.$request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if($is_sensitive['flag']==1){
                $data['status']=400;
                $data['msg']="发布内容含有敏感词:".$is_sensitive['word'];
                return $data;
            }else{//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。

                        $pic = $request->file('pic' . $Item);//取得上传文件信息
                        if ($pic->isValid()) {//判断文件是否上传成功
                            //扩展名
                            $ext1 = $pic->getClientOriginalExtension();
                            //临时觉得路径
                            $realPath = $pic->getRealPath();
                            //生成文件名
                            $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'finlservice' . $Item . '.' . $ext1;

                            $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                            $bool = Storage::disk('finlservicespic')->put($picname, file_get_contents($realPath));
                        }
                    }
                    $genlser->picture = asset('storage/finlservicespic/' . $picfilepath);
                }
                //保存都数据库
                $genlser->type = 1;
                $genlser->uid = $data['uid'];
                $genlser->title = $request->input('title');
                $genlser->city = $request->input('city');
                $genlser->class1_id = $request->input('class1_id');
                $genlser->class2_id = $request->input('class2_id');
                $genlser->class3_id = $request->input('class3_id');
                $genlser->describe = $request->input('describe');
                $genlser->home_page = $request->input('home_page');
                $genlser->experience = $request->input('experience');
                if ($genlser->save()) {
                    $data['status'] = 200;
                    $data['msg'] = "操作成功";
                    return $data;
                } else {
                    $data['status'] = 400;
                    $data['msg'] = "操作失败";
                    return $data;
                }
            }
            return $data;
        }
        return $data;
    }

    //问答服务发布方法
    public function qaservicePublic(Request $request){
        $data= array();
        $data['status']=400;
        $data['msg']="未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->majors_verify){
            $data['msg']="专业认证未通过";
            return $data;
        }
        //需进行关键词检测
        if($request->has('title')&&$request->has('city')&&$request->has('describe')){
            $str = $request->input('title').' '.$request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if($is_sensitive['flag']==1){
                $data['status']=400;
                $data['msg']="发布内容含有敏感词:".$is_sensitive['word'];
                return $data;
            }else{//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。

                        $pic = $request->file('pic' . $Item);//取得上传文件信息
                        if ($pic->isValid()) {//判断文件是否上传成功
                            //扩展名
                            $ext1 = $pic->getClientOriginalExtension();
                            //临时觉得路径
                            $realPath = $pic->getRealPath();
                            //生成文件名
                            $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'qaservice' . $Item . '.' . $ext1;

                            $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                            $bool = Storage::disk('qaservicespic')->put($picname, file_get_contents($realPath));
                        }
                    }
                    $genlser->picture = asset('storage/qaservicespic/' . $picfilepath);
                }
                //保存都数据库
                $genlser->type = 2;
                $genlser->uid = $data['uid'];
                $genlser->title = $request->input('title');
                $genlser->city = $request->input('city');
                $genlser->class1_id = $request->input('class1_id');
                $genlser->class2_id = $request->input('class2_id');
                $genlser->class3_id = $request->input('class3_id');
                $genlser->describe = $request->input('describe');
                $genlser->home_page = $request->input('home_page');
                $genlser->experience = $request->input('experience');
                if ($genlser->save()) {
                    $data['status'] = 200;
                    $data['msg'] = "操作成功";
                    return $data;
                } else {
                    $data['status'] = 400;
                    $data['msg'] = "操作失败";
                    return $data;
                }
            }
            return $data;
        }
        return $data;
    }
    //编辑服务主页
    //传入sid值及对应的type值
    public function editserviceIndex(Request $request){
        $data =array();
        $data['uid']=AuthController::getUid();
        $data['type']=AuthController::getType();
        $data['username']= InfoController::getUsername();
        if($data['uid']==0 ||$data['type']!=1){
            $data['msg']="未登陆用户或非服务用户";
            return view('account.login',['data'=>$data]);
        }
        if($request->has('sid') && $request->has('type')){
            switch ($request->input('type')){
                case 0:
                    $data['service'] = Genlservices::where('id',$request->input('sid'))
                        ->where('uid',$data['uid'])
                        ->where('type',0)
                        ->where('state',0)
                        ->first();
                    break;
                case 1:
                    $data['service'] = Finlservices::where('id',$request->input('sid'))
                        ->where('uid',$data['uid'])
                        ->where('type',1)
                        ->where('state',0)
                        ->first();
                    break;
                case 2:
                    $data['service'] = Qaservices::where('id',$request->input('sid'))
                        ->where('uid',$data['uid'])
                        ->where('type',2)
                        ->where('state',0)
                        ->first();
                    break;
                default:
                    $data['service']=null;
                    break;
            }
        }
        $data['serviceclass1']= Serviceclass1::all();
        $data['serviceclass2']= Serviceclass2::all();
        $data['serviceclass3']= Serviceclass3::all();

        return $data;
        return view('service/editservice',['data'=>$data]);
    }

    //下架服务
    //传入服务id，及服务type
    public function deleteservice(Request $request){
        $data = array();
        $data['status']=400;
        $data['msg']="参数错误";
        if($request->has('sid') && $request->has('type')){
            $type = $request->input('type');
            $sid = $request->input('sid');
            switch ($type){
                case 0://一般服务
                    $service = Genlservices::find($sid);
                    $service->state=1;
                    if($service->save()){
                        $data['status']=200;
                        $data['msg']="一般服务下架成功";
                    }
                    break;
                case 1://金融服务
                    $service = Finlservices::find($sid);
                    $service->state=1;
                    if($service->save()){
                        $data['status']=200;
                        $data['msg']="金融服务下架成功";
                    }
                    break;
                case 2://问答服务
                    $service = Qaservices::find($sid);
                    $service->state=1;
                    if($service->save()){
                        $data['status']=200;
                        $data['msg']="问答服务下架成功";
                    }
                    break;
            }

        }
        return $data;
    }
    //服务高级搜索|根据关键字、服务三个类别、服务类型信息、地区查找对应的职位信息
    //排序按发布时间、价钱、浏览次数
    //其中，salary 1:<3k 2:3k>= & <5k 3:5k>= & <10k 4:10k>= & <15k 5:15k>= & <20k 6:20k>= & <25k 7:25k>= & <50k 8:>=50k
    public function advanceSearch(Request $request) {
        $data = array();
        //$data['position'] = Position::select('pid','eid','title','tag','pdescribe','salary','region','work_nature','occupation',)
        $orderBy = "view_count";
        $desc = "desc";
        if ($request->has('orderBy')) {//0:热度排序2:时间排序1:薪水
            $data["orderBy"] = $request->input('orderBy');

            switch ($request->input('orderBy')) {
                case 0:
                    $orderBy = "view_count";
                    break;
                case 1:
                    $orderBy = "salary";
                    break;
                case 2:
                    $orderBy = "jobs_position.created_at";
                    break;
            }
        }

        if ($request->has('desc')) {
            if ($request->input('desc') == 1) {
                $data["desc"] = 1;
                $desc = "desc";
            } else if ($request->input('desc') == 2) {
                $data["desc"] = 2;
                $desc = "asc";
            }
        }

        if ($request->has('industry')) $data['industry'] = $request->input('industry');
        if ($request->has('region')) $data['region'] = $request->input('region');
        if ($request->has('salary')) $data['salary'] = $request->input('salary');
        if ($request->has('work_nature')) $data['work_nature'] = $request->input('work_nature');
        if ($request->has('keyword')) $data['keyword'] = $request->input('keyword');

        //return $data;

        $data['position'] = DB::table('jobs_position')
            ->select('pid', 'title', 'ename','byname' ,'salary','jobs_region.name','position_status')
            ->leftjoin('jobs_enprinfo', 'jobs_enprinfo.eid', '=', 'jobs_position.eid')
            ->leftjoin('jobs_region', 'jobs_region.id', '=', 'jobs_position.region')
            ->where('vaildity', '>=', date('Y-m-d H-i-s'))
//        $data['position'] = Position::where('vaildity', '>=', date('Y-m-d H-i-s'))
//            ->where('position_status', '=', 1)
            ->where(function ($query){
                $query->where('position_status',1)
                    ->orwhere('position_status',4);
            })
            ->where(function ($query) use ($request) {
                if ($request->has('industry')) {//行业
                    $query->where('jobs_position.industry', '=', $request->input('industry'));
                }
                if ($request->has('region')) {
                    $query->where('jobs_position.region', '=', $request->input('region'));
                }
                if ($request->has('salary')) {
                    switch ($request->input('salary')) {
                        case 1:
                            $query->where('jobs_position.salary', '<', 3000);
                            break;
                        case 2:
                            $query->where('jobs_position.salary', '>=', 3000);
                            $query->where('jobs_position.salary', '<', 5000);
                            break;
                        case 3:
                            $query->where('jobs_position.salary', '>=', 5000);
                            $query->where('jobs_position.salary', '<', 10000);
                            break;
                        case 4:
                            $query->where('jobs_position.salary', '>=', 10000);
                            $query->where('jobs_position.salary', '<', 15000);
                            break;
                        case 5:
                            $query->where('jobs_position.salary', '>=', 15000);
                            $query->where('jobs_position.salary', '<', 20000);
                            break;
                        case 6:
                            $query->where('jobs_position.salary', '>=', 20000);
                            $query->where('jobs_position.salary', '<', 25000);
                            break;
                        case 7:
                            $query->where('jobs_position.salary', '>=', 25000);
                            $query->where('jobs_position.salary', '<', 50000);
                            break;
                        case 8:
                            $query->where('jobs_position.salary', '>', 50000);
                            break;
                        default:
                            break;
                    }
                }
                if ($request->has('work_nature')) {
                    $query->where('jobs_position.work_nature', '=', $request->input('work_nature'));
                }
                //未加入对公司名称以及公司别名的搜索
                if ($request->has('keyword')) {
                    $keyword = $request->input('keyword');
                    $query->where('jobs_position.title', 'like', '%' . $keyword . '%')
                        ->orWhere(function ($query) use ($keyword) {
                            $query->where('jobs_position.pdescribe', 'like', '%' . $keyword . '%');
                        });
                }
            })
            ->orderBy($orderBy, $desc)
            ->paginate(15);
        return $data;
    }

    public function advanceIndex(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        $data['industry'] = Industry::all();
        $data['region'] = Region::all();
        $data['result'] = $this->advanceSearch($request);

        $data['condition'] = $request->all();
//        return $data;
        return view('position/advanceSearch', ['data' => $data]);
    }

    //保存编辑服务内容
    //option 123 表示保存一般服务、实习中介、专业问答服务。
    public function editservicePost(Request $request,$option){
        $data = array();
        $data['uid']=AuthController::getUid();

    }



}
