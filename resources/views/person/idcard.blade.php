@extends('demo.admin2')
@section('title', '身份验证')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
        <div class="main-wrap">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">实名认证</strong> / <small>Real&nbsp;authentication</small></div>
            </div>
            <hr/>
            <div class="authentication">
                <p class="tip">请填写您身份证上的真实信息，以用于报关审核</p>
                <div class="authenticationInfo">
                    <p class="title">填写个人信息</p>

                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">真实姓名</label>
                        <div class="am-form-content">
                            <input type="text" id="user-name" placeholder="请输入您的真实姓名">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-IDcard" class="am-form-label">身份证号</label>
                        <div class="am-form-content">
                            <input type="tel" id="user-IDcard" placeholder="请输入您的身份证信息">
                        </div>
                    </div>
                </div>
                <div class="authenticationPic">
                    <p class="title">上传身份证照片</p>
                    <p class="tip">请按要求上传身份证</p>
                    <ul class="cardlist">
                        <li>
                            <div class="cardPic">
                                <img src="images/cardbg.jpg">
                                <div class="cardText"><i class="am-icon-plus"></i>
                                    <p>正面照片</p>
                                </div>
                                <p class="titleText">身份证正面</p>
                            </div>
                            <div class="cardExample">
                                <img src="images/cardbg.jpg">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                        <li>
                            <div class="cardPic">
                                <img src="images/cardbg.jpg">
                                <div class="cardText"><i class="am-icon-plus"></i>
                                    <p>背面照片</p>
                                </div>
                                <p class="titleText">身份证背面</p>
                            </div>
                            <div class="cardExample">
                                <img src="images/cardbg.jpg">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="info-btn">
                    <div class="am-btn am-btn-danger">提交</div>
                </div>
            </div>
        </div>
        <!--底部-->
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