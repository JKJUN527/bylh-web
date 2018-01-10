@extends('demo.admin2')
@section('title', '绑定手机')
@section('custom-style')
<link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
        <div class="main-wrap">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> / <small>Bind&nbsp;Phone</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">绑定手机</p>
                            </span>
                    <span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
                    <span class="u-progress-placeholder"></span>
                </div>
                <div class="u-progress-bar total-steps-2">
                    <div class="u-progress-bar-inner"></div>
                </div>
            </div>
            <form class="am-form am-form-horizontal">
                <div class="am-form-group bind">
                    <label for="user-phone" class="am-form-label">验证手机</label>
                    <div class="am-form-content">
                        <span id="user-phone">186XXXX0531</span>
                    </div>
                </div>
                <div class="am-form-group code">
                    <label for="user-code" class="am-form-label">验证码</label>
                    <div class="am-form-content">
                        <input type="tel" id="user-code" placeholder="短信验证码">
                    </div>
                    <a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
                        <div class="am-btn am-btn-danger">验证码</div>
                    </a>
                </div>
                <div class="am-form-group">
                    <label for="user-new-phone" class="am-form-label">验证手机</label>
                    <div class="am-form-content">
                        <input type="tel" id="user-new-phone" placeholder="绑定新手机号">
                    </div>
                </div>
                <div class="am-form-group code">
                    <label for="user-new-code" class="am-form-label">验证码</label>
                    <div class="am-form-content">
                        <input type="tel" id="user-new-code" placeholder="短信验证码">
                    </div>
                    <a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
                        <div class="am-btn am-btn-danger">验证码</div>
                    </a>
                </div>
                <div class="info-btn">
                    <div class="am-btn am-btn-danger">保存修改</div>
                </div>

            </form>

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