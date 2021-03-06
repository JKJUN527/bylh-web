@extends('demo.admin',['title'=>0])
@section('title', '搜索')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        /*.btn_tap{*/
            /*font-size: 16px;*/
            /*color: #f6f8fd;*/
            /*padding:6px;*/
        /*}*/
        /*.btn_tap_li{*/
            /*background: #ee6363;*/
        /*}*/
        .label{
            background-color: #F84C4C;
            color: #fff;
            display: inline-block;
            font-size:18px;
            text-align: center;
            line-height: 16px;
            border-radius: 2px;
            padding: 2px;
        }
        .demand_content{
            font-size: 14px;
            color: #999999;
            padding-top: 8px;
            line-height: 160%;
            min-width: 40rem;
            max-width: 40rem;
        }
        .service_content{
            font-size: 1rem !important;
        }
        .service_img{
            width: 162px !important;
            height: 162px !important;
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
        .am-nav-tabs > li.am-active > a, .am-nav-tabs > li.am-active > a:hover, .am-nav-tabs > li.am-active > a:focus, .am-nav-tabs > li > a:hover{
            background:#ee6363;
            color: #fff;
        }
    </style>
@endsection
@section('content')
<!--搜索界面-->
<div class="am-g am-g-fixed" style="padding-top: 1px;">
    <div class="am-u-lg-8 am-u-md-8 am-u-sm-8">
        <div class="am-container" style="border-bottom: 2px solid #eee;padding: 20px;background: #fff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="am-tabs" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs" style="border-bottom: 4px solid #ee6363;">
                    <li class="am-active btn_tap_li"><a href="#tab1" class="btn_tap">全部需求</a></li>
                    <li class="btn_tap_li"><a href="#tab2" class="btn_tap">全部服务</a></li>
                    {{--<li class="btn_tap_li"><a href="#tab3" class="btn_tap">全部新闻</a></li>--}}
                </ul>
                {{--<div class="rankit" style="margin-top: 1rem;">--}}
                    {{--<select data-am-selected>--}}
                        {{--<option value="综合排序" selected>综合排序</option>--}}
                        {{--<option value="销量优先">销量优先</option>--}}
                        {{--<option value="价格升序">价格升序</option>--}}
                        {{--<option value="价格降序">价格降序</option>--}}
                        {{--<option value="发布时间">发布时间</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<hr data-am-widget="divider" style="" class="am-divider am-divider-default" />--}}

                <div class="am-tabs-bd">
                    <!--需求-->
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                        <table class="xm_list" cellpadding="0" cellspacing="0">
                            <tbody>
                            @forelse($data['demands'] as $demand)
                            <tr class="line_h   adserveritembg">
                                <td class="xm_money loadcyvkobj" data="450988" datacynum="19" datazab="0" datacc="1" datacd="/logo" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 25px;">
                                    <div class="aa task_item_i" style="padding: 20px 5px;">
                                        <a href="/demands/detail?id={{$demand->id}}" target="_blank" title="{{$demand->title}}"><font class="money" style="font-size: 18px;color: #ff6600;">
                                             @if($demand->price <0)
                                                 暂无报价
                                             @else
                                                ￥{{$demand->price}}
                                             @endif
                                            </font>&nbsp;
                                            <span class="searchtitle" style="font-size: 16px;color: #056bc3;">
                                                {{$demand->title}}
                                            </span>
                                       </a>
                                        @if($demand->is_urgency != 0)
                                            <a href="javascript:;" class="task_ji label">
                                                @if($demand->is_urgency == 1)
                                                    急
                                                @elseif($demand->is_urgency == 2)
                                                    顶
                                                @else
                                                    普
                                                @endif
                                            </a>
                                        @endif
                                        <div class="xm_xq tsk_show_450988 demand_content">
                                            {{mb_substr($demand->describe, 0, 35)}}
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="fujia"></div>
                                </td>
                                <td class="xm-leix" style="border-bottom: 1px dashed #e1dfdf;vertical-align: top;padding-top: 50px;">
                                    <div class="hh">
                                        <span style="color:#2782b7">{{$data['count'][$demand->id]}}</span> 参与预约
                                        <span style="color:#2782b7">{{$data["serviceclass1"][$demand->class1_id]}}</span><br>
                                        <div class="locus" style="background: url({{asset('images/shop_680.png')}}) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                                        <span style="color:#2782b7">{{$demand->city}}</span>


                                    </div></td>
                                <td class="cc toubiao" style="float: right;vertical-align: top;margin-top: 60px;padding-left: 10px;">
                                    <div class="hhb">
                                        <button id="date-demand" class="am-btn am-btn-warning am-btn-lg" type="button" data-content="{{$demand->id}}">查看详情</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <p>未搜索到相关需求</p>
                            @endforelse
                            <!--分页实现-->

                            <tr>
                                <td colspan="4" style="border-bottom:0;padding:15px 0 40px 0">

                                    <div class="pager_container">

                                        <ul data-am-widget="pagination"
                                            class="am-pagination am-pagination-default">

                                            <li class="am-pagination-first ">
                                                <nav>
                                                    {!! $data['demands']->appends(["keyword" => $data['keyword']])->render() !!}
                                                </nav>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="clear"></div>
                                </td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!--服务搜索-->
                    <div class="am-tab-panel am-fade" id="tab2">
                        <div class="findrequest">
                            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-bordered" data-am-gallery="{  }" >
                                <?php $services_count = 0;?>
                                @foreach($data['genlservices'] as $genlservice)
                                    <?php $services_count++;?>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="/service/detail?id={{$genlservice->id}}&type=0" class="">
                                            <img  class="service_img" src="{{$genlservice->picture or asset('images/f8.jpg')}}" />
                                            <h3 class="am-gallery-title">{{$genlservice->title}}</h3>
                                            <div class="am-gallery-desc service_content">{{mb_substr($genlservice->describe,0,20,'utf-8')}}</div>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                                @foreach($data['finlservices'] as $finlservices)
                                        <?php $services_count++;?>
                                 <li>
                                    <div class="am-gallery-item">
                                        <a href="/service/detail?id={{$finlservices->id}}&type=1" class="">
                                             <img class="service_img" src="{{$finlservices->picture or asset('images/f8.jpg')}}" />
                                             <h3 class="am-gallery-title">{{$finlservices->title}}</h3>
                                             <div class="am-gallery-desc service_content">{{mb_substr($finlservices->describe,0,20,'utf-8')}}</div>
                                        </a>
                                    </div>
                                 </li>
                                 @endforeach
                                 @foreach($data['qaservices'] as $qaservices)
                                        <?php $services_count++;?>
                                        <li>
                                            <div class="am-gallery-item">
                                                <a href="/service/detail?id={{$qaservices->id}}&type=2" class="">
                                                    <img class="service_img" src="{{$qaservices->picture or asset('images/f8.jpg')}}" />
                                                    <h3 class="am-gallery-title">{{$qaservices->title}}</h3>
                                                    <div class="am-gallery-desc service_content">{{mb_substr($qaservices->describe,0,20,'utf-8')}}</div>
                                                </a>
                                            </div>
                                        </li>
                                 @endforeach
                                @if($services_count == 0)
                                    未搜索到相关服务
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3">
        <div class="am-container" style="border: 2px solid #eee;padding: 20px;background: #fff;margin-left: 20px;margin-top: 20px;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);">
            <div class="guessyouwant">
                <div class="guess-title" style="font-size: 20px;font-weight: bold;padding: 5px;border-bottom: 3px solid #b84554;margin-bottom: 20px;">
                    推荐服务商
                </div>
                @foreach($data['serviceuser'] as $serviceuser)
                <div class=" fr main-c">
                    <a class="fws-hd" href="" target="_blank">
                        <img src="
                        @if($serviceuser->elogo==null ||$serviceuser->elogo=="")
                            {{asset('images/f10.jpg')}}
                        @else
                                {{$serviceuser->elogo}}
                        @endif
                                " width="210" height="210" alt="{{$serviceuser->ename}}"></a>
                    <a class="fws-name" href="" title="{{$serviceuser->ename}}" target="_blank" style="padding:20px;font-size: 18px;">{{$serviceuser->ename}}</a>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
                    <div style="clear:both; height:5px"></div>
                    {{--<div class="main-cb">--}}
							{{--<span class="fl"><img src="http://js.680.com/images/zuan2.gif" alt="钻石二级--}}
							{{--积分：1430分" title="钻石二级--}}
							{{--积分：1430" class="tip" align="absmiddle" style="width: 34px;height: 16px;position: inherit;background: #fff;margin-left: 20px;"></span>--}}
                        {{--<div class="clear"></div>--}}
                    {{--</div>--}}
                    <div style="color: #666;height: 40px;width: 230px;line-height: 30px;padding-left: 20px;font-size: 14px;padding-top: 0;">
                        <div class="fl" style="float: left;">所在地：</div>
                        <div class="locus" style="background: url({{asset('images/shop_680.png')}}) -40px 4px no-repeat;width: 20px;height: 30px;float: left;"></div>
                        <div style="float:left; padding-left:3px;width:110px; overflow:hidden;height:30px;">
                            {{$serviceuser->city}}
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="shop_zpjmsg" style="float: left;padding-left: 20px;">
                        支持线下服务:
                        <span>
                            @if($serviceuser->is_offline == 1)
                                否
                            @else
                                是
                            @endif
                        </span></br>
                        含有视频教程：
                        <span>
                        @if($serviceuser->has_video == 0)
                            无
                        @else
                            有
                        @endif
                        </span>
                    </div><div class="clear"></div>
                </div>
                    <br>
                    <hr data-am-widget="divider" style="height: 4px;" class="am-divider am-divider-default" />
                    <br>
                @endforeach

            </div>
        </div>
    </div>

</div>
<!--广告-->
<div class="advertisement" style="padding: 10px 0 10px 0;">
    <img src="{{asset('images/ad2.jpg')}}" style="width: 100%;">
</div>
@endsection
@section('custom-script')
    <script>
        $("#date-demand").click(function () {
            var id = $(this).attr('data-content');
            window.location.href = "/demands/detail?id="+id;
        });
    </script>
@endsection
