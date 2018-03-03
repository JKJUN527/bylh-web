@extends('demo.admin3',['title'=>3,'subtitle'=>$data["detail"]->type])
@section('title','服务详情')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>--}}
    {{--<link href="{{asset('dist/amazeui.min.css')}}" rel="stylesheet" type="text/css"/>--}}
    <style type="text/css">
        .comcategory li {
            font-size: 14px;
            padding: 3px;
        }
        .comcategory li a:hover {
            color: #b84554;
        }

        .comcategory li i {
            color: gray;
            margin-left: 10px;
        }

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

        .demo li {
            float: none;
            width: 100%;
            padding: 0px 5px;
            border: none;
            height: 30px;
            line-height: 30px;
        }

        .service-content {
            text-align: center;
        }
        .service_title{
            padding-left: 2rem;
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
        .bg-jiage{
            background: url({{asset("images/value.png")}}) center;
            height: 100px;
            margin-top: 2rem;
        }
        .main-bc-btn{
            text-align: center;
            margin-top: 10%;
        }
        .jiage{
            font-size: 30px;
            font-weight: bold;
            font-family: microsoft yahei;
            color: #DF231B;
            float: left;
            padding-top: 31px;
        }
        .service_tab{
            font-weight: bold;
            font-size: 18px;
            padding-right: 1rem !important;
            padding-left: 1rem !important;
        }
        .am-comments-list .am-comment {
            margin: 1rem;
        }
        .service_info{
            color: #666;
            width: 230px;
            line-height: 30px;
            font-size: 14px;
            padding-top: 0;
        }
        .lx-btn{
            line-height: 30px;
            height: 40px;
            padding-bottom: 20px;
            text-align: center;
            margin-top: 1rem;
        }
        .answerdemand{
            margin-top: 20px;
            border-width: 2px;
            border-color: #e9e5e5;
            border-style: solid;
            background-color: #ffffff;
            box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);
            padding-left:24px;
            padding-top: 35px;
            padding-bottom: 20px;
            padding-right: 20px;
        }
        .form-group {
            margin-bottom: 16px;
            width: 100%;
        }
        .form-control {
            width: 100%;
            border-top-style: outset;
            border-block-end-color: tomato;
        }
        .help-info {
            float: right;
            color: red;
        }
        .buyfuwubtn{
            width: 50%;
        }
        .guessrequest{
            margin-top: 20px;
            border-width: 2px;
            border-color: #e9e5e5;
            border-style: solid;
            background-color: #ffffff;
            box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);
            padding-left:24px;
            padding-top: 35px;
            padding-bottom: 20px;
            padding-right: 20px;
        }

        .fr {
            text-align: center;
        }
        .service_content{
            float:left;
            overflow:hidden;
            height:30px;
            width: 50%;
            text-align: left;
        }
    </style>
