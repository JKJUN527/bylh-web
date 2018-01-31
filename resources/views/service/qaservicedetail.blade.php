@extends('demo.admin',['title'=>3,'subtitle'=>$data["detail"]->type])
@section('title','服务详情')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
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

        .gzyx_1 {
            background: #F7CCA2;
        }

        .gzyx_2 {
            background: #97DC8E;
        }

        .gzyx_3 {
            background: #C7B5F3;
        }

        .gzyx_4 {
            background: #88DEE8;
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
            padding-left: 20px;
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
    </style>
@endsection
@section('content')
    <!--发布服务-->
    <div class="am-g am-g-fixed" style="padding-top: 45px;">
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
                                    <span style="color:#666;font-size:14px;font-weight:100">/次</span>
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
                        <a class="btn-a buyfuwubtn" href="#"><button class="am-btn am-btn-danger am-btn-lg js-alert" type="button" style="width: 50%;" onclick="buy()">立即购买</button></a>
                        <div class="clear"></div>
                    </div>
                    <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
                        <div class="am-modal-dialog">
                            <div class="am-modal-bd" style="margin-top: 40%;">
                                <div>
                                    <div class="service-title" style="font-size: 20px;font-weight: bold;padding: 20px;">
                                        <a href="#">服务商信息：<span style="font-size: 18px;">米旭品牌设计</span></a>
                                    </div>
                                    <a href="#" ><img src="../images/wechat.png" style="width:300px;height:300px;"></a>
                                    <div class="wechat" type="1" style="display: none;">请使用微信支付</div>
                                    <div class="alibaba" type="2" style="font-size: 18px;background: #fff;font-weight: bold;padding: 20px;">请使用支付宝支付</div>
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
            <div class="am-u-1g-12 am-u-md-12 am-u-sm-12">
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9"
                     style="border: 2px solid #eee;padding: 20px;background: #fff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
                    <div class="am-tabs" data-am-tabs style="margin:10px;">
                        <ul class="am-tabs-nav am-nav am-nav-tabs" style="margin:10px;">
                            <li class="am-active">
                                <a class="service_tab" href="#tab1">服务详情</a>
                            </li>
                            <li>
                                <a class="service_tab" href="#tab2">历史问答</a>
                            </li>
                            <li>
                                <a class="service_tab" href="#tab3">成交记录</a>
                            </li>
                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <p style="font-size:15px;line-height: 24px;">
                                    <span style="color: #b84554;">温馨提示：购买服务，不亦乐乎不收取任何费用，请勿相信服务商任何理由的加价交易行为。</span><br>
                                    {!! $data["detail"]->describe !!}
                                </p>
                            </div>
                            <div class="am-tab-panel am-fade" id="tab2">
                                <div class="buyer_pj" style="display: block;">

                                    <div class="pl-cont">
                                        <div class="clear"></div>
                                        <div class="info_pj_datalist" style="padding-left: 10px;">
                                            @foreach($data['qarecord'] as $record)
                                                @if($record->question != "" && $record->answer != "")
                                                    <li class="am-comment" style="margin-bottom: 1rem;width: 90%;">
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
                                                    <li class="am-comment am-comment-flip am-comment-highlight" style="margin-bottom: 1rem;width: 90%;float: right;">
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
                                                                        *****
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </li>
                                                @endif

                                            @endforeach
                                            <div class="clear"></div>
                                        </div>
                                        <div style="height:30px"></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-tab-panel am-fade" id="tab3">
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
                    <div class="guessrequest">
                        <div class="title"
                             style="font-family: 'Microsoft YaHei';color: #333;font-size: 24px;font-weight: 400;line-height: 24px;">
                            <span class="sign" style="padding: 0px 3px;background-color: #ff8a00;margin-right: 15px;"></span>提问列表
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                        <div class="moreItems">
                            <ul class="am-comments-list am-comments-list-flip">
                                @foreach($data['qarecord'] as $record)
                                    @if($record->question != "" &&$record->questioner == $data['uid'])
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
                                    @endif
                                    @if($record->answer != "" && $record->questioner == $data['uid'])
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
                                                            @if($record->status == 1)
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
                    </div>
                    <div class="clear"></div>
                    <div class="answerdemand">
                        <form id="comment-form" method="post" >
                            <input type="hidden" name="did" value="{{$data["detail"]->id}}"/>
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
                                评论
                            </button>
                        </form>
                    </div>
                </div>
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3">
                    <div class="container1"
                         style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;">
                        <div class=" fr main-c">
                            <a class="fws-hd" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank">
                                <img src="{{$data['serviceinfo']['elogo']}}" width="180" height="180"></a>
                            <a class="fws-name" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank" style="padding:20px;font-size: 18px;">
                                {{$data['serviceinfo']['ename']}}
                            </a>
                            <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                            <div class="service_info">
                                <div class="fl" style="float: left;">所在地：</div>
                                <div class="locus" style="background: url({{asset('images/shop_680.png')}}) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                                <div style="float:left;overflow:hidden;height:30px;">{{$data['serviceinfo']['city']}}</div>
                                <div class="clear"></div>
                            </div>
                            @if($data['serviceinfo']['current_edu'] !="")
                                <div class="service_info">
                                    <div class="fl" style="float: left;">就读院校：</div>
                                    <div style="float:left;overflow:hidden;height:30px;">{{explode('@',$data['serviceinfo']['current_edu'])[0]}} |
                                        @if(explode('@',$data['serviceinfo']['current_edu'])[1] == 0)
                                            博士及已上
                                        @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 1)
                                            硕士
                                        @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 2)
                                            学士
                                        @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 1)
                                            高中及以下
                                        @endif
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            @endif
                            <div class="service_info">
                                <div class="fl" style="float: left;">毕业院校：</div>
                                <div style="float:left;overflow:hidden;height:30px;">{{explode('@',$data['serviceinfo']['graduate_edu'])[0]}} |
                                    @if(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 0)
                                        博士及已上
                                    @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 1)
                                        硕士
                                    @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 2)
                                        学士
                                    @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 1)
                                        高中及以下
                                    @endif
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="service_info">
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
                                <div style="float:left;overflow:hidden;height:30px;">
                                    <span class="am-badge am-badge-warning">
                                    @if($data['serviceinfo']['has_video'] ==0)
                                            不提供视频教程
                                        @else
                                            提供视频教程
                                        @endif
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="lx-btn">
                                <button type="button" class="am-btn am-btn-danger am-btn-lg" style="width: 80%;">和我联系
                                </button>
                                <div class="clear"></div>
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
        $('.js-alert').on('click',function(){
            AMUI.dialog.alert({
                title: '扫一扫微信，完成支付',
                content: '<a href="#" style="width:220px;height:220px;"><img src="../images/wechat.png"></a>',
                onConfirm: function() {
                    console.log('close');
                }
            });
        });
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
        $('#btn-comment').click(function () {
            var did = $('input[name=did]').val();
            var demandview = $('#additional-content');
            if(demandview.val().length <=0){
                swal("","评论为空","error");
                return;
            }
            if(demandview.val().length > maxSize){
                swal("字数超过最大值"+maxSize);
                return;
            }
            var formData = new FormData();
            formData.append("did", did);
            formData.append("review", demandview.val());

            $.ajax({
                url: "/demands/reviewDemand",
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
                        swal("","评论成功","success");
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                }
            });
        });
    </script>
@endsection
