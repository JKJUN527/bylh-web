@extends('demo.admin')
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
    </style>
@endsection
@section('content')
    <!--发布服务-->
    <div class="am-g am-g-fixed" style="padding-top: 45px;">
        <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" style="border: 2px solid #eee;padding: 20px;background: #fff;">
            <div class="am-u-lg-6 am-u-md-6" style="padding-top: 20px;padding-left: 20px;">
                <img src="http://p1.shopimg.680.com/2017-3/11/32017031116262132546_10416580.jpg" alt=""
                     style="width: 85%">
                <img src="http://p1.shopimg.680.com/2017-3/11/32017031116262579071_10416580.jpg" alt=""
                     style="width: 85%;">
            </div>
            <div class="am-u-lg-6 am-u-md-6">
                <h2 class="main-ba" title="logo设计/企业logo/公司logo/品牌logo/网站logo/餐饮logo设计专业设计，满意为止！"
                    style="padding-right:20px;padding-top: 20px;line-height: 25px;overflow: hidden;font-size: 18px;font-family: microsoft yahei;padding-left: 0;color: #575757;font-weight: 700;padding-bottom: 5px;">
                    {{$data["detail"]->title}}
                </h2>
                <div class="main-bb">
                    <div class="bg-jiage" style="background: url(../images/value.png) center;height: 100px;">
                        <div class="fl" style="float: left; ">
                            <div class="bjia"
                                 style="float: left;color: #746C6C;padding-top: 41px;padding-left: 10px;line-height: 20px;height: 20px;font-size: 16px;">
                                价格：
                            </div>
                            <div class="jiage"
                                 style="font-size: 30px;font-weight: bold;font-family: microsoft yahei;color: #DF231B;float: left;padding-top: 31px;">
                                ￥{{$data["detail"]->price}}<span
                                        style="color:#666;font-size:14px;font-weight:100">/个</span>
                            </div>
                        </div>
                        <div class="fr cj_rr"
                                    style="height: 30px;line-height: 30px;padding-top: 40px;color: #777;padding-right: 80px;float: right;">
                            成交：<b>347 </b>笔
                        </div>
                        <div class="clear"></div>
                    </div>
                    {{--<div class="main-bc">--}}
                    {{--<div class="tk_1_1_3_1 tk_1_1_3_2"--}}
                    {{--style="height:145px; line-height:150%;border-bottom:dashed 1px #ddd;    padding-bottom: 7px;">--}}
                    {{--<table border="0" cellpadding="0" cellspacing="0">--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                    {{--<td style="  padding-top: 21px;font-size: 14px;padding-left: 22px;">--}}
                    {{--评分--}}
                    {{--</td>--}}
                    {{--<td style="padding:20px 70px; text-align:center"><b style="color:#f60">4.9</b>分<br>--}}
                    {{--<span title="服务评价：4.9分" class="pf_45 mt5"></span>--}}
                    {{--</td>--}}
                    {{--<td style="line-height:160%; padding:10px;color:#999">--}}
                    {{--方案创意：<span>4.9</span>分<br>--}}
                    {{--服务态度：<span>4.9</span>分<br>--}}
                    {{--工作效率：<span>4.9</span>分<br>--}}
                    {{--完成质量：<span>4.9</span>分--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                    {{--</table>--}}
                    {{--</div>--}}

                    <div class="clear"></div>
                    <div class="main-bc-btn" style="padding-left:105px; padding-top:39px;padding-bottom: 42px;">
                        <a class="btn-a buyfuwubtn" href="#"><button class="am-btn am-btn-danger am-btn-lg js-alert" type="button" style="width: 50%;" onclick="buy()">立即购买</button></a>
                        <div class="clear"></div>
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
    </div>
    <div class="am-g am-fixed" style="margin-top: 20px;">
        <div class="am-container">
            <div class="am-u-1g-12 am-u-md-12 am-u-sm-12">
                <div class="am-u-lg-9 am-u-md-9 am-u-sm-9"
                     style="border: 2px solid #eee;padding: 20px;background: #fff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
                    <div class="am-tabs" data-am-tabs style="margin:10px;">
                        <ul class="am-tabs-nav am-nav am-nav-tabs" style="margin:10px;">
                            <li class="am-active"><a href="#tab1"
                                                     style="font-weight: bold;font-size: 18px;margin-right: 50px;">服务详情</a>
                            </li>
                            <li><a href="#tab2" style="font-weight: bold; font-size: 18px;margin-right: 50px;">雇主评论</a>
                            </li>
                            <li><a href="#tab3" style="font-weight: bold;font-size: 18px;margin-right: 50px;">成交记录</a>
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
                                                    <div style="float:left; ">
                                                        <img src="http://js.680.com/images/nohead.jpg"
                                                             width="50" height="50"
                                                             title="CK1412255424" alt="CK1412255424"
                                                             style="border:solid 1px #E8E8E8">
                                                    </div>
                                                    <div style="float:left; padding-left:10px;">
                                                        <img src="../images/sanjiao.jpg" width="9" height="113">
                                                    </div>
                                                    <div class=" fl pj-box"
                                                         style="background: #fef8f4;border: #e8e8e8 1px solid;border-left: none;width: 727px;">
                                                        <div class="pj-boxa"
                                                             style="line-height: 30px;height: 30px;border-bottom: #e8e8e8 1px solid;width: 680px;margin-left: 20px;">
                                                            <span class="vike-mc">用户名【uid:{{$re->uid}}】</span>
                                                            <span class="sj">{{$re->created_at}}</span>
                                                            <div class="clear"
                                                                 style="clear: both;zoom: 1;display: block !important;"></div>
                                                        </div>
                                                        <div class="pj-boxb"
                                                             style="line-height: 25px;padding-top: 10px;padding-bottom: 10px;margin-left: 20px;width: 760px;">
                                                            <div class="pjneir">
                                                                <span class="pj_nr_o">{{$re->comments}}</span>
                                                                <div class="clear"
                                                                     style="clear: both;zoom: 1;display: block !important;"></div>

                                                            </div>

                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
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


                                            <tr>
                                                <td height="26" class="tit"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    最后的完结篇
                                                </td>
                                                <td class="money"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    ￥15000
                                                </td>
                                                <td class="time-cj"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    2017-10-23 11:18
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="26" class="tit"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    CK1412255424
                                                </td>
                                                <td class="money"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    ￥5000
                                                </td>
                                                <td class="time-cj"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    2017-9-12 16:39
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="26" class="tit"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    13655458928
                                                </td>
                                                <td class="money"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    ￥4500
                                                </td>
                                                <td class="time-cj"
                                                    style="border-bottom: 1px solid #e8e8e8;color: #999;padding: 7px 10px;">
                                                    2017-7-24 17:48
                                                </td>
                                            </tr>
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
                         style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;">
                        <div class=" fr main-c">
                            <a class="fws-hd" href="http://shop.680.com/10442660/" title="米旭品牌设计 " target="_blank"><img
                                        src="../images/f2.jpg" width="210" height="210" alt="米旭品牌设计 "></a>
                            <a class="fws-name" href="http://shop.680.com/10442660/" title="米旭品牌设计 " target="_blank"
                               style="padding:20px;font-size: 18px;">米旭品牌设计 </a>
                            <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                            <div style="clear:both; height:5px"></div>
                            <div class="main-cb">
							<span class="fl"><img src="http://js.680.com/images/zuan2.gif" alt="钻石二级
							积分：1430分" title="钻石二级
							积分：1430" class="tip" align="absmiddle"
                                                  style="width: 34px;height: 16px;position: inherit;background: #fff;margin-left: 20px;"></span>
                                <div class="clear"></div>
                            </div>

                            <div style="color: #666;height: 40px;width: 230px;line-height: 30px;padding-left: 20px;font-size: 14px;padding-top: 0;">
                                <div class="fl" style="float: left;">所在地：</div>

                                <div class="locus"
                                     style="background: url(../images/shop_680.png) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                                <div style="float:left; padding-left:3px;width:110px; overflow:hidden;height:30px;">
                                    广东-佛山

                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="lx-btn"
                                 style="padding-left: 20px;line-height: 30px;height: 40px;padding-bottom: 20px;text-align: center;">
                                <button type="button" class="am-btn am-btn-danger am-btn-lg" style="width: 80%;">和我联系
                                </button>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <div class="shop_zpjmsg">好评率：<span>100%</span>&nbsp;&nbsp;|&nbsp;&nbsp;总评：<span>5</span>分
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="container2"
                         style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
                        <div class="other_fw_r" style="padding-top: 5px;padding-bottom: 40px;">
                            <div class="twof-t" style="line-height: 30px;">
                                <span class="csfw"
                                      style="padding-left: 0;float: left;font-size: 16px;padding-bottom: 10px;">本店其他热门服务</span>
                                <div class="clear"></div>
                            </div>

                            <div class="anli-b">
                                <div style="float:left;"><a href="fid-55380.html" target="_blank"><img
                                                src="http://p1.shopimg.680.com/2017-7/6/32017070614584559264_10442660.jpg"
                                                width="80" style="width: 80px;height: 80px;"></a></div>
                                <div class="xxys"
                                     style="float: left;line-height: 25px;padding-left: 10px;font-weight: bold;padding-top: 0;width: 132px;">
                                    <a href="fid-55380.html" target="_blank"
                                       style="display: block;font-weight: 100;height: auto;padding-bottom: 5px;overflow: visible;color: #666;font-size: 14px;line-height: 20px;height: 25px;overflow: hidden;line-height: 25px;overflow: hidden;width: 130px;text-overflow: ellipsis;padding-left:5px;white-space: nowrap;">田园风格装修/复式楼/别墅/商品房</a><font
                                            style="font-weight: 100;color: #DF231B;font-size: 14px;">￥30</font>
                                    <div class="fw_r_i_cj">成交4次</div>
                                </div>

                                <div class="clear"></div>
                            </div>


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
        $('.js-alert').on('click',function(){
            AMUI.dialog.alert({
                title: '扫一扫微信，完成支付',
                content: '<a href="#" style="width:220px;height:220px;"><img src="../images/wechat.png"></a>',
                onConfirm: function() {
                    console.log('close');
                }
            });
        });
    </script>
@endsection