@endsection
@section('content')
    <!--发布服务-->
    <div class="am-g am-g-fixed" style="padding-top: 85px;min-width: 1100px;">
        <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" style="border: 2px solid #eee;padding: 20px;background: #fff;">
            <div class="am-u-lg-6 am-u-md-6 am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
                <ul class="am-slides">
                    @if($data["detail"]->picture != null)
                        <?php
                        $pics = explode(';', $data["detail"]->picture);
                        $baseurl = explode('@', $pics[0])[0];
                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                        $temps = explode('@', $data["detail"]->picture);
                        ?>
                        @foreach($temps as $item)
                            @if(strstr($item,";"))
                                <?php $imagepath = explode(';', $item)[0];?>
                                <li><img src="{{$baseurl}}{{$imagepath}}" style="width:578px;height: 325px; "/></li>
                            @else
                                @continue
                            @endif
                        @endforeach
                    @else
                        <li><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg" /></li>
                        <li><img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" /></li>
                    @endif
                </ul>
            </div>
            <div class="am-u-lg-6 am-u-md-6 service_title">
                <h2 class="main-ba">
                    {{$data["detail"]->title}}
                </h2>
                <div class="main-bb">
                    <div class="bg-jiage">
                        <div class="fl" style="float: left; ">
                            <div class="bjia"
                                 style="float: left;color: #746C6C;padding-top: 41px;padding-left: 10px;line-height: 20px;height: 20px;font-size: 16px;">
                                价格：
                            </div>
                            <div class="jiage">
                                @if($data["detail"]->price == -1)
                                    价格面议
                                @else
                                    ￥{{$data["detail"]->price}}
                                    <span style="color:#666;font-size:14px;font-weight:100">
                                        @if($data["detail"]->price_type ==0)
                                            /小时
                                        @elseif($data["detail"]->price_type ==1)
                                            /天
                                        @elseif($data["detail"]->price_type ==2)
                                            /次
                                        @elseif($data["detail"]->price_type ==3)
                                            /套
                                        @elseif($data["detail"]->price_type ==4)
                                            /其他
                                        @endif
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="fr cj_rr" style="height: 30px;line-height: 30px;padding-top: 40px;color: #777;padding-right: 80px;float: right;">
                            成交：<b>{{$data['ordernum']}}</b>笔
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="main-bc-btn">
                        <a class="btn-a buyfuwubtn">
                            <button class="am-btn am-btn-danger am-btn-lg js-alert" type="button" style="width: 50%;" onclick="buy()">
                                <i class="am-icon-shopping-cart"></i>
                                立即购买
                            </button>
                        </a>
                        <div class="clear"></div>
                    </div>
                    <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert" style="margin-top: -150px;">
                        <div class="am-modal-dialog">
                            <div class="am-modal-bd">
                                <div>
                                    <div class="service-title" style="font-size: 20px;font-weight: bold;padding: 20px;">
                                        <input type="hidden" id="service_info" data-content="{{$data["detail"]->type}}" value="{{$data["detail"]->id}}"/>
                                        <a href="#">服务商名称：<span style="font-size: 18px;">{{$data['serviceinfo']['ename']}}</span></a>
                                    </div>
                                    <a href="#"><img src="{{$data['serviceinfo']['pay_code']}}"
                                                     style="width:300px;height:300px;"></a>
                                    @if($data['serviceinfo']['pay_way'] == 0)
                                        <div class="alibaba" type="1" style="font-size: 18px;background: #fff;font-weight: bold;padding: 20px;">请使用微信扫码支付</div>
                                    @elseif($data['serviceinfo']['pay_way'] == 1)
                                        <div class="alibaba" type="2" style="font-size: 18px;background: #fff;font-weight: bold;padding: 20px;">请使用支付宝扫码支付</div>
                                    @endif
                                </div>
                                <div class="am-modal-footer">
                                    <span class="am-modal-btn am-btn-lg" data-am-modal-confirm>确认支付</span>
                                    <span class="am-modal-btn am-btn-lg" data-am-modal-cancel>取消支付</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="am-g am-fixed" style="margin-top: 20px;">
        <div class="am-container">
            <div class="am-u-1g-12 am-u-md-12 am-u-sm-12" style="margin:10px;">
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9"
                     style="border: 2px solid #eee;padding: 20px;background: #fff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
                    <div class="am-tabs" data-am-tabs style="margin:10px;">
                        <ul class="am-tabs-nav am-nav am-nav-tabs" style="margin:10px;">
                            <li class="@if($data['tab_detail'] == 0) am-active @endif">
                                <a class="service_tab" href="#tab1">服务详情</a>
                            </li>
                            <li class="@if($data['tab_detail'] == 1) am-active @endif">
                                <a class="service_tab" href="#tab2">历史问答</a>
                            </li>
                            <li class="@if($data['tab_detail'] == 2) am-active @endif">
                                <a class="service_tab" href="#tab3">成交记录</a>
                            </li>
                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade @if($data['tab_detail'] == 0) am-in am-active @endif" id="tab1">
                                <span style="color: #b84554;">温馨提示：购买服务，不亦乐乎不收取任何费用，请勿相信服务商任何理由的加价交易行为。</span><br>
                                <span style="font-size: 1.3rem">服务详情：</span>
                                <p style="font-size:15px;line-height: 24px;">
                                    {!! $data["detail"]->describe !!}
                                </p>
                                <span style="font-size: 1.3rem">服务者自述：</span>
                                <p style="font-size:15px;line-height: 24px;margin-left: 2rem;">
                                    {!! $data['serviceinfo']['brief'] !!}
                                </p>
                                <div class="guessrequest">
                                    <div class="title"
                                         style="font-family: 'Microsoft YaHei';color: #333;font-size: 24px;font-weight: 400;line-height: 24px;">
                                        <span class="sign" style="padding: 0px 3px;background-color: #ff8a00;margin-right: 15px;"></span>提问列表
                                    </div>
                                    <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                                    <div class="moreItems">
                                        <ul class="am-comments-list am-comments-list-flip">
                                            @foreach($data['qarecord'] as $record)
                                                @if($record->question != "" &&($record->questioner == $data['uid']||$record->respondent == $data['uid']))
                                                    <li class="am-comment">
                                                        <article class="am-comment">
                                                            <a href="/service/getAllservices?uid={{$record->questioner}}">
                                                                <img src="{{$record->photo}}
                                                                        " alt="" class="am-comment-avatar" width="48" height="48"/>
                                                            </a>
                                                            <div class="am-comment-main">
                                                                <header class="am-comment-hd">
                                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                    <div class="am-comment-meta">
                                                                        <a href="#link-to-user" class="am-comment-author">{{$record->username}}</a>
                                                                        提问时间 <time>{{$record->created_at}}</time>
                                                                    </div>
                                                                </header>

                                                                <div class="am-comment-bd">
                                                                    {{$record->question}}
                                                                </div>
                                                                @if($record->answer == "" && $record->respondent == $data['uid'])
                                                                    <button type="button" class="am-btn am-btn-warning" style="float: right" onclick="answer({{$record->id}});">回答问题</button>
                                                                @endif
                                                            </div>
                                                        </article>
                                                    </li>
                                                @endif
                                                @if($record->answer != "" && ($record->questioner == $data['uid']||$record->respondent == $data['uid']))
                                                    <li class="am-comment am-comment-flip am-comment-highlight">
                                                        <article class="am-comment">
                                                            <a href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}">
                                                                <img src="{{$data['serviceinfo']['elogo']}}
                                                                        " alt="" class="am-comment-avatar" width="48" height="48"/>
                                                            </a>
                                                            <div class="am-comment-main">
                                                                <header class="am-comment-hd">
                                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                    <div class="am-comment-meta">
                                                                        <a href="#link-to-user" class="am-comment-author">{{$data['serviceinfo']['ename']}}</a>
                                                                        回答时间 <time>{{$record->updated_at}}</time>
                                                                    </div>
                                                                </header>

                                                                <div class="am-comment-bd">
                                                                    @if($record->status == 1 || $record->respondent == $data['uid'] || $data['is_vipuser'] ==1)
                                                                        {{$record->answer}}
                                                                    @else
                                                                        *****
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--分页-->
                                    <div class="pager_container" style="margin-left: 50px;">
                                        <nav>
                                            {!! $data['qarecord']->appends(['id'=>$data['detail']->id,'type'=>$data['detail']->type,'tab_detail'=>0])->render() !!}
                                        </nav>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="answerdemand" id="answer_panl" style="display: @if($data['uid'] == $data['detail']->uid) none @else block @endif">
                                    <form id="comment-form" method="post" >
                                        <input type="hidden" name="type" data-content="{{$data['detail']->id}}" value=
                                        @if($data['uid'] == $data['detail']->uid)
                                                "answer"
                                        @else
                                            "question"
                                        @endif/>
                                        <div class="form-group">
                                            <div class="form-line">
                            <textarea rows="2" class="form-control" name="content"
                                      id="additional-content"
                                      placeholder="写点什么..."></textarea>
                                            </div>
                                            <div class="help-info" id="comment-help">还可输入114字</div>
                                            <label class="error" for="additional-content"></label>
                                        </div>

                                        <button id="btn-comment" type="button" class="am-btn am-btn-warning">
                                            确认
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="am-tab-panel am-fade @if($data['tab_detail'] == 1) am-in am-active @endif" id="tab2">
                                <div class="buyer_pj" style="display: block;">
                                    <p style="font-size:15px;line-height: 24px;">
                                        <span style="color: #b84554;">温馨提示：购买该用户的服务超过五次，你将可以免费查看该服务用户的所有专业回答。</span><br>
                                    </p>
                                    <div class="pl-cont">
                                        <div class="clear"></div>
                                        <div class="moreItems">
                                            <ul class="am-comments-list am-comments-list-flip">
                                                @foreach($data['qahistory'] as $record)
                                                    @if($record->question != "" && $record->answer != "")
                                                        <li class="am-comment">
                                                            <article class="am-comment">
                                                                <a href="/service/getAllservices?uid={{$record->questioner}}">
                                                                    <img src="{{$record->photo}}
                                                                            " alt="" class="am-comment-avatar" width="48" height="48"/>
                                                                </a>
                                                                <div class="am-comment-main">
                                                                    <header class="am-comment-hd">
                                                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                        <div class="am-comment-meta">
                                                                            <a href="#link-to-user" class="am-comment-author">{{$record->username}}</a>
                                                                            提问时间 <time>{{$record->created_at}}</time>
                                                                        </div>
                                                                    </header>

                                                                    <div class="am-comment-bd">
                                                                        {{$record->question}}
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </li>
                                                        <li class="am-comment am-comment-flip am-comment-highlight">
                                                            <article class="am-comment">
                                                                <a href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}">
                                                                    <img src="{{$data['serviceinfo']['elogo']}}
                                                                            " alt="" class="am-comment-avatar" width="48" height="48"/>
                                                                </a>
                                                                <div class="am-comment-main">
                                                                    <header class="am-comment-hd">
                                                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                        <div class="am-comment-meta">
                                                                            <a href="#link-to-user" class="am-comment-author">{{$data['serviceinfo']['ename']}}</a>
                                                                            回答时间 <time>{{$record->updated_at}}</time>
                                                                        </div>
                                                                    </header>

                                                                    <div class="am-comment-bd">
                                                                        @if($record->respondent == $data['uid'] ||$data['is_vipuser'] ==1)
                                                                            {{$record->answer}}
                                                                        @else
                                                                            *****
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!--分页-->
                                        <div class="pager_container" style="margin-left: 50px;">
                                            <nav>
                                                {!! $data['qahistory']->appends(['id'=>$data['detail']->id,'type'=>$data['detail']->type,'tab_detail'=>1])->render() !!}
                                            </nav>
                                        </div>
                                        <div style="height:30px"></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-tab-panel am-fade @if($data['tab_detail'] == 2) am-in am-active @endif" id="tab3">
                                <div class="trade_datalist" style="display: block;">
                                    <div class="gettradeorder_datalist" style="padding: 20px 15px">

                                        <table class="jilu-jy" border="0" cellpadding="0" cellspacing="0"
                                               style="width: 100%;">
                                            <tbody>
                                            <tr>
                                                <th height="26" class="tit"
                                                    style="width: 33.3%;font-size: 16px;padding: 7px 10px;">买家
                                                </th>
                                                <th class="money"
                                                    style="width: 33.3%;font-size: 16px;padding: 7px 10px;">成交价
                                                </th>
                                                <th class="time-cj"
                                                    style="width: 33.3%;font-size: 16px;padding: 7px 10px;">成交时间
                                                </th>
                                            </tr>
                                            @foreach($data['orderinfo'] as $order)
                                                <tr>
                                                    <td height="26" class="tit"
                                                        style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                        {{$order->username}}
                                                    </td>
                                                    <td class="money"
                                                        style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                        ￥{{$order->price}}
                                                    </td>
                                                    <td class="time-cj"
                                                        style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                        {{$order->created_at}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="look"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3">
                    <div class="container1"
                         style="border: 2px solid #eee;padding: 20px;background: #fff;">
                        <div class=" fr main-c">
                            <a class="fws-hd" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank">
                                <img src="{{$data['serviceinfo']['elogo']}}" width="180" height="180"></a>
                            <a class="fws-name" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank" style="padding:20px;font-size: 18px;">
                                {{$data['serviceinfo']['ename']}}
                            </a>
                            <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                            <div class="service-content">
                                <div class="service_info">
                                    <div class="fl" style="float: left;text-align: center;">所在地：</div>
                                    <div class="locus" style="background: url({{asset('images/shop_680.png')}}) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                                    <div style="float:left;overflow:hidden;height:30px;">{{$data['serviceinfo']['city']}}</div>
                                    <div class="clear"></div>
                                </div>
                                <div class="service_info">
                                    <div class="fl" style="float: left;"><strong>从事专业：</strong></div>
                                    <div class="service_content">{{$data['serviceinfo']['current_profession']}}</div>
                                    <div class="fl" style="float: left;"><strong>服务单位：</strong></div>
                                    <div class="service_content">{{$data['serviceinfo']['workplace']}}</div>
                                    <div class="fl" style="float: left;"><strong>专业身份：</strong></div>
                                    <div class="service_content">{{$data['serviceinfo']['identity']}}</div>
                                    <div class="fl" style="float: left;"><strong>专业证书：</strong></div>
                                    <div class="service_content">{{$data['serviceinfo']['certificate_name']}}</div>
                                    <div class="clear"></div>
                                </div>
                                <div class="service_info">
                                    <div style="float:left;overflow:hidden;height:30px;">
                                    <span class="am-badge am-badge-warning">
                                    @if($data['serviceinfo']['has_video'] ==0)
                                            不提供视频教程
                                        @else
                                            提供视频教程
                                        @endif
                                    </span>
                                    </div>
                                    <div class="fl" style="float: left;margin-bottom: 1rem">
                                    <span class="am-badge am-badge-warning">
                                    @if($data['serviceinfo']['is_offline'] ==0)
                                            仅支持线下交易
                                        @elseif($data['serviceinfo']['is_offline'] ==1)
                                            仅支持线上交易
                                        @else
                                            支持线上或线下交易
                                        @endif
                                    </span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="lx-btn">
                                    <button type="button" class="am-btn am-btn-danger am-btn-lg" style="width: 80%;"
                                            onclick="leaveMsg()">和我联系
                                    </button>
                                    <div class="clear"></div>
                                </div>
                                <div class="am-modal am-modal-alert" tabindex="-1" id="my-content"
                                     style="margin-top: -200px;">
                                    <div class="am-modal-dialog">
                                        <div class="am-modal-hd">和我联系</div>
                                        <a href="#">
                                            <div class="serviceMsg">
                                                <img src="{{$data['serviceinfo']['elogo']}}"
                                                     style="width:150px;height:150px;">
                                                <p id="userinfo" data-content="{{$data['serviceinfo']['uid']}}">服务商名称：<span>{{$data['serviceinfo']['ename']}}</span></p>
                                            </div>
                                        </a>
                                        <div class="am-modal-bd">
                                            <label for="doc-ta-1"></label><br>
                                            {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                                            <textarea id="leave_mesg" placeholder="请写上你想说的话" class="am-form-field am-radius"
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
@section('custom-script')
    <script src="{{asset("dist/amazeui.min.js")}}"></script>
    <script src="{{asset("js/amazeui.dialog.min.js")}}"></script>
    <script type="text/javascript">
        function buy() {
            $('#my-alert').modal({
                onConfirm: function () {
                    var service_info = $("#service_info");
                    var formData = new FormData();
                    formData.append("sid", service_info.val());
                    formData.append("type", service_info.attr('data-content'));

                    $.ajax({
                        url: "/order/ConfirmPayment",
                        type: "post",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            //console.log(data);
                            var result = JSON.parse(data);
                            if (result.status == 200) {
                                swal("","支付成功，等待服务商确认收款","success");
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }else{
                                swal('',result.msg,'error');
                            }
                        }
                    });
                }
            });
        }
        var maxSize = 114;

        $(".form-control").focus(function () {
            $(this.parentNode).addClass("focused");
        }).blur(function () {
            $(this.parentNode).removeClass("focused");
        });

        $('textarea').keyup(function () {

            var length = $(this).val().length;
            if (length > maxSize) {
                $(".error[for='additional-content']").html("内容超过114字");
                $("#btn-comment").prop("disabled", true);
            } else {
                $(".error[for='additional-content']").html("");
                $("#btn-comment").prop("disabled", false);
            }

            $("#comment-help").html("还可输入" + (maxSize - length < 0 ? 0 : maxSize - length) + "字");

        });

        var answerpanl = $('#answer_panl');

        $('#btn-comment').click(function () {
            var type = $('input[name=type]');
            var demandview = $('#additional-content');
            var id = type.attr('data-content');
            if(demandview.val().length <=0){
                swal("","评论为空","error");
                return;
            }
            if(demandview.val().length > maxSize){
                swal("字数超过最大值"+maxSize);
                return;
            }
            var formData = new FormData();
            if(type.val() ==="question"){//提问
                formData.append("qaserviceid", id);
                formData.append("content", demandview.val());
                $.ajax({
                    url: "/service/recordQa",
                    type: "post",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        var result = JSON.parse(data);
                        if(result.status == 400){
                            swal("",result.msg,"error");
                        }else{
                            swal("","提问成功","success");
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            }
            if(type.val() ==="answer"){//回答
                formData.append("recordid", id);
                formData.append("content", demandview.val());
                $.ajax({
                    url: "/service/recordQa",
                    type: "post",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        var result = JSON.parse(data);
                        if(result.status == 400){
                            swal("",result.msg,"error");
                        }else{
                            swal("","回答成功","success");
                            answerpanl.css('display','none');
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        });
        function answer(recordid) {
            answerpanl.css('display','block');
            var type = $('input[name=type]');
            type.attr('data-content',recordid);
        }

        function leaveMsg() {
            $('#my-content').modal({
                onConfirm: function () {
                    var leave_mesg = $('#leave_mesg');
                    var to_id = $('#userinfo').attr('data-content');
                    if(leave_mesg.val().length >=250){
                        swal("","字数不能超过250字","error");
                        return;
                    }
                    var formData = new FormData();
                    formData.append("content", leave_mesg.val());
                    formData.append("to_id", to_id);
                    $.ajax({
                        url: "/message/sendMessage",
                        type: "post",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            //console.log(data);
                            var result = JSON.parse(data);
                            if (result.status == 200) {
                                swal("","留言成功","success");
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }else{
                                swal('',result.msg,'error');
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
