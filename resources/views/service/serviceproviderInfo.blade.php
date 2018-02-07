@extends('demo.admin2',["title"=>0])
@section('title','服务详情')
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
            margin-bottom:-20px;
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
    </style>
@endsection
@section('content')
    <!--发布服务-->
    <div class="am-g am-g-fixed" style="padding-top: 85px;">
        <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" style="border: 2px solid #eee;padding: 20px;background: #fff;">
            <div class="am-u-lg-9 am-u-md-9 am-u-sm-9">
                <!--大学生服务-->
                <div class="shopMain" id="shopmain">
                    <div class="am-container ">
                        <div class="shopTitle">
                            <h4 class="floor-title">发布的一般服务</h4>
                            <div class="today-brands">
                                <button class="am-btn am-btn-danger am-round more2more">查看更多</button>
                            </div>
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="#">
                                        <img class="card-img-top"
                                             src="{{asset('images/f2.jpg')}}"/>
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">龙博品牌设计</h4>
                                            <p class="card-text">
                                                <small class="text-muted">专业设计服务</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">成都</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="#">
                                        <img class="card-img-top"
                                             src="{{asset('images/f2.jpg')}}"/>
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">龙博品牌设计</h4>
                                            <p class="card-text">
                                                <small class="text-muted">专业设计服务</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">成都</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--实习中介-->
                <div class="shopMain" id="shopmain">
                    <div class="am-container ">
                        <div class="shopTitle">
                            <h4 class="floor-title">发布的实习中介服务</h4>
                            <div class="today-brands">
                                <button class="am-btn am-btn-danger am-round more2more">查看更多</button>
                            </div>
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="#">
                                        <img class="card-img-top"
                                             src="{{asset('images/f2.jpg')}}"/>
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">龙博品牌设计</h4>
                                            <p class="card-text">
                                                <small class="text-muted">专业设计服务</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">成都</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="#">
                                        <img class="card-img-top"
                                             src="{{asset('images/f2.jpg')}}"/>
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">龙博品牌设计</h4>
                                            <p class="card-text">
                                                <small class="text-muted">专业设计服务</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">成都</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="#">
                                        <img class="card-img-top"
                                             src="{{asset('images/f2.jpg')}}"/>
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">龙博品牌设计</h4>
                                            <p class="card-text">
                                                <small class="text-muted">专业设计服务</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">成都</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--专业问答-->
                <div class="shopMain" id="shopmain">
                    <div class="am-container">
                        <div class="shopTitle ">
                            <h4 class="floor-title">发布的专业问答服务</h4>
                            <div class="today-brands">
                                <button class="am-btn am-btn-danger am-round more2more">查看更多</button>
                            </div>
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="#">
                                        <img class="card-img-top"
                                             src="{{asset('images/f2.jpg')}}"/>
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">龙博品牌设计</h4>
                                            <p class="card-text">
                                                <small class="text-muted">专业设计服务</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">成都</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                    <a href="#">
                                        <img class="card-img-top"
                                             src="{{asset('images/f2.jpg')}}"/>
                                        <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                            <h4 class="card-title">龙博品牌设计</h4>
                                            <p class="card-text">
                                                <small class="text-muted">专业设计服务</small>
                                            </p>
                                        </div>
                                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                                        <div class="card-city">
                                            <small class="text-muted">成都</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3">
                <div class="container1" style="border: 2px solid #eee;padding: 20px;background: #fff;">
                    <div class=" fr main-c">
                        <a class="fws-hd" href="#" target="_blank">
                            <img src="{{asset('images/touxiang.jpg')}}" width="180" height="180"></a>
                        <a class="fws-name" href="#" target="_blank" style="padding:20px;font-size: 18px;">
                            网安所
                        </a>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                        <div class="service-content">
                            <div class="service_info">
                                <div class="fl" style="float: left;">所在地：</div>
                                <div class="locus"
                                     style="background: url({{asset('images/shop_680.png')}}) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                                <div style="float:left;overflow:hidden;height:30px;">北京</div>
                                <div class="clear"></div>
                            </div>
                                <div class="service_info">
                                    <div class="fl" style="float: left;">就读院校：</div>
                                    <div style="float:left;overflow:hidden;height:30px;">四川大学
                                        |
                                            博士及已上
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            <div class="service_info">
                                <div class="fl" style="float: left;">毕业院校：</div>
                                <div style="float:left;overflow:hidden;height:30px;">四川大学
                                    |
                                        博士及已上
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="service_info">
                                <div class="fl" style="float: left;margin-bottom: 1rem">
                                        <span class="am-badge am-badge-warning">
                                                支持线上或线下交易
                                        </span>
                                </div>
                                <div style="float:left;overflow:hidden;height:30px;">
                                        <span class="am-badge am-badge-warning">
                                                提供视频教程
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
                                            <img src="{{asset('images/head1.gif')}}"
                                                 style="width:150px;height:150px;">
                                            <p>雇主信息：<span>liyuxiao88</span></p>
                                        </div>
                                    </a>
                                    <div class="am-modal-bd">
                                        <label for="doc-ta-1"></label><br>
                                        {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                                        <textarea placeholder="请写上你想说的话" class="am-form-field am-radius"
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
                {{--<div class="container2" style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">--}}
                {{--<div class="other_fw_r" style="padding-top: 5px;padding-bottom: 40px;">--}}
                {{--<div class="twof-t" style="line-height: 30px;">--}}
                {{--<span class="csfw"--}}
                {{--style="padding-left: 0;float: left;font-size: 16px;padding-bottom: 10px;">本店其他热门服务</span>--}}
                {{--<div class="clear"></div>--}}
                {{--</div>--}}

                {{--<div class="anli-b">--}}
                {{--<div style="float:left;"><a href="fid-55380.html" target="_blank"><img--}}
                {{--src="http://p1.shopimg.680.com/2017-7/6/32017070614584559264_10442660.jpg"--}}
                {{--width="80" style="width: 80px;height: 80px;"></a></div>--}}
                {{--<div class="xxys"--}}
                {{--style="float: left;line-height: 25px;padding-left: 10px;font-weight: bold;padding-top: 0;width: 132px;">--}}
                {{--<a href="fid-55380.html" target="_blank"--}}
                {{--style="display: block;font-weight: 100;height: auto;padding-bottom: 5px;overflow: visible;color: #666;font-size: 14px;line-height: 20px;height: 25px;overflow: hidden;line-height: 25px;overflow: hidden;width: 130px;text-overflow: ellipsis;padding-left:5px;white-space: nowrap;">田园风格装修/复式楼/别墅/商品房</a><font--}}
                {{--style="font-weight: 100;color: #DF231B;font-size: 14px;">￥30</font>--}}
                {{--<div class="fw_r_i_cj">成交4次</div>--}}
                {{--</div>--}}

                {{--<div class="clear"></div>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--</div>--}}

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
@section('custom-script')
    <script src="{{asset("dist/amazeui.min.js")}}"></script>
    <script src="{{asset("js/amazeui.dialog.min.js")}}"></script>
    <script type="text/javascript">
        function buy() {
            $('#my-alert').modal({
                onConfirm: function () {
                    alert("您已完成购买！");
                }
            });
        }

        function leaveMsg() {
            $('#my-content').modal({
                onConfirm: function () {
                    alert("成功留言！");
                }
            });
        }
    </script>
@endsection
