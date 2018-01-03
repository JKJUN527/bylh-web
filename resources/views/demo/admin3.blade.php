<title>实名认证</title>

<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

<link href="css/personal.css" rel="stylesheet" type="text/css">
<link href="css/stepstyle.css" rel="stylesheet" type="text/css">
<link href="css/vipstyle.css" rel="stylesheet" type="text/css">
<link href="css/infstyle.css" rel="stylesheet" type="text/css">
<link href="css/orstyle.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script src="AmazeUI-2.4.2/assets/js/amazeui.js"></script>
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
                            <a href="/login" target="_top" class="h">亲，请登录</a>
                            <a href="/register" target="_top">免费注册</a>
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="/index" target="_top" class="h"><i class="am-icon-home am-icon-fw"></i>首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng"><a href="/home" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                    </div>
                </ul>
            </div>

            <!--悬浮搜索框-->

            <div class="nav white">
                <div class="logoBig">
                    <li><img src="images/bylh.png"  style="width: 60%;" /></li>
                </div>

                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="/search"></a>
                    <form>
                        <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
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
            <li class="index"><a href="/home2">首页</a></li>
            <li class="qc"><a href="/need">需求大厅</a></li>
            <li class="qc"><a href="/request">大学生服务</a></li>
            <li class="qc"><a href="/request">实习课堂</a></li>
            <li class="qc last"><a href="/request">专业问答</a></li>
        </ul>
        <div class="nav-extra">
            <a href="/message" style="color: #f5e79e;"><i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的消息
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i></a>
        </div>
    </div>
</div>
<b class="line"></b>
@section('content')
@show
@section('footer')
@show
</div>
<aside class="menu">
    <ul>
        <li class="person active">
            <a href="/index"><i class="am-icon-user"></i>个人中心</a>
        </li>
        <li class="person">
            <p><i class="am-icon-newspaper-o"></i>个人资料</p>
            <ul>
                <li> <a href="/user">个人信息</a></li>
                <li> <a href="/safety">安全设置</a></li>
            </ul>
        </li>
        <li class="person">
            <p><i class="am-icon-balance-scale"></i>我的交易</p>
            <ul>
                <li><a href="/order">订单管理</a></li>
                <li> <a href="/comment">评价服务</a></li>
            </ul>
        </li>
        <li class="person">
            <p><i class="am-icon-dollar"></i>我的服务</p>
            <ul>
                <li> <a href="/sendrequest">发布服务</a></li>
                <li> <a href="/myrequest">服务列表</a></li>
            </ul>
        </li>

        <li class="person">
            <p><i class="am-icon-tags"></i>我的需求</p>
            <ul>
                <li> <a href="/sendneed">发布需求</a></li>
                <li> <a href="/myneed">需求列表</a></li>
            </ul>
        </li>

        <li class="person">
            <p><i class="am-icon-qq"></i>信息中心</p>
            <ul>
                <li> <a href="/message">站内信</a></li>
                <li> <a href="/news">我的消息</a></li>
            </ul>
        </li>
    </ul>
</aside>
</div>
</body>
