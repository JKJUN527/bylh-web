<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人中心</title>

    <link href="../AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="../AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="../css/personal.css" rel="stylesheet" type="text/css">
    <link href="../css/vipstyle.css" rel="stylesheet" type="text/css">
    <script src="../AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="../AmazeUI-2.4.2/assets/js/amazeui.js"></script>
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
                            <a href="#" target="_top" class="h">亲，请登录</a>
                            <a href="#" target="_top">免费注册</a>
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="home2.html" target="_top" class="h"><i class="am-icon-home am-icon-fw"></i>首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                    </div>
                </ul>
            </div>

            <!--悬浮搜索框-->

            <div class="nav white">
                <div class="logoBig">
                    <li><img src="../images/bylh.png" style="width: 60%;" /></li>
                </div>

                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="#"></a>
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
            <li class="index"><a href="#">首页</a></li>
            <li class="qc"><a href="#">需求大厅</a></li>
            <li class="qc"><a href="#">大学生服务</a></li>
            <li class="qc"><a href="#">实习课堂</a></li>
            <li class="qc last"><a href="#">专业问答</a></li>
        </ul>
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
            <div class="wrap-left">
                <div class="wrap-list">
                    <div class="m-user">
                        <!--个人信息 -->

                        <div class="m-userinfo">
                            <a href="news.html">
                                <div class="tipsBox"><i class="am-icon-envelope"></i></div>
                            </a>
                            <div class="m-baseinfo">
                                <a class="m-pic" href="information.html" style="width: 120px;height: 120px;">
                                    <img src="../images/touxiang.jpg">
                                </a>
                                <div class="m-info">
                                    <em class="s-name" style="padding-top: 20px;">小叮当</em>
                                </div>
                            </div>
                            <div class="m-right">
                                <div class="m-new">
                                    <a href="news.html"><i class="am-icon-dropbox  am-icon-md" style="padding-right:5px ;"></i>消息盒子</a>
                                </div>

                            </div>
                        </div>

                        <!--基本资料-->
                        <div class="m-userproperty">
                            <div class="s-bar">
                                <i class="s-icon"></i>基本资料
                            </div>
                            <p class="m-coupon">
                                <em class="m-num">24</em>
                                <span class="m-title">年龄</span>
                            </p>
                            <p class="m-wallet">
                                <em class="m-num">男</em>
                                <span class="m-title">性别</span>
                            </p>
                            <p class="m-bill">
                                <em class="m-num">1992年7月16日</em>
                                <span class="m-title">生日</span>
                            </p>
                        </div>

                        <!--我的钱包-->
                        <div class="wallet">
                            <div class="s-bar">
                                <i class="s-icon"></i>热门需求
                                <label style="float: right;">更多>>></label>
                            </div>
                            <p class="m-big squareS">
                                <a href="#">
                                    <i><img src="../images/f3.png"/></i>
                                    <span class="m-title">网站建设</span>
                                </a>
                            </p>
                            <p class="m-big squareA">
                                <a href="#">
                                    <i><img src="../images/f1.jpg"/></i>
                                    <span class="m-title">产品设计</span>
                                </a>
                            </p>
                            <p class="m-big squareL">
                                <a href="#">
                                    <i><img src="../images/f2.jpg"/></i>
                                    <span class="m-title">取名测字</span>
                                </a>
                            </p>
                        </div>

                    </div>
                    <div class="box-container-bottom"></div>

                    <!--订单 -->
                    <div class="am-container">
                        <div class="am-g am-g-fixed">
                            <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
                                <div class="m-order">
                                    <div class="s-bar">
                                        <i class="s-icon"></i>我的订单
                                        <a class="i-load-more-item-shadow" href="order.html">全部订单</a>
                                    </div>
                                    <ul>
                                        <li><a href="order.html"><i><img src="../images/pay.png"/></i><span>待付款</span></a></li>
                                        <li><a href="order.html"><i><img src="../images/send.png"/></i><span>待发货<em class="m-num">1</em></span></a></li>
                                        <li><a href="order.html"><i><img src="../images/receive.png"/></i><span>待收货</span></a></li>
                                        <li><a href="order.html"><i><img src="../images/comment.png"/></i><span>待评价<em class="m-num">3</em></span></a></li>
                                        <li><a href="change.html"><i><img src="../images/refund.png"/></i><span>退换货</span></a></li>
                                    </ul>
                                    <div class="orderContentBox">
                                        <div class="orderContent">
                                            <div class="orderContentpic">
                                                <div class="imgBox">
                                                    <a href="orderinfo.html"><img src="../images/f1.jpg"></a>
                                                </div>
                                            </div>
                                            <div class="detailContent">
                                                <a href="orderinfo.html" class="delivery">已确认</a>
                                                <div class="orderID">
                                                    <span class="time">2016-03-09</span>
                                                    <span class="splitBorder">|</span>
                                                    <span class="time">21:52:47</span>
                                                </div>
                                                <div class="orderID">
                                                    <span class="num">网站开发</span>
                                                </div>
                                            </div>
                                            <div class="state">待评价</div>
                                            <div class="price"><span class="sym">¥</span>23.<span class="sym">80</span></div>

                                        </div>
                                        <a href="javascript:void(0);" class="btnPay">再次购买</a>
                                    </div>

                                    <div class="orderContentBox">
                                        <div class="orderContent">
                                            <div class="orderContentpic">
                                                <div class="imgBox">
                                                    <a href="orderinfo.html"><img src="../images/f2.jpg"></a>
                                                </div>
                                            </div>
                                            <div class="detailContent">
                                                <a href="orderinfo.html" class="delivery">已付款</a>
                                                <div class="orderID">
                                                    <span class="time">2016-03-09</span>
                                                    <span class="splitBorder">|</span>
                                                    <span class="time">21:52:47</span>
                                                </div>
                                                <div class="orderID">
                                                    <span class="num">java小程序设计</span>
                                                </div>
                                            </div>
                                            <div class="state">待确认</div>
                                            <div class="price"><span class="sym">¥</span>246.<span class="sym">50</span></div>

                                        </div>
                                        <a href="javascript:void(0);" class="btnPay">再次购买</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--九宫格-->
                    <div class="user-squaredIcon">
                        <div class="s-bar">
                            <i class="s-icon"></i>我的常用
                        </div>
                        <ul>
                            <a href="order.html">
                                <li class="am-u-sm-4"><i class="am-icon-truck am-icon-md"></i>
                                    <p>物流查询</p>
                                </li>
                            </a>
                            <a href="collection.html">
                                <li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i>
                                    <p>我的收藏</p>
                                </li>
                            </a>
                            <a href="foot.html">
                                <li class="am-u-sm-4"><i class="am-icon-paw am-icon-md"></i>
                                    <p>我的足迹</p>
                                </li>
                            </a>
                            <a href="#">
                                <li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i>
                                    <p>为你推荐</p>
                                </li>
                            </a>
                            <a href="blog.html">
                                <li class="am-u-sm-4"><i class="am-icon-share-alt am-icon-md"></i>
                                    <p>我的分享</p>
                                </li>
                            </a>
                            <a href="../home/home2.html">
                                <li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i>
                                    <p>限时活动</p>
                                </li>
                            </a>

                        </ul>
                    </div>

                    <div class="user-suggestion">
                        <div class="s-bar">
                            <i class="s-icon"></i>会员中心
                        </div>
                        <div class="s-bar">
                            <a href="suggest.html"><i class="s-icon"></i>意见反馈</a>
                        </div>
                    </div>

                    <!--优惠券积分-->
                    <div class="twoTab">
                        <div class="twoTabModel Coupon">
                            <h5 class="squareTitle"><a href="#"><span class="splitBorder"></span>推荐服务商<i class="am-icon-angle-right"></i></a></h5>
                            <div class="Box">
                                <ul data-am-widget="gallery" class="am-gallery am-avg-sm-6
				  							am-avg-md-6 am-avg-lg-6 am-gallery-default" data-am-gallery="{ pureview: true }" >
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="../images/f1.jpg" class="">
                                                <img src="../images/f1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                                                <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="../images/f1.jpg" class="">
                                                <img src="../images/f1.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                                                <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="../images/f1.jpg" class="">
                                                <img src="../images/f1.jpg"  alt="不要太担心 只因为我相信"/>
                                                <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="../images/f1.jpg" class="">
                                                <img src="../images/f1.jpg"  alt="终会走过这条遥远的道路"/>
                                                <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="../images/f1.jpg" class="">
                                                <img src="../images/f1.jpg"  alt="终会走过这条遥远的道路"/>
                                                <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="../images/f1.jpg" class="">
                                                <img src="../images/f1.jpg"  alt="终会走过这条遥远的道路"/>
                                                <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-right">

                <!-- 日历-->
                <div class="day-list">
                    <div class="s-title">
                        公告
                    </div>
                    <div class="s-box">
                        <ul>
                            <li><a target="_blank" href="#">
                                    <span style="color: #b84554;">[公告]</span>欢迎来到不亦乐乎
                                </a></li>
                            <li style="overflow:visible;"><a target="_blank" href="#">
                                    <span style="color: #b84554;">[公告]</span>创意服务 上不亦乐乎
                                </a></li>
                            <li><a target="_blank" href="#">企业一站式众包服务平台	</a></li>
                            <li><a target="_blank" href="#">威客基地</a></li>
                            <li><a target="_blank" href="#">让你的知识变成财富！</a></li>
                            <li><a target="_blank" href="#">加入我们，发现新的自己</a></li>
                            <li><a target="_blank" href="#">把你的建议告诉我们</a></li>
                        </ul>
                    </div>
                </div>


            </div>
            <div class="clear"></div>
        </div>

        <!--底部-->
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
                <a href="index.html"><i class="am-icon-user"></i>个人中心</a>
            </li>
            <li class="person">
                <p><i class="am-icon-newspaper-o"></i>个人资料</p>
                <ul>
                    <li> <a href="user.html">个人信息</a></li>
                    <li> <a href="safety.html">安全设置</a></li>
                </ul>
            </li>
            <li class="person">
                <p><i class="am-icon-balance-scale"></i>我的交易</p>
                <ul>
                    <li><a href="order.html">订单管理</a></li>
                    <li> <a href="change.html">退款售后</a></li>
                    <li> <a href="comment.html">评价服务</a></li>
                </ul>
            </li>
            <li class="person">
                <p><i class="am-icon-dollar"></i>我的服务</p>
                <ul>
                    <li> <a href="points.html">发布服务</a></li>
                </ul>
            </li>

            <li class="person">
                <p><i class="am-icon-tags"></i>我的需求</p>
                <ul>
                    <li> <a href="collection.html">发布需求</a></li>
                    <li> <a href="foot.html">足迹</a></li>
                </ul>
            </li>

            <li class="person">
                <p><i class="am-icon-qq"></i>站内信</p>
                <ul>
                    <li> <a href="consultation.html">商品咨询</a></li>
                    <li> <a href="suggest.html">意见反馈</a></li>

                    <li> <a href="news.html">我的消息</a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
<!--引导 -->
<div class="navCir">
    <li><a href="../home/home2.html"><i class="am-icon-home "></i>首页</a></li>
    <li><a href="../home/sort.html"><i class="am-icon-list"></i>分类</a></li>
    <li><a href="../home/shopcart.html"><i class="am-icon-shopping-basket"></i>订单</a></li>
    <li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>
</div>
</body>

</html>