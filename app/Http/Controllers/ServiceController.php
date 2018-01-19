<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Demands;
use App\Finlservices;
use App\Genlservices;
use App\Qaservices;
use App\Region;
use App\Serviceclass1;
use App\Serviceclass2;
use App\Serviceclass3;
use App\Serviceinfo;
use App\Servicereviews;
use App\User;
use App\Userinfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    //一般服务发布主页
    public function genlserviceindex()
    {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($data['uid']==0 || $data['type']!=2){//先登录|登录用户非服务用户
            return view('account.login',['data'=>$data]);
        }
        $is_vertify = User::where('uid',$data['uid'])->first();
        if(!$is_vertify->realname_verify){//未通过实名认证、跳转到实名认证页面
            return redirect()->back();
        }else{
            //返回一般服务页面所需数据
            $data['serviceclass1']=Serviceclass1::where('type',0)->orderBy('updated_at','asc')->get();
            $data['serviceclass2']=Serviceclass2::where('type',0)->orderBy('updated_at','asc')->get();
//            $data['serviceclass3']=Serviceclass3::where('type',0)->orderBy('updated_at','asc')->get();
            $data['province'] = Region::where('parent_id',0)->get();
            $data['city'] = Region::where('parent_id','!=',0)->get();
            //确认联系方式
            $data['userinfo'] = User::where('uid',$data['uid'])
                ->select('tel','mail')
                ->first();
            $data['type'] = "0";
        }

//        return $data;
        return view('service.genlpublish', ["data" => $data]);
    }

    //实习中介服务发布主页
    public function finlserviceindex()
    {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        $data['uid'] = 1;
        $data['type'] = 1;
        if ($data['uid'] == 0 || $data['type'] != 1) {//先登录|登录用户非服务用户
            return view('account.login', ['data' => $data]);
        }
        $is_vertify = User::where('uid', $data['uid'])->first();
        if (!$is_vertify->finance_verify || !$is_vertify->realname_verify) {//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/2');
        } else {
            //返回一般服务页面所需数据
            $data['serviceclass1'] = Serviceclass1::where('type', 1)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass2'] = Serviceclass2::where('type', 1)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass3'] = Serviceclass3::where('type', 1)->orderBy('updated_at', 'asc')->get();
        }


        return $data;
        return view('service.finlindex', ["data" => $data]);
    }

    //专业问答服务发布主页
    public function qaserviceindex()
    {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($data['uid'] == 0 || $data['type'] != 2) {//先登录|登录用户非服务用户
            return view('account.login', ['data' => $data]);
        }
        $is_vertify = User::where('uid', $data['uid'])->first();
        if (!$is_vertify->majors_verify || !$is_vertify->realname_verify) {//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/3');
        } else {
            //返回一般服务页面所需数据
            $data['serviceclass1'] = Serviceclass1::where('type', 2)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass2'] = Serviceclass2::where('type', 2)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass3'] = Serviceclass3::where('type', 2)->orderBy('updated_at', 'asc')->get();
        }

        return $data;
        return view('service.qaindex', ["data" => $data]);
    }

    //一般服务发布方法
    public function genlservicePublic(Request $request)
    {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0 ||$data['type']!=2){
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
                        if($Item === "")
                            continue;
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
//                    $genlser->class3_id = $request->input('class3_id');
                    $genlser->describe = $request->input('describe');
                    $genlser->home_page = $request->input('home_page');
                    $genlser->experience = $request->input('experience');
                    if ($genlser->save()) {
                        //设置服务商电话及邮箱
                        $tel = $request->input('tel');
                        $email = $request->input('email');
                        $userinfo = Userinfo::where('uid',$data['uid'])
                            ->update(['tel'=>$tel,'mail'=>$email]);
                        $data['status'] = 200;
                        $data['msg'] = "操作成功";
                        $data['demands'] = $this->recommendDemands($request);
                        return $data;
                    } else {
                        $data['status'] = 400;
                        $data['msg'] = "操作失败";
                        return $data;
                    }
                }
        }
        return $data;
    }

    //实习中介服务发布方法
    public function finlservicePublic(Request $request)
    {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0 || $data['type'] != 1) {
            $data['msg'] = "未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid', $data['uid'])->first();
        if (!$is_vertify->finance_verify) {
            $data['msg'] = "实习中介认证未通过";
            return $data;
        }
        //需进行关键词检测
        if ($request->has('title') && $request->has('city') && $request->has('describe')) {
            $str = $request->input('title') . ' ' . $request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if ($is_sensitive['flag'] == 1) {
                $data['status'] = 400;
                $data['msg'] = "发布内容含有敏感词:" . $is_sensitive['word'];
                return $data;
            } else {//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if ($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
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
                    $data['demands'] = $this->recommendDemands($request);
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
    public function qaservicePublic(Request $request)
    {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0 || $data['type'] != 1) {
            $data['msg'] = "未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid', $data['uid'])->first();
        if (!$is_vertify->majors_verify) {
            $data['msg'] = "专业认证未通过";
            return $data;
        }
        //需进行关键词检测
        if ($request->has('title') && $request->has('city') && $request->has('describe')) {
            $str = $request->input('title') . ' ' . $request->input('describe');
            $is_sensitive = SensitiveController::checkSensitive($str);
            if ($is_sensitive['flag'] == 1) {
                $data['status'] = 400;
                $data['msg'] = "发布内容含有敏感词:" . $is_sensitive['word'];
                return $data;
            } else {//通过敏感词检测
                //接收数据
                $genlser = new Genlservices();
                if ($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
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
                    $data['msg'] = "发布服务成功";
//                    $data['demands'] = $this->recommendDemands($request);
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

    //推荐服务--根据三个class分类
    public function recommendDemands(Request $request)
    {
        $class1_id = $request->input('class1_id');
        $class2_id = $request->input('class2_id');
        $class3_id = $request->input('class3_id');
        $city = $request->input('city');

        $demands = Demands::select('id', 'title', 'city', 'picture', 'class1_id')
            ->where('state', 0)
            ->where(function ($query) use ($class1_id, $city) {
                $query->where('city', '=', $city)
                    ->orWhere(function ($query) use ($class1_id) {
                        $query->where('class1_id', $class1_id);
                    });
            })
            ->get();
        return $demands;
    }
    //编辑服务主页
    //传入sid值及对应的type值
    public function editserviceIndex(Request $request)
    {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        $data['username'] = InfoController::getUsername();
        if ($data['uid'] == 0 || $data['type'] != 1) {
            $data['msg'] = "未登陆用户或非服务用户";
            return view('account.login', ['data' => $data]);
        }
        if ($request->has('sid') && $request->has('type')) {
            switch ($request->input('type')) {
                case 0:
                    $data['service'] = Genlservices::where('id', $request->input('sid'))
                        ->where('uid', $data['uid'])
                        ->where('type', 0)
                        ->where('state', 0)
                        ->first();
                    break;
                case 1:
                    $data['service'] = Finlservices::where('id', $request->input('sid'))
                        ->where('uid', $data['uid'])
                        ->where('type', 1)
                        ->where('state', 0)
                        ->first();
                    break;
                case 2:
                    $data['service'] = Qaservices::where('id', $request->input('sid'))
                        ->where('uid', $data['uid'])
                        ->where('type', 2)
                        ->where('state', 0)
                        ->first();
                    break;
                default:
                    $data['service'] = null;
                    break;
            }
        }
        $data['serviceclass1'] = Serviceclass1::all();
        $data['serviceclass2'] = Serviceclass2::all();
        $data['serviceclass3'] = Serviceclass3::all();

        return $data;
        return view('service/request', ['data' => $data]);
    }
    //下架服务
    //传入服务id，及服务type
    public function deleteservice(Request $request)
    {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        if ($request->has('sid') && $request->has('type')) {
            $type = $request->input('type');
            $sid = $request->input('sid');
            switch ($type) {
                case 0://一般服务
                    $service = Genlservices::find($sid);
                    $service->state = 1;
                    if ($service->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "一般服务下架成功";
                    }
                    break;
                case 1://金融服务
                    $service = Finlservices::find($sid);
                    $service->state = 1;
                    if ($service->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "金融服务下架成功";
                    }
                    break;
                case 2://问答服务
                    $service = Qaservices::find($sid);
                    $service->state = 1;
                    if ($service->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "问答服务下架成功";
                    }
                    break;
            }

        }
        return $data;
    }
    //服务高级搜索|根据关键字、服务三个类别、服务类型信息、地区查找对应的职位信息
    //排序按发布时间、价钱、浏览次数
    //
    public function advanceSearch(Request $request)
    {
        $data = array();
        //$data['position'] = Position::select('pid','eid','title','tag','pdescribe','salary','region','work_nature','occupation',)
        $orderBy = "view_count";
        $desc = "desc";
        if ($request->has('orderBy')) {//0:热度排序1:时间排序2:价钱
            $data["orderBy"] = $request->input('orderBy');

            switch ($request->input('orderBy')) {
                case 0:
                    $orderBy = "view_count";
                    break;
                case 1:
                    $orderBy = "created_at";
                    break;
                case 2:
                    $orderBy = "price";
                    break;
            }
        }
        //desc =1 倒序  2 正序
        if ($request->has('desc')) {
            if ($request->input('desc') == 1) {
                $data["desc"] = 1;
                $desc = "desc";
            } else if ($request->input('desc') == 2) {
                $data["desc"] = 2;
                $desc = "asc";
            }
        }

        if ($request->has('class1')) $data['class1'] = $request->input('class1');
        if ($request->has('class2')) $data['class2'] = $request->input('class2');
        if ($request->has('class3')) $data['class3'] = $request->input('class3');
        if ($request->has('price')) $data['price'] = $request->input('price');
        if ($request->has('city')) $data['city'] = $request->input('city ');
        if ($request->has('service_type')) $data['service_type'] = $request->input('service_type');//服务类型（012一般服务，实习课堂，专业问答）
        if ($request->has('keyword')) $data['keyword'] = $request->input('keyword');

        switch ($data['service_type']) {
            case 0:
                $table = "bylh_genlservices";
                break;
            case 1:
                $table = "bylh_finlservices";
                break;
            case 2:
                $table = "bylh_qaservices";
                break;
            default:
                $table = "bylh_genlservices";
        }

        $data['services'] = DB::table($table)
//            ->select('pid', 'title', 'ename','byname' ,'salary','jobs_region.name','position_status')
//            ->leftjoin('jobs_enprinfo', 'jobs_enprinfo.eid', '=', 'jobs_position.eid')
//            ->leftjoin('jobs_region', 'jobs_region.id', '=', 'jobs_position.region')
            ->where('state', '=', 0)
//        $data['position'] = Position::where('vaildity', '>=', date('Y-m-d H-i-s'))
//            ->where('position_status', '=', 1)
            ->where(function ($query) use ($request) {
                if ($request->has('class1')) {//行业
                    $query->where('class1', '=', $request->input('class1'));
                }
                if ($request->has('class2')) {
                    $query->where('class2', '=', $request->input('class2'));
                }
                if ($request->has('price')) {
                    switch ($request->input('price')) {
                        case 1:
                            $query->where('price', '<', 50);
                            break;
                        case 2:
                            $query->where('price', '>=', 50);
                            $query->where('price', '<', 100);
                            break;
                        case 3:
                            $query->where('price', '>=', 100);
                            $query->where('price', '<', 500);
                            break;
                        case 4:
                            $query->where('price', '>=', 500);
                            $query->where('price', '<', 2000);
                            break;
                        case 5:
                            $query->where('price', '>=', 2000);
                            $query->where('price', '<', 5000);
                            break;
                        case 6:
                            $query->where('price', '>=', 5000);
                            $query->where('price', '<', 10000);
                            break;
                        case 7:
                            $query->where('price', '>', 10000);
                            break;
                        default:
                            break;
                    }
                }
                if ($request->has('region')) {
                    $query->where('city', '=', $request->input('region'));
                }
                //对关键字进行搜索
                if ($request->has('keyword')) {
                    $keyword = $request->input('keyword');
                    $query->where('title', 'like', '%' . $keyword . '%')
                        ->orWhere(function ($query) use ($keyword) {
                            $query->where('describe', 'like', '%' . $keyword . '%');
                        });
                }
            })
            ->orderBy($orderBy, $desc)
            ->paginate(15);
        return $data;
    }

    public function advanceIndex(Request $request)
    {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        $data['class1'] = Serviceclass1::all();
        $data['class2'] = Serviceclass2::all();
        $data['class3'] = Serviceclass3::all();
        $data['region'] = Region::all();
        /*        //返回查询结果
                $data['result'] = $this->advanceSearch($request);

                //返回上次查询条件
                $data['condition']['class1'] = $request->input('class1');
                $data['condition']['class2'] = $request->input('class2');
                $data['condition']['class3'] = $request->input('class3');
                $data['condition']['region'] = $request->input('region');
                $data['condition']['servicetype'] = $request->input('servicetype');
                $data['condition']['keyword'] = $request->input('keyword');*/
        // return $data;
        return view('service.advanceSearch', ['data' => $data]);
    }
    //传入服务id,及对应的服务类型，返回具体的服务详情
    //需返回服务详情、服务历史评价、发布者其他服务、以及发布者服务相关信息
    public function detail(Request $request)
    {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($request->has('sid') && $request->has('type')) {
            $sid = $request->input('sid');
            switch ($request->input('type')) {
                case 0:
                    $data['detail'] = Genlservices::where('id', $sid)
                        ->where('state', 0)
                        ->first();
                    //对应服务浏览次数加1--发布者浏览，不加浏览量
                    if ($data['detail']->uid == $data['uid']) {
                        break;
                    }
                    $addview = Genlservices::find($sid);
                    $addview->view_count += 1;
                    $addview->save();
                    break;
                case 1:
                    $data['detail'] = Finlservices::where('id', $sid)
                        ->where('state', 0)
                        ->first();
                    //对应服务浏览次数加1
                    if ($data['detail']->uid == $data['uid']) {
                        break;
                    }
                    $addview = Finlservices::find($sid);
                    $addview->view_count += 1;
                    $addview->save();
                    break;
                case 2:
                    $data['detail'] = Qaservices::where('id', $sid)
                        ->where('state', 0)
                        ->first();
                    //对应服务浏览次数加1
                    if ($data['detail']->uid == $data['uid']) {
                        break;
                    }
                    $addview = Qaservices::find($sid);
                    $addview->view_count += 1;
                    $addview->save();
                    break;
            }
            //服务对应评价
            $data['review'] = Servicereviews::where('sid', $sid)
                ->where('type', 0)
                ->where('state', 0)
                ->orderby('created_at', 'desc')
                ->paginate(10);//默认一页显示10条评价
            //服务商服务相关信息
            $data['serviceinfo'] = Serviceinfo::where('uid', $data['detail']->uid)->first();
        }
//        return $data;
        return view('service.detail', ['data' => $data]);
    }
    //获取服务用户发布所有需求及服务列表
    //传入用户id
    public function getAllservices(Request $request){
        $data = array();
        if($request->has('uid')){
            $uid = $request->input('uid');
            $is_exist = User::find($uid);
            if($is_exist){
                $data['demands'] = Demands::where('uid',$uid)
                    ->where('state',0)
                    ->take(12)
                    ->get();
                $data['genlservices'] = Genlservices::where('uid',$uid)
                    ->where('state',0)
                    ->take(12)
                    ->get();
                $data['finlservices'] = Finlservices::where('uid',$uid)
                    ->where('state',0)
                    ->take(12)
                    ->get();
                $data['qaservices'] = Qaservices::where('uid',$uid)
                    ->where('state',0)
                    ->take(12)
                    ->get();
                $data['userinfo'] =where('uid',$uid)->first();
                return view('service/getallservices',['data'=>$data]);
            }else{
                return redirect()->back();
            }
        }else
            return redirect()->back();
    }
    //保存编辑服务内容
    //option 123 表示保存一般服务、实习中介、专业问答服务。
    public function editservicePost(Request $request, $option)
    {
        $data = array();
        $data['uid'] = AuthController::getUid();

    }
//服务评论
    public function reviewService(Request $request)
    {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();


        return view('service.reviewService', ['data' => $data]);
    }
}
