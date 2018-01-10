<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
<title>@yield('title')</title>
<link href="{{asset('AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/personal.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/vipstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/orstyle.css')}}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
<script src="{{asset('AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>
</head>
<body>
<!--头 -->
<header>
    <article>
        <div class="mt-logo">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd">
                            @if($data['uid'] == 0)
                                <a href="{{asset('/account/login')}}" target="_top" class="h">亲，请登录</a>
                                <a href="{{asset('/account/register')}}" target="_top">免费注册</a>
                            @endif
                        </div>
                    </div>
                </ul>
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
                <div class="logoBig">
                    <li><img src="{{asset('images/bylh2.png')}}" onclick="gobackhome();"/></li>
                </div>

                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="#"></a>
                    <form>
                        <input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off">
                        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="button">
                    </form>
                </div>
            </div>

            <div class="clear"></div>
        </div>
        </div>
    </article>
</header>
<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        <ul>
            <li class="index"><a href="{{asset('index')}}">首页</a></li>
            <li class="qc"><a href="{{asset('demands')}}">需求大厅</a></li>
            <li class="qc"><a href="{{asset('advanceSearch')}}">大学生服务</a></li>
            <li class="qc"><a href="{{asset('advanceSearch')}}">实习课堂</a></li>
            <li class="qc last"><a href="{{asset('advanceSearch')}}">专业问答</a></li>
        </ul>
        <div class="nav-extra">
            <a href="{{asset(('message'))}}" style="color: #f5e79e;"><i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的消息
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i></a>
        </div>
    </div>
</div>
<b class="line"></b>
@section('content')
@show
<div class="footer ">
    <div class="footer-hd ">
    </div>
    <div class="footer-bd ">
        <p style="text-align: center;">
            ©2017-2018 bylh.com 成备xxxxxxxx号<br>
            不亦乐乎（成都）有限公司<br>
            客服：xxxx-xxx-xxx
        </p>
    </div>
</div>
</div>
<aside class="menu">
    <ul>
        <li class="person active">
            <a href="{{asset('account/index')}}"><i class="am-icon-user"></i>个人中心</a>
        </li>
        <li class="person">
            <p><i class="am-icon-newspaper-o"></i>个人资料</p>
            <ul>
                <li> <a href="{{asset('/account/baseedit')}}">个人信息</a></li>
                <li> <a href="{{asset('safety')}}">安全设置</a></li>
            </ul>
        </li>
        <li class="person">
            <p><i class="am-icon-balance-scale"></i>我的交易</p>
            <ul>
                <li><a href="{{asset('order')}}">订单管理</a></li>
                <li> <a href="{{asset('comment')}}">评价服务</a></li>
            </ul>
        </li>
        <li class="person">
            <p><i class="am-icon-dollar"></i>我的服务</p>
            <ul>
                <li> <a href="{{asset('advanceSearch')}}">发布服务</a></li>
                <li> <a href="{{asset('myrequest')}}">服务列表</a></li>
            </ul>
        </li>

        <li class="person">
            <p><i class="am-icon-tags"></i>我的需求</p>
            <ul>
                <li> <a href="{{asset('sendneed')}}">发布需求</a></li>
                <li> <a href="{{asset('myneed')}}">需求列表</a></li>
            </ul>
        </li>

        <li class="person">
            <p><i class="am-icon-qq"></i>信息中心</p>
            <ul>
                <li> <a href="{{asset('message')}}">站内信</a></li>
                <li> <a href="{{asset('news')}}">我的消息</a></li>
            </ul>
        </li>
    </ul>
</aside>
</div>
<div class="navCir">
    <li><a href="{{asset('index')}}"><i class="am-icon-home "></i>首页</a></li>
    <li><a href="{{asset('search')}}"><i class="am-icon-list"></i>搜索</a></li>
    <li><a href="{{asset('order')}}"><i class="am-icon-shopping-basket"></i>订单</a></li>
    <li class="active"><a href="{{asset('home')}}"><i class="am-icon-user"></i>我的</a></li>
</div>
</body>
</html>
<script>
    $("#ai-topsearch").click( function () {
        search();
    });
    function search() {
        var keyword = $("#searchInput").val();
        if(keyword != ''){
            window.location.href = "/search?keyword="+keyword;
        }
    }
    function gobackhome() {
        window.location.href = "/index";
    }
</script>
