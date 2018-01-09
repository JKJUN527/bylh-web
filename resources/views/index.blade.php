@extends('demo.admin')
@section('title', '不亦乐乎')
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
    .title-first{
        float: none;
        width: 100%;
        padding: 0px 5px;
        border: none;
        height: 30px;
        line-height: 30px;
    }
    .am-nav-tabs > li.am-active > a, .am-nav-tabs > li.am-active > a:hover, .am-nav-tabs > li.am-active > a:focus, .am-nav-tabs > li > a:hover{
        background:#ee6363;
        color: #fff;
    }
</style>
@endsection
@section('content')
    <b class="line"></b>
    <div class="shopNav">
        <div class="slideall" style="height: auto;">

            <!--<div class="long-title"><span class="all-goods">全部分类</span></div>-->
            <div class="nav-cont" >
                <ul>
                    <li class="index"><a href="{{asset('index')}}">首页</a></li>
                    <li class="qc"><a href="{{asset('demands')}}">需求大厅</a></li>
                    <li class="qc"><a href="{{asset('advanceSearch')}}">大学生服务</a></li>
                    <li class="qc"><a href="{{asset('advanceSearch')}}">实习中介</a></li>
                    <li class="qc last"><a href="{{asset('advanceSearch')}}">专业问答</a></li>
                </ul>
            </div>

            <div class="bannerTwo">
                <!--轮播 -->
                <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
                    <ul class="am-slides">
                        <li class="banner1"><a href="introduction.html"><img src="{{asset('images/3.jpg')}}" /></a></li>
                    </ul>
                </div>
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
                                    <h3 class="category-name b-category-name"><a class="ml-22" title="{{$serviceclass1->name}}">{{$serviceclass1->name}}</a></h3>
                                    <em>&gt;</em></div>
                                <div class="menu-item menu-in top">
                                    <div class="area-in">
                                        <div class="area-bg">
                                            <div class="menu-srot">
                                                <div class="sort-side">
                                                    @foreach($data['serviceclass2'] as $serviceclass2)
                                                        @if($serviceclass2['class1_id']==$serviceclass1['id'])
                                                    <dl class="dl-sort">
                                                        <dt><span title="蛋糕">{{$serviceclass2->name}}</span></dt>
                                                        @foreach($data['serviceclass3'] as $serviceclass3)
                                                            @if($serviceclass3['class2_id']==$serviceclass2['id'])
                                                        <dd><a title="{{$serviceclass3->name}}" href="#"><span>{{$serviceclass3->name}}</span></a></dd>
                                                            @endif
                                                        @endforeach
                                                    </dl>
                                                        @endif
                                                    @endforeach
                                                </div>
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
                <a href="sort.html"><img src="{{asset('images/navsmall.jpg')}}" />
                    <div class="title">发布需求</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('images/huismall.jpg')}}" />
                    <div class="title">发布服务</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('images/mansmall.jpg')}}" />
                    <div class="title">个人中心</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('images/moneysmall.jpg')}}" />
                    <div class="title">关于我们</div>
                </a>
            </div>
        </div>
        <div class="marqueenTwo" style="background-color: #000;">
            <div class="demo">
                <ul style="padding-top:70px;">
                    <li class="title-first"><a target="_blank" href="#">
                            <button style="border: none;background: #fff;">发布需求</button>
                        </a></li>
                    <li class="title-first"><a target="_blank" href="#">
                            <button style="border: none;background: #fff;">发布服务</button>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
        if ($(window).width() < 640) {
            function autoScroll(obj) {
                $(obj).find("ul").animate({
                    marginTop: "-39px"
                }, 500, function() {
                    $(this).css({
                        marginTop: "0px"
                    }).find("li:first").appendTo(this);
                })
            }
            $(function() {
                setInterval('autoScroll(".demo")', 3000);
            })
        }
    </script>
