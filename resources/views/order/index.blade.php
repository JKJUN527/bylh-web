@extends('demo.admin2')
@section('title', '订单')
@section('custom-style')
@endsection
@section('content')
    <div class="main-wrap">
        <div class="user-order">
            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> /
                    <small>Order</small>
                </div>
            </div>
            <hr/>

            <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

                <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active"><a href="#tab1">所有订单</a></li>
                    <li><a href="#tab2">大学生服务</a></li>
                    <li><a href="#tab3">实习课堂</a></li>
                    <li><a href="#tab4">专业问答</a></li>
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">价格</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">

                                <!--交易成功-->

                                @foreach($data["orderlist"] as $order)
                                    <div class="order-status5">
                                        <div class="order-title">
                                            {{--<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>--}}
                                            <span>成交时间：{{$order->created_at}}</span>
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="images/f2.jpg" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="/order/detail?order_id={{$order->id}}">
                                                                    <p>{{$data["orderinfo"][$order->id]->title}}</p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="td td-price">
                                                        <div class="item-price">
                                                            {{$order->price}}¥
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="order-right">
                                                <div class="move-right">
                                                    <li class="td td-status" style="float: right">
                                                        <div class="item-status">
                                                            <span class="am-badge am-badge-primary am-radius" style="margin-bottom: 1rem;">
                                                            @if($order->state == -1)
                                                                <p class="Mystatus">交易失败</p>
                                                            @elseif($order->state == 0)
                                                                <p class="Mystatus">待支付</p>
                                                            @elseif($order->state == 1)
                                                                <p class="Mystatus">待收款</p>
                                                            @elseif($order->state == 2)
                                                                <p class="Mystatus">支付完成待评价</p>
                                                            @elseif($order->state == 3)
                                                                <p class="Mystatus">交易成功</p>
                                                            @endif
                                                            </span>
                                                            <span class="am-badge am-badge-warning am-radius">
                                                                <p class="order-info"><a href="/order/detail?order_id={{$order->id}}">订单详情</a></p>
                                                            </span>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                    <div class="am-tab-panel am-fade" id="tab2">

                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">价格</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list" id="tab2_content">
                                @foreach($data["orderlist"] as $order)
                                    @if($order->type == 0)
                                        <div class="order-status5">
                                            <div class="order-title">
                                                {{--<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>--}}
                                                <span>成交时间：{{$order->created_at}}</span>
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
                                                                    <img src="images/f2.jpg" class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/order/detail?order_id={{$order->id}}">
                                                                        <p>{{$data["orderinfo"][$order->id]->title}}</p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$order->price}}¥
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="order-right">
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                @if($order->state == -1)
                                                                    <p class="Mystatus">交易失败</p>
                                                                @elseif($order->state == 0)
                                                                    <p class="Mystatus">待支付</p>
                                                                @elseif($order->state == 1)
                                                                    <p class="Mystatus">待收款</p>
                                                                @elseif($order->state == 2)
                                                                    <p class="Mystatus">支付完成待评价</p>
                                                                @elseif($order->state == 3)
                                                                    <p class="Mystatus">交易成功</p>
                                                                @endif

                                                                <p class="order-info"><a href="/order/detail?order_id={{$order->id}}">订单详情</a>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="am-tab-panel am-fade" id="tab3">
                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">价格</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list" id="tab3_content">
                                @foreach($data["orderlist"] as $order)
                                    @if($order->type == 1)
                                        <div class="order-status5">
                                            <div class="order-title">
                                                {{--<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>--}}
                                                <span>成交时间：{{$order->created_at}}</span>
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
                                                                    <img src="images/f2.jpg" class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/order/detail?order_id={{$order->id}}">
                                                                        <p>{{$data["orderinfo"][$order->id]->title}}</p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$order->price}}¥
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="order-right">
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                @if($order->state == -1)
                                                                    <p class="Mystatus">交易失败</p>
                                                                @elseif($order->state == 0)
                                                                    <p class="Mystatus">待支付</p>
                                                                @elseif($order->state == 1)
                                                                    <p class="Mystatus">待收款</p>
                                                                @elseif($order->state == 2)
                                                                    <p class="Mystatus">支付完成待评价</p>
                                                                @elseif($order->state == 3)
                                                                    <p class="Mystatus">交易成功</p>
                                                                @endif

                                                                <p class="order-info"><a href="/order/detail?order_id={{$order->id}}">订单详情</a>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="am-tab-panel am-fade" id="tab4">
                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">价格</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list" id="tab4_content">
                                @foreach($data["orderlist"] as $order)
                                    @if($order->type == 2)
                                        <div class="order-status5">
                                            <div class="order-title">
                                                {{--<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>--}}
                                                <span>成交时间：{{$order->created_at}}</span>
                                            </div>
                                            <div class="order-content">
                                                <div class="order-left">
                                                    <ul class="item-list">
                                                        <li class="td td-item">
                                                            <div class="item-pic">
                                                                <a href="#" class="J_MakePoint">
                                                                    <img src="images/f2.jpg" class="itempic J_ItemImg">
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-basic-info">
                                                                    <a href="/order/detail?order_id={{$order->id}}">
                                                                        <p>{{$data["orderinfo"][$order->id]->title}}</p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="td td-price">
                                                            <div class="item-price">
                                                                {{$order->price}}¥
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="order-right">
                                                    <div class="move-right">
                                                        <li class="td td-status">
                                                            <div class="item-status">
                                                                @if($order->state == -1)
                                                                    <p class="Mystatus">交易失败</p>
                                                                @elseif($order->state == 0)
                                                                    <p class="Mystatus">待支付</p>
                                                                @elseif($order->state == 1)
                                                                    <p class="Mystatus">待收款</p>
                                                                @elseif($order->state == 2)
                                                                    <p class="Mystatus">支付完成待评价</p>
                                                                @elseif($order->state == 3)
                                                                    <p class="Mystatus">交易成功</p>
                                                                @endif

                                                                <p class="order-info"><a href="/order/detail?order_id={{$order->id}}">订单详情</a>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!--底部-->
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection

@section('custom-script')
    <script type="text/javascript">

    </script>
@endsection
