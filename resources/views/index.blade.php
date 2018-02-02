@extends('demo.admin',['title'=>1])
@section('title', '不亦乐乎|首页')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('js/amazeui.dialog.min.js')}}" type="text/javascript"></script>
<style type="text/css">
    .floor-title{
        color: #003366;
    }
    .needtype1,.needtype2,.needtype3{
        padding-top: 20px;
    }
    .more2more{
        margin-top:-8px;
    }
    .comcategory{
        padding-top: 10px;

    }
    .comcategory li{
        font-size:14px;
        padding: 3px;
        line-height: 1.5;
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
    .comh1{
        font-size: 18px;
        padding: 3px;
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
    .showNews{
        width: 300px;
        right: 0;
        border: 2px solid #e64d2e;
    }
    .marqueenOne{
        margin-top: -10px;
        margin-left: -5px;
    }
    {{--.category-content .menu-item {--}}
        {{--background-image: url({{asset('images/bear.png')}});--}}
    {{--}--}}
    @media screen and (max-width:1000px){
        .marqueenTwo{display:none;}
        .leftpanel{display:none;}
        .shopMain{width:100%;}
        .index-category-left{width:100%;text-align:center;}
        .index-category-right{width:100%;text-align:center;}
        .request_rank{display:none;}
        .pictureshow{width:500px;}
    }
    .demo_btn{
        width: 10rem;
        height: 6rem;
        margin-top: 5rem;
        font-size: large;
    }
</style>
@endsection
@section('content')
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-2">
            <div id="nav" class="navfull" style="position: static;">
                <div class="area clearfix">
                    <div class="category-content" id="guide_2">

                        <div class="category" style="box-shadow:none ;margin-top: 2px;background: white">
                            <ul class="category-list navTwo" id="js_climit_li">
                                @foreach($data['serviceclass1'] as $serviceclass1)
                                    <li>
                                        <div class="category-info">
                                            <h3 class="category-name b-category-name"><a class="ml-22" style="color: black;" title="{{$serviceclass1->name}} ">{{$serviceclass1->name}}</a></h3>
                                            <em>&gt;</em></div>
                                        <div class="menu-item menu-in top">
                                            <div class="area-in">
                                                <div class="area-bg">
                                                    <div class="menu-srot">
                                                        <div class="sort-side">
                                                            @foreach($data['serviceclass2'] as $serviceclass2)
                                                                @if($serviceclass2['class1_id']==$serviceclass1['id'])
                                                                    <dl class="dl-sort">
                                                                        <dt><span title="{{$serviceclass2->name}}">{{$serviceclass2->name}}</span></dt>
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
        </div>
        <div class="am-u-lg-7 am-u-sm-4 am-u-md-4" style="margin-left: 180px;">
            <div class="pictureshow">
                <ul class="">
                    <li class=""><a href="introduction.html"><img src="{{asset('images/3.jpg')}}" style="width: 850px;margin-left:-200px;height: 377px;"/></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="am-u-lg-3" style="margin-left: -180px;">
            <div class="marqueenTwo" style="background:transparent;border:0px;">
                <div class="demo" style="margin-left: 10rem;">
                    <button type="button" class="am-btn am-btn-warning am-round demo_btn">发布需求</button>
                    <button type="button" class="am-btn am-btn-primary am-round demo_btn">发布服务</button>
                </div>
            </div>
        </div>
    </div>
        <!--侧边导航 -->
        <!--小导航 -->
        <div class="am-g am-g-fixed smallnav">
            <div class="am-u-sm-3">
                <a href="sort.html"><img src="{{asset('images/navsmall.jpg')}}" />
                    <div class="title">发布需求</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('images/servicesmall.jpg')}}" />
                    <div class="title">发布服务</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('images/mansmall.jpg')}}" />
                    <div class="title">个人中心</div>
                </a>
            </div>
            <div class="am-u-sm-3">
                <a href="#"><img src="{{asset('images/aboutus.jpg')}}" />
                    <div class="title">关于我们</div>
                </a>
            </div>
        </div>
