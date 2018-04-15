@extends('demo.admin2')
@section('title', '订单详情')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <style>
        .progress-active {
            background: url({{asset('images/sprite.png')}}) -79px -135px !important;
            width: 19px !important;
            height: 19px !important;
            opacity: 1 !important;
        }
        .payway{
            font-size: 18px;
            background: #fff;
            font-weight: bold;
            padding: 20px;
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
                                        <li class="td td-item" id="order_base" data-content="{{$data["order"]->id}}">
                                            <div class="item-pic">
                                                <a href="/service/detail?type={{$data["order"]->type}}&id={{$data["order"]->id}}" class="J_MakePoint">
                                                    @if($data["order"]->picture != null)
                                                        <?php
                                                        $pics = explode(';', $data["order"]->picture);
                                                        $baseurl = explode('@', $pics[0])[0];
                                                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                        $imagepath = explode('@', $pics[0])[1];
                                                        ?>
                                                    @endif
                                                        <img src="
                                                        @if($data["order"]->picture == "" || $data["order"]->picture == null)
                                                            {{asset('images/f1.jpg')}}
                                                        @else
                                                            {{$baseurl}}{{$imagepath}}
                                                        @endif
                                                    " class="itempic J_ItemImg">
                                                </a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <a href="/service/detail?type={{$data["order"]->type}}&id={{$data["order"]->service_id}}">
                                                        <p>{{$data["order"]->title}}</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price">
                                                &yen; {{$data["order"]->price}}
                                            </div>
                                        </li>
                                        @if($data["order"]->state == 0)
                                            @if($data['uid'] == $data["order"]->s_uid)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            待支付</p>
                                                    </div>
                                                </li>
                                            @elseif($data['uid'] == $data["order"]->d_uid)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <button class="am-btn am-btn-primary Status" onclick="payFor()"
                                                                type="button">请支付
                                                        </button>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            无权操作</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @elseif($data["order"]->state == 1)
                                            @if($data['uid'] == $data["order"]->s_uid)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-secondary Status" type="button"
                                                           onclick="makeSure()">请确认</p>
                                                    </div>
                                                </li>
                                            @elseif($data['uid'] == $data["order"]->d_uid)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            待确认</p>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            无权操作</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @elseif($data["order"]->state == 2)
                                            @if($data['uid'] == $data["order"]->s_uid)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            待评价</p>
                                                    </div>
                                                </li>
                                            @elseif($data['uid'] == $data["order"]->d_uid)
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-warning Status" type="button"
                                                           onclick="serviceReview()">请评价</p>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="td td-status">
                                                    <div class="itemStatus">
                                                        <p class="am-btn am-btn-default Status" type="button" disabled>
                                                            无权操作</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endif

                                        {{--@if($data["type"] == 1)--}}
                                            {{--@if($data["order"]->state == 0)--}}
                                                {{--<li class="td td-status">--}}
                                                    {{--<div class="itemStatus">--}}
                                                        {{--<button class="am-btn am-btn-primary Status" onclick="payFor()"--}}
                                                                {{--type="button">请支付--}}
                                                        {{--</button>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--@elseif($data["order"]->state == 1)--}}
                                                {{--<li class="td td-status">--}}
                                                    {{--<div class="itemStatus">--}}
                                                        {{--<p class="am-btn am-btn-default Status" type="button" disabled>--}}
                                                            {{--待确认</p>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--@elseif($data["order"]->state == 2)--}}
                                                {{--<li class="td td-status">--}}
                                                    {{--<div class="itemStatus">--}}
                                                        {{--<p class="am-btn am-btn-warning Status" type="button"--}}
                                                           {{--onclick="serviceReview()">请评价</p>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--@endif--}}
                                        {{--@elseif($data["type"] == 2)--}}
                                            {{--@if($data["order"]->state == 0)--}}
                                                {{--<li class="td td-status">--}}
                                                    {{--<div class="itemStatus">--}}
                                                        {{--<p class="am-btn am-btn-default Status" type="button" disabled>--}}
                                                            {{--待支付</p>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--@elseif($data["order"]->state == 1)--}}
                                                {{--<li class="td td-status">--}}
                                                    {{--<div class="itemStatus">--}}
                                                        {{--<p class="am-btn am-btn-secondary Status" type="button"--}}
                                                           {{--onclick="makeSure()">请确认</p>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--@elseif($data["order"]->state == 2)--}}
                                                {{--<li class="td td-status">--}}
                                                    {{--<div class="itemStatus">--}}
                                                        {{--<p class="am-btn am-btn-default Status" type="button" disabled>--}}
                                                            {{--待评价</p>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            {{--@endif--}}
                                        {{--@endif--}}

                                        @if($data["order"]->state == 3)
                                            <li class="td td-status">
                                                <div class="itemStatus">
                                                    <p class="am-btn am-btn-success Status" type="button" disabled>交易成功</p>
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
                            <div class="am-modal am-modal-alert" tabindex="-1" id="pay_for">
                                <div class="am-modal-dialog">
                                    <div class="am-modal-bd">
                                        <div>
                                            <div class="service-title"
                                                 style="font-size: 20px;font-weight: bold;padding: 20px;">
                                                <a href="#">服务商名称：<span style="font-size: 18px;">{{$data['serviceinfo']['ename']}}</span></a>
                                            </div>
                                            <a href="#">
                                                <img src="{{$data['serviceinfo']['pay_code']}}" tyle="width:300px;height:300px;">
                                            </a>
                                            @if($data['serviceinfo']['pay_way'] == 0)
                                            <div class="payway" type="1">
                                                请使用微信扫码支付
                                            </div>
                                            @elseif($data['serviceinfo']['pay_way'] == 1)
                                            <div class="payway" type="2">
                                                请使用支付宝支付
                                            </div>
                                            @endif
                                        </div>
                                        <div class="am-modal-footer">
                                            <span class="am-modal-btn am-btn-lg" data-am-modal-confirm>支付成功</span>
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
                                        <textarea  id="service_review" placeholder="请对这次服务进行评价~（不少于10个字哟）" class="am-form-field am-radius"
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
            $('#pay_for').modal({
                onConfirm: function () {
                    var order_base = $('#order_base');
                    var order_id = order_base.attr('data-content');
                    var formData = new FormData();
                    formData.append("order_id", order_id);
                    $.ajax({
                        url: "/order/ConfirmPayment",
                        type: 'post',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            console.log(data);
                            var result = JSON.parse(data);
                            if (result.status === 200) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                swal({
                                    title: "错误",
                                    type: "error",
                                    text: result.msg,
                                    cancelButtonText: "关闭",
                                    showCancelButton: true,
                                    showConfirmButton: false
                                });
                            }
                        }
                    });
                }
            });
        }
        function makeSure() {
            $('#my-prompt').modal({
                relatedTarget: this,
                onConfirm: function (e) {
                    var order_base = $('#order_base');
                    var order_id = order_base.attr('data-content');
                    if(!/^[1-9][0-9]*\.?[0-9]*$/.test(e.data)){
                        swal({
                            title: "错误",
                            type: "error",
                            text: "请输入正确的金额",
                            cancelButtonText: "关闭",
                            showCancelButton: true,
                            showConfirmButton: false
                        });
                        return;
                    }
                    var formData = new FormData();
                    formData.append("order_id", order_id);
                    formData.append("money", e.data);
                    formData.append("getmoney", 1);
                    $.ajax({
                        url: "/order/ConfirmGetPayment",
                        type: 'post',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            var result = JSON.parse(data);
                            if (result.status === 200) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                swal({
                                    title: "错误",
                                    type: "error",
                                    text: result.msg,
                                    cancelButtonText: "关闭",
                                    showCancelButton: true,
                                    showConfirmButton: false
                                });
                            }
                        }
                    });
                },
                onCancel: function() {//未收到款项
                    var order_base = $('#order_base');
                    var order_id = order_base.attr('data-content');
                    swal({
                        title: "确认未收到款项",
                        text: "如果确定未收到转款，我们将尝试通知购买方重新付款",
                        type: "info",
                        confirmButtonText: "确定",
                        closeOnConfirm: false
                    }, function () {
                        var formData = new FormData();
                        formData.append("order_id", order_id);
                        formData.append("getmoney", 0);
                        $.ajax({
                            url: "/order/ConfirmGetPayment",
                            type: 'post',
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function (data) {
                                var result = JSON.parse(data);
                                if (result.status === 200) {
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 1000);
                                } else {
                                    swal({
                                        title: "错误",
                                        type: "error",
                                        text: result.msg,
                                        cancelButtonText: "关闭",
                                        showCancelButton: true,
                                        showConfirmButton: false
                                    });
                                }
                            }
                        });
                    });
                }
            });
        }

        function serviceReview() {
            $('#my-content').modal({
                onConfirm: function () {
                    var service_review = $("#service_review").val();
                    var order_base = $('#order_base');
                    var order_id = order_base.attr('data-content');
                    if(service_review.length <10){
                        swal({
                            title: "错误",
                            type: "error",
                            text: "评价字数不少于10个字",
                            cancelButtonText: "关闭",
                            showCancelButton: true,
                            showConfirmButton: false
                        });
                        return;
                    }
                    var formData = new FormData();
                    formData.append("order_id", order_id);
                    formData.append("review", service_review);
                    $.ajax({
                        url: "/service/reviewser",
                        type: 'post',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            var result = JSON.parse(data);
                            if (result.status === 200) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                swal({
                                    title: "错误",
                                    type: "error",
                                    text: result.msg,
                                    cancelButtonText: "关闭",
                                    showCancelButton: true,
                                    showConfirmButton: false
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection