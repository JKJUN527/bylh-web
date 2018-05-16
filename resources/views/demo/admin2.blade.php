<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">--}}
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('images/bylehu2.ico')}}" type="image/x-icon" />
    <link href="{{asset('AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/orstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/sweetalert/sweetalert.css")}}"/>
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{asset('AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>

    <style>
        /*.am-container {*/
            /*width: 980px !important;*/
            /*max-width: none;*/
        /*}*/
        .require-data{
            background: yellow;
            color: #000;
            font-style: italic;
        }
        .long-title{
            display: none !important;
        }
        .nav-cont{
            padding-left: 0px;
        }
    </style>

    @section("custom-style")
    @show
</head>
<body>
<!--头 -->
<header>
    <article>
        <div class="mt-logo">
            <!--顶部导航条 -->
            <div class="am-container header">
                {{--<ul class="message-l">--}}
                    {{--<div class="topMessage">--}}
                        {{--<div class="menu-hd">--}}
                            {{--@if($data['uid'] == 0)--}}
                                {{--<a href="{{asset('/account/login')}}" target="_top" class="h">亲，请登录</a>--}}
                                {{--<a href="{{asset('/account/register')}}" target="_top">免费注册</a>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</ul>--}}
                <ul class="message-r">
                    @if($data['uid'] ==0)
                        <div class="topMessage my-shangcheng">
                            <div class="menu-hd MyShangcheng"><a href="{{asset('/account/login')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>登录</a></div>
                        </div>
                        <div class="topMessage my-shangcheng">
                            <div class="menu-hd MyShangcheng"><a  href="{{asset('/account/register')}}" target="_top"><i class="am-icon-user-plus am-icon-fw"></i>注册</a></div>
                        </div>
                    @else
                        <div class="topMessage my-shangcheng">
                            <div class="menu-hd MyShangcheng"><a href="{{asset('/account/index')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>欢迎你:{{$data['username']}}</a></div>
                        </div>
                        <div class="topMessage my-shangcheng">
                            <div class="menu-hd MyShangcheng"><a  href="{{asset('/account/logout')}}" target="_top"><i class="am-icon-outdent am-icon-fw"></i>退出</a></div>
                        </div>
                    @endif
                </ul>
            </div>

            <!--悬浮搜索框-->

            <div class="nav white">
                {{--<div class="logo"><img src="{{asset('images/bylh2.png')}}" onclick="gobackhome();"/></div>--}}
                <div class="logoBig" style="margin-top: -15px;margin-left: -50px;">
                    <li><img src="{{asset('images/bylh2.png')}}" onclick="gobackhome();"/></li>
                </div>

                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="#"></a>
                    <form>
                        <input id="searchInput" name="keyword" type="text" placeholder="搜索" autocomplete="off" onkeydown="if(event.keyCode==13) return false;">
                        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="button">
                    </form>
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </article>
</header>
<div class="nav-table">
    <div class="long-title"><span class="all-goods">服务范围</span></div>
    <div class="nav-cont" style="
    /*background: #ff9933bd;*/">
        <ul>
            <li class="index"><a href="{{asset('index')}}">首页</a></li>
            <li class="qc"><a href="{{asset('demands/advanceSearch')}}">需求大厅</a></li>
            <li class="qc"><a href="{{asset('service/advanceSearch?type=0')}}">专业服务</a></li>
            <li class="qc"><a href="{{asset('service/advanceSearch?type=1')}}">实习中介</a></li>
            <li class="qc last"><a href="{{asset('service/advanceSearch?type=2')}}">专业问答</a></li>
            <li class="qc last"><a href="{{asset('news/index')}}">知友沙龙</a></li>
        </ul>
        {{--<div class="nav-extra">--}}
            {{--<a href="{{asset('/message')}}" style="color:#f03726;font-weight:bold;"><i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的消息--}}
                {{--<i class="am-icon-angle-right" style="padding-left: 10px;"></i></a>--}}
        {{--</div>--}}
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        @section('content')
        @show
        <div class="footer ">
            <div class="footer-hd ">
            </div>
            <div class="footer-bd ">
                <p style="text-align: center;">
                    Copyright © 2017-2018 bylehu 版权所有 蜀ICP备17027037<br>
                    客服电话：028-85593827<br>
                    联系邮箱：不亦乐乎＠bylehu.com 

                </p>
            </div>
        </div>
    </div>
    @section('aside')
    @show
</div>

<script type="text/javascript" src="{{asset("js/jquery-1.7.2.min.js")}}"></script>
<script src="{{asset("AmazeUI-2.4.2/assets/js/amazeui.js")}}"></script>
<script>
    $('#searchInput').bind('keydown',function(event){
        event.preventDefault();
        if(event.keyCode == "13") {
            search();
        }
    });
    $("#ai-topsearch").click( function () {
        search();
    });
    function search() {
        var keyword = $("#searchInput").val();
        if(keyword !== ''){
            window.location.href = "/search?keyword="+keyword;
        }
    }
    function gobackhome() {
        window.location.href = "/index";
    }
</script>
@section('custom-script')
@show
</body>
</html>

