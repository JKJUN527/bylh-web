@extends('demo.admin2')
@section('title','查看预约')
@section('content')
    <div class="main-wrap">
        <div class="user-orderinfo">
            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">需求预约列表</strong> /
                    <small>My&nbsp;requirements</small>
                </div>
            </div>
            <hr/>
        </div>

        <div class="am-g am-g-fixed">
            <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
                <ul>
                    <li style="border-bottom: 1px dotted #999;padding: 4px;">
                        <div class="am-container">
                            <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                <img src=" {{asset('images/f2.png')}}" class="itemImage">
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>龙博服务设计</p>
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>价格：
                                    <span class="money">
                                                ￥1000元
													</span><br>
                                </p>
                            </div>
                            <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
                                <div class="am-btn-group am-btn-group-justify">
                                    <button type="button" class="am-btn am-btn-success" onclick="information()"><a
                                                href="#" style="color:#fff;">查看信息</a></button>
                                    <button type="button" class="am-btn am-btn-warning" onclick="buy()"><a href="#"
                                                                                                           style="color:#fff;">购买服务</a>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="border-bottom: 1px dotted #999;padding: 4px;">
                        <div class="am-container">
                            <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                <img src=" {{asset('images/f2.png')}}" class="itemImage">
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>龙博服务设计</p>
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>价格：
                                    <span class="money">
                                                ￥1000元
													</span><br>
                                </p>
                            </div>
                            <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
                                <div class="am-btn-group am-btn-group-justify">
                                    <button type="button" class="am-btn am-btn-success" onclick="information()"><a
                                                href="#" style="color:#fff;">查看信息</a></button>
                                    <button type="button" class="am-btn am-btn-warning" onclick="buy()"><a href="#"
                                                                                                           style="color:#fff;">购买服务</a>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="border-bottom: 1px dotted #999;padding: 4px;">
                        <div class="am-container">
                            <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                <img src=" {{asset('images/f2.png')}}" class="itemImage">
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>龙博服务设计</p>
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>价格：
                                    <span class="money">
                                                ￥1000元
													</span><br>
                                </p>
                            </div>
                            <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
                                <div class="am-btn-group am-btn-group-justify">
                                    <button type="button" class="am-btn am-btn-success" onclick="information()"><a
                                                href="#" style="color:#fff;">查看信息</a></button>
                                    <button type="button" class="am-btn am-btn-warning" onclick="buy()"><a href="#"
                                                                                                           style="color:#fff;">购买服务</a>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="border-bottom: 1px dotted #999;padding: 4px;">
                        <div class="am-container">
                            <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                <img src=" {{asset('images/f2.png')}}" class="itemImage">
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>龙博服务设计</p>
                            </div>
                            <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                <p>价格：
                                    <span class="money">
                                                ￥1000元
													</span><br>
                                </p>
                            </div>
                            <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
                                <div class="am-btn-group am-btn-group-justify">
                                    <button type="button" class="am-btn am-btn-success" onclick="information()"><a
                                                href="#" style="color:#fff;">查看信息</a></button>
                                    <button type="button" class="am-btn am-btn-warning" onclick="buy()"><a href="#"
                                                                                                           style="color:#fff;">购买服务</a>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert" style="margin-top: -150px;">
                    <div class="am-modal-dialog">
                        <div class="am-modal-bd">
                            <div>
                                <div class="service-title" style="font-size: 20px;font-weight: bold;padding: 20px;">
                                    <a href="#">服务商信息：<span style="font-size: 18px;">米旭品牌设计</span></a>
                                </div>
                                <a href="#"><img src="{{asset('images/wechat.png')}}"
                                                 style="width:300px;height:300px;"></a>
                                <div class="wechat" type="1" style="display: none;">请使用微信支付</div>
                                <div class="alibaba" type="2"
                                     style="font-size: 18px;background: #fff;font-weight: bold;padding: 20px;">请使用支付宝支付
                                </div>
                            </div>
                            <div class="am-modal-footer">
                                <span class="am-modal-btn am-btn-lg" data-am-modal-confirm>确认支付</span>
                                <span class="am-modal-btn am-btn-lg" data-am-modal-cancel>取消支付</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="am-modal am-modal-alert" tabindex="-1" id="my-content" style="margin-top: -200px;">
                    <div class="am-modal-dialog">
                        <div class="am-modal-hd">和我联系</div>
                        <a href="#">
                            <div class="serviceMsg">
                                <img src="{{asset('images/head1.gif')}}"
                                     style="width:150px;height:150px;">
                                <p>服务商信息：<span>liyuxiao88</span></p>
                            </div>
                        </a>
                        <div class="am-modal-bd">
                            <label for="doc-ta-1">电话：18849321234</label><br>
                            <label for="doc-ta-1">邮箱：23456781@qq.com</label><br>
                            {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                        </div>
                        <div class="am-modal-footer">
                            <span class="am-modal-btn">确定</span>
                        </div>
                    </div>
                </div>
                <nav>
                    {!! $data['demands']->render() !!}
                </nav>
            </div>
        </div>
    </div>
    <!--底部-->
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
    <script>
        function buy() {
            $('#my-alert').modal({
                onConfirm: function () {
                    alert("您已完成购买！");
                }
            });
        }

        function information() {
            $('#my-content').modal();
        }
    </script>
@endsection
