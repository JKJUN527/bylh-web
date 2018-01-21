<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Demandreviews;
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

class DemandsController extends Controller {

    //需求发布主页
    public function demandPublishIndex() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

       # if($data['uid']==0 || $data['type']!=1){//先登录|登录用户非服务用户
         #   return view('account.login',['data'=>$data]);
      #  }
        //返回一般服务页面所需数据
        $data['serviceclass1']=Serviceclass1::where('type',0)->orderBy('updated_at','asc')->get();
        $data['serviceclass2']=Serviceclass2::where('type',0)->orderBy('updated_at','asc')->get();
        $data['serviceclass3']=Serviceclass3::where('type',0)->orderBy('updated_at','asc')->get();

       # return $data;
        return view('demands.demandPublishIndex', ["data" => $data]);
    }

    //需求发布提交方法
    public function PublishPost(Request $request){
        $data= array();
        $data['status']=400;
        $data['msg']="未知错误";
        $data['uid'] = AuthController::getUid();
        $data['type'] = AuthController::getType();
        if($data['uid']==0){
            $data['msg']="未登陆用户";
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
                $demands = new Demands();
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
                            $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'demands' . $Item . '.' . $ext1;

                            $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                            $bool = Storage::disk('demandspic')->put($picname, file_get_contents($realPath));
                        }
                    }
                    $demands->picture = asset('storage/demandspic/' . $picfilepath);
                }
                    //保存都数据库
                $demands->type = $request->input('type');
                $demands->uid = $data['uid'];
                $demands->title = $request->input('title');
                $demands->city = $request->input('city');
                $demands->class1_id = $request->input('class1_id');
                $demands->class2_id = $request->input('class2_id');
                $demands->class3_id = $request->input('class3_id');
                $demands->describe = $request->input('describe');
                $demands->price = $request->input('price');
                    if ($demands->save()) {
                        $data['status'] = 200;
                        $data['msg'] = "操作成功";
                        $data['services'] = $this->recommendServices($request);
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
    public function recommendServices(Request $request){
        $class1_id = $request->input('class1_id');
        $class2_id = $request->input('class2_id');
        $title = $request->input('title');
        $city = $request->input('city');
        $data = array();
        $data['finlservices'] = Finlservices::select('id','type','title','city','picture','class1_id')
            ->where('state',0)
            ->where(function($query) use($class1_id,$city,$title){
                $query->orWhere('city','=',$city)
                    ->orWhere('is_urgency',1)
                    ->orWhere('class1_id', $class1_id)
                    ->orWhere('describe', 'like', '%' . $title . '%');
            })
            ->get();
        $data['genlservices'] = Genlservices::select('id','type','title','city','picture','class1_id')
            ->where('state',0)
            ->where(function($query) use($class1_id,$city,$title){
                $query->orWhere('city','=',$city)
                    ->orWhere('is_urgency',1)
                    ->orWhere('class1_id', $class1_id)
                    ->orWhere('describe', 'like', '%' . $title . '%');
            })
            ->get();
        $data['qaservices'] = Qaservices::select('id','type','title','city','picture','class1_id')
            ->where('state',0)
            ->where(function($query) use($class1_id,$city,$title){
                $query->orWhere('city','=',$city)
                    ->orWhere('is_urgency',1)
                    ->orWhere('class1_id', $class1_id)
                    ->orWhere('describe', 'like', '%' . $title . '%');
            })
            ->get();

        return $data;
    }

    //编辑需求主页
    //传入did值
    public function editdemandIndex(Request $request){
        $data =array();
        $data['uid']=AuthController::getUid();
        $data['type']=AuthController::getType();
        $data['username']= InfoController::getUsername();
        if($data['uid']==0){
            $data['msg']="未登陆用户";
            return view('account.login',['data'=>$data]);
        }
        $data['demand'] = Demands::where('id',$request->input('did'))
            ->where('state',0)
            ->first();
        if($data['demand']->uid != $data['uid']){
            $data['msg']="非法用户";
            return view('account.login',['data'=>$data]);
        }
        $data['serviceclass1']= Serviceclass1::all();
        $data['serviceclass2']= Serviceclass2::all();
        $data['serviceclass3']= Serviceclass3::all();

        return $data;
        return view('demands/editdemand',['data'=>$data]);
    }

    //下架需求
    //传入需求id
    public function deletedemand(Request $request){
        $data = array();
        $uid=AuthController::getUid();
        $data['status']=400;
        $data['msg']="参数错误";
        if($request->has('did') && $request->has('type')){
            $did = $request->input('did');

            $demand = Demands::find($did);
            if($demand->uid != $uid){
                $data['status']=400;
                $data['msg']="非法用户";
                return $data;
            }
            $demand->state=1;
            if($demand->save()){
                $data['status']=200;
                $data['msg']="需求下架成功";
            }
        }
        return $data;
    }
    //需求高级搜索|根据关键字、服务三个类别、地区查找对应的需求信息
    //排序按发布时间、价钱、浏览次数
    public function advanceSearch(Request $request) {
        $data = array();
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
        if ($request->has('keyword')) $data['keyword'] = $request->input('keyword');

        $table = "bylh_demands";
        $data['demands'] = DB::table($table)
//            ->select('pid', 'title', 'ename','byname' ,'salary','jobs_region.name','position_status')
//            ->leftjoin('jobs_enprinfo', 'jobs_enprinfo.eid', '=', 'jobs_position.eid')
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
            ->paginate(30);
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
        $data['condition']['class1'] = $request->input('class1');
        $data['condition']['class2'] = $request->input('class2');
        $data['condition']['class3'] = $request->input('class3');
        $data['condition']['price'] = $request->input("price");
        $data['condition']['region'] = $request->input('region');
        $data['condition']['servicetype'] = $request->input('servicetype');
        $data['condition']['keyword'] = $request->input('keyword');
//        return $data;
        return view('demands.advanceSearch', ['data' => $data]);
    }
    //传入需求id返回具体的需求详情
    //需返回需求详情、需求评论、发布者其他需求、以及发布者基本信息
    public function detail(Request $request){
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($request->has('did')){
            $data['detail'] = Demands::find($request->input('did'));
            if($data['detail']){
                $uid = $data['detail']->uid;
                //查找对应用户的基本信息
                $data['userinfo'] = Userinfo::where('uid',$uid)->first();
                //用户其他需求信息
                $data['otherDemands'] = Demands::where('uid',$uid)
                    ->where('state',0)
                    ->where('state',0)
                    ->paginate(20);//默认显示20条
                //需求对应回答、评论
                $data['review'] = DB::table('bylh_demandreviews')
                    ->select('bylh_demandreviews.uid', 'username','photo','comments', 'bylh_demandreviews.created_at')
                    ->leftjoin('bylh_users', 'bylh_users.uid', '=', 'bylh_demandreviews.uid')
                    ->leftjoin('bylh_userinfo', 'bylh_userinfo.uid', '=', 'bylh_demandreviews.uid')
                    ->where('did', '=', $request->input('did'))
                    ->where('state',0)
                    ->orderby('bylh_demandreviews.created_at','desc')
                    ->paginate(10);//默认一页显示10条评价
                //需求浏览次数加一
                $data['detail']->view_count +=1;
                $data['detail']->save();
            }else{
                $data['detail'] = "";
            }

        }
//        return $data;
        return view('demands/detail',['data'=>$data]);
    }
    //保存编辑服务内容
    //option 123 表示保存一般服务、实习中介、专业问答服务。
    public function editservicePost(Request $request,$option){
        $data = array();
        $data['uid']=AuthController::getUid();

    }
    static public function getDemandsList(){
        $uid = AuthController::getUid();
        $data = Demands::where('uid',$uid)
            ->where('state',0)
            ->orderBy('created_at','desc')
            ->get();
        return $data;
    }



}
