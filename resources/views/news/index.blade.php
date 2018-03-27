@extends('demo.admin',['title'=>6])
@section('title','网站动态')
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
            cursor:pointer;
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
        .box:hover .complaint_dynamic {
            display: block;
        }
        .complaint_dynamic{
            cursor:pointer;
            display: none;
            top: 0px;
            right: 32px;
            width: 48px;
            height: 28px;
            border: 1px solid #eee;
            position: absolute;
            background: #f2f4f7;
            line-height: 27px;
            text-align: center;
        }
        .complaint_dynamic:hover {
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
            cursor:pointer;
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
            /*height: 20px;*/
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
            cursor:pointer;
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
        .am-dimmer.am-active {
            opacity: 0 !important;
        }
        .am-model{
            width:30% !important;
            left: auto !important;
            /*margin-left:*/
            top:auto !important;
        }
        .complaint h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .complaint form{
            margin-top: 1rem;
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
            <hr data-am-widget="divider" class="am-divider am-divider-danger" style="border-top: 2px solid #d2364c;" />
            <div class="am-g am-g-fixed allNews">
                <div id="list">
                    @foreach($data['dynamic'] as $dynamic)
                    <div class="box clearfix">
                        <a class="complaint_dynamic" data-content="{{$dynamic->id}}" onclick="openComplaint()">投诉</a>
                        @if($dynamic->uid == $data['uid'] || $data['type'] == 0)
                            <a class="close delete_dynamic" data-content="{{$dynamic->id}}">×</a>
                        @endif
                        <img class="head" src="{{$dynamic->photo or asset('images/mansmall.jpg')}}"/>
                        <div class="content">
                            <div class="main">
                                <p class="txt">
                                    <span class="user">{{$dynamic->username}}：</span>
                                    {!! $dynamic->content !!}
                                </p>
                                <div class="am-g am-g-fixed">
                                    <?php
                                        $pictures = explode("@",$dynamic->picture);
                                        array_shift($pictures);
                                        $i = 0;
                                    ?>
                                    @if(count($pictures) >0)
                                        <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" style="margin-left:20px;">
                                            @foreach($pictures as $picture)
                                                <img class="pic am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end"
                                                 src="{{$picture or asset('images/f9.png')}}" style="padding:5px;width: 157px;height: 157px;"/>
                                                <?php $i++;?>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="info clearfix">
                                <span class="time">发布时间：{{$dynamic->created_at}}</span>
                                <a class="praise" data-content="{{$dynamic->id}}">赞</a>
                            </div>
                            <div class="praises-total" style="display: block;"><span>{{$dynamic->start_count}}</span>个人觉得很赞</div>
                            <div class="comment-list">
                                @foreach($data['views'][$dynamic->id] as $view)
                                    <div class="comment-box clearfix">
                                        <img class="myhead" src="{{$view->photo or asset('images/mansmall.jpg')}}"/>
                                        <div class="comment-content">
                                            <p class="comment-text">
                                                <span class="user">{{$view->username}}：</span>{{$view->content}}
                                            </p>
                                            <p class="comment-time">
                                                {{$view->created_at}}
                                                @if($view->uid == $data['uid'] || $data['type'] == 0)
                                                    <a class="comment-operate delete_view" data-content="{{$view->id}}">删除</a>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-box">
                                <textarea class="comment" autocomplete="off">评论…</textarea>
                                <button class="btn add_view" data-content="{{$dynamic->id}}">回 复</button>
                                <span class="word"><span class="length">0</span>/140</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        <div class="am-modal am-modal-alert" tabindex="-1" id="my-content"
                             style="margin-top: -200px;">
                            <div class="am-modal-dialog">
                                <div class="am-form-group complaint">
                                    <h3>请选择投诉类别</h3>
                                    <input type="radio" name="complaint" value="-1" style="display: none" checked>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="0" data-am-ucheck>垃圾营销
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="1" data-am-ucheck>不实信息
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="2" data-am-ucheck>有害信息
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="3" data-am-ucheck>违法信息
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="4" data-am-ucheck>污秽色情
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="5" data-am-ucheck>人事攻击
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="6" data-am-ucheck>内容抄袭
                                    </label>

                                    <form action="" class="am-form">
                                        <fieldset>
                                            <h3>投诉详情描述</h3>
                                            <div class="am-form-group">
                                                <textarea minlength="10" id="complaint_detail"></textarea>
                                            </div>
                                        </fieldset>
                                    </form>
                                    {{--<button class="am-btn am-btn-secondary" type="submit" id="upload">提交</button>--}}
                                </div>
                                <div class="am-modal-footer">
                                    <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                                    <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!--分页-->
            {{--<div class="pager_container" style="margin-left: 50px;">--}}
            <nav>
            {!! $data['dynamic']->render() !!}
            </nav>
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
<div class="advertisement" style="padding: 10px 0 10px 0;">
    <img src="{{asset('images/ad2.jpg')}}" style="width: 100%;">
</div>
{{--<div class="advertisement" style="padding: 10px;width: 50%;float: left;">--}}
    {{--<img src="{{asset('images/ad4.jpg')}}" alt="">--}}
{{--</div>--}}
{{--<div class="advertisement" style="padding: 10px;width: 50%;float: right;">--}}
    {{--<img src="{{asset('images/ad5.jpg')}}" alt="">--}}
{{--</div>--}}
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
            window.location.href="/news/sendDynamic";
        }
        //点赞、取消点赞
        $('.praise').click(function () {
            var praise = $(this);
            var num = $(this).parent().next().children('span');

            var formdata = new FormData();
            formdata.append('forum_id',$(this).attr('data-content'));
            $.ajax({
                url: "/news/praise",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status != 400) {
                        if(result.status === 200){
                            praise.text("取消赞");
                        }else{
                            praise.text("赞");
                        }
                        num.text(result.praise);
                    }else{
                        swal("",result.msg,"error");
                        return;
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            })
        });
        //评论功能
        $(".add_view").click(function () {
//            alert($(this).attr('data-content'));
            if($(this).hasClass('btn-off'))
                return;
            var content = $(this).prev().val();

            var formdata = new FormData();
            formdata.append('forum_id',$(this).attr('data-content'));
            formdata.append('content',content);
            $.ajax({
                url: "/news/addviews",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        self.location = '/news';
                    }else{
                        swal("",result.msg,"error");
                        return;
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            })
        });
        //删除评论
        $(".delete_view").click(function () {
            var view_id = $(this).attr('data-content');
            var formdata = new FormData();
            formdata.append('view_id',view_id);
            $.ajax({
                url: "/news/deleteview",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        self.location = '/news';
                    }else{
                        swal("",result.msg,"error");
                        return;
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            })
        });
        //删除动态
        $(".delete_dynamic").click(function () {
            var forum_id = $(this).attr('data-content');
            var formdata = new FormData();
            formdata.append('forum_id',forum_id);
            $.ajax({
                url: "/news/deleteForum",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        self.location = '/news';
                    }else{
                        swal("",result.msg,"error");
                        return;
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            })
        });
        function openComplaint() {
            $('#my-content').modal({
                onConfirm: function () {
                    var type = $('input:radio[name="complaint"]:checked').val();
                    var detail = $('#complaint_detail').val();
                    var url = window.location.href;
                    var real_place = "@网站动态：";

                    if(type == -1){
                        swal('','请选择投诉类别','error');
                        return;
                    }
                    if(detail.length <=5){
                        swal('','投诉详情至少输入5个字','error');
                        return;
                    }

                    var formData = new FormData();
                    formData.append("type", type);
                    formData.append("detail", detail);
                    formData.append("url", url);
                    formData.append("real_place", real_place);
                    $.ajax({
                        url: "/complaint",
                        type: "post",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            //console.log(data);
                            var result = JSON.parse(data);
                            if (result.status == 200) {
                                swal("", result.msg, "success");
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                swal('', result.msg, 'error');
                            }
                        }
                    });
                }
            });
        }

    </script>
    <script type="text/javascript" src="{{asset('js/demo.js')}}"></script>
@endsection
