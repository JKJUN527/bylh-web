<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Adverts;
use App\Complaint;
use App\Datetemp;
use App\Demands;
use App\Finlservices;
use App\Genlservices;
use App\News;
use App\Notices;
use App\Qaservices;
use App\Serviceclass1;
use App\Serviceclass2;
use App\Serviceclass3;
use App\Serviceinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    public function index(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($request->has('keyword')){
           return $this->indexSearch($request);
        }

        $data['serviceclass1']= Serviceclass1::all();//服务范围分类
        $data['serviceclass2']= Serviceclass2::all();//服务专业细分
        $data['serviceclass3']= Serviceclass3::all();//服务项目细分

        //返回最热门一般服务4个
        $data['hotest1']= Genlservices::where('state',0)
            ->where('type',0)
//            ->where('is_urgency',1)
            ->orderBy('updated_at','desc')
            ->take(6)
            ->get();
        //返回最热门实习中介服务4个
        $data['hotest2']= Finlservices::where('state',0)
            ->where('type',1)
//            ->where('is_urgency',1)
            ->orderBy('updated_at','desc')
            ->take(6)
            ->get();
        //返回最热门专业问答服务4个
        $data['hotest3']= Qaservices::where('state',0)
            ->where('type',2)
//            ->where('is_urgency',1)
            ->orderBy('updated_at','desc')
            ->take(8)
            ->get();
        //返回热门需求
        $data['demands'] = Demands::where('state',0)
            ->orderBy('view_count','desc')
            ->take(24)
            ->get();
        //返回热门服务商
        //默认设置为急聘服务商显示
        $data['hotservers'] = Serviceinfo::select('uid','elogo','city','graduate_edu','is_offline')
            ->where('is_urgency',1)
            ->orderBy('created_at','ase')
            ->take(8)
            ->get();
        //返回广告
        $data['ad'] = HomeController::searchAd();
        //返回热门服务商
        $data['serviceuser'] = HomeController::searchServiceUser();
        //返回网站公告
//        $data['news'] = HomeController::searchNews();
        $data['notes'] = Notices::orderBy('created_at','desc')
            ->take(8)
            ->get();

//        return $data;
        return view('index', ["data" => $data]);
    }

    public function searchAd() {
        $data = array();//用以存放最终返回页面数组
        //查询广告,根据广告location倒序，符合有效期返回，大图6个，小图6个，文字6个
        $ad0 = Adverts::where('validity', '>=', date('Y-m-d H-i-s'))
            ->where('type', '=', '0')
            ->where('location', '<', 10)
            ->orderBy('location', 'asc')
            ->take(6)
            ->get();
//        $ad00 = Adverts::where('validity', '>=', date('Y-m-d H-i-s'))
//            ->where('type', '=', '0')
//            ->where('location', '>=', 10)
//            ->orderBy('location', 'asc')
//            ->take(15)
//            ->get();
        $ad1 = Adverts::where('validity', '>=', date('Y-m-d H-i-s'))
            ->where('type', '=', '1')
            ->orderBy('location', 'asc')
            ->take(15)
            ->get();
        $ad2 = Adverts::where('validity', '>=', date('Y-m-d H-i-s'))
            ->where('type', '=', '2')
            ->orderBy('location', 'asc')
            ->take(21)
            ->get();
        $adnum = Adverts::where('validity', '>=', date('Y-m-d H-i-s'))
            ->count();
        //return $adnum;
        $data['ad0'] = $ad0;
//        $data['ad00'] = $ad00;
        $data['ad1'] = $ad1;
        $data['ad2'] = $ad2;

        return $data;
    }

    //搜索热门服务商（根据订单量及订单总和）
    public function searchServiceUser() {
        $data = array();
        //暂时推荐加急服务商
        $data = Serviceinfo::where('is_urgency',1)
            ->orderBy('updated_at','desc')
            ->take(3)
            ->get();

        return $data;
    }

    public function searchNews() {
        $data = array();
        //搜索最新新闻信息10条
        $new = News::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return $new;
    }
    //主页搜索功能，传入keywords返回关键字匹配的新闻及position相关数据。
    //返回值：data['news']--搜索到的新闻信息
    //      data['position']--搜索到的职位信息
    public function indexSearch(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();

        //主页搜索功能，传入keywords返回关键字匹配的三类服务，需求及新闻相关数据。

        $keywords = "";
        if ($request->has('keyword')) {

            if ($request->isMethod('GET')) {
                $keywords = $request->input('keyword');

                $data['news'] = News::where('content', 'like', '%' . $keywords . '%')
                    ->orWhere('title', 'like', '%' . $keywords . '%')
                    ->get();

                $data['genlservices'] = Genlservices::where('state', '=', 0)
                    ->where('type', 0)
                    ->where(function ($query) use ($keywords) {
                        $query->orwhere('title', 'like', '%' . $keywords . '%')
                            ->orwhere('describe', 'like', '%' . $keywords . '%')
                            ->orwhere('experience', 'like', '%' . $keywords . '%');
                    })
                    ->take(20)
                    ->get();
                $data['finlservices'] = Finlservices::where('state', '=', 0)
                    ->where('type', 1)
                    ->where(function ($query) use ($keywords) {
                        $query->orwhere('title', 'like', '%' . $keywords . '%')
                            ->orwhere('describe', 'like', '%' . $keywords . '%');
                    })
                    ->take(20)
                    ->get();
                $data['qaservices'] = Qaservices::where('state', '=', 0)
                    ->where('type', 2)
                    ->where(function ($query) use ($keywords) {
                        $query->orwhere('title', 'like', '%' . $keywords . '%')
                            ->orwhere('describe', 'like', '%' . $keywords . '%')
                            ->orwhere('experience', 'like', '%' . $keywords . '%');
                    })
                    ->take(20)
                    ->get();
                $data['serviceuser'] = HomeController::searchServiceUser();

                $data['demands'] = Demands::where('state',0)
                    ->where(function ($query) use ($keywords) {
                        $query->orwhere('title', 'like', '%' . $keywords . '%')
                            ->orwhere('describe', 'like', '%' . $keywords . '%');
                    })
//                    ->get();
                    ->paginate(1);
                $data['ad'] = Adverts::where('type',0)->orderBy('location','desc')->take(2)->get();
                $serviceclass1 = Serviceclass1::select('id','name')->get();

                $data['serviceclass1'] = array();
                foreach ($serviceclass1 as $class1){
                    $data['serviceclass1'][$class1->id] = $class1->name;
                }

                //计算多少服务商针对需求进行预约
                foreach ($data['demands'] as $demand){
                    $data['count'][$demand->id] = Datetemp::where('demand_id',$demand->id)
                        ->where('state',0)
                        ->count();
                }


            }
        }
        // ly:添加返回搜索的关键字
        $data['keyword'] = $keywords;

//        return $data;
        return view('search.search', [
            "data" => $data,
        ]);
    }
    public function aboutindex(Request $request){
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();

//        if($request->has('page') && $request->input('page') == 'qainfo')
//            $data['page'] = 2;
//        else
//            $data['page'] = 1;

        return view('about.about',['data'=>$data]);
    }
    public function questionindex(Request $request){
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();

//        if($request->has('page') && $request->input('page') == 'qainfo')
//            $data['page'] = 2;
//        else
//            $data['page'] = 1;

        return view('about.question',['data'=>$data]);
    }

    public function protocolindex(){
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();

        return view('demo.protocols',['data'=>$data]);
    }

    //处理投诉信息
    public function complaint(Request $request){
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未知错误";
        $uid = AuthController::getUid();
        if($uid == 0){
            $data['msg'] = "请先登录！";
        }else{
            if($request->has('type') && $request->has('url') && $request->has('detail') && $request->has('real_place')){
                $complaint = new Complaint();
                $complaint->type = $request->input('type');
                $complaint->content = $request->input('detail');
                $complaint->url = $request->input('url');
                $complaint->real_place = $request->input('real_place');
                $complaint->source_uid = $uid;
                if($complaint->save()){
                    $data['status'] = 200;
                    $data['msg'] = "投诉成功,感谢您的反馈，我们将尽快处理！";
                }else{
                    $data['msg'] = "投诉失败";
                }
            }
        }
        return $data;
    }
}
