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
use App\Serviceinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    public function index() {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        $data['serviceclass1']= Serviceclass1::all();//服务范围分类
        $data['serviceclass2']= Serviceclass2::all();//服务专业细分
        $data['serviceclass3']= Serviceclass3::all();//服务项目细分

        //返回最热门一般服务4个
        $data['hotest1']= Genlservices::where('state',0)
            ->where('type',0)
            ->where('is_urgency',1)
            ->orderBy('view_count','desc')
            ->take(8)
            ->get();
        //返回最热门实习中介服务4个
        $data['hotest2']= Finlservices::where('state',0)
            ->where('type',1)
            ->where('is_urgency',1)
            ->orderBy('view_count','desc')
            ->take(8)
            ->get();
        //返回最热门专业问答服务4个
        $data['hotest3']= Qaservices::where('state',0)
            ->where('type',2)
            ->where('is_urgency',1)
            ->orderBy('view_count','desc')
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
        //返回企业资讯
        $data['news'] = HomeController::searchNews();

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

        $news = array();
        $position = array();
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
                    ->get();
                $data['finlservices'] = Finlservices::where('state', '=', 0)
                    ->where('type', 1)
                    ->where(function ($query) use ($keywords) {
                        $query->orwhere('title', 'like', '%' . $keywords . '%')
                            ->orwhere('describe', 'like', '%' . $keywords . '%');
                    })
                    ->get();
                $data['qaservices'] = Qaservices::where('state', '=', 0)
                    ->where('type', 2)
                    ->where(function ($query) use ($keywords) {
                        $query->orwhere('title', 'like', '%' . $keywords . '%')
                            ->orwhere('describe', 'like', '%' . $keywords . '%')
                            ->orwhere('experience', 'like', '%' . $keywords . '%');
                    })
                    ->get();
                $data['demands'] = Demands::where('state',0)
                    ->where(function ($query) use ($keywords) {
                        $query->orwhere('title', 'like', '%' . $keywords . '%')
                            ->orwhere('describe', 'like', '%' . $keywords . '%');
                    })
                    ->get();
            }
        }
        // ly:添加返回搜索的关键字
        $data['keyword'] = $keywords;

        #return $data;
        return view('search/search', [
            "data" => $data,
        ]);
    }

}
