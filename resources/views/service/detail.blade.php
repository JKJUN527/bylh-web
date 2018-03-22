@extends('demo.admin3',['title'=>3,'subtitle'=>$data["detail"]->type])
@section('title','服务详情')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    {{--<link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{asset('bootstrap-4.0.0-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>--}}
    <style type="text/css">
        .long-title{
            display:none;
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
        .service_content{
            float:left;
            overflow:hidden;
            height:30px;
            width: 50%;
            font-size: smaller;
            text-align: left;
        }
        .complaint h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .complaint form{
            margin-top: 1rem;
        }
    </style>
@endsection
@section('content')
    <!--发布服务-->
    <div class="am-g am-g-fixed" style="padding-top: 85px;">
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
                                        @if($data["detail"]->price_type == 0)
                                            /小时
                                        @elseif($data["detail"]->price_type == 1)
                                            /天
                                        @elseif($data["detail"]->price_type == 2)
                                            /次
                                        @elseif($data["detail"]->price_type == 3)
                                            /套
                                        @elseif($data["detail"]->price_type == 4)
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
    <div class="am-g am-fixed" style="margin-left:10px;margin-top: 20px;">
    <div class="am-container">
        <div class="am-u-1g-12 am-u-md-12 am-u-sm-12">
            <div class="am-u-lg-9 am-u-md-9 am-u-sm-9" style="border: 2px solid #eee;padding: 20px;background: #fff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
                <div class="am-tabs" data-am-tabs style="margin:10px;">
                    <ul class="am-tabs-nav am-nav am-nav-tabs" style="margin:10px;">
                        <li @if($data['tab_detail']== 0) class="am-active" @endif ><a href="#tab1" style="font-weight: bold;font-size: 18px;margin-right: 50px;">服务详情</a></li>
                        <li @if($data['tab_detail']== 1) class="am-active" @endif><a href="#tab2" style="font-weight: bold; font-size: 18px;margin-right: 50px;">雇主评论</a></li>
                        <li @if($data['tab_detail']== 2) class="am-active" @endif><a href="#tab3" style="font-weight: bold;font-size: 18px;margin-right: 50px;">成交记录</a></li>
                        <li @if($data['tab_detail']== 3) class="am-active" @endif><a href="#tab4" style="font-weight: bold;font-size: 18px;margin-right: 50px;">投诉建议</a></li>
                    </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade @if($data['tab_detail']== 0) am-active am-in @endif" id="tab1">
                                <span style="color: #b84554;">温馨提示：购买服务，不亦乐乎不收取任何费用，请勿相信服务商任何理由的加价交易行为。</span><br>
                                <span style="font-size: 1.3rem">服务详情：</span>
                                <p style="font-size:15px;line-height: 24px;margin-left: 2rem;">
                                    {!! $data["detail"]->describe !!}
                                </p>
                                <span style="font-size: 1.3rem">服务者自述：</span>
                                <p style="font-size:15px;line-height: 24px;margin-left: 2rem;">
                                    {!! $data['serviceinfo']['brief'] !!}
                                </p>

                            </div>
                            <div class="am-tab-panel am-fade @if($data['tab_detail']== 1) am-active am-in @endif" id="tab2">
                                <div class="buyer_pj" style="display: block;">

                                    <div class="pl-cont">
                                        {{--<div class="pl-bg"--}}
                                        {{--style="background: #fff;width: auto;border: none;border-bottom: solid 2px #ddd;height: auto;">--}}
                                        {{--<div class="pj-a"--}}
                                        {{--style="height: 100px;padding-left: 70px;border-right: none; padding-top: 33px; float: left;text-align: center;">--}}
                                        {{--<div style="font-size:14px;color:#999">综合评分</div>--}}
                                        {{--<div style="font-size:24px; font-weight:bold; color:#DF231B; font-family:微软雅黑">--}}
                                        {{--5--}}
                                        {{--</div>--}}

                                        {{--<div title="服务评价：1人评价" class="pf_5 mt5"--}}
                                        {{--style="background:url(../images/pingfen2.png) no-repeat;background-position: 0 0px; width: 60px;height: 12px;display: block;float: left;"></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="pj-b"--}}
                                        {{--style="float: right;padding-left: 0;height: 80px;padding-top: 33px;">--}}
                                        {{--<div class="fl pj_i_im"--}}
                                        {{--style="height: 30px;line-height: 30px;width: 264px;font-size: 14px;color: #555;">--}}
                                        {{--作品创意：5分<span class="pj_ii_t" data="5" style="padding-left: 20px;">比同行平均水平<b--}}
                                        {{--style="background: #DF231B;color: #fff;font-weight: 100;padding: 0 3px;margin-left: 6px;">高</b></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="fl pj_i_im"--}}
                                        {{--style="height: 30px;line-height: 30px;width: 264px;font-size: 14px;color: #555;">--}}
                                        {{--完成质量：5分<span class="pj_ii_t" data="5" style="padding-left: 20px;">比同行平均水平<b--}}
                                        {{--style="background: #DF231B;color: #fff;font-weight: 100;padding: 0 3px;margin-left: 6px;">高</b></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="fl pj_i_im"--}}
                                        {{--style="height: 30px;line-height: 30px;width: 264px;font-size: 14px;color: #555;">--}}
                                        {{--服务态度：5分<span class="pj_ii_t" data="5" style="padding-left: 20px;">比同行平均水平<b--}}
                                        {{--style="background: #DF231B;color: #fff;font-weight: 100;padding: 0 3px;margin-left: 6px;">高</b></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="fl pj_i_im"--}}
                                        {{--style="height: 30px;line-height: 30px;width: 264px;font-size: 14px;color: #555;">--}}
                                        {{--工作速度：5分 <span class="pj_ii_t" data="5" style="padding-left: 20px;">比同行平均水平<b--}}
                                        {{--style="background: #DF231B;color: #fff;font-weight: 100;padding: 0 3px;margin-left: 6px;">高</b></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="clear"></div>--}}


                                        {{--<div>--}}
                                        {{--<div class="clear"></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="clear"></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="clear"></div>--}}

                                        {{--<div class="fw_gz_jj">--}}
                                        {{--<div class="fw_gz_jj_t"--}}
                                        {{--style="height: 30px;line-height: 30px;font-size: 16px;color: #555;padding-bottom: 9px;">--}}
                                        {{--雇主对TA的印象--}}
                                        {{--</div>--}}
                                        {{--<div class="fw_gz_jj_li">--}}
                                        {{--<span class="gzyx_1"--}}
                                        {{--style="float: left;margin-left: 3px;color: #fff;padding: 2px 9px;font-size: 14px;">专业</span>--}}
                                        {{--<span class="gzyx_2"--}}
                                        {{--style="float: left;margin-left: 3px;color: #fff;padding: 2px 9px;font-size: 14px;">质量很高</span>--}}
                                        {{--<span class="gzyx_3"--}}
                                        {{--style="float: left;margin-left: 3px;color: #fff;padding: 2px 9px;font-size: 14px;">性价比高</span>--}}
                                        {{--<span class="gzyx_4"--}}
                                        {{--style="float: left;margin-left: 3px;color: #fff;padding: 2px 9px;font-size: 14px;">服务周到</span>--}}
                                        {{--<div class="clear"></div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="clear"></div>


                                        <div class="info_pj_datalist" style="padding-left: 10px;">

                                            @foreach($data["review"] as $re)
                                                <div class="pl-cont-two" style="padding-top: 20px;">
                                                    <ul class="am-comments-list am-comments-list-flip">
                                                        <li class="am-comment am-comment-highlight">
                                                            <article class="am-comment"> <!-- 评论容器 -->
                                                                <a href="/service/getAllservices?uid{{$re->uid}}">
                                                                    <img class="am-comment-avatar" alt="" src="{{$re->photo}}"/> <!-- 评论者头像 -->
                                                                </a>

                                                                <div class="am-comment-main"> <!-- 评论内容容器 -->
                                                                    <header class="am-comment-hd">
                                                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                        <div class="am-comment-meta"> <!-- 评论元数据 -->
                                                                            <a href="#link-to-user" class="am-comment-author">{{$re->username}}</a> <!-- 评论者 -->
                                                                            评论于 <time datetime="">{{$re->created_at}}</time>
                                                                        </div>
                                                                    </header>

                                                                    <div class="am-comment-bd">
                                                                        {{$re->comments}}
                                                                    </div> <!-- 评论内容 -->
                                                                </div>
                                                            </article>
                                                        </li>
                                                    </ul>
                                                    <div class="clear"></div>
                                                </div>
                                            @endforeach
                                                <nav>
                                                    {!! $data["review"]->appends([
                                                    'tab_detail'=>1,
                                                    'id'=>$data['detail']->id,
                                                    'type'=>$data['detail']->type
                                                    ])->render() !!}
                                                </nav>
                                            <div class="clear"></div>
                                        </div>
                                        <div style="height:30px"></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-tab-panel am-fade @if($data['tab_detail']== 2) am-active am-in @endif" id="tab3">
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
                                        <nav>
                                            {!! $data['orderinfo']->appends([
                                            'tab_detail'=>2,
                                            'id'=>$data['detail']->id,
                                            'type'=>$data['detail']->type
                                            ])->render() !!}
                                        </nav>
                                    </div>
                                    <div class="look"></div>
                                </div>
                            </div>

                            <div class="am-tab-panel am-fade @if($data['tab_detail']== 3) am-active am-in @endif" id="tab4">
                                <div class="am-form-group complaint">
                                    <h3>请选择投诉类别</h3>
                                    <input type="radio" name="complaint" value="-1" style="display: none" checked>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="0" data-am-ucheck>垃圾营销
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="1" data-am-ucheck>不实信息
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="2" data-am-ucheck>有害信息
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="3" data-am-ucheck>违法信息
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="4" data-am-ucheck>污秽色情
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="5" data-am-ucheck>人事攻击
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="complaint" value="6" data-am-ucheck>内容抄袭
                                    </label>

                                    <form action="" class="am-form">
                                        <fieldset>
                                            <h3>投诉详情描述</h3>
                                            <div class="am-form-group">
                                                <textarea minlength="10" id="complaint_detail"></textarea>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <button class="am-btn am-btn-secondary" type="submit" id="upload">提交</button>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3">
                    <div class="container1"
                         style="margin-right: -5px;border: 2px solid #eee;padding: 20px;background: #fff;">
                        <div class=" fr main-c">
                            <a class="fws-hd" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank">
                                <img src="{{$data['serviceinfo']['elogo']}}" width="180" height="180"></a>
                            <a class="fws-name" href="/service/getAllservices?uid={{$data['serviceinfo']['uid']}}" target="_blank" style="padding:20px;font-size: 18px;">
                                {{$data['serviceinfo']['ename']}}
                            </a>
                            <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                            <div class="service-content">
                                <div class="service_info">
                                    <div class="fl" style="float: left;">所在地：</div>
                                    <div class="locus"
                                         style="background: url({{asset('images/shop_680.png')}}) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                                    <div class="service_content">{{$data['serviceinfo']['city']}}</div>
                                    <div class="clear"></div>
                                </div>
                                @if($data["detail"]->type == 0)
                                    @if($data['serviceinfo']['has_student'] == 0)
                                        <div class="service_info">
                                            <div class="fl" style="float: left;">毕业院校：</div>
                                            <div class="service_content">{{explode('@',$data['serviceinfo']['graduate_edu'])[0]}}|
                                                {{explode('@',$data['serviceinfo']['graduate_edu'])[2]}}
                                                |
                                                @if(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 0)
                                                    博士及已上
                                                @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 1)
                                                    硕士
                                                @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 2)
                                                    学士
                                                @elseif(explode('@',$data['serviceinfo']['graduate_edu'])[1] == 3)
                                                    高中及以下
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    @else
                                        <div class="service_info">
                                            <div class="fl" style="float: left;">就读院校：</div>
                                            <div class="service_content">{{explode('@',$data['serviceinfo']['current_edu'])[0]}}|
                                                {{explode('@',$data['serviceinfo']['current_edu'])[2]}}
                                                |
                                                @if(explode('@',$data['serviceinfo']['current_edu'])[1] == 0)
                                                    博士及已上
                                                @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 1)
                                                    硕士
                                                @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 2)
                                                    学士
                                                @elseif(explode('@',$data['serviceinfo']['current_edu'])[1] == 3)
                                                    高中及以下
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    @endif
                                @elseif($data["detail"]->type == 1){{--实习中介--}}
                                <div class="service_info">
                                    <div class="fl" style="float: left;">中介领域：</div>
                                    <div class="service_content">{{$data['serviceinfo']['field']}}</div>
                                    <div class="fl" style="float: left;">机构自述：</div>
                                    <div style="float:left;overflow:hidden;text-align: initial;font-size: smaller;">{!! $data['serviceinfo']['self_statement'] !!}</div>
                                    <div class="clear"></div>
                                </div>
                                @elseif($data["detail"]->type == 2){{--专业问答--}}
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
                                @endif
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
        // $('.js-alert').on('click',function(){
        //     AMUI.dialog.alert({
        //         title: '扫一扫微信，完成支付',
        //         content: '<a href="#" style="width:220px;height:220px;"><img src="../images/wechat.png"></a>',
        //         onConfirm: function() {
        //             console.log('close');
        //         }
        //     });
        // });
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
        $('#upload').click(function (event) {
            var type = $('input:radio[name="complaint"]:checked').val();
            var detail = $('#complaint_detail').val();
            var url = window.location.href;
            var real_place = "@服务标题：" + $.trim($('.main-ba').text());

            if(type == -1){
                swal('','请选择投诉类别','error');
                return;
            }
            if(detail.length <=10){
                swal('','投诉详情至少输入十个字','error');
                return;
            }

            var formData = new FormData();
            formData.append("type", type);
            formData.append("detail", detail);
            formData.append("url", url);
            formData.append("real_place", real_place);
            $.ajax({
                url: "/complaint",
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
                        swal("", result.msg, "success");
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        swal('', result.msg, 'error');
                    }
                }
            });
        });
    </script>
@endsection
