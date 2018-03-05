@extends('demo.admin',['title'=>6])
@section('title','新闻动态')
@section('custom-style')
    <style type="text/css">
        .comcategory li{
            font-size:14px;
            padding: 3px;
        }
        .comcategory li a:hover{
            color: #b84554;
        }
        .comcategory li i{
            color: gray;
            margin-left: 10px;
        }
        .title-first a{
            text-align: center;
            padding: 60px;
            font-size: 18px;
            color: #000;
            font-weight: bold;
        }
        .title-first a:hover{
            color: #b84554;
            font-weight: bold;
        }
        .demo li{
            float: none;
            width: 100%;
            padding: 0px 5px;
            border: none;
            height: 30px;
            line-height: 30px;
        }
        .newsHead{
            text-align: left;
            padding-left: 10px;
            font-size: 18px;
            font-weight: bold;
            border-left: 8px solid #f03726;
        }
        .hotNews{
            padding-left: 10px;
            font-size: 18px;
            font-weight: bold;
            border-left: 8px solid #f03726;
        }
        .newsImage{
            width: 160px;
            height: 160px;
        }
        .newsImage2{
            width: 100px;
            height: 100px;
        }
        .newsCtnt{
            font-size: 16px;
            height: 65px;
            text-align: left;
            overflow: hidden;
        }
        .newsCtnt2{
            font-size: 15px;
            height: 40px;
            text-align: left;
            overflow: hidden;
        }
        .newsTitle{
            font-size: 18px;
            font-weight: bold;
            text-align: left;
            padding: 10px;
        }
        .newsTitle2{
            font-size: 16px;
            font-weight: bold;
            text-align: left;
            padding: 5px;
        }
        .newsTail{
            text-align: right;
            color: #999;
            margin-top: 30px;
        }

        body {
            font-size: 12px;
            line-height: 120%;
            text-align: center;
            color: #333;
            padding: 20px;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        * {
            margin: 0;
            padding: 0;
            border: none;
        }

        .clearfix:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden
        }

        .clearfix {
            *height: 1%;
        }

        #list {
            margin: 0 auto;
            text-align: left;
        }

        .box {
            border-top: 1px solid #eee;
            position: relative;
            padding: 20px 0
        }

        .box:hover .close {
            display: block;
        }

        .close {
            display: none;
            top: 0px;
            right: 0px;
            width: 28px;
            height: 28px;
            border: 1px solid #eee;
            position: absolute;
            background: #f2f4f7;
            line-height: 27px;
            text-align: center;
        }

        .close:hover {
            background: #c8d2e2;
            text-decoration: none;
        }

        .head {
            margin-left: 2px;
            border: 1px solid #eee;
            float: left;
            width: 60px;
            height: 60px;
            margin-right: 10px;
        }

        .content {
            float: left;
            width: 80%;
        }

        .main {
            margin-bottom: 10px;
            margin-left: 20px;
        }

        .txt {
            margin-bottom: 10px;
        }

        .user {
            color: #369;
            font-weight: bold;
        }

        .pic {
            border: 1px solid #eee;
        }

        .info {
            height: 20px;
            line-height: 19px;
            font-size: 12px;
            margin: 0 0 10px 0;
        }

        .info .time {
            margin-left: 20px;
            color: #999;
            float: left;
            height: 20px;
            padding-left: 20px;
            background: url("{{asset('images/bg1.jpg')}}") no-repeat left top;
        }

        .info .praise {
            color: #369;
            float: right;
            height: 20px;
            padding-left: 18px;
            background: url("{{asset('images/bg2.jpg')}}") no-repeat left top;
        }

        .info .praise:hover {
            text-decoration: underline;
            background: url("{{asset('images/bg3.jpg')}}") no-repeat left top;
        }

        .praises-total {
            margin: 0 0 10px 0;
            height: 20px;
            background: url("{{asset('images/praise.png')}}") no-repeat 5px 5px rgb(247, 247, 247);
            padding: 5px 0 5px 25px;
            line-height: 19px;
        }

        .comment-box {
            padding: 10px 0;
            border-top: 1px solid #eee;
        }

        .comment-box:hover {
            background: rgb(247, 247, 247);
        }

        .comment-box .myhead {
            float: left;
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .comment-box .comment-content {
            float: left;
            width: 400px;
        }

        .comment-box .comment-content .comment-time {
            color: #999;
            margin-top: 3px;
            line-height: 16px;
            position: relative;
        }

        .comment-box .comment-content .comment-praise {
            display: none;
            color: #369;
            padding-left: 17px;
            height: 20px;
            background: url("images/praise.png") no-repeat;
            position: absolute;
            bottom: 0px;
            right: 44px;
        }

        .comment-box .comment-content .comment-operate {
            display: none;
            color: #369;
            height: 20px;
            position: absolute;
            bottom: 0px;
            right: 10px;
        }

        .comment-box .comment-content:hover .comment-praise {
            display: inline-block;
        }

        .comment-box .comment-content:hover .comment-operate {
            display: inline-block;
        }

        .text-box .comment {
            border: 1px solid #eee;
            display: block;
            width: 428px;
            padding: 5px;
            resize: none;
            color: #ccc
        }

        .text-box .btn {
            font-size: 12px;
            font-weight: bold;
            display: none;
            float: right;
            width: 65px;
            height: 25px;
            border: 1px solid #0C528D;
            color: #fff;
            background: #4679AC;
        }

        .text-box .btn-off {
            border: 1px solid #999;
            color: #999;
            background: #F7F7F7;
        }

        .text-box .word {
            display: none;
            float: right;
            margin: 7px 10px 0 0;
            color: #666;
        }

        .text-box-on .comment {
            height: 50px;
            color: #333;
        }

        .text-box-on .btn {
            display: inline;
        }

        .text-box-on .word {
            display: inline;
        }
    </style>
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .long-title {
            display: none;
        }
    </style>
@endsection
@section('content')
<!--新闻界面-->
<div class="am-g am-g-fixed" style="padding-top: 15px;">
    <div class="am-u-lg-8 am-u-md-8 am-u-sm-8">
        <div class="am-container" style="border-bottom: 2px solid #eee;padding: 20px;background: #fff;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="newsHead">
                最新动态
            </div>
            <div class="sendDynamic">
                <button class="am-btn am-btn-warning" onclick="leaveMsg()" style="float: right;margin-top: -20px;">
                    发布动态
                </button>
            </div>
            <div class="am-modal am-modal-alert" tabindex="-1" id="my-content"
                 style="margin-top: -200px;">
                <div class="am-modal-dialog">
                    <div class="am-modal-hd">和我联系</div>
                    <a href="#">
                        <div class="serviceMsg">
                            <img src="{{asset('images/head1.gif')}}"
                                 style="width:150px;height:150px;">
                            <p>雇主信息：<span>liyuxiao88</span></p>
                        </div>
                    </a>
                    <div class="am-modal-bd">
                        <label for="doc-ta-1"></label><br>
                        {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                        <textarea placeholder="请写上你想说的话" class="am-form-field am-radius"
                                  style="height:150px;"></textarea>
                    </div>
                    <div class="am-modal-footer">
                        <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                        <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                    </div>
                </div>
            </div>
            <hr data-am-widget="divider" class="am-divider am-divider-danger" style="border-top: 2px solid #d2364c;" />
            <div class="am-g am-g-fixed allNews">
                <div id="list">
                    <div class="box clearfix">
                        <a class="close" href="javascript:;">×</a>
                        <img class="head" src="{{asset('images/f1.jpg')}}" alt=""/>
                        <div class="content">
                            <div class="main">
                                <p class="txt">
                                    <span class="user">Andy：</span>轻轻的我走了，正如我轻轻的来；我轻轻的招手，作别西天的云彩。
                                </p>
                                <div class="am-g am-g-fixed">
                                    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" style="margin-left:20px;">
                                        <img class="pic am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end"
                                             src="{{asset('images/f1.jpg')}}" style="padding:5px;" alt=""/>
                                        <img class="pic am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end"
                                             src="{{asset('images/f1.jpg')}}" style="padding:5px;" alt=""/>
                                        <img class="pic am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end"
                                             src="{{asset('images/f1.jpg')}}" style="padding:5px;" alt=""/>
                                        <img class="pic am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end"
                                             src="{{asset('images/f1.jpg')}}" style="padding:5px;" alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="info clearfix">
                                <span class="time">发布时间：2018-02-28 23:01</span>
                                <a class="praise" href="javascript:;">赞</a>
                            </div>
                            <div class="praises-total" total="4" style="display: block;">4个人觉得很赞</div>
                            <div class="comment-list">
                                <div class="comment-box clearfix" user="self">
                                    <img class="myhead" src="{{asset('images/f1.jpg')}}" alt=""/>
                                    <div class="comment-content">
                                        <p class="comment-text"><span class="user">我：</span>写的太好了。</p>
                                        <p class="comment-time">
                                            2014-02-19 14:36
                                            <a href="javascript:;" class="comment-praise" total="1" my="0"
                                               style="display: inline-block">1 赞</a>
                                            <a href="javascript:;" class="comment-operate">删除</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-box">
                                <textarea class="comment" autocomplete="off">评论…</textarea>
                                <button class="btn ">回 复</button>
                                <span class="word"><span class="length">0</span>/140</span>
                            </div>
                        </div>
                    </div>

                    <div class="box clearfix">
                        <a class="close" href="javascript:;">×</a>
                        <img class="head" src="{{asset('images/f1.jpg')}}" alt=""/>
                        <div class="content">
                            <div class="main">
                                <p class="txt">
                                    <span class="user">人在旅途：</span>三亚的海滩很漂亮。
                                </p>
                                <div class="am-g am-g-fixed">
                                    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" style="margin-left:20px;">
                                        <img class="pic am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end"
                                             src="{{asset('images/f1.jpg')}}" style="padding:5px;" alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="info clearfix">
                                <span class="time">02-14 23:01</span>
                                <a class="praise" href="javascript:;">赞</a>
                            </div>
                            <div class="praises-total" total="0" style="display: none;"></div>
                            <div class="comment-list">
                                <div class="comment-box clearfix" user="other">
                                    <img class="myhead" src="{{asset('images/f1.jpg')}}" alt=""/>
                                    <div class="comment-content">
                                        <p class="comment-text"><span class="user">老鹰：</span>我也想去三亚。</p>
                                        <p class="comment-time">
                                            2014-02-19 14:36
                                            <a href="javascript:;" class="comment-praise" total="0" my="0">赞</a>
                                            <a href="javascript:;" class="comment-operate">回复</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-box">
                                <textarea class="comment" autocomplete="off">评论…</textarea>
                                <button class="btn ">回 复</button>
                                <span class="word"><span class="length">0</span>/140</span>
                            </div>
                        </div>
                    </div>

                    <div class="box clearfix">
                        <a class="close" href="javascript:;">×</a>
                        <img class="head" src="{{asset('images/f1.jpg')}}" alt=""/>
                        <div class="content">
                            <div class="main">
                                <p class="txt">
                                    <span class="user">小Y：</span>英国艺术家 Jane Perkins
                                    能利用很多不起眼的东西进行创作，甚至是垃圾。首饰、纽扣、玩具等等都可以作为他创作的工具并创作出惟妙惟肖的画作，丝毫不逊色于色彩丰富的颜料。
                                </p>
                            </div>
                            <div class="info clearfix">
                                <span class="time">02-11 13:17</span>
                                <a class="praise" href="javascript:;">赞</a>
                            </div>
                            <div class="praises-total" total="0" style="display: none;"></div>
                            <div class="comment-list">

                            </div>
                            <div class="text-box">
                                <textarea class="comment" autocomplete="off">评论…</textarea>
                                <button class="btn ">回 复</button>
                                <span class="word"><span class="length">0</span>/140</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--分页-->
            {{--<div class="pager_container" style="margin-left: 50px;">--}}
            {{--<nav>--}}
            {{--{!! $data['newest']->appends(['newtype' => $data['newtype']])->render() !!}--}}
            {{--</nav>--}}
            {{--</div>--}}
        </div>
    </div>

    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="am-container" style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="hotNews">
                热门资讯
            </div>
            <hr data-am-widget="divider"  class="am-divider am-divider-danger" style="border-top: 2px solid #d2364c;" />
            <div class="am-g am-g-fixed allhotNews">
                <!--公告2-->
                @foreach($data['hottest'] as $news)
                    <div class="news-hot" data-content="{{$news->nid}}">
                    @if($news->picture != null)
                        <?php
                        $pics = explode(';', $news->picture);
                        $baseurl = explode('@', $pics[0])[0];
                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                        $imagepath = explode('@', $pics[0])[1];
                        ?>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                                <img src="{{$baseurl}}{{$imagepath}}" class="newsImage2">
                            </div>
                    @else
                        <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                            <img src="{{asset('images/touxiang.jpg')}}" class="newsImage2">
                        </div>
                    @endif
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle2">
                        {{mb_substr($news->title, 0, 15)}}
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt2">
                            　{{str_replace(array("<br>","<br","<b","&nbsp","&nbs","&nb"),"",mb_substr($news->content, 0, 35))}}</p>
                    </div>
                    <div class="newsTail">
                        发布时间：<span>{{mb_substr($news->created_at,0,10,'utf-8')}}</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                        </div>
               @endforeach

            </div>
        </div>
    </div>

</div>
<!--广告-->
<div class="advertisement" style="padding: 10px;width: 50%;float: left;">
    <img src="{{asset('images/ad4.jpg')}}" alt="">
</div>
<div class="advertisement" style="padding: 10px;width: 50%;float: right;">
    <img src="{{asset('images/ad5.jpg')}}" alt="">
</div>
@endsection
@section('custom-script')
    <script>
        $('.news-hot').click(function () {
            self.location = "/news/detail?nid=" + $(this).attr('data-content');
        });
        $('.news-body').click(function () {
            self.location = "/news/detail?nid=" + $(this).attr('data-content');
        });
        $('.bs-docs-sidebar ul').on('click', 'li', function(event) {
            event.preventDefault();
            $(this).addClass('am-active').siblings('li').removeClass('am-active');
            self.location = "/news?newtype=" + $(this).attr('data-content');
        });

        function leaveMsg() {
            // $('#my-content').modal({
            //     onConfirm: function () {
            //         alert("发布成功！");
            //     }
            // });
            window.open("{{asset('news/sendDynamic')}}");
        }
    </script>
    <script type="text/javascript" src="{{asset('js/demo.js')}}"></script>
@endsection
