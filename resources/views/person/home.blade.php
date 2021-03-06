@extends('demo.admin2')
@section('title', '个人中心')
@section('custom-style')
    <link href="{{asset('css/vipstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <style>
        .s-box li{
            padding: 0;
        }
        .am-btn{
            display: inline;
        }
        .meassage-num{
            padding: 0.1rem;
            font-size: 0.8rem;
            display: block;
        }
    </style>
@endsection
@section('content')
        <div class="main-wrap">
            <div class="wrap-left">
                <div class="wrap-list">
                    <div class="m-user">
                        <!--个人信息 -->
                        <div class="m-userinfo">
                            <a href="/message">
                                <div class="tipsBox">
                                    <i class="am-icon-envelope" style="margin-top: 5.2rem;">
                                        <span class="am-badge am-badge-warning meassage-num">{{$data['messageNum']}}</span>
                                    </i>

                                </div>
                            </a>
                            <div class="m-baseinfo">
                                <a class="m-pic" href="/account/baseedit" style="width: 120px;height: 120px;">
                                    <img src="
                                         @if($data['personInfo']->photo ==null ||$data['personInfo']->photo =="")
                                            {{asset('images/dog.png')}}
                                         @else
                                            {{$data['personInfo']->photo}}
                                         @endif
                                            ">
                                </a>
                                <div class="m-info">
                                    <em class="s-name" style="padding-top: 20px;">{{$data['username']}}</em>
                                    <div class="vip1"><a href="#"><span>{{$data['personInfo']->mail}}</span><em></em></a></div>
                                </div>
                            </div>
                            <div class="m-right">
                                <div class="m-new">
                                    <a href="{{asset('/message')}}"><i class="am-icon-dropbox  am-icon-md" style="padding-right:5px ;"></i>消息盒子</a>
                                </div>

                            </div>
                        </div>

                        <!--基本资料-->
                        <div class="m-userproperty">
                            <div class="s-bar">
                                <i class="s-icon"></i><a href="/account/baseedit">基本资料</a>
                            </div>
                            <p class="m-age">
                                <em class="m-num">{{ date('Y')-$data['personInfo']->birthday}}</em>
                                <span class="m-title">年龄</span>
                            </p>
                            <p class="m-sex">
                                <em class="m-num">
                                    @if($data['personInfo']->sex ==0)
                                        男
                                    @else
                                        女
                                    @endif
                                </em>
                                <span class="m-title">性别</span>
                            </p>
                            <p class="tel">
                                <em class="m-num">{{$data['personInfo']->tel}}</em>
                                <span class="m-title">电话</span>
                            </p>
                            <p class="mail">
                                <span class="m-title">邮箱</span>
                                <em class="m-num" style="margin-top: 1.5rem;">{{$data['personInfo']->mail}}</em>
                            </p>
                        </div>

                        @if($data['type'] ==1)
                        <!--我的需求-->
                        <div class="wallet">
                            <div class="s-bar">
                                <a href="{{asset('demands/getDemandsList"')}}">
                                <i class="s-icon"></i>我的需求
                                <label style="float: right;">更多>>></label></a>
                            </div>
                            <?php $i=0 ?>
                            @foreach($data['demandsList'] as $demand)
                                @if($i++ <=3)
                                    @if($demand->picture != null)
                                        <?php
                                        $pics = explode(';', $demand->picture);
                                        $baseurl = explode('@', $pics[0])[0];
                                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                        $imagepath = explode('@', $pics[0])[1];
                                        ?>
                                    @endif
                                        <div class="am-u-sm-4">
                                            <div class="am-thumbnail">
                                                <a href="/demands/detail?id={{$demand->id}}">
                                                <img src="
                                                @if($demand->picture == "" || $demand->picture == null)
                                                {{asset('images/f3.png')}}
                                                @else
                                                {{$baseurl}}{{$imagepath}}
                                                @endif" style="width: 100px;height: 80px;"/>
                                                <h3 class="am-thumbnail-caption">{{mb_substr($demand->title,0,23,"utf-8")}}</h3>
                                                </a>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                            {{--<p class="m-big">--}}
                                {{--<a href="#">--}}
                                    {{--<i><img src="{{asset('images/f1.jpg')}}"/></i>--}}
                                    {{--<span class="m-title">产品设计</span>--}}
                                {{--</a>--}}
                            {{--</p>--}}
                            {{--<p class="m-big">--}}
                                {{--<a href="#">--}}
                                    {{--<i><img src="{{asset('images/f2.jpg"')}}"/></i>--}}
                                    {{--<span class="m-title">取名测字</span>--}}
                                {{--</a>--}}
                            {{--</p>--}}
                        </div>
                        @elseif($data['type'] == 2)
                        <!--我的服务-->
                        <div class="wallet">
                            <div class="s-bar">
                                <a href="/service/getservicesList">
                                    <i class="s-icon"></i>我的服务
                                    <label style="float: right;">更多>>></label></a>
                            </div>
                            <div class="am-g">
                            <?php $i=0 ?>
                            @foreach($data['servicesList'] as $services)
                                @foreach($services as $service)
                                @if($i++ <3)
                                        @if($service->picture != null)
                                            <?php
                                            $pics = explode(';', $service->picture);
                                            $baseurl = explode('@', $pics[0])[0];
                                            $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                            $imagepath = explode('@', $pics[0])[1];
                                            ?>
                                        @endif
                                                <div class="am-u-sm-4">
                                                    <div class="am-thumbnail">
                                                        <a href="/service/detail?id={{$service->id}}&type={{$service->type}}">
                                                        <img src="
                                                         @if($service->picture == "" || $service->picture == null)
                                                            {{asset('images/f3.png')}}
                                                         @else
                                                            {{$baseurl}}{{$imagepath}}
                                                         @endif" style="width: 100px;height: 80px;"/>
                                                        <h3 class="am-thumbnail-caption">{{mb_substr($service->title,0,23,"utf-8")}}</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                @endif
                                @endforeach
                            @endforeach
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="box-container-bottom"></div>

                    <!--订单 -->
                    <div class="am-container">
                        <div class="am-g am-g-fixed">
                            <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
                                <div class="m-order">
                                    <div class="s-bar">
                                        <i class="s-icon"></i>待处理订单<span>{{$data['orderNum']}}</span>
                                        <a class="i-load-more-item-shadow" href="{{asset('order')}}">全部订单</a>
                                    </div>
                                    <ul>
                                        <li><a href="{{asset('order')}}"><i><img src="{{asset('images/pay.png')}}"/></i><span>待付款</span></a></li>
                                        <li><a href="{{asset('order')}}"><i><img src="{{asset('images/send.png')}}"/></i><span>待发货<em class="m-num">1</em></span></a></li>
                                        <li><a href="{{asset('order')}}"><i><img src="{{asset('images/receive.png')}}"/></i><span>待收货</span></a></li>
                                        <li><a href="{{asset('order')}}"><i><img src="{{asset('images/comment.png')}}"/></i><span>待评价<em class="m-num">3</em></span></a></li>
                                    </ul>
                                    @foreach($data['order']['orderlist'] as $order)
                                    <div class="orderContentBox">
                                        <div class="orderContent">
                                            <div class="orderContentpic">
                                                <div class="imgBox">
                                                    <a href="/order/detail?order_id={{$order->id}}">
                                                        <img src="
                                                         @if($data['order']['orderinfo'][$order->id]->picture != null)
                                                            <?php
                                                            $pics = explode(';', $data['order']['orderinfo'][$order->id]->picture);
                                                            $baseurl = explode('@', $pics[0])[0];
                                                            $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                            $imagepath = explode('@', $pics[0])[1];
                                                            ?>
                                                            {{$baseurl}}{{$imagepath}}
                                                         @else
                                                            {{asset('images/f1.jpg')}}
                                                        @endif
                                                        ">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="detailContent">
                                                <a href="/order/detail?order_id={{$order->id}}" class="delivery">
                                                    @if($order->state == -1)
                                                        交易失败
                                                    @elseif($order->state == 0)
                                                        待支付
                                                    @elseif($order->state == 1)
                                                        待收款
                                                    @elseif($order->state == 2)
                                                        待评价
                                                    @endif
                                                </a>
                                                <div class="orderID">
                                                    <span class="time">{{mb_substr($order->created_at,0,10,'utf-8')}}</span>
                                                    <span class="splitBorder">|</span>
                                                    <span class="time">{{mb_substr($order->created_at,10,18,'utf-8')}}</span>
                                                </div>
                                                <div class="orderID">
                                                    <span class="num">{{$order->title}}</span>
                                                </div>
                                            </div>
                                            <div class="state">
                                                @if($order->state == -1)
                                                    交易失败
                                                @elseif($order->state == 0)
                                                    待支付
                                                @elseif($order->state == 1)
                                                    待收款
                                                @elseif($order->state == 2)
                                                    待评价
                                                @endif
                                            </div>
                                            <?php $price = explode('.',$order->price) ?>
                                            <div class="price"><span class="sym">¥</span>{{$price[0]}}.<span class="sym"><?php if(count($price) >1) echo $price[1]; else print 00;?></span></div>

                                        </div>
                                        <a href="/order/detail?order_id={{$order->id}}" class="btnPay">立即处理</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--九宫格-->
                    {{--<div class="user-squaredIcon">--}}
                        {{--<div class="s-bar">--}}
                            {{--<i class="s-icon"></i>我的常用--}}
                        {{--</div>--}}
                        {{--<ul>--}}
                            {{--<a href="{{asset('orderinfo')}}">--}}
                                {{--<li class="am-u-sm-4"><i class="am-icon-truck am-icon-md"></i>--}}
                                    {{--<p>物流查询</p>--}}
                                {{--</li>--}}
                            {{--</a>--}}
                            {{--<a href="collection.html">--}}
                                {{--<li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i>--}}
                                    {{--<p>我的收藏</p>--}}
                                {{--</li>--}}
                            {{--</a>--}}
                            {{--<a href="foot.html">--}}
                                {{--<li class="am-u-sm-4"><i class="am-icon-paw am-icon-md"></i>--}}
                                    {{--<p>我的足迹</p>--}}
                                {{--</li>--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i>--}}
                                    {{--<p>为你推荐</p>--}}
                                {{--</li>--}}
                            {{--</a>--}}
                            {{--<a href="blog.html">--}}
                                {{--<li class="am-u-sm-4"><i class="am-icon-share-alt am-icon-md"></i>--}}
                                    {{--<p>我的分享</p>--}}
                                {{--</li>--}}
                            {{--</a>--}}
                            {{--<a href="home/home2.html">--}}
                                {{--<li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i>--}}
                                    {{--<p>限时活动</p>--}}
                                {{--</li>--}}
                            {{--</a>--}}

                        {{--</ul>--}}
                    {{--</div>--}}

                    {{--<div class="user-suggestion">--}}
                        {{--<div class="s-bar">--}}
                            {{--<i class="s-icon"></i>会员中心--}}
                        {{--</div>--}}
                        {{--<div class="s-bar">--}}
                            {{--<a href="suggest.html"><i class="s-icon"></i>意见反馈</a>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                    <!--推荐服务商-->
                    <div class="twoTab">
                        <div class="twoTabModel Coupon">
                            <h5 class="squareTitle">
                                <a href="#"><span class="splitBorder"></span>
                                    @if($data['type']==1)
                                        猜你感兴趣的服务
                                    @elseif($data['type']==2)
                                        猜你感兴趣的需求
                                    @endif
                                    <i class="am-icon-angle-right"></i>
                                </a>
                            </h5>
                            <div class="Box">
                                <ul  class="am-gallery am-avg-sm-6
				  							am-avg-md-6 am-avg-lg-6 am-gallery-default"  >
                                    @if($data['type']==1)
                                        @foreach($data['recommendServices'] as $service)
                                        <li>
                                            <div class="am-gallery-item">
                                                <a href="/service/detail?id={{$service->id}}&type={{$service->type}}" target="_blank" class="">
                                                    <img src="
                                                    @if($service->picture != null)
                                                        <?php
                                                        $pics = explode(';', $service->picture);
                                                        $baseurl = explode('@', $pics[0])[0];
                                                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                        $imagepath = explode('@', $pics[0])[1];
                                                        ?>
                                                        {{$baseurl}}{{$imagepath}}
                                                    @else
                                                        {{asset('images/f3.png')}}
                                                    @endif
                                                            "  alt="{{$service->title}}"/>
                                                    <h3 class="am-gallery-title" style="font-size: 1rem;text-align: center;">{{mb_substr($service->title,0,23,"utf-8")}}</h3>
                                                    <h3 class="am-gallery-title" style="font-size: 0.8rem;text-align: center;">
                                                        @if($service->price == -1)
                                                            价格面议
                                                        @else
                                                            ￥{{$service->price}}
                                                            @if($service->price_type == 0)
                                                                /小时
                                                            @elseif($service->price_type == 1)
                                                                /天
                                                            @elseif($service->price_type == 2)
                                                                /次
                                                            @elseif($service->price_type == 3)
                                                                /套
                                                            @elseif($service->price_type == 4)
                                                                /其他
                                                            @endif
                                                        @endif
                                                    </h3>
                                                    {{--<div class="am-gallery-desc" style="font-size: 1rem; margin-left: 2.5rem;">{{$adserver->city}}</div>--}}
                                                </a>
                                            </div>
                                        </li>
                                        @endforeach
                                    @elseif($data['type']==2)
                                        @foreach($data['recommendDemands'] as $demand)
                                            <li>
                                                <div class="am-gallery-item">
                                                    <a href="/demands/detail?id={{$demand->id}}" target="_blank" class="">
                                                        <img src="
                                                        @if($demand->picture != null)
                                                            <?php
                                                            $pics = explode(';', $demand->picture);
                                                            $baseurl = explode('@', $pics[0])[0];
                                                            $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                            $imagepath = explode('@', $pics[0])[1];
                                                            ?>
                                                            {{$baseurl}}{{$imagepath}}
                                                        @else
                                                            {{asset('images/f3.png')}}
                                                        @endif
                                                                "  alt="{{$demand->title}}" style="width:100px; height: 100px"/>
                                                        <h3 class="am-gallery-title" style="font-size: 1rem;text-align: center;">{{mb_substr($demand->title,0,23,"utf-8")}}</h3>
                                                        <h3 class="am-gallery-title" style="font-size: 0.8rem;text-align: center;">
                                                            @if($demand->price ==-1)
                                                                价格面议
                                                            @else
                                                                ￥{{$demand->price}}
                                                            @endif
                                                        </h3>
                                                        {{--<div class="am-gallery-desc" style="font-size: 1rem; margin-left: 2.5rem;">{{$adserver->city}}</div>--}}
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-right">

                <!-- 日历-->
                <div class="day-list">
                    <div class="s-title">
                        本站公告
                    </div>
                    <div class="s-box">
                        <ul>
                            @foreach($data['notes'] as $note)
                                <li><a   class="am-btn"
                                         data-am-popover="{theme: 'primary', content: '{{$note->content}}'}">
                                        <span style="font-size: 16px;color: #b84554;padding-right: 3px;"><i class="am-icon-volume-up am-icon-fw"></i></span>{{mb_substr($note->content,0,11,'utf-8')}}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
