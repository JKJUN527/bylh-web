@extends('demo.admin2')
@section('title','服务商主页')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{asset('bootstrap-4.0.0-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>--}}
    <style type="text/css">
        .card {
            width: 31%;
            padding: 10px;
            border: 1px solid #ccc;
            margin: 5px;
            height: 150px;
        }
        .card img {
            width: 80px;
            height: 80px;
            float:left;
            margin-bottom:15px;
        }

        .card-deck {
            padding: 10px;
        }
        .card-text{
            padding: 5px;
            margin-left: 10px;
        }

        .card-block {
            padding: 5px;
            width: 120px;
            overflow: hidden;
        }
        .card-title{
            margin-left: 10px;
            padding: 5px;
            font-weight: bold;
        }
        .card-city{
            margin-top: -10px;
            float: right;
            color: #999;
        }
        .floor-title {
            color: #003366;
            margin-bottom:-10px;
            font-size: 1.3rem;
        }
        .more2more {
            margin-top: -8px;
        }

        .comcategory li {
            font-size: 14px;
            padding: 3px;
            line-height: 1.5;
        }

        .comcategory li a:hover {
            color: #b84554;
        }

        .comcategory li i {
            color: gray;
            margin-left: 10px;
        }

        /*.category-info{*/
        /*border-left:4px solid #d2364c;*/
        /*}*/
        .title-first a {
            text-align: center;
            padding: 60px;
            font-size: 18px;
            color: #000;
            font-weight: bold;
        }

        .title-first a:hover {
            color: #b84554;
            font-weight: bold;
        }
        .card-deck-wrapper{
            width:750px;
        }

        .demo li {
            float: none;
            width: 100%;
            padding: 0px 5px;
            border: none;
            height: 30px;
            line-height: 30px;
        }

        .am-nav-tabs > li.am-active > a, .am-nav-tabs > li.am-active > a:hover, .am-nav-tabs > li.am-active > a:focus, .am-nav-tabs > li > a:hover {
            background: #ee6363;
            color: #fff;
        }
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
        .am-g-fixed{
            min-width: 1100px;
        }

        .service-content {
            text-align: center;
        }
        .service_title h2{
            padding-right:20px;
            padding-top: 20px;
            line-height: 25px;
            overflow: hidden;
            font-size: 20px;
            font-family: microsoft yahei;
            color: #575757;
            font-weight: 700;
            padding-bottom: 5px;
            text-align: center;
        }
        .am-comments-list .am-comment {
            margin: 0;
        }
        .service_info{
            color: #666;
            width: 230px;
            line-height: 30px;
            /*padding-left: 20px;*/
            font-size: 14px;
            padding-top: 0;
            text-align: center;
        }
        .lx-btn{
            line-height: 30px;
            height: 40px;
            padding-bottom: 20px;
            text-align: center;
            margin-top: 1rem;
        }

        .fr {
            text-align: center;
        }
        .today-brands{
            float: right;
        }
        .shopmain{
            padding:20px;
        }
        .shopTitle{
            width:110%;
            font-weight:bold;
            font-size: 20px;
        }
        .am-container{
            padding:20px;
        }
        .line{
            top:175px !important;
        }
    </style>
@endsection
@section('content')
    <!--发布服务-->
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" style="border: 2px solid #eee;padding: 20px;background: #fff;">
            <div class="am-u-lg-9 am-u-md-9 am-u-sm-9">
                <!--服务-->
                @if($data['genlservices'][0])
                <div class="shopMain" id="shopmain">
                    <div class="am-container ">
                        <div class="shopTitle">
                            <h4 class="floor-title">发布专业服务</h4>
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                @foreach($data['genlservices'] as $genlservice)
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="/service/detail?id={{$genlservice->id}}&type=0">
                                        @if($genlservice->picture != null)
                                            <?php
                                            $pics = explode(';', $genlservice->picture);
                                            $baseurl = explode('@', $pics[0])[0];
                                            $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                            $imagepath = explode('@', $pics[0])[1];
                                            ?>
                                            <img class="card-img-top"
                                                     src=" {{$baseurl}}{{$imagepath}}"/>
                                        @else
                                            <img class="card-img-top"
                                                 src="{{asset('images/f2.jpg')}}"/>
                                        @endif
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">{{mb_substr($genlservice->title,0,10,'utf-8')}}...</h4>
                                            <p class="card-text">
                                                <small class="text-muted">{{mb_substr($genlservice->describe,0,10,'utf-8')}}</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">{{$genlservice->name}}</small>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="am-u-lg-9 am-u-md-9 am-u-sm-9">
                            <nav>
                                {!! $data['genlservices']->appends(["uid"=>$data['condition']['uid']])->render() !!}
                            </nav>
                        </div>
                    </div>
                </div>
                @endif
                @if($data['finlservices'][0])
                <!--实习中介-->
                <div class="shopMain" id="shopmain">
                    <div class="am-container ">
                        <div class="shopTitle">
                            <h4 class="floor-title">发布的实习中介服务</h4>
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                @foreach($data['finlservices'] as $finlservice)
                                    <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                        <a href="/service/detail?id={{$finlservice->id}}&type=0">
                                            @if($finlservice->picture != null)
                                                <?php
                                                $pics = explode(';', $finlservice->picture);
                                                $baseurl = explode('@', $pics[0])[0];
                                                $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                $imagepath = explode('@', $pics[0])[1];
                                                ?>
                                                <img class="card-img-top"
                                                     src=" {{$baseurl}}{{$imagepath}}"/>
                                            @else
                                                <img class="card-img-top"
                                                     src="{{asset('images/f2.jpg')}}"/>
                                            @endif
                                            <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                                <h4 class="card-title">{{mb_substr($finlservice->title,0,10,'utf-8')}}...</h4>
                                                <p class="card-text">
                                                    <small class="text-muted">{{mb_substr($finlservice->describe,0,10,'utf-8')}}</small>
                                                </p>
                                            </div>
                                            <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                            <div class="card-city">
                                                <small class="text-muted">{{$finlservice->name}}</small>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="am-u-lg-9 am-u-md-9 am-u-sm-9">
                            <nav>
                                {!! $data['finlservices']->appends(["uid"=>$data['condition']['uid']])->render() !!}
                            </nav>
                        </div>
                    </div>
                </div>
                @endif
                @if($data['qaservices'][0])
                <!--专业问答-->
                <div class="shopMain" id="shopmain">
                    <div class="am-container">
                        <div class="shopTitle ">
                            <h4 class="floor-title">发布的专业问答服务</h4>
                            {{--<div class="today-brands">--}}
                                {{--<button class="am-btn am-btn-danger am-round more2more">查看更多</button>--}}
                            {{--</div>--}}
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                @foreach($data['qaservices'] as $qaservice)
                                    <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                        <a href="/service/detail?id={{$qaservice->id}}&type=0">
                                            @if($qaservice->picture != null)
                                                <?php
                                                $pics = explode(';', $qaservice->picture);
                                                $baseurl = explode('@', $pics[0])[0];
                                                $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                $imagepath = explode('@', $pics[0])[1];
                                                ?>
                                                <img class="card-img-top"
                                                     src=" {{$baseurl}}{{$imagepath}}"/>
                                            @else
                                                <img class="card-img-top"
                                                     src="{{asset('images/f2.jpg')}}"/>
                                            @endif
                                            <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                                <h4 class="card-title">{{mb_substr($qaservice->title,0,10,'utf-8')}}...</h4>
                                                <p class="card-text">
                                                    <small class="text-muted">{{mb_substr($qaservice->describe,0,10,'utf-8')}}</small>
                                                </p>
                                            </div>
                                            <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                            <div class="card-city">
                                                <small class="text-muted">{{$qaservice->name}}</small>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="am-u-lg-9 am-u-md-9 am-u-sm-9">
                            <nav>
                                {!! $data['qaservices']->appends(["uid"=>$data['condition']['uid']])->render() !!}
                            </nav>
                        </div>
                    </div>
                </div>
                    @endif

            </div>
            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3">
                <div class="container1"
                     style="margin-right: -5px;border: 2px solid #eee;padding: 20px;background: #fff;">
                    <div class=" fr main-c">
                        <a class="fws-hd" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank">
                            <img src="{{$data['serviceinfo']['elogo']}}" width="180" height="180"></a>
                        <a class="fws-name" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank" style="padding:20px;font-size: 18px;">
                            {{$data['serviceinfo']['ename']}}
                        </a>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                        <div class="service-content">
                            <div class="service_info">
                                <div class="fl" style="float: left;">所在地：</div>
                                <div class="locus"
                                     style="background: url({{asset('images/shop_680.png')}}) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                                <div style="float:left;overflow:hidden;height:30px;">{{$data['serviceinfo']['city']}}</div>
                                <div class="clear"></div>
                            </div>
                            @if($data['serviceinfo']['current_edu'] !="")
                                <div class="service_info">
                                    <div class="fl" style="float: left;">就读院校：</div>
                                    <div style="float:left;overflow:hidden;height:30px;">{{explode('@',$data['serviceinfo']['current_edu'])[0]}}
                                        |
                                        @if(explode('@',$data['serviceinfo']['current_edu'])[1] == 0)
                                            博士及已上
                                        @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 1)
                                            硕士
                                        @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 2)
                                            学士
                                        @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 1)
                                            高中及以下
                                        @endif
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            @endif
                            <div class="service_info">
                                <div class="fl" style="float: left;">毕业院校：</div>
                                <div style="float:left;overflow:hidden;height:30px;">{{explode('@',$data['serviceinfo']['graduate_edu'])[0]}}
                                    |
                                    @if(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 0)
                                        博士及已上
                                    @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 1)
                                        硕士
                                    @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 2)
                                        学士
                                    @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 1)
                                        高中及以下
                                    @endif
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="service_info">
                                <div class="fl" style="float: left;margin-bottom: 1rem">
                                        <span class="am-badge am-badge-warning">
                                        @if($data['serviceinfo']['is_offline'] ==0)
                                                仅支持线下交易
                                            @elseif($data['serviceinfo']['is_offline'] ==1)
                                                仅支持线上交易
                                            @else
                                                支持线上或线下交易
                                            @endif
                                        </span>
                                </div>
                                <div style="float:left;overflow:hidden;height:30px;">
                                        <span class="am-badge am-badge-warning">
                                        @if($data['serviceinfo']['has_video'] ==0)
                                                不提供视频教程
                                            @else
                                                提供视频教程
                                            @endif
                                        </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="lx-btn">
                                <button type="button" class="am-btn am-btn-danger am-btn-lg" onclick="leaveMsg()"
                                        style="width: 80%;">和我联系
                                </button>
                                <div class="clear"></div>
                            </div>
                            <div class="am-modal am-modal-alert" tabindex="-1" id="my-content"
                                 style="margin-top: -200px;">
                                <div class="am-modal-dialog">
                                    <div class="am-modal-hd">和我联系</div>
                                    <a href="#">
                                        <div class="serviceMsg">
                                            <img src="{{$data['serviceinfo']['elogo']}}"
                                                 style="width:150px;height:150px;">
                                            <p id="userinfo" data-content="{{$data['serviceinfo']['uid']}}">服务商名称：<span>{{$data['serviceinfo']['ename']}}</span></p>
                                        </div>
                                    </a>
                                    <div class="am-modal-bd">
                                        <label for="doc-ta-1"></label><br>
                                        {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                                        <textarea id="leave_mesg" placeholder="请写上你想说的话" class="am-form-field am-radius"
                                                  style="height:150px;"></textarea>
                                    </div>
                                    <div class="am-modal-footer">
                                        <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                                        <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="clear"></div>--}}
                        {{--<div class="shop_zpjmsg">好评率：<span>100%</span>&nbsp;&nbsp;|&nbsp;&nbsp;总评：<span>5</span>分--}}
                        {{--</div>--}}
                        {{--<div class="clear"></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--广告-->
    <div class="advertisement" style="padding: 10px;width: 100%;float: left;">
        <img src="{{asset('images/ad2.jpg')}}">
    </div>
@endsection
@section('custom-script')
    <script src="{{asset("dist/amazeui.min.js")}}"></script>
    <script src="{{asset("js/amazeui.dialog.min.js")}}"></script>
    <script type="text/javascript">
        function leaveMsg() {
            $('#my-content').modal({
                onConfirm: function () {
                    var leave_mesg = $('#leave_mesg');
                    var to_id = $('#userinfo').attr('data-content');
                    if(leave_mesg.val().length >=250){
                        swal("","字数不能超过250字","error");
                        return;
                    }
                    var formData = new FormData();
                    formData.append("content", leave_mesg.val());
                    formData.append("to_id", to_id);
                    $.ajax({
                        url: "/message/sendMessage",
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
                                swal("","留言成功","success");
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }else{
                                swal('',result.msg,'error');
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
