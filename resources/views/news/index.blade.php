@extends('demo.admin')
@section('title','新闻大厅')
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
        .newsHead{
            padding-left: 10px;
            font-size: 18px;
            font-weight: bold;
            border-left: 8px solid #f03726;
        }
        .hotNews{
            padding-left: 10px;
            font-size: 18px;
            font-weight: bold;
            border-left: 8px solid #f03726;
        }
        .newsImage{
            width: 160px;
            height: 160px;
        }
        .newsImage2{
            width: 100px;
            height: 100px;
        }
        .newsCtnt{
            font-size: 16px;
            height: 65px;
            text-align: left;
            overflow: hidden;
        }
        .newsCtnt2{
            font-size: 15px;
            height: 40px;
            text-align: left;
            overflow: hidden;
        }
        .newsTitle{
            font-size: 18px;
            font-weight: bold;
            text-align: left;
            padding: 10px;
        }
        .newsTitle2{
            font-size: 16px;
            font-weight: bold;
            text-align: left;
            padding: 5px;
        }
        .newsTail{
            text-align: right;
            color: #999;
            margin-top: 30px;
        }
    </style>
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--新闻界面-->
<div class="am-g am-g-fixed" style="padding-top: 45px;">
    <div class="am-u-lg-8 am-u-md-8 am-u-sm-8">
        <div class="am-container" style="border-bottom: 2px solid #eee;padding: 20px;background: #fff;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="newsHead">
                最新资讯
            </div>
            <hr data-am-widget="divider" class="am-divider am-divider-danger" style="border-top: 2px solid #d2364c;" />
            <div class="am-g am-g-fixed allNews">
                <!--公告1-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        责任编辑：<span>admin</span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                <!--公告1-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        责任编辑：<span>admin</span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                <!--公告1-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为
                            所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        责任编辑：<span>admin</span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                <!--公告1-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        责任编辑：<span>admin</span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>           						<!--公告1-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        责任编辑：<span>admin</span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
            </div>
            <!--分页-->
            <div class="pager_container" style="margin-left: 50px;">
                <ul data-am-widget="pagination"
                    class="am-pagination am-pagination-default">

                    <li class="am-pagination-first ">
                        <a href="#" class="">第一页</a>
                    </li>

                    <li class="am-pagination-prev ">
                        <a href="#" class="">上一页</a>
                    </li>
                    <li class="">
                        <a href="#" class="">1</a>
                    </li>
                    <li class="am-active">
                        <a href="#" class="am-active">2</a>
                    </li>
                    <li class="">
                        <a href="#" class="">3</a>
                    </li>
                    <li class="">
                        <a href="#" class="">4</a>
                    </li>
                    <li class="">
                        <a href="#" class="">5</a>
                    </li>
                    <li class="am-pagination-next ">
                        <a href="#" class="">下一页</a>
                    </li>
                    <li class="am-pagination-last ">
                        <a href="#" class="">最末页</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="am-container" style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="hotNews">
                热门资讯
            </div>
            <hr data-am-widget="divider"  class="am-divider am-divider-danger" style="border-top: 2px solid #d2364c;" />
            <div class="am-g am-g-fixed allhotNews">
                <!--公告2-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage2">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle2">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt2">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                <!--公告2-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage2">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle2">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt2">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                <!--公告2-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage2">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle2">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt2">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为
                            所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                <!--公告2-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage2">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle2">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt2">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为
                            所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                <!--公告2-->
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                    <img src="{{asset('images/touxiang.jpg')}}" class="newsImage2">
                </div>
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle2">
                        关于对威客bowenpo的处罚公告
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt2">
                            　时间财富网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为
                            所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，时间财富网将坚决打击。</p>
                    </div>
                    <div class="newsTail">
                        发布时间：<span>2018-1-17</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
            </div>
        </div>
    </div>

</div>
<!--广告-->
<div class="advertisement" style="padding: 10px;width: 50%;float: left;">
    <img src="{{asset('images/ad4.jpg')}}" alt="">
</div>
<div class="advertisement" style="padding: 10px;width: 50%;float: right;">
    <img src="{{asset('images/ad5.jpg')}}" alt="">
</div>
@endsection
