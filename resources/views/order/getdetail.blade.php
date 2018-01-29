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
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg" style="background-image: url(../images/sprite.png);background-position: -79px -135px;width: 19px;height: 19px;"></em></i>
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
                                                <button class="am-btn am-btn-primary Status" onclick="payfor()" type="button">请支付</button>
                                                <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
                                    <div class="am-modal-dialog">
                                        <div class="am-modal-bd">
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
                                <script type="text/javascript">
                                    function payfor(){
                                        $('#my-alert').modal({
                                            onConfirm: function(){
                                                alert("您已完成支付");
                                            }
                                        });
                                    }
                                </script>

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
                            <!--订单3号-->
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
                                                <p class="am-btn am-btn-secondary Status" type="button" onclick="makeSure()">请确认</p>
                                                <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt">
                                <div class="am-modal-dialog">
                                    <div class="am-modal-hd">收款确认</div>
                                    <div class="am-modal-bd">
                                        是否收到来自<span>jkjun</span>的支付信息？
                                        <input type="text" class="am-modal-prompt-input" placeholder="请输入您收到的款项：单位（元）">
                                    </div>
                                    <div class="am-modal-footer">
                                        <span class="am-modal-btn" data-am-modal-cancel>未收到</span>
                                        <span class="am-modal-btn" data-am-modal-confirm>收到</span>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function makeSure(){
                                    $('#my-prompt').modal({
                                        relatedTarget: this,
                                        onConfirm: function(e) {
                                            alert('你输入的是：' + e.data ||'')
                                        }
                                    });
                                }
                            </script>
                            <!--订单4号-->
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
                            <!--订单5号-->
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
                                                <p class="am-btn am-btn-warning Status" type="button" onclick="serviceReview()">请评价</p>
                                                <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="am-modal am-modal-alert" tabindex="-1" id="my-content">
                                <div class="am-modal-dialog">
                                    <div class="am-modal-hd">发表评价</div>
                                    <div class="am-modal-bd">
                                        <label for="doc-ta-1"></label><br>
                                        {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                                        <textarea placeholder="请对这次服务进行评价~（不少于30个字哟）" class="am-form-field am-radius" style="height: 250px;" ></textarea>
                                    </div>
                                    <div class="am-modal-footer">
                                        <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                                        <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function serviceReview(){
                                    $('#my-content').modal({
                                        onConfirm: function(){
                                            alert("感谢您的评价！");
                                        }
                                    });
                                }
                            </script>
                            <!--订单6号-->
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
                                                <p class="am-btn am-btn-default Status" type="button" disabled>待评价</p>
                                                <p class="orderInfo"><a href="orderinfo.html">订单详情</a></p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <!--订单7号-->
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
                            <!--订单8号-->
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
                            <!--Jiesu-->

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