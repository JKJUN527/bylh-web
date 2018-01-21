@extends('demo.admin2')
@section('title', '订单详情')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="main-wrap">
        <div class="user-orderinfo">
            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> /
                    <small>Order&nbsp;details</small>
                </div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
                    <span class="step-1 step">
                       <em class="u-progress-stage-bg"></em>
                       <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                       <p class="stage-name">需求方支付</p>
                    </span>

                    <span class="step-2 step">
                       <em class="u-progress-stage-bg"></em>
                        <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                        <p class="stage-name">服务方确认</p>
                    </span>

                    <span class="step-3 step">
                       <em class="u-progress-stage-bg"></em>
                       <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                       <p class="stage-name">待评价</p>
                    </span>

                    <span class="step-4 step">
                       <em class="u-progress-stage-bg"></em>
                       <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                       <p class="stage-name">交易完成</p>
                    </span>

                    <span class="u-progress-placeholder"></span>
                </div>
                <div class="u-progress-bar total-steps-2">
                    <div class="u-progress-bar-inner"></div>
                </div>
            </div>
            <div class="order-infomain">

                <div class="order-top">
                    <div class="th th-item">
                        <td class="td-inner">商品</td>
                    </div>
                    <div class="th th-price">
                        <td class="td-inner">单价</td>
                    </div>
                    <div class="th th-number">
                        <td class="td-inner">数量</td>
                    </div>

                    <div class="th th-amount">
                        <td class="td-inner">合计</td>
                    </div>
                    <div class="th th-status">
                        <td class="td-inner">交易状态</td>
                    </div>
                </div>
                <div class="order-main">
                    <div class="order-list">
                        <div class="order-status3">
                            <div class="order-title">
                                <div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
                                <span>成交时间：2015-12-20</span>
                                <!--    <em>店铺：小桔灯</em>-->
                            </div>
                            <div class="order-content">
                                <div class="order-left">
                                    <ul class="item-list">
                                        <li class="td td-item">
                                            <div class="item-pic">
                                                <a href="#" class="J_MakePoint">
                                                    <img src="{{asset('images/f1.jpg')}}" class="itempic J_ItemImg">
                                                </a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <a href="#">
                                                        <p>米旭品牌设计 专业品牌塑造者</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price">
                                                333.00
                                            </div>
                                        </li>
                                        <li class="td td-number">
                                            <div class="item-number">
                                                <span>×</span>2
                                            </div>
                                        </li>
                                    </ul>

                                    <ul class="item-list">
                                        <li class="td td-item">
                                            <div class="item-pic">
                                                <a href="#" class="J_MakePoint">
                                                    <img src="{{asset('images/f11.jpg')}}" class="itempic J_ItemImg">
                                                </a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <a href="#">
                                                        <p>米旭品牌设计 专业品牌塑造者</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price">
                                                333.00
                                            </div>
                                        </li>
                                        <li class="td td-number">
                                            <div class="item-number">
                                                <span>×</span>2
                                            </div>
                                        </li>

                                    </ul>

                                </div>
                                <div class="order-right">
                                    <li class="td td-amount">
                                        <div class="item-amount">
                                            合计：676.00

                                        </div>
                                    </li>
                                    <div class="move-right">
                                        <li class="td td-status">
                                            <div class="item-status">
                                                <p class="Mystatus">支付完成待评价</p>
                                                <p class="order-info"><a href="{{asset('order/getdetail')}}">订单详情</a>
                                                </p>
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('aside')
    <aside class="menu">
        <ul>
            <li class="person active">
                <a href="{{asset('home')}}"><i class="am-icon-user"></i>个人中心</a>
            </li>
            <li class="person">
                <p><i class="am-icon-newspaper-o"></i>个人资料</p>
                <ul>
                    <li><a href="{{asset('user')}}">个人信息</a></li>
                    <li><a href="{{asset('safety')}}">安全设置</a></li>
                </ul>
            </li>
            <li class="person">
                <p><i class="am-icon-balance-scale"></i>我的交易</p>
                <ul>
                    <li><a href="{{asset('order')}}">订单管理</a></li>
                    <li><a href="{{asset('comment')}}">评价服务</a></li>
                </ul>
            </li>
            <li class="person">
                <p><i class="am-icon-dollar"></i>我的服务</p>
                <ul>
                    <li><a href="{{asset('advanceSearch')}}">发布服务</a></li>
                    <li><a href="{{asset('myrequest')}}">服务列表</a></li>
                </ul>
            </li>

            <li class="person">
                <p><i class="am-icon-tags"></i>我的需求</p>
                <ul>
                    <li><a href="{{asset('sendneed')}}">发布需求</a></li>
                    <li><a href="{{asset('myneed')}}">需求列表</a></li>
                </ul>
            </li>

            <li class="person">
                <p><i class="am-icon-qq"></i>信息中心</p>
                <ul>
                    <li><a href="{{asset('message')}}">站内信</a></li>
                    <li><a href="/news">我的消息</a></li>
                </ul>
            </li>
        </ul>
    </aside>
@endsection
