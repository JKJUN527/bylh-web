@extends('demo.admin',['title'=>6])
@section('title','新闻动态')
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
                @foreach($data['newest'] as $news)
                    <div class="news-body" data-content="{{$news->nid}}">
                    @if($news->picture != null)
                        <?php
                        $pics = explode(';', $news->picture);
                        $baseurl = explode('@', $pics[0])[0];
                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                        $imagepath = explode('@', $pics[0])[1];
                        ?>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                                <img src="{{$baseurl}}{{$imagepath}}" class="newsImage">
                            </div>
                    @else
                        <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                            <img src="{{asset('images/touxiang.jpg')}}" class="newsImage">
                        </div>
                    @endif
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle">
                        {{mb_substr($news->title, 0, 30)}}
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt">
                            　{{str_replace(array("<br>","<br","<b","&nbsp","&nbs","&nb"),'',mb_substr($news->content, 0, 40))}}</p>
                    </div>
                    <div class="newsTail">
                        责任编辑：<span>admin</span>&nbsp;<span>新闻来源:{{$news->quote}}</span>&nbsp;&nbsp;&nbsp;发布时间：<span>{{mb_substr($news->created_at,0,10,'utf-8')}}</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                        </div>
                @endforeach
            </div>
            <!--分页-->
            <div class="pager_container" style="margin-left: 50px;">
                <nav>
                    {!! $data['newest']->render() !!}
                </nav>
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
                @foreach($data['hottest'] as $news)
                    <div class="news-hot" data-content="{{$news->nid}}">
                    @if($news->picture != null)
                        <?php
                        $pics = explode(';', $news->picture);
                        $baseurl = explode('@', $pics[0])[0];
                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                        $imagepath = explode('@', $pics[0])[1];
                        ?>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                                <img src="{{$baseurl}}{{$imagepath}}" class="newsImage2">
                            </div>
                    @else
                        <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding-bottom: 20px;">
                            <img src="{{asset('images/touxiang.jpg')}}" class="newsImage2">
                        </div>
                    @endif
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="padding-left: 20px;">
                    <div class="newsTitle2">
                        {{mb_substr($news->title, 0, 15)}}
                    </div>
                    <div class="newsContent">
                        <p class="newsCtnt2">
                            　{{str_replace(array("<br>","<br","<b","&nbsp","&nbs","&nb"),"",mb_substr($news->content, 0, 35))}}</p>
                    </div>
                    <div class="newsTail">
                        发布时间：<span>{{mb_substr($news->created_at,0,10,'utf-8')}}</span>
                    </div>
                </div>
                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                        </div>
               @endforeach

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
@section('custom-script')
    <script>
        $('.news-hot').click(function () {
            self.location = "/news/detail?nid=" + $(this).attr('data-content');
        });
        $('.news-body').click(function () {
            self.location = "/news/detail?nid=" + $(this).attr('data-content');
        });
    </script>
@endsection
