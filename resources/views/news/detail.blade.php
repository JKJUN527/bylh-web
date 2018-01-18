@extends('demo.admin')
@section('title','新闻详情')
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
        .newsImage{
            margin-left: 280px;
            width: 600px;
            height: 300px;
        }
        .newsCtnt{
            padding: 20px;
            font-size: 16px;
            text-align: left;
            overflow: hidden;
        }
        .newsTitle{
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
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
<!--新闻详情界面-->
<div class="am-g am-g-fixed" style="padding-top: 45px;">
    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
        <div class="am-container" style="border-bottom: 2px solid #eee;padding: 20px;background: #fff;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="newsTitle">
                关于对威客bowenpo的处罚公告
            </div>
            <hr data-am-widget="divider" class="am-divider am-divider-default"/>
            <div class="newsTail">
                | 责任编辑: &nbsp;<span>admin</span> &nbsp;|<i class="am-icon-calendar-check-o  am-icon-fw"></i>&nbsp;发布时间: &nbsp;<span>2018-01-17</span>|<i class="am-icon-tripadvisor  am-icon-fw" ></i>&nbsp;浏览量：&nbsp;<span></span>&nbsp;&nbsp;
            </div>

            <div class="newsContent">
                <p class="newsCtnt">
                    尊敬的不亦乐乎网用户：<br><br>
                    　　
                    　　                    您好！<br><br>
                    　　
                    　　不亦乐乎网作为威客模式运营网站的权威级代表者，始终坚守无规矩不成方圆的体制原则，致力于保护威客以及雇主利益，全心全意为客户服务、想客户所想，为所有用户创造一个良好公平的交易环境。但有个别威客，无视平台规则，损害用户利益，破坏正常交易秩序。对于这样的行为，不亦乐乎网将坚决打击。<br>
                <div class="newsImage">
                    <img src="{{asset('images/demo4.jpg')}}">
                </div>
                　　
                　　经查，威客“bowenpo” 在项目“436136”中，因为交稿后，与雇主意见产生分歧，对雇主进行语言攻击；其行为恶劣，情节严重，严重影响了平台的运营秩序和雇主的用户体验。不亦乐乎网针对辱骂雇主的行为零容忍，经研究决定，对威客“bowenpo”进行封号处理，并公告处理决定，以警戒其他威客。<br>
                </p>
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