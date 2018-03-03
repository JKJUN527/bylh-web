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
use App\Message;
use App\News;
use App\Orders;
use App\Qarecord;
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
use MongoDB\Driver\Query;

class ServiceController extends Controller {

    //一般服务发布主页
    public function genlserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($data['uid'] == 0 || $data['type'] != 2) {//先登录|登录用户非服务用户
            return view('account.login', ['data' => $data]);
        }
        $is_vertify = User::where('uid', $data['uid'])->first();
        if (!$is_vertify->realname_verify) {//未通过实名认证、跳转到实名认证页面
            return redirect()->back();
        } else {
            //返回一般服务页面所需数据
            $data['serviceclass1'] = Serviceclass1::where('type', 0)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass2'] = Serviceclass2::where('type', 0)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass3'] = Serviceclass3::where('type', 0)->orderBy('updated_at','asc')->get();
            $data['province'] = Region::where('parent_id', 0)->get();
            $data['city'] = Region::where('parent_id', '!=', 0)->get();
            //确认联系方式
            $data['userinfo'] = User::where('uid', $data['uid'])
                ->select('tel', 'mail')
                ->first();
            //验证服务用户是否填写了服务基本信息，如未填写，则不能发布一般服务
            $serviceinfo = Serviceinfo::where('uid', $data['uid'])
                ->first();
            if ($serviceinfo->pay_code != "") {
                $data['verification'] = 1;
            } else
                $data['verification'] = 0;

            $data['type'] = "0";

        }

//        return $data;
        return view('service.genlpublish', ["data" => $data]);
    }

    //实习中介服务发布主页
    public function finlserviceindex() {
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
            return redirect('account/authentication/1');
        } else {
            $data['serviceclass1'] = Serviceclass1::where('type', 1)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass2'] = Serviceclass2::where('type', 1)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass3'] = Serviceclass3::where('type', 1)->orderBy('updated_at','asc')->get();
            $data['province'] = Region::where('parent_id', 0)->get();
            $data['city'] = Region::where('parent_id', '!=', 0)->get();
            //确认联系方式
            $data['userinfo'] = User::where('uid', $data['uid'])
                ->select('tel', 'mail')
                ->first();
            //验证服务用户是否填写了服务基本信息，如未填写，则不能发布一般服务
            $serviceinfo = Serviceinfo::where('uid', $data['uid'])
                ->first();
            if ($serviceinfo->pay_code != "") {
                $data['verification'] = 1;
            } else
                $data['verification'] = 0;

            $data['type'] = "1";
        }


//        return $data;
        return view('service.genlpublish', ["data" => $data]);
    }

    //专业问答服务发布主页
    public function qaserviceindex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($data['uid'] == 0 || $data['type'] != 2) {//先登录|登录用户非服务用户
            return view('account.login', ['data' => $data]);
        }
        $is_vertify = User::where('uid', $data['uid'])->first();
        if (!$is_vertify->majors_verify || !$is_vertify->realname_verify) {//未通过实名认证、跳转到实名认证页面
            return redirect('account/authentication/2');
        } else {
            //返回一般服务页面所需数据
            $data['serviceclass1'] = Serviceclass1::where('type', 2)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass2'] = Serviceclass2::where('type', 2)->orderBy('updated_at', 'asc')->get();
            $data['serviceclass3'] = Serviceclass3::where('type', 2)->orderBy('updated_at','asc')->get();
            $data['province'] = Region::where('parent_id', 0)->get();
            $data['city'] = Region::where('parent_id', '!=', 0)->get();
            //确认联系方式
            $data['userinfo'] = User::where('uid', $data['uid'])
                ->select('tel', 'mail')
                ->first();
            //验证服务用户是否填写了服务基本信息，如未填写，则不能发布一般服务
            $serviceinfo = Serviceinfo::where('uid', $data['uid'])
                ->first();
            if ($serviceinfo->pay_code != "") {
                $data['verification'] = 1;
            } else
                $data['verification'] = 0;

            $data['type'] = "2";
        }

