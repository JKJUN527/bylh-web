@extends('demo.admin2')
@section('title', '订单')
@section('custom-style')
@endsection
@section('content')
    <div class="main-wrap">
        <div class="user-order">

            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
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
                                <td class="td-inner">单价</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                        </div>
                        <div class="order-main">
                            <div class="order-list">

                                <!--交易成功-->
                                <div class="order-status5">
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
                                                            <img src="../images/f2.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <button class="am-btn am-btn-primary Status" onclick="payfor()" type="button">请支付</button>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--订单2号-->
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>待支付</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!---->
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>待支付</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!---->
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>待支付</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                                    <!--待确认-->
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-secondary Status" type="button">请确认</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-secondary Status" type="button">请确认</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-secondary Status" type="button">请确认</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!--待评价-->
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-warning Status" type="button">请评价</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-warning Status" type="button">请评价</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-warning Status" type="button">请评价</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                    <!--不同状态订单-->
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-success Status" type="button" disabled>已完成</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-success Status" type="button" disabled>已完成</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-danger Status" type="button" disabled>交易失败</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!--大学生服务-->
                    <div class="am-tab-panel am-fade" id="tab2">

                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">单价</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">
                                <div class="order-status1">
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-success Status" type="button" disabled>已完成</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-success Status" type="button" disabled>已完成</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-success Status" type="button" disabled>已完成</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--实习中介-->
                    <div class="am-tab-panel am-fade" id="tab3">
                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">单价</td>
                            </div>
                            <div class="th th-status">
                                <td class="td-inner">交易状态</td>
                            </div>
                        </div>

                        <div class="order-main">
                            <div class="order-list">
                                <div class="order-status2">
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-warning Status" type="button">请评价</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-warning Status" type="button">请评价</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
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
                                                            <img src="../images/f11.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>待确认</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--专业问答-->
                    <div class="am-tab-panel am-fade" id="tab4">
                        <div class="order-top">
                            <div class="th th-item">
                                <td class="td-inner">商品</td>
                            </div>
                            <div class="th th-price">
                                <td class="td-inner">单价</td>
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-secondary Status" type="button">请确认</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-secondary Status" type="button">请确认</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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
                                                            <img src="../images/f1.jpg" class="itempic J_ItemImg">
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
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>待支付</p>
                                                        <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                                    </div>
                                                </li>
                                            </ul>
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
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection

@section('custom-script')
    <script type="text/javascript">

    </script>
@endsection
