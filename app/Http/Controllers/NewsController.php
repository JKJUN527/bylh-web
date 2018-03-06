<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\Forum;
use App\Forumviews;
use App\News;
use App\Notices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller {
    public function index() {
        $data['type'] = AuthController::getType();
        return view('news/index');
    }

    //根据post的新闻id，返回新闻详情
    public function detail(Request $request) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if ($request->has('nid')) {
            $nid = $request->input('nid');

            $news = News::find($nid);
            $data['news'] = $news;
            $news->view_count += 1;//浏览次数加1
            $news->save();

//            $data['review'] = DB::table('jobs_users')
//                ->select('jobs_newsreview.uid', 'username', 'type' ,'photo','elogo','content', 'jobs_newsreview.created_at')
//                ->leftjoin('jobs_enprinfo', 'jobs_enprinfo.uid', '=', 'jobs_users.uid')
//                ->leftjoin('jobs_personinfo', 'jobs_personinfo.uid', '=', 'jobs_users.uid')
//                ->rightjoin('jobs_newsreview','jobs_newsreview.uid','=','jobs_users.uid')
//                ->where('nid', '=', $nid)
//                ->where('is_valid', '=', 1)
//                ->orderBy('jobs_newsreview.created_at', 'desc')
//                ->paginate(10);//默认显示10条评论
        }

//        return $data;
        return view('news/detail', ['data' => $data]);
    }

    public function requestNewsContent(Request $request) {
        $data = array();
        if ($request->has('nid')) {
            $nid = $request->input('nid');
            $data['news'] = News::find($nid);
        } else {
            $data['news'] = null;
        }

        return $data;
    }

    //资讯中心页面、返回最新及最热门新闻,输入
    //返回值：data[]
    public function SearchNews(Request $request, $pagnum = 9) {
        $data = array();
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();
        $data['type'] = AuthController::getType();

        if($request->has('newtype')){
            $type = $request->input('newtype');
        }else{
            $type = 1;//默认搜索综合电竞新闻
        }
        $data['newtype'] = $type;
//        $data['newest'] = NewsController::searchNewest($pagnum,$type);//最新新闻
        $data['hottest'] = NewsController::searchHottest($type);//最热新闻

        //返回网站动态及其评论
        $data['dynamic'] = DB::table('bylh_forum')
            ->leftjoin('bylh_userinfo','bylh_userinfo.uid','bylh_forum.uid')
            ->leftjoin('bylh_users','bylh_users.uid','bylh_forum.uid')
            ->select('bylh_forum.uid','photo','username','bylh_forum.id','content','picture','start_count','bylh_forum.created_at')
            ->where('bylh_forum.status',0)
            ->orderby('created_at','desc')
            ->paginate(10);

        foreach ($data['dynamic'] as $dynamic){
            $data['views'][$dynamic->id] = DB::table('bylh_forumviews')
                ->leftjoin('bylh_userinfo','bylh_userinfo.uid','bylh_forumviews.uid')
                ->leftjoin('bylh_users','bylh_users.uid','bylh_forumviews.uid')
                ->where('forum_id',$dynamic->id)
                ->where('is_start','-1')
                ->select('bylh_forumviews.id','bylh_forumviews.uid','photo','username','content','bylh_forumviews.created_at')
                ->get();
        }

//        return $data;
        return view('news.index', ['data' => $data]);
    }

    public function searchNewest($num,$type) {
        $data = array();
        $data = News::where('type',$type)
            ->orderBy('created_at', 'desc')
            ->paginate($num);
        return $data;
    }

    public function searchHottest($type) {
        //取6条最热新闻
        $data = array();
        $data = News::orderBy('view_count', 'desc')
            ->take(6)
            ->get();
        return $data;
    }

    public function addReview(Request $request) {
        $data = array();
        $data['status'] = 400;
        $data['msg'] = "未登录用户不能进行评论操作";

        $uid = AuthController::getUid();

        if ($uid == 0)
            return $data;

        if (!$request->has('nid') || !$request->has('content')) {
            $data['msg'] = "参数错误";
            return $data;
        }

        $input = $request->all();
        $num = Review::where('uid',$uid)->where('nid',(int)$input['nid'])->get();
        if($num->count() >3){
            $data['status'] = 400;
            $data["msg"] = "你对该新闻的评论次数已达上限";
            return $data;
        }
        $addReview = new Review();
        $addReview->uid = $uid;
        $addReview->nid = (int)$input['nid'];
        $addReview->content = $input['content'];

        if ($addReview->save()) {
            $data['status'] = 200;
            $data["msg"] = "评论成功";
        } else {
            $data['msg'] = "评论失败";
        }

        return $data;
    }
    public function noticeindex(){
        $data['uid'] = AuthController::getUid();
        $data['username'] = InfoController::getUsername();

        $data['notices'] =Notices::orderBy('created_at','desc')
            ->paginate(10);

        return view('news/noties',['data'=>$data]);
    }
    public function sendDynamicview(){
        $data['uid'] = AuthController::getUid();
        if($data['uid'] == 0){
            return redirect('/account/login');
        }
        //每天最多发三条动态
        $count = Forum::where('uid',$data['uid'])
            ->where('status','0')
            ->where('created_at','>=',strtotime("-1day"))
            ->count();
        if($count >=3){
            return redirect()->back();
        }
        //查看当天是否有未发布成功的状态，如果有，则返回该状态的id
        $is_exist = Forum::where('uid',$data['uid'])
            ->where('status','1')
            ->where('created_at','>=',strtotime("-1day"))
            ->orderBy('created_at','desc')
            ->first();
        if($is_exist){
            $data['forum_id'] = $is_exist->id;
        }else{
            $forum = new Forum();
            $forum->uid = $data['uid'];
            $forum->save();
            $data['forum_id'] = $forum->id;
        }

        return view('news/sendDynamic',['data'=>$data]);
    }
    public function uploadimage(Request $request){
        $data = array();
        $uid= AuthController::getUid();
        if($uid = 0){
            $data['status'] = 400;
            $data['msg'] = "未登录用户";
        }
        if ($request->hasFile('file')) {
            $forum_id = $request->input('forumid');
            $forum = Forum::find($forum_id);
            //验证输入的图片格式,验证图片尺寸比例为一比一
            $picture = $request->file('file');
            if ($picture->isValid()) {//判断文件是否上传成功
                $ext = $picture->getClientOriginalExtension();
                //临时觉得路径
                $realPath = $picture->getRealPath();

                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . 'forum' . '.' . $ext;

                $bool = Storage::disk('forum')->put($filename, file_get_contents($realPath));
                if ($bool) {
                    $forum->picture = $forum->picture . "@" . asset('storage/forum/' . $filename);
                }
            }
            if($forum->save()){
                $data['status'] = 200;
                $data['msg'] = "上传成功";
            }
        }
        return $data;
    }
    public function sendDynamic(Request $request){
        $data = array();
        $uid= AuthController::getUid();

        $data['status'] = 400;
        $data['msg'] = "未知错误";
        if($uid = 0){
            $data['status'] = 400;
            $data['msg'] = "未登录用户";
        }
        //每天最多发三条动态
        $count = Forum::where('uid',$uid)
            ->where('status','0')
            ->where('created_at','>=',strtotime("-1day"))
            ->count();
        if($count >=3){
            $data['status'] = 400;
            $data['msg'] = "每天最多发三条动态";
            return $data;
        }
        if($request->has('content') && $request->has('forum_id')){
            $content = $request->input('content');
            $forum_id = $request->input('forum_id');

            //上传文字
            $forum = Forum::find($forum_id);
            $forum->content = $content;
            $forum->status = 0;
            if($forum->save()){
                $data['status'] = 200;
                $data['msg'] = "发布成功";
            }
        }
        return $data;
    }
    //点赞功能
    function praise(Request $request){
        $data = array();
        $uid= AuthController::getUid();
        if($uid == 0){
            $data['status'] = 400;//取消点赞
            $data['msg'] = "请先登录后操作";
            return $data;
        }
        if($request->has('forum_id')){
            $forum_id = $request->input('forum_id');
            //查看用户之前是否对该评论点赞，点赞状态是什么？
            $is_star = Forumviews::where('forum_id',$forum_id)
                ->where('uid',$uid)
                ->first();
            if($is_star){
                if($is_star->is_start == 1){
                    $updated_forumview = Forumviews::find($is_star->id);
                    $updated_forumview->is_start =0;
                    $updated_forumview->save();

                    $updated_forum = Forum::find($forum_id);
                    $updated_forum->start_count = $updated_forum->start_count-1;
                    $updated_forum->save();

                    $data['status'] = 201;//取消点赞
                    $data['praise'] = $updated_forum->start_count;
                    return $data;
                }else{
                    $updated_forumview = Forumviews::find($is_star->id);
                    $updated_forumview->is_start =1;
                    $updated_forumview->save();

                    $updated_forum = Forum::find($forum_id);
                    $updated_forum->start_count = $updated_forum->start_count+1;
                    $updated_forum->save();

                    $data['praise'] = $updated_forum->start_count;
                }
            }else{
                $updated_forumview = new Forumviews();
                $updated_forumview->is_start =1;
                $updated_forumview->uid = $uid;
                $updated_forumview->forum_id = $forum_id;
                $updated_forumview->save();

                $updated_forum = Forum::find($forum_id);
                $updated_forum->start_count = $updated_forum->start_count+1;
                $updated_forum->save();

                $data['praise'] = $updated_forum->start_count;
            }
            $data['status'] = 200;//新增点赞
        }
        return $data;
    }

    //评论功能
    public function addviews(Request $request){
        $data = array();
        $uid= AuthController::getUid();
        $data['status'] = 400;
        if($uid == 0){
            $data['msg'] = "登录后才能进行评论";
            return $data;
        }
        if($request->has('content') && $request->has('forum_id')){
            $content = $request->input('content');
            $forum_id = $request->input('forum_id');

            $forum_view = new Forumviews();
            $forum_view->uid = $uid;
            $forum_view->content = $content;
            $forum_view->forum_id = $forum_id;
            if($forum_view->save()){
                $data['status'] = 200;
                $data['msg'] = "评论成功";
                return $data;
            }
        }
        return $data;
    }

    //删除评论功能
    public function deleteview(Request $request){
        $data = array();
        $uid= AuthController::getUid();
        $data['status'] = 400;
        if($uid == 0){
            $data['msg'] = "登录后才能进行评论";
            return $data;
        }
        if($request->has('view_id')){
            $view_id = $request->input('view_id');
            $forum_view = Forumviews::find($view_id);
            if($forum_view->uid != $uid ){
                $data['msg'] = "您无权进行此操作";
                return $data;
            }
            $bool = $forum_view->delete();
            if($bool){
                $data['status'] = 200;
                $data['msg'] = "删除成功";
                return $data;
            }else{
                $data['msg'] = "删除失败";
                return $data;
            }
        }
        return $data;
    }
    //删除动态功能
    public function deleteForum(Request $request){
        $data = array();
        $uid= AuthController::getUid();
        $data['status'] = 400;
        if($uid == 0){
            $data['msg'] = "登录后才能进行评论";
            return $data;
        }
        if($request->has('forum_id')){
            $forum_id = $request->input('forum_id');
            $forum = Forum::find($forum_id);
            if($forum->uid != $uid ){
                $data['msg'] = "您无权进行此操作";
                return $data;
            }
            //先删除对应评论
            $delete_view = Forumviews::where('forum_id',$forum_id)->delete();
            $bool = $forum->delete();
            if($bool){
                $data['status'] = 200;
                $data['msg'] = "删除成功";
                return $data;
            }else{
                $data['msg'] = "删除失败";
                return $data;
            }
        }
        return $data;
    }
}
