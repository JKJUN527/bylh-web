@extends('demo.admin2')
@section('title', '订单详情')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <style>
        .progress-active {
            background: url({{asset('images/sprite.png')}}) -79px -135px;
            width: 19px;
            height: 19px;
        }
    </style>

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
                                   <i class="u-stage-icon-inner">1
                                       <em @if($data["order"]->state == 0)
                                           class="bg progress-active"
                                           @else class="bg" @endif></em>
                                   </i>
                                   <p class="stage-name">需求方支付</p>
                                </span>
                    <span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2
                                       <em @if($data["order"]->state == 1)
                                           class="bg progress-active"
                                           @else class="bg" @endif></em>
                                   </i>
                                   <p class="stage-name">服务方确认</p>
                                </span>
                    <span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3
                                       <em @if($data["order"]->state == 2)
                                           class="bg progress-active"
                                           @else class="bg" @endif></em>
                                   </i>
                                   <p class="stage-name">待评价</p>
                                </span>
                    <span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4
                                       <em @if($data["order"]->state == 3 or $data["order"]->state == -1)
                                           class="bg progress-active"
                                           @else class="bg" @endif></em>
                                   </i>
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
                                {{--<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>--}}
                                <span>成交时间：{{$data["order"]->created_at}}</span>
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
                                                        <p>{{$data["order"]->title}}</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price">
                                                {{$data["order"]->price}} &yen;
                                            </div>
                                        </li>

                                        @if($data["type"] == 1)
                                            @if($data["order"]->state == 0)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <button class="am-btn am-btn-primary Status" onclick="payFor()"
                                                                type="button">请支付
                                                        </button>
                                                    </div>
                                                </li>
                                            @elseif($data["order"]->state == 1)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            待确认</p>
                                                    </div>
                                                </li>
                                            @elseif($data["order"]->state == 2)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-warning Status" type="button"
                                                           onclick="serviceReview()">请评价</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @elseif($data["type"] == 2)
                                            @if($data["order"]->state == 0)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            待支付</p>
                                                    </div>
                                                </li>
                                            @elseif($data["order"]->state == 1)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-secondary Status" type="button"
                                                           onclick="makeSure()">请确认</p>
                                                    </div>
                                                </li>
                                            @elseif($data["order"]->state == 2)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            待评价</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endif

                                        @if($data["order"]->state == 3)
                                            <li class="td td-status">
                                                <div class="itemStatus">
                                                    <p class="am-btn am-btn-success Status" type="button" disabled>已完成</p>
                                                </div>
                                            </li>
                                        @elseif($data["order"]->state == -1)
                                            <li class="td td-status">
                                                <div class="itemStatus">
                                                    <p class="am-btn am-btn-danger Status" type="button" disabled>交易失败</p>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            {{--支付dialog--}}
                            <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
                                <div class="am-modal-dialog">
                                    <div class="am-modal-bd">
                                        <div>
                                            <div class="service-title"
                                                 style="font-size: 20px;font-weight: bold;padding: 20px;">
                                                <a href="#">服务商信息：<span style="font-size: 18px;">米旭品牌设计</span></a>
                                            </div>
                                            <a href="#"><img src="../images/wechat.png"
                                                             style="width:300px;height:300px;"></a>
                                            <div class="wechat" type="1" style="display: none;">请使用微信支付</div>
                                            <div class="alibaba" type="2"
                                                 style="font-size: 18px;background: #fff;font-weight: bold;padding: 20px;">
                                                请使用支付宝支付
                                            </div>
                                        </div>
                                        <div class="am-modal-footer">
                                            <span class="am-modal-btn am-btn-lg" data-am-modal-confirm>确认支付</span>
                                            <span class="am-modal-btn am-btn-lg" data-am-modal-cancel>取消支付</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--确认收款dialog--}}
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

                            {{--评论dialog--}}
                            <div class="am-modal am-modal-alert" tabindex="-1" id="my-content">
                                <div class="am-modal-dialog">
                                    <div class="am-modal-hd">发表评价</div>
                                    <div class="am-modal-bd">
                                        <label for="doc-ta-1"></label><br>
                                        {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                                        <textarea placeholder="请对这次服务进行评价~（不少于30个字哟）" class="am-form-field am-radius"
                                                  style="height: 250px;"></textarea>
                                    </div>
                                    <div class="am-modal-footer">
                                        <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                                        <span class="am-modal-btn" data-am-modal-cancel>取消</span>
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
    @include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
    <script type="text/javascript">
        function payFor() {
            $('#my-alert').modal({
                onConfirm: function () {
                    alert("您已完成支付");
                }
            });
        }

        function makeSure() {
            $('#my-prompt').modal({
                relatedTarget: this,
                onConfirm: function (e) {
                    alert('你输入的是：' + e.data || '')
                }
            });
        }

        function serviceReview() {
            $('#my-content').modal({
                onConfirm: function () {
                    alert("感谢您的评价！");
                }
            });
        }
    </script>
@endsection