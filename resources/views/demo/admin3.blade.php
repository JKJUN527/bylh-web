<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">--}}
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('images/bylehu2.ico')}}" type="image/x-icon" />
    <link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/orstyle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/sweetalert/sweetalert.css")}}"/>
    <style>
        /*.am-container {*/
            /*width: 980px !important;*/
            /*max-width: none;*/
        /*}*/
        .nav_active a{
            color: #F37B1D !important;
        }
        .long-title{
            display: none !important;
        }
    </style>
    @section("custom-style")
    @show
</head>
<body>
<div class="hmtop">
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
                    <div class="menu-hd MyShangcheng"><a href="{{asset('/account/register')}}" target="_top"><i
                                    class="am-icon-user-plus am-icon-fw"></i>免费注册</a></div>
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
        <div class="logo"><img src="{{asset('images/bylh2.png')}}" onclick="gobackhome();"/></div>
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
<b class="line"></b>
<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Modal 标题
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            Modal 内容。本 Modal 无法通过遮罩层关闭。
        </div>
    </div>
</div>
<div class="shopNav">
    <div class="slideall" style="height: auto;">

        <div class="long-title" style="margin-top: 135px;margin-left: 120px;">
            <span class="all-goods">服务范围</span>
        </div>

        <div class="nav-cont" style="margin-top:135px;max-width: 1250px;margin-left: 172px;
        /*background: #ff9933bd;*/">
            <ul>
                <li class="index @if($title==1) nav_active @endif"><a href="{{asset('index')}}">首页</a></li>
                <li class="qc @if($title==2) nav_active @endif"><a href="{{asset('demands/advanceSearch')}}">需求大厅</a>
                </li>
                <li class="qc
                    @if($title==3)
                @if($subtitle==0)
                        nav_active
@endif
                @endif"><a href="{{asset('service/advanceSearch?type=0')}}">专业服务</a></li>
                <li class="qc
                @if($title==3)
                @if($subtitle==1)
                        nav_active
                    @endif
                @endif"><a href="{{asset('service/advanceSearch?type=1')}}">实习中介</a></li>
                <li class="qc
                @if($title==3)
                @if($subtitle==2)
                        nav_active
                    @endif
                @endif"><a href="{{asset('service/advanceSearch?type=2')}}">专业问答</a></li>
                <li class="qc @if($title==6) nav_active @endif"><a href="{{asset('news/index')}}">知友沙龙</a></li>
                <li class="qc @if($title==7) nav_active @endif"><a href="{{asset('about')}}">关于我们</a></li>
                <li class="qc @if($title==8) nav_active @endif"><a href="/question">用户指引</a></li>
            </ul>
        </div>
    @section('content')
    @show
    <!--footer-->
        <div class="footer " style="border: none;">
            <div class="footer-hd ">
            </div>
            <div class="footer-bd ">
                <br>
                <p style="text-align: center;">

                    Copyright © 2017-2018  bylehu 版权所有  蜀ICP备17027037<br>
                    客服电话：028-85593827<br>
                    联系邮箱：不亦乐乎＠bylehu.com

                </p>
            </div>
        </div>

    </div>
    @section('aside')
    @show
</div>
<!--引导 -->
{{--<div class="navCir">--}}
    {{--<li class="active"><a href="{{asset('index')}}"><i class="am-icon-home "></i>首页</a></li>--}}
    {{--<li><a href="{{asset('service/advanceSearch')}}"><i class="am-icon-list"></i>服务大厅</a></li>--}}
    {{--<li><a href="{{asset('demands/advanceSearch')}}"><i class="am-icon-shopping-basket"></i>需求大厅</a></li>--}}
    {{--<li><a href="{{asset('account/index')}}"><i class="am-icon-user"></i>个人中心</a></li>--}}
{{--</div>--}}

<script src="{{asset('js/jquery-1.4.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('AmazeUI-2.4.2/assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('AmazeUI-2.4.2/assets/js/amazeui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
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
        if (keyword !== '') {
            window.location.href = "/search?keyword="+keyword;
        }
    }
    function gobackhome() {
        window.location.href = "/index";
    }
</script>

@section("custom-script")
@show
</body>
</html>


