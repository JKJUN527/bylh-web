@extends('demo.admin')
@extends('demo.nav')
@section('content')
<div class="shopNav">
    <div class="slideall" style="height: auto;">

        <!--<div class="long-title"><span class="all-goods">全部分类</span></div>-->

        <div class="bannerTwo">
            <!--轮播 -->
            <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
                <ul class="am-slides">
                    <li class="banner1"><a href="/"><img src="images/1.jpg" /></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>

        <!--侧边导航 -->
        <div id="nav" class="navfull" style="position: static;">
            <div class="area clearfix">
                <div class="category-content" id="guide_2">

                    <div class="category" style="box-shadow:none ;margin-top: 2px;">
                        <ul class="category-list navTwo" id="js_climit_li">
                            @foreach($data['serviceclass1'] as $serviceclass1)
                            <li>
                                <div class="category-info">
                                    <h3 class="category-name b-category-name"><a class="ml-22" title="点心">{{$serviceclass1->name}}</a></h3>
                                    <em>&gt;</em>
                                </div>
                                <div class="menu-item menu-in top">
                                    <div class="area-in">
                                        <div class="area-bg">
                                            <div class="menu-srot">
                                                <div class="sort-side">
                                                    @foreach($data['serviceclass2'] as $serviceclass2)
                                                    <dl class="dl-sort">
                                                        <dt><span>
                                                                @if($serviceclass2->class1_id == $serviceclass1->id)
                                                                    {{$serviceclass2->name}}
                                                                @endif
                                                            </span></dt>
                                                        @foreach($data['serviceclass3'] as $serviceclass3)
                                                            @if($serviceclass3->class2_id ==$serviceclass2->id )
                                                                <dd><a title="{{$serviceclass3->name}}" href="#"><span>{{$serviceclass3->name}}</span></a></dd>
                                                            @endif
                                                        @endforeach
                                                    </dl>
                                                    @endforeach
                                                </div>
                                                {{--<div class="brand-side">--}}
                                                    {{--<dl class="dl-sort"><dt><span>实力服务商</span></dt>--}}
                                                        {{--<dd><a rel="nofollow" title="呵官方旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >龙博品牌设计</span></a></dd>--}}
                                                        {{--<dd><a rel="nofollow" title="格瑞旗舰店" target="_blank" href="#" rel="nofollow"><span >米旭品牌设计</span></a></dd>--}}
                                                        {{--<dd><a rel="nofollow" title="飞彦大厂直供" target="_blank" href="#" rel="nofollow"><span  class="red" >成都嗨创科技</span></a></dd>--}}
                                                        {{--<dd><a rel="nofollow" title="红e·艾菲妮" target="_blank" href="#" rel="nofollow"><span >Ex印象</span></a></dd>--}}
                                                        {{--<dd><a rel="nofollow" title="本真旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >双人策划</span></a></dd>--}}
                                                        {{--<dd><a rel="nofollow" title="杭派女装批发网" target="_blank" href="#" rel="nofollow"><span  class="red" >雨夜品牌设计</span></a></dd>--}}
                                                    {{--</dl>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <b class="arrow"></b>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!--导航 -->
        <script type="text/javascript">
            (function() {
                $('.am-slider').flexslider();
            });
            $(document).ready(function() {
                $("li").hover(function() {
                    $(".category-content .category-list li.first .menu-in").css("display", "none");
                    $(".category-content .category-list li.first").removeClass("hover");
                    $(this).addClass("hover");
                    $(this).children("div.menu-in").css("display", "block")
                }, function() {
                    $(this).removeClass("hover")
                    $(this).children("div.menu-in").css("display", "none")
                });
            })
        </script>


        <!--小导航 -->
        <div class="am-g am-g-fixed smallnav">
            <div class="am-u-sm-3">
                <a href="/"><img src="images/navsmall.jpg" />
                    <div class="title">发布需求</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="/"><img src="images/huismall.jpg" />
                    <div class="title">发布服务</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="/"><img src="images/mansmall.jpg" />
                    <div class="title">个人中心</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="/"><img src="images/moneysmall.jpg" />
                    <div class="title">关于我们</div>
                </a>
            </div>
        </div>


        <!--各类活动-->
        <!--走马灯 -->

        <div class="marqueenTwo" style="background-color: #000;">
            <div class="demo">
                <ul style="padding-top:70px;">
                    <li class="title-first"><a target="_blank" href="/sendneed">
                            <button style="border: none;background: #fff;">发布需求</button>
                        </a></li>
                    <li class="title-first"><a target="_blank" href="/sendrequest">
                            <button style="border: none;background: #fff;">发布服务</button>
                        </a></li>
                </ul>

            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="shopMainbg">
    <!--广告1-->
    <div class="advertisement" style="padding: 10px;">
        <img src="images/ad1.png" style="width: 100%;padding: 0 150px;">
    </div>
    <!--需求大厅-->
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="padding-bottom: 10px;">
            <div class="index-category-left">
                <div class="marqueenOne">
                    <span class="marqueen-title"><i class="am-icon-volume-up am-icon-fw"></i>公告栏<em class="am-icon-angle-double-right"></em></span>
                    <div class="demo">

                        <ul style="padding-top: 20px;">
                            @foreach($data['news'] as $news)
                            <li><a target="_blank" href="#">
                                    <span>[公告]</span>{{$news->content}}
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="am-u-lg-8  am-u-md-8 am-u-sm-8">
            <div class="shopMain" id="shopmain">
                <div class="am-container " >
                    <div class="shopTitle ">
                        <h4 class="floor-title">需求大厅</h4>
                        <div class="today-brands " style="right:0px ;top:13px;">
                            <a href="/">体育</a>|
                            <a href="/">艺术</a>|
                            <a href="/">家教</a>|
                            <a href="/">科技</a>|
                            <a href="/">健康</a>|
                            <a href="/">财经</a>|
                            <!--
                            <a href="/">文化</a>|
                            <a href="/">兴趣</a>|
                            <a href="/">事务</a>|
                            <a href="/">实习</a>|
                            <a href="/">问答</a>
                            -->
                            <button class="am-btn am-btn-danger am-round">查看更多</button>
                        </div>

                    </div>
                </div>

                <div class="am-g am-g-fixed floodSix ">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                        <div class="index-category-left">
                            <h1 class="comh1" style="font-size: 16px;padding: 3px;font-weight: bold;">
                                家教信息
                                <em>
                                    <a href="#"><b>MORE</b><i class="am-icon-angle-double-right"></i></a>
                                </em>
                            </h1>
                            <!--<img src="../images/demo4.jpg" style="width: 350px;padding: 5px;" />-->
                            <ul class="comcategory">
                                @foreach($data['hotest1'] as $hotest1)
                                <li><a href="/"><span>{{$hotest1->title}}</span><i>{{$hotest1->created_at}}</i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                        <div class="index-category-right">
                            <h1 class="comh1" style="font-size: 16px;padding: 3px;font-weight: bold;">
                                家教信息
                                <em>
                                    <a href="/"><b>MORE</b><i class="am-icon-angle-double-right"></i></a>
                                </em>
                            </h1>
                            <!--<img src="../images/demo4.jpg" style="width: 350px;padding: 5px;" />-->
                            <ul class="comcategory">
                                @foreach($data['hotest1'] as $hotest1)
                                    <li><a href="/"><span>{{$hotest1->title}}</span><i>{{$hotest1->created_at}}</i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="clear "></div>
                </div>
            </div>
        </div>
    </div>
    <!--广告2-->
    <div class="advertisement">

        <!--       <img src="../images/demo6.jpg" style="width: 100%;">-->
    </div>

    <!--大学生服务-->
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-8 am-u-md-8">
            <div class="shopMain" id="shopmain">
                <div class="am-container " >
                    <div class="shopTitle ">
                        <h4 class="floor-title">一般服务</h4>
                        <div class="today-brands " style="right:0px ;top:13px;">
                            <a href="# ">商标/VI设计</a>|
                            <a href="# ">包装设计</a>|
                            <a href="# ">封面设计</a>|
                            <a href="# ">海报设计</a>|
                            <a href="# ">宣传品设计</a>|
                            <a href="# ">服装设计</a>
                            <button class="am-btn am-btn-danger am-round">查看更多</button>
                        </div>

                    </div>
                </div>
                <div class="am-g am-g-fixed">
                    <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
                        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{pureview: true}" >
                            @foreach($data['hotest2'] as $hotest2)
                            <li>
                                <div class="am-gallery-item">
                                    <a href="{{$hotest2->picture}}" class="">
                                        <img src="{{$hotest2->picture}}"  alt="{{$hotest2->title}}"/>
                                        <h3 class="am-gallery-title">{{$hotest2->title}}</h3>
                                        <div class="am-gallery-desc">{{$hotest2->created_at}}</div>
                                    </a>
                                </div>
                            </li>
                           @endforeach
                           <!-- <li>
                                <div class="am-gallery-item">
                                    <a href="images/f1.jpg" class="">
                                        <img src="images/f1.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                                        <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                                        <div class="am-gallery-desc">2375-09-26</div>
                                    </a>
                                </div>
                            </li>-->
                        </ul>
                        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{pureview: true}" >
                            @foreach($data['hotest2'] as $hotest2)
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="{{$hotest2->picture}}" class="">
                                            <img src="{{$hotest2->picture}}"  alt="{{$hotest2->title}}"/>
                                            <h3 class="am-gallery-title">{{$hotest2->title}}</h3>
                                            <div class="am-gallery-desc">{{$hotest2->created_at}}</div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--需求2(短款)-->
            <div class="shopMain" id="shopmain">
                <div class="am-container " >
                    <div class="shopTitle ">
                        <h4 class="floor-title">实习中介</h4>
                        <div class="today-brands " style="right:0px ;top:13px;">
                            <a href="/">整站建设</a>|
                            <a href="/ ">网站优化</a>|
                            <a href="/ ">网站编程</a>|
                            <a href="/ ">网站开发</a>|
                            <a href="/ ">工具开发</a>|
                            <a href="/ ">软件开发</a>
                            <button class="am-btn am-btn-danger am-round">查看更多</button>
                        </div>

                    </div>
                </div>
                <div class="am-g am-g-fixed">
                    <div class="am-u-lg-3 am-u-md-4" style="padding:10px;">
                        <a href="/">
                            <img src="images/img_06.jpg">
                        </a>
                        <div class="left_bottom" style="background-color: gray;text-align: center;padding: 3px;color:#fff;">
                            <a href="/" style="color: #fff">
                                发布类似项目
                            </a>
                            <p>获得众多设计创意，体验一呼百应</p>
                        </div>
                    </div>
                    <div class="am-u-lg-5 am-u-md-4" style="padding: 10px;float: left;">
                        <ul>
                            <li>
                                <div class="box1"></div>
                                <div class="outer-con " style="padding: 10px;">
                                    <a href="/"><img src="images/f2.jpg" style="width: auto;" />
                                        <div class="title ">
                                            专业1
                                        </div>
                                        <div class="sub-title ">
                                            好评率 100%
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="am-u-lg-4 am-u-md-4" style="padding: 10px;">
                        <ul>
                            @foreach($data['hotest3'] as $hotest3)
                            <li><a href="/"><font color="#b84554" style="font-size: 18px;">￥{{$hotest3->price}}</font>&nbsp;&nbsp;&nbsp;&nbsp;{{$hotest3->title}}</a><span style="color: gray;float: right;">查看详情</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="am-u-lg-4 am-u-md-4">
            <div class="request_rank">
                <div class="rank_title" style="background:url(images/tit_bg.jpg)no-repeat center;height: 114px;">
                    <p style="font-size: 16px;font-weight: bold;text-align: center;color: #fff;padding-top: 20px;">服务商排行榜</p>
                </div>
                <div class="rank_content" style="margin: 0 60px;border-bottom: 2px solid #df3536;border-left: 2px solid #df3536;border-right: 2px solid #df3536;">
                    <ul>
                        @foreach($data['hotest2'] as $hotest2)
                        <li style="text-align: center;">
                            <div class="box1"></div>
                            <div class="outer-con" style="padding: 10px;position: inherit;">
                                <a href="/"><img src="{{$hotest2->picture}}" style="width: 50%;" />
                                    <div class="title ">
                                        {{$hotest2->title}}
                                    </div>
                                    <div class="right-panel">
                                        <button type="button" class="am-btn am-btn-danger">查看详情</button>
                                    </div>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!--专业问答-->
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
            <div class="shopMain" id="shopmain">
                <div class="am-container">
                    <div class="shopTitle ">
                        <h4 class="floor-title">专业问答</h4>
                        <div class="today-brands " style="right:0px ;top:13px">
                            <a href="# ">科学</a>|
                            <a href="# ">技术</a>|
                            <a href="# ">历史</a>|
                            <a href="# ">地理</a>|
                            <a href="# ">社会</a>|
                            <a href="# ">军事</a>
                            <button class="am-btn am-btn-danger am-round">查看更多</button>
                        </div>
                    </div>
                </div>
                <div class="am-g am-g-fixed floodSeven">
                    <div class="am-u-sm-5 am-u-md-4 text-one list ">

                        <a href="">
                            <img src="images/fig.png" />
                            <div class="outer-con ">
                                <div class="title ">
                                    答主1
                                </div>
                                <div class="sub-title ">
                                    好评率 100%
                                </div>
                            </div>
                        </a>
                        <div class="triangle-topright"></div>
                    </div>

                    <div class="am-u-sm-7 am-u-md-4 text-two big">

                        <div class="outer-con ">
                            <div class="title ">
                                答主2

                            </div>
                            <div class="sub-title ">
                                好评率 100%
                            </div>

                        </div>
                        <a href="/"><img src="images/fig.png" /></a>

                    </div>

                    <li>
                        <div class="am-u-sm-7 am-u-md-4 text-two">
                            <div class="boxLi"></div>
                            <div class="outer-con ">
                                <div class="title ">

                                    答主3

                                </div>
                                <div class="sub-title ">
                                    好评率 100%
                                </div>

                            </div>
                            <a href="/"><img src="images/fig.png" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="am-u-sm-3 am-u-md-2 text-three sug">
                            <div class="boxLi"></div>
                            <div class="outer-con ">
                                <div class="title ">
                                    答主4
                                </div>
                                <div class="sub-title ">
                                    好评率 98%
                                </div>

                            </div>
                            <a href="/"><img src="images/fig.png" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="am-u-sm-3 am-u-md-2 text-three big">
                            <div class="boxLi"></div>
                            <div class="outer-con ">
                                <div class="title ">
                                    答主5
                                </div>
                                <div class="sub-title ">
                                    好评率 100%
                                </div>

                            </div>
                            <a href="/"><img src="images/fig.png" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="am-u-sm-3 am-u-md-2 text-three ">
                            <div class="boxLi"></div>
                            <div class="outer-con ">
                                <ul>
                                    <li>
                                        <a href="#">排名6</a>
                                    </li>
                                </ul>

                            </div>
                            <a href="/"><img src="images/fig.png" /></a>
                        </div>
                    </li>
                    <li>
                        <div class="am-u-sm-3 am-u-md-2 text-three ">
                            <div class="boxLi"></div>
                            <div class="outer-con ">
                                <ul>
                                    <li>
                                        <a href="#">排名7</a>
                                    </li>
                                </ul>

                            </div>
                            <a href="/"><img src="images/fig.png" /></a>
                        </div>
                    </li>
                </div>
                <div class="clear "></div>
            </div>
        </div>
    </div>



    <!--广告-->
    <div class="advertisement" style="padding: 10px;width: 50%;float: left;">
        <img src="images/ad4.jpg">
    </div>
    <div class="advertisement" style="padding: 10px;width: 50%;float: right;">
        <img src="images/ad5.jpg">
    </div>
@section('footer')
    <div class="footer " style="border: none;">
        <div class="footer-hd ">
        </div>
        <div class="footer-bd ">
            <br>
            <p style="text-align: center;">

                Copyright © 2017-2018  bylehu 版权所有  蜀ICP备17027037<br>
                客服电话：88888888<br>
                联系邮箱：不亦乐乎＠bylehu.com

            </p>
        </div>
    </div>
    @endsection
</div>
</div>
</div>
</div>

<!--引导 -->
<div class="navCir">
    <li class="active"><a href="/home2"><i class="am-icon-home "></i>首页</a></li>
    <li><a href="/"><i class="am-icon-list"></i>分类</a></li>
    <li><a href="/"><i class="am-icon-shopping-basket"></i>订单详情</a></li>
    <li><a href="/"><i class="am-icon-user"></i>我的</a></li>
</div>
<!--菜单 -->
<div class=tip>
    <div id="sidebar">
        <div id="wrap">
            <div id="prof" class="item ">


            </div>


            <!--回到顶部 -->
            <div id="quick_links_pop " class="quick_links_pop hide "></div>

        </div>

    </div>
</div>
<script>
    window.jQuery || document.write('<script src="basic/js/jquery.min.js"></script>');
</script>
<script type="text/javascript " src="basic/js/quick_links.js"></script>
@endsection