</div>
<div class="shopMainbg">
    <!--广告1-->
    <div class="advertisement" style="padding: 10px;">
        <img src="../images/ad1.png" style="width: 100%;padding: 0 150px;">
    </div>
    <!--需求大厅-->
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="padding-bottom: 10px;">
            <div class="index-category-left">
                <div class="marqueenOne">
                    <span class="marqueen-title"><i class="am-icon-volume-up am-icon-fw"></i>新闻栏<em class="am-icon-angle-double-right"></em></span>
                    <div class="demo">
                        <ul style="padding-top: 20px;">
                            @foreach($data['news'] as $news)
                            <li><a target="_blank" href="#">
                                    <span>[{{$news->tag}}]</span>{{$news->content}}
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
                                @foreach($data['demands'] as $demands)
                                <li><a href="#"><span>{{$demands->title}}</span><i>{{$demands->created_at}}</i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                        <div class="index-category-right">
                            <h1 class="comh1" style="font-size: 16px;padding: 3px;font-weight: bold;">
                                家教信息
                                <em>
                                    <a href="#"><b>MORE</b><i class="am-icon-angle-double-right"></i></a>
                                </em>
                            </h1>
                            <!--<img src="../images/demo4.jpg" style="width: 350px;padding: 5px;" />-->
                            <ul class="comcategory">
                                @foreach($data['demands'] as $demands)
                                    <li><a href="#"><span>{{$demands->title}}</span><i>{{$demands->created_at}}</i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                        <div class="index-category-right">
                            <h1 class="comh1" style="font-size: 16px;padding: 3px;font-weight: bold;">
                                家教信息
                                <em>
                                    <a href="#"><b>MORE</b><i class="am-icon-angle-double-right"></i></a>
                                </em>
                            </h1>
                            <!--<img src="../images/demo4.jpg" style="width: 350px;padding: 5px;" />-->
                            <ul class="comcategory">
                                @foreach($data['demands'] as $demands)
                                    <li><a href="#"><span>{{$demands->title}}</span><i>{{$demands->created_at}}</i></a></li>
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
                            <button class="am-btn am-btn-danger am-round">查看更多</button>
                        </div>

                    </div>
                </div>
                <div class="am-g am-g-fixed">
                    <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
                        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
                            @foreach($data['hotest1'] as $hotest1)
                            <li>
                                <div class="am-gallery-item">
                                    <a href="{{$hotest1->picture}}" class="">
                                        <img src="{{$hotest1->picture}}"  alt="{{$hotest1->title}}"/>
                                        <h3 class="am-gallery-title">{{$hotest1->title}}</h3>
                                        <div class="am-gallery-desc">{{$hotest1->created_at}}</div>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
                            @foreach($data['hotest1'] as $hotest1)
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="{{$hotest1->picture}}" class="">
                                            <img src="{{$hotest1->picture}}"  alt="{{$hotest1->title}}"/>
                                            <h3 class="am-gallery-title">{{$hotest1->title}}</h3>
                                            <div class="am-gallery-desc">{{$hotest1->created_at}}</div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--实习中介-->
            <div class="shopMain" id="shopmain">
                <div class="am-container " >
                    <div class="shopTitle ">
                        <h4 class="floor-title">实习中介</h4>
                        <div class="today-brands " style="right:0px ;top:13px;">
                            <button class="am-btn am-btn-danger am-round">查看更多</button>
                        </div>

                    </div>
                </div>
                <div class="am-g am-g-fixed">
                    <div class="am-u-lg-3 am-u-md-4" style="padding:10px;">
                        <a href="#">
                            <img src="../images/img_06.jpg">
                        </a>
                        <div class="left_bottom" style="background-color: gray;text-align: center;padding: 3px;color:#fff;">
                            <a href="#" style="color: #fff">
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
                                    <a href="# "><img src="../images/f2.jpg" style="width: auto;" />
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
                            @foreach($data['hotest2'] as $hotest2)
                            <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥{{$hotest2->price}}</font>&nbsp;&nbsp;&nbsp;&nbsp;{{$hotest2->title}}</a><span style="color: gray;float: right;">查看详情</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--服务商推荐-->
        <div class="am-u-lg-4 am-u-md-4" style="padding-top: 20px;">
            <div class="request_rank">
                <div class="rank_title" style="background:url(../images/tit_bg.jpg)no-repeat center;height: 114px;">
                    <p style="font-size: 16px;font-weight: bold;text-align: center;color: #fff;padding-top: 20px;">服务商排行榜</p>
                </div>
                <div class="rank_content" style="margin: 0 60px;border-bottom: 2px solid #df3536;border-left: 2px solid #df3536;border-right: 2px solid #df3536;">
                    <ul>
                        @foreach($data['hotest1'] as $hotest1)
                        <li style="text-align: center;">
                            <div class="box1"></div>
                            <div class="outer-con" style="padding: 10px;position: inherit;">
                                <a href="# "><img src="{{$hotest1->picture}}" style="width: 50%;" />
                                    <div class="title ">
                                        {{$hotest1->title}}
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
                            <button class="am-btn am-btn-danger am-round">查看更多</button>
                        </div>
                    </div>
                </div>
                <div class="am-g am-g-fixed floodSeven">
                    <div class="am-u-sm-5 am-u-md-4 text-one list ">

                        <a href="# ">
                            <img src="../images/fig.png" />
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
                        <a href="# "><img src="../images/fig.png " /></a>

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
                            <a href="# "><img src="../images/fig.png" /></a>
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
                            <a href="# "><img src="../images/fig.png" /></a>
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
                            <a href="# "><img src="../images/fig.png" /></a>
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
                            <a href="# "><img src="../images/fig.png" /></a>
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
                            <a href="# "><img src="../images/fig.png" /></a>
                        </div>
                    </li>
                </div>
                <div class="clear "></div>
            </div>
        </div>
    </div>



    <!--广告-->
    <div class="advertisement" style="padding: 10px;width: 50%;float: left;">
        <img src="{{asset('images/ad4.jpg')}}">
    </div>
    <div class="advertisement" style="padding: 10px;width: 50%;float: right;">
        <img src="{{asset('images/ad5.jpg')}}">
    </div>
@endsection