//        return $data;
        return view('service.genlpublish', ["data" => $data]);
    }

    //一般服务发布方法
    public function genlservicePublic(Request $request) {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0 || $data['type'] != 2) {
            $data['msg'] = "未登陆用户或非服务用户";
            return $data;
        }
        $is_vertify = User::where('uid', $data['uid'])->first();
        if (!$is_vertify->realname_verify) {
            $data['msg'] = "实名认证未通过";
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
                        if ($Item === "")
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
                $genlser->class1_id = $request->input('class1');
                $genlser->class2_id = $request->input('class2');
                $genlser->class3_id = $request->input('class3');
                $genlser->describe = $request->input('describe');
                $genlser->home_page = $request->input('home_page');
                $genlser->price = $request->input('price');
                $genlser->price_type = $request->input('price_type');
//                $genlser->experience = $request->input('experience');
                if ($genlser->save()) {
                    //设置服务商电话及邮箱
                    $tel = $request->input('tel');
                    $email = $request->input('email');
                    $userinfo = Userinfo::where('uid', $data['uid'])
                        ->update(['tel' => $tel, 'mail' => $email]);
                    $data['status'] = 200;
                    $data['msg'] = "操作成功";
//                    $data['demands'] = $this->recommendDemands($request);
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
    public function finlservicePublic(Request $request) {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0 || $data['type'] != 2) {
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
                $finlser = new Finlservices();
                if ($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。
                        if ($Item === "")
                            continue;
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
                    $finlser->picture = asset('storage/finlservicespic/' . $picfilepath);
                }
                //保存都数据库
                $finlser->type = 1;
                $finlser->uid = $data['uid'];
                $finlser->title = $request->input('title');
                $finlser->city = $request->input('city');
                $finlser->class1_id = $request->input('class1');
                $finlser->class2_id = $request->input('class2');
                $finlser->class3_id = $request->input('class3');
                $finlser->describe = $request->input('describe');
                $finlser->home_page = $request->input('home_page');
                $finlser->price = $request->input('price');
                $finlser->price_type = $request->input('price_type');
//                $finlser->experience = $request->input('experience');
                if ($finlser->save()) {
                    $tel = $request->input('tel');
                    $email = $request->input('email');
                    $userinfo = Userinfo::where('uid', $data['uid'])
                        ->update(['tel' => $tel, 'mail' => $email]);
                    $data['status'] = 200;
                    $data['msg'] = "操作成功";
//                    $data['demands'] = $this->recommendDemands($request);
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

    //问答服务发布方法
    public function qaservicePublic(Request $request) {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0 || $data['type'] != 2) {
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
                $qaser = new Qaservices();
                if ($request->has('pictures')) {//pictures 为字符串，标记上传图片个数及对应input域 name值。
                    //接收图片--注意图片可上传多张。
                    $picture = $request->input('pictures');
                    $pictures = explode('@', $picture);
                    $picfilepath = "";
                    foreach ($pictures as $Item) {//对每一个照片进行操作。
                        if ($Item === "")
                            continue;
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
                    $qaser->picture = asset('storage/qaservicespic/' . $picfilepath);
                }
                //保存都数据库
                $qaser->type = 2;
                $qaser->uid = $data['uid'];
                $qaser->title = $request->input('title');
                $qaser->city = $request->input('city');
                $qaser->class1_id = $request->input('class1');
                $qaser->class2_id = $request->input('class2');
                $qaser->class3_id = $request->input('class3');
                $qaser->describe = $request->input('describe');
                $qaser->home_page = $request->input('home_page');
                $qaser->price = $request->input('price');
                $qaser->price_type = $request->input('price_type');
//                $qaser->experience = $request->input('experience');
                if ($qaser->save()) {
                    //设置服务商电话及邮箱
                    $tel = $request->input('tel');
                    $email = $request->input('email');
                    $userinfo = Userinfo::where('uid', $data['uid'])
                        ->update(['tel' => $tel, 'mail' => $email]);
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
        }
        return $data;
    }

    //推荐服务--根据三个class分类
    public function recommendDemands(Request $request) {
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
    public function editserviceIndex(Request $request) {
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
    public function deleteservice(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['status'] = 400;
        $data['msg'] = "参数错误";
        if ($request->has('sid') && $request->has('type')) {
            $type = $request->input('type');
            $sid = $request->input('sid');
            switch ($type) {
                case 0://一般服务
                    $service = Genlservices::find($sid);
                    if($service->uid != $data['uid']){
                        $data['msg'] = "无权操作";
                        return $data;
                    }
                    if($service->state == 1)
                        $service->state = 0;
                    elseif($service->state == 0)
                        $service->state = 1;
                    if ($service->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "一般服务下架成功";
                    }
                    break;
                case 1://金融服务
                    $service = Finlservices::find($sid);
                    if($service->uid != $data['uid']){
                        $data['msg'] = "无权操作";
                        return $data;
                    }
                    if($service->state == 1)
                        $service->state = 0;
                    elseif($service->state == 0)
                        $service->state = 1;
                    if ($service->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "金融服务下架成功";
                    }
                    break;
                case 2://问答服务
                    $service = Qaservices::find($sid);
                    if($service->uid != $data['uid']){
                        $data['msg'] = "无权操作";
                        return $data;
                    }
                    if($service->state == 1)
                        $service->state = 0;
                    elseif($service->state == 0)
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
    public function advanceSearch(Request $request) {
        $data = array();
        //$data['position'] = Position::select('pid','eid','title','tag','pdescribe','salary','region','work_nature','occupation',)
        $orderBy = "view_count";
        $desc = "desc";
        if ($request->has('class1')) $data['class1'] = $request->input('class1');
        if ($request->has('class2')) $data['class2'] = $request->input('class2');
        if ($request->has('class3')) $data['class3'] = $request->input('class3');
        if ($request->has('price')) $data['price'] = $request->input('price');
        if ($request->has('city')) $data['city'] = $request->input('city ');
        if ($request->has('type')) $data['service_type'] = $request->input('type');//服务类型（012一般服务，实习课堂，专业问答）
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
        if ($request->has('orderBy')) {//0:热度排序1:时间排序2:价钱
            $data["orderBy"] = $request->input('orderBy');

            switch ($request->input('orderBy')) {
                case 0:
                    $orderBy = "view_count";
                    break;
                case 1:
                    $orderBy = $table.".created_at";
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

        $data['services'] = DB::table($table)
            ->select($table.'.id', 'title', 'price','price_type','picture' ,'bylh_region.name')
            ->leftjoin('bylh_region', 'bylh_region.id', '=', $table.'.city')
//            ->leftjoin('jobs_region', 'jobs_region.id', '=', 'jobs_position.region')
            ->where('state', '=', 0)
//        $data['position'] = Position::where('vaildity', '>=', date('Y-m-d H-i-s'))
//            ->where('position_status', '=', 1)
            ->where(function ($query) use ($request) {
                if ($request->has('class1')) {//行业
                    $query->where('class1_id', '=', $request->input('class1'));
                }
                if ($request->has('class2')) {
                    $query->where('class2_id', '=', $request->input('class2'));
                }
                if ($request->has('class3')) {
                    $query->where('class3_id', '=', $request->input('class3'));
                }
                if ($request->has('price')) {
                    switch ($request->input('price')) {
                        case 1:
                            $query->where('price', '<=', 50);
                            break;
                        case 2:
                            $query->where('price', '>=', 50);
                            $query->where('price', '<=', 100);
                            break;
                        case 3:
                            $query->where('price', '>=', 100);
                            $query->where('price', '<=', 500);
                            break;
                        case 4:
                            $query->where('price', '>=', 500);
                            $query->where('price', '<=', 2000);
                            break;
                        case 5:
                            $query->where('price', '>=', 2000);
                            $query->where('price', '<=', 5000);
                            break;
                        case 6:
                            $query->where('price', '>=', 5000);
                            $query->where('price', '<=', 10000);
                            break;
                        case 7:
                            $query->where('price', '>=', 10000);
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
            ->paginate(20);
        return $data;
    }

    public function advanceIndex(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        $data['class1'] = Serviceclass1::all();
        $data['class2'] = Serviceclass2::all();
        $data['class3'] = Serviceclass3::all();
        $data['region'] = Region::all();
        //返回查询结果
        $data['result'] = $this->advanceSearch($request);

        //返回上次查询条件
        $data['condition'] = $request->all();

        //返回对应类型服务商排行
        if($request->has('type'))
            $type = $request->input('type');
        else
            $type =0;
        $data['Service_list'] = array();
        $servicers = DB::table('bylh_orders')
            ->select(DB::raw('count(*) as order_count, s_uid'))
            ->where('type', '=', $type)
            ->where( function ($query) {
                $query->where('state',2)
                    ->orwhere('state',3);
            })
            ->groupby('s_uid')
            ->orderBy('order_count','desc')
            ->take(6)
            ->get();
        foreach ($servicers as $servicer){
            $data['Service_list'][] = Serviceinfo::select('uid','elogo','ename')
                ->where('uid',$servicer->s_uid)
                ->first();
        }

//        return $data;
        return view('service.advanceSearch', ['data' => $data]);
    }
    //传入服务id,及对应的服务类型，返回具体的服务详情
    //需返回服务详情、服务历史评价、发布者其他服务、以及发布者服务相关信息
    public function detail(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        $uid = $data['uid'];
        if($request->has('tab_detail'))
            $data['tab_detail'] = $request->input('tab_detail');
        else
            $data['tab_detail'] = 0;

        if ($request->has('id') && $request->has('type')) {
            $sid = $request->input('id');
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
                    //查询对应该用户的提问--回答列表
                    $data['qarecord'] = DB::table('bylh_qarecord')
                        ->select('username','photo','bylh_qarecord.id','questioner','respondent','question','answer','bylh_qarecord.created_at','bylh_qarecord.updated_at','bylh_qarecord.status')
                        ->leftjoin('bylh_userinfo','bylh_userinfo.uid','bylh_qarecord.questioner')
                        ->leftjoin('bylh_users','bylh_users.uid','bylh_qarecord.questioner')
//                        ->where('questioner',$data['uid'])
                        ->where(function ($query) use ($uid) {
                            $query->where('questioner',$uid)
                                ->orWhere('respondent',$uid);
                        })
                        ->where('service_id',$sid)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5,['*'],"fpage");
                    //查询所有该用户的回答历史记录
                    $data['qahistory'] = DB::table('bylh_qarecord')
                        ->select('username','photo','bylh_qarecord.id','questioner','respondent','question','answer','bylh_qarecord.created_at','bylh_qarecord.updated_at','bylh_qarecord.status')
                        ->leftjoin('bylh_userinfo','bylh_userinfo.uid','bylh_qarecord.questioner')
                        ->leftjoin('bylh_users','bylh_users.uid','bylh_qarecord.questioner')
//                        ->where('questioner',$data['uid'])
                        ->where('service_id',$sid)
                        ->where('bylh_qarecord.status','!=',0)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5,['*'],'spage');
                    //对应回答只能查看一次
                    $updaterecord = Qarecord::where('questioner',$data['uid'])
                        ->where('status',1)//回答待查看
                        ->update(['status'=>2]);
                    //查询当前用户是否已经购买过五次以上的服务用户的专业问答服务，如果是，则前端显示所有专业问答的答案
                    $order_count = Qarecord::where('questioner',$data['uid'])
                        ->where('respondent',$data['detail']->uid)
                        ->where('status','!=',0)
                        ->count();
                    if($order_count >=5)
                        $data['is_vipuser'] =1;
                    else
                        $data['is_vipuser'] =0;

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
            $data['review'] = DB::table('bylh_servicereviews')
                ->select('bylh_servicereviews.uid','photo','username','comments','bylh_servicereviews.created_at')
                ->leftjoin('bylh_userinfo','bylh_userinfo.uid','bylh_servicereviews.uid')
                ->leftjoin('bylh_users','bylh_users.uid','bylh_servicereviews.uid')
                ->where('sid', $sid)
                ->where('bylh_servicereviews.type', 0)
                ->where('state', 0)
                ->orderby('created_at', 'desc')
                ->paginate(15,['*'],"viewpage");//默认一页显示15条评价
            //查看该服务成交次数
            $data['ordernum'] = Orders::where('service_id',$sid)
                ->where('type',$request->input('type'))
                ->where(function ($query){
                    $query->where('state',2)
                        ->orWhere('state',3);
                })
                ->count();
            //查询成交记录
            $data['orderinfo'] = DB::table('bylh_orders')
                ->select('username','price','bylh_orders.created_at')
                ->leftjoin('bylh_users','bylh_users.uid','bylh_orders.create_uid')
                ->where('service_id',$sid)
                ->where('bylh_orders.type',$request->input('type'))
                ->where(function ($query){
                    $query->where('state',2)
                        ->orWhere('state',3);
                })
                ->paginate(15,['*'],"orderpage");//默认一页显示15条
            //服务商服务相关信息
            $data['serviceinfo'] = Serviceinfo::where('uid', $data['detail']->uid)->first();
        }
//        return $data;
        if($request->input('type') == 2){
            return view('service.qaservicedetail', ['data' => $data]);
        }else
            return view('service.detail', ['data' => $data]);
    }
    public function getservicesList(Request $request) {
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();
        if ($data['uid'] == 0 || $data['type'] != 2) {//先登录|登录用户非服务用户
            return view('account.login', ['data' => $data]);
        }
        if($request->has('type_tab')){
            $data['type_tab'] = $request->input('type_tab');
        }else{
            $data['type_tab'] = 1;
        }
        $data['genlservices'] = Genlservices::where('uid',$data['uid'])
            ->orderBy('updated_at','desc')
            ->paginate(10);
        //查询成交量
        foreach ($data['genlservices'] as $genlservice){
            $data['total_order']['genl'][$genlservice->id] = Orders::where('service_id',$genlservice->id)
                ->where('type',$genlservice->type)
                ->where(function ($query){
                    $query->where('state',2)
                        ->orWhere('state',3);
                })
                ->count();
        }
        $data['finlservices'] = Finlservices::where('uid',$data['uid'])
            ->orderBy('updated_at','desc')
            ->paginate(10);
        //查询成交量
        foreach ($data['finlservices'] as $finlservice){
            $data['total_order']['finl'][$finlservice->id] = Orders::where('service_id',$finlservice->id)
                ->where('type',$finlservice->type)
                ->where(function ($query){
                    $query->where('state',2)
                        ->orWhere('state',3);
                })
                ->count();
        }
        $data['qaservices'] = Qaservices::where('uid',$data['uid'])
            ->orderBy('updated_at','desc')
            ->paginate(10);
        //查询成交量
        foreach ($data['qaservices'] as $qaservice){
            $data['total_order']['qa'][$qaservice->id] = Orders::where('service_id',$qaservice->id)
                ->where('type',$qaservice->type)
                ->where(function ($query){
                    $query->where('state',2)
                        ->orWhere('state',3);
                })
                ->count();
        }
//        return $data;
        return view('service.myrequest',['data'=>$data]);
    }
    //获取服务用户发布所有需求及服务列表
    //传入用户id
    public function getAllservices(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($request->has('uid')) {
            $uid = $request->input('uid');
            $data['condition']['uid'] = $uid;
            $is_exist = User::find($uid);
            if ($is_exist) {
                $data['demands'] = Demands::where('uid', $uid)
                    ->where('state', 0)
                    ->take(12)
                    ->get();
                $data['genlservices'] = DB::table('bylh_genlservices')
                    ->select('bylh_genlservices.id','picture','title','describe','name')
                    ->leftjoin('bylh_region','bylh_region.id','bylh_genlservices.city')
                    ->where('uid', $uid)
                    ->where('state', 0)
                    ->paginate(9,['*'],"genlpage");
                $data['finlservices'] = DB::table('bylh_finlservices')
                    ->select('bylh_finlservices.id','picture','title','describe','name')
                    ->leftjoin('bylh_region','bylh_region.id','bylh_finlservices.city')
                    ->where('uid', $uid)
                    ->where('state', 0)
                    ->paginate(9,['*'],"finlpage");
                $data['qaservices'] = DB::table('bylh_qaservices')
                    ->select('bylh_qaservices.id','picture','title','describe','name')
                    ->leftjoin('bylh_region','bylh_region.id','bylh_qaservices.city')
                    ->where('uid', $uid)
                    ->where('state', 0)
                    ->paginate(9,['*'],"qapage");
                if($is_exist->type == 1)
                    $data['userinfo'] = Userinfo::where('uid', $uid)->first();
                elseif ($is_exist->type == 2)
                    $data['serviceinfo'] = Serviceinfo::where('uid',$uid)->first();
//                return $data;
                return view('service/serviceproviderInfo', ['data' => $data]);
            } else {
                return redirect()->back();
            }
        } else
            return redirect()->back();
    }
    //保存编辑服务内容
    //option 123 表示保存一般服务、实习中介、专业问答服务。
    public function editservicePost(Request $request, $option) {
        $data = array();
        $data['uid'] = AuthController::getUid();

    }

//服务评论
    public function reviewService(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();


        return view('service.reviewService', ['data' => $data]);
    }
    //专业问答
    public function recordQa(Request $request){
        $data = array();
        $uid = AuthController::getUid();
        $type = AuthController::getType();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        if($uid == 0){
            $data['msg'] = "登录后才能提问";
            return $data;
        }
        //提问操作
        if($request->has('qaserviceid') && $request->has('content')){
            $sid = $request->input('qaserviceid');
            $content = $request->input('content');
            $isexit_notanswer = Qarecord::where('service_id',$sid)
                ->where('questioner',$uid)
                ->where('status',0)
                ->count();
            if($isexit_notanswer >0){
                $data['msg'] = "请等待服务商回答";
                return $data;
            }else{
                $service = Qaservices::find($sid);

                $record = new Qarecord();
                $record->service_id = $sid;
                $record->questioner = $uid;
                $record->respondent = $service->uid;
                $record->question = $content;
                if($record->save()){
                    //发送站内信
                    $msg = "您好！我向你的问答服务".$service->title."提了一个问题，希望得到你的解答。";
                    $mesage = new Message();
                    $mesage->from_id = $uid;
                    $mesage->to_id = $service->uid;
                    $mesage->content = $msg;
                    $mesage->save();
                    $data['status'] = 200;
                    $data['msg'] = "提问成功";
                    return $data;
                }
            }
        }
        //回答操作
        if ($request->has('recordid') && $request->has('content')){
            $recordid = $request->input('recordid');
            $content = $request->input('content');

            $answer_record = Qarecord::find($recordid);
            if($uid == $answer_record->respondent){//登录用户具有回答权限
                $answer_record->answer = $content;
                $answer_record->status = 1;
                if($answer_record->save()){
                    //发送站内信
                    $msg = "您好！我已问答你的问题".$answer_record->question."，请到服务详情页面查看。";
                    $mesage = new Message();
                    $mesage->from_id = $uid;
                    $mesage->to_id = $answer_record->questioner;
                    $mesage->content = $msg;
                    $mesage->save();
                    $data['status'] = 200;
                    $data['msg'] = "回答成功";
                    return $data;
                }
            }else{
                $data['msg'] = "无权回答此问题";
                return $data;
            }
        }
        return $data;
    }
}