<div class="shopMainbg">
    <!--广告1-->
    <div class="advertisement" style="padding: 10px 0 10px 0;">
        <img src="{{asset('images/ad3.jpg')}}" style="width: 100%;">
    </div>
    <!--需求大厅-->
    <!--公告详情页显示-->
    <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">Amaze UI</div>
            <div class="am-modal-bd">
                Hello world！
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn">确定</span>
            </div>
        </div>
    </div>
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4 leftpanel" style="padding-bottom: 10px;">
            <div class="index-category-left showNews">
                <div class="marqueenOne">
                    <span class="marqueen-title" style="text-align: center;padding-top: 1rem;height:54px;background-image: url({{asset('images/float_box2.png')}});background-repeat: no-repeat;">
                        <i style="font-size: 1.5rem;color: #fff;">本站公告</i></span>
                    <div class="demo">
                        <ul>
                            @foreach($data['notes'] as $note)
                            <li><a   class="am-btn"
                                          data-am-popover="{theme: 'primary', content: '{{$note->content}}'}">
                                    <span style="font-size: 16px;color: #b84554;padding-right: 3px;"><i class="am-icon-volume-up am-icon-fw"></i></span>{{mb_substr($note->content,0,20,'utf-8')}}
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="am-u-lg-8  am-u-md-8 am-u-sm-12">
            <div class="shopMain" id="shopmain">
                <div class="am-container " >
                    <div class="shopTitle" style="margin-left: -20px;">
                        <h4 class="floor-title">需求大厅</h4>
                        <div class="today-brands " style="right:0px;">
                            <button class="am-btn am-btn-danger am-round more2more">查看更多</button>
                        </div>

                    </div>
                </div>

                <div class="am-g am-g-fixed floodSix ">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4 needtype1">
                        <div class="index-category-left">
                            <a href="#">
                            <h1 class="comh1">
                                一般需求
                                <em style="color: #b84554;">
                                    <b>MORE</b><i class="am-icon-angle-double-right"></i></a>
                                </em>
                            </h1>
                            <!--<img src="../images/demo4.jpg" style="width: 350px;padding: 5px;" />-->
                            <ul class="comcategory">
                                @foreach($data['demands'] as $demands)
                                <li><a to="/demands/detail?uid={{$demands->uid}}"><span>{{$demands->title}}</span><i>{{$demands->created_at}}</i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4 needtype2">
                        <div class="index-category-right">
                            <a href="#">
                            <h1 class="comh1">
                                实习中介
                                <em style="color: #b84554;">
                                    <b>MORE</b><i class="am-icon-angle-double-right"></i></a>
                                </em>
                            </h1>
                            <!--<img src="../images/demo4.jpg" style="width: 350px;padding: 5px;" />-->
                            <ul class="comcategory">
                                @foreach($data['demands'] as $demands)
                                    <li><a to="/demands/detail?uid={{$demands->uid}}">{{$demands->title}}</span><i>{{$demands->created_at}}</i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4 needtype3">
                        <div class="index-category-right">
                            <a href="#">
                            <h1 class="comh1">
                                专业问答
                                <em style="color:#b84554;">
                                   <b>MORE</b><i class="am-icon-angle-double-right"></i></a>
                                </em>
                            </h1>
                            <!--<img src="../images/demo4.jpg" style="width: 350px;padding: 5px;" />-->
                            <ul class="comcategory">
                                @foreach($data['demands'] as $demands)
                                    <li><a to="/demands/detail?uid={{$demands->uid}}"><span>{{$demands->title}}</span><i>{{$demands->created_at}}</i></a></li>
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
                    <div class="shopTitle " style="width:110%;">
                        <h4 class="floor-title">一般服务</h4>
                        <div class="today-brands " style="right:0px ;top:13px;">
                            <button class="am-btn am-btn-danger am-round more2more">查看更多</button>
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
                                    <a to="/service/detail?uid={{$hotest1->uid}}">
                                        <img src="{{$hotest1->picture}}"  alt="{{$hotest1->title}}"/>
                                        <h3 class="am-gallery-title">{{$hotest1->title}}</h3>
                        <div class="am-gallery-desc">{{$hotest1->created_at}}</div>
                        </a>
                    </div>
                    </li>
                    @endforeach
                    </ul>
                    {{--<ul data-am-widget="gallery" class="am-gallery am-avg-sm-3--}}
  							{{--am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }" >--}}
                        {{--@foreach($data['hotest1'] as $hotest1)--}}
                            {{--<li>--}}
                                {{--<div class="am-gallery-item">--}}
                                    {{-- <a to="/resume/add?rid={{$resume->rid}}">--}}
                                        {{--<img src="{{$hotest1->picture}}"  alt="{{$hotest1->title}}"/>--}}
                                        {{--<h3 class="am-gallery-title">{{$hotest1->title}}</h3>--}}
                                        {{--<div class="am-gallery-desc">{{$hotest1->created_at}}</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
        <!--实习中介-->
        <div class="shopMain" id="shopmain">
            <div class="am-container " >
                <div class="shopTitle" style="width:110%;" >
                    <h4 class="floor-title">实习中介</h4>
                    <div class="today-brands " style="right:0px ;top:13px;">
                        <button class="am-btn am-btn-danger am-round more2more">查看更多</button>
                    </div>

                    </div>
                </div>
                <div class="am-g am-g-fixed">
                    <div class="am-u-lg-6 am-u-md-6" style="padding:10px;">
                        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  							am-avg-md-2 am-avg-lg-2 am-gallery-default" data-am-gallery="{ pureview: true }" >
                                @foreach($data['hotest2'] as $hotest2)
                                <li>
                                    <div class="am-gallery-item">
                                        <a to="/service/detail?uid={{$hotest2->uid}}">
                                            <img src="{{$hotest2->picture}}"  alt="{{$hotest2->title}}"/>
                                            <h3 class="am-gallery-title">{{$hotest2->title}}</h3>
                                            <div class="am-gallery-desc">{{$hotest2->created_at}}</div>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                        </ul>
                        {{--<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2--}}
  							{{--am-avg-md-2 am-avg-lg-2 am-gallery-default" data-am-gallery="{ pureview: true }" >--}}
                            {{--@for($i=0;$i<2;$i++)--}}
                                {{--<li>--}}
                                    {{--<div class="am-gallery-item">--}}
                                        {{--<a href="{{$hotest1->picture}}" class="">--}}
                                            {{--<img src="{{$hotest1->picture}}"  alt="{{$hotest1->title}}"/>--}}
                                            {{--<h3 class="am-gallery-title">{{$hotest1->title}}</h3>--}}
                                            {{--<div class="am-gallery-desc">{{$hotest1->created_at}}</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endfor--}}
                        {{--</ul>--}}
                    </div>
                    <div class="am-u-lg-6 am-u-md-6" style="padding: 10px;">
                        <ul>
                            @foreach($data['hotest2'] as $hotest2)
                            <li><a to="/service/detail?uid={{$hotest2->uid}}"><font color="#b84554" style="font-size: 18px;">￥{{$hotest2->price}}</font>&nbsp;&nbsp;&nbsp;&nbsp;{{$hotest2->title}}</a><span style="color: gray;float: right;">查看详情</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--服务商推荐-->
        <div class="am-u-lg-4 am-u-md-4" style="padding-top: 20px;">
            <div class="request_rank">
                <div class="rank_title" style="background:url({{asset('images/tit_bg.jpg')}})no-repeat center;height: 114px;">
                    <p style="font-size: 16px;font-weight: bold;text-align: center;color: #fff;padding-top: 20px;">服务商排行榜</p>
                </div>
                <div class="rank_content" style="margin: 0 60px;border-bottom: 2px solid #df3536;border-left: 2px solid #df3536;border-right: 2px solid #df3536;">
                    <ul>
                        @foreach($data['serviceuser'] as $serviceuser)
                        <li style="text-align: center;">
                            <div class="box1"></div>
                            <div class="outer-con" style="padding: 10px;position: inherit;">
                                <a to="/service/detail?uid={{$serviceuser->uid}}"><img src="{{$serviceuser->elogo}}" style="width: 50%;" />
                                    <div class="title ">
                                        {{$serviceuser->uid}}
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
                            <button class="am-btn am-btn-danger am-round more2more">查看更多</button>
                        </div>
                    </div>
                </div>
                <div class="am-g am-g-fixed">
                    <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
                        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-6
  							am-avg-md-6 am-avg-lg-6 am-gallery-default" data-am-gallery="{ pureview: true }" >
                            @foreach($data['hotest3'] as $hotest3)
                                <li>
                                    <div class="am-gallery-item">
                                        <a to="/service/detail?uid={{$hotest3->uid}}">
                                            <img src="{{$hotest3->picture}}"  alt="{{$hotest3->title}}"/>
                                            <h3 class="am-gallery-title">{{$hotest3->title}}</h3>
                                            <div class="am-gallery-desc">{{$hotest3->created_at}}</div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{--<ul data-am-widget="gallery" class="am-gallery am-avg-sm-6--}}
  							{{--am-avg-md-6 am-avg-lg-6 am-gallery-default" data-am-gallery="{ pureview: true }" >--}}
                            {{--@foreach($data['hotest1'] as $hotest1)--}}
                                {{--<li>--}}
                                    {{--<div class="am-gallery-item">--}}
                                        {{--<a href="{{$hotest1->picture}}" class="">--}}
                                            {{--<img src="{{$hotest1->picture}}"  alt="{{$hotest1->title}}"/>--}}
                                            {{--<h3 class="am-gallery-title">{{$hotest1->title}}</h3>--}}
                                            {{--<div class="am-gallery-desc">{{$hotest1->created_at}}</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    </div>
                </div>
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
@section("custom-script")
  <script>
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
@endsection



