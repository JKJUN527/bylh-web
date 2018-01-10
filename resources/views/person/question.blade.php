@extends('demo.admin2')
@section('title','安全问题')
@section('content')
        <div class="main-wrap">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">设置安全问题</strong> / <small>Set&nbsp;Safety&nbsp;Question</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">设置安全问题</p>
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
                <div class="am-form-group select">
                    <label for="user-question1" class="am-form-label">问题一</label>
                    <div class="am-form-content">
                        <select data-am-selected>
                            <option value="a" selected>请选择安全问题</option>
                            <option value="b">您最喜欢的颜色是什么？</option>
                            <option value="c">您的故乡在哪里？</option>
                        </select>
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-answer1" class="am-form-label">答案</label>
                    <div class="am-form-content">
                        <input type="text" id="user-answer1" placeholder="请输入安全问题答案">
                    </div>
                </div>
                <div class="am-form-group select">
                    <label for="user-question2" class="am-form-label">问题二</label>
                    <div class="am-form-content">
                        <select data-am-selected>
                            <option value="a" selected>请选择安全问题</option>
                            <option value="b">您最喜欢的颜色是什么？</option>
                            <option value="c">您的故乡在哪里？</option>
                        </select>
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-answer2" class="am-form-label">答案</label>
                    <div class="am-form-content">
                        <input type="text" id="user-answer2" placeholder="请输入安全问题答案">
                    </div>
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