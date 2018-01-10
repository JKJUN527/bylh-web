@extends('demo.admin2')
@section('title', '消息管理')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .msgmanage{
            font-size: 16px;
            font-weight:bold;
        }
        .am-container{
            border:2px solid #eee;
        }
        .am-message{
            border-bottom: 2px dotted #eee;
            margin-bottom: 20px;
        }
        .am-img{
            width: 120px;
            height: 120px;
        }
        .p-title{
            margin-top: 20px;
        }
        .p-title>h2{
            font-size: 18px;
        }
        .p-content{
            margin-top: 20px;
        }
        .p-content>p{
            font-size: 16px;
            color: #999;
        }
        .message-time{
            margin-top: 40px;
        }
        .message-time>p{
            font-size: 16px;
            color: #999;
        }
    </style>
@endsection
@section('content')
        <div class="main-wrap">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">站内信</strong> / <small>Message</small></div>
            </div>
            <hr/>

            <div class="am-g am-g-fixed">
                <div class="container">
                    <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
                        <div class="am-tabs" data-am-tabs>
                            <ul class="am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active am-u-lg-6"><a href="#tab1" class="msgmanage">消息管理</a></li>
                                <li class="am-u-lg-6"><a href="#tab2" class="msgmanage" >发送消息</a></li>
                            </ul>

                            <div class="am-tabs-bd">
                                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                    <div class="am-g am-g-fixed">
                                        <div class="am-container">
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12">
                                                <div class="message-title am-u-lg-3 am-u-md-3 am-u-sm-3">
                                                    <img src="images/f1.jpg" class="am-img">
                                                </div>
                                                <div class="message-id am-u-lg-5 am-u-md-5 am-u-sm-5" >
                                                    <div class="p-title">
                                                        <h2>不亦乐乎网</h2>
                                                    </div>
                                                    <div class="p-content">
                                                        <p>欢迎来到不亦乐乎!</p>
                                                    </div>
                                                </div>
                                                <div class="message-time am-u-lg-4 am-u-md-4 am-u-sm-4">
                                                    <p>2017-12-11</p><span style="padding-left:20px;font-size: 16px;color: #999;">10:58</span>
                                                </div>
                                            </div>
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12">
                                                <div class="message-title am-u-lg-3 am-u-md-3 am-u-sm-3">
                                                    <img src="images/f1.jpg" class="am-img">
                                                </div>
                                                <div class="message-id am-u-lg-5 am-u-md-5 am-u-sm-5" >
                                                    <div class="p-title">
                                                        <h2>不亦乐乎网</h2>
                                                    </div>
                                                    <div class="p-content">
                                                        <p >欢迎来到不亦乐乎!</p>
                                                    </div>
                                                </div>
                                                <div class="message-time am-u-lg-4 am-u-md-4 am-u-sm-4" >
                                                    <p>2017-12-11</p><span style="padding-left:20px;font-size: 16px;color: #999;">10:58</span>
                                                </div>
                                            </div>
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12" >
                                                <div class="message-title am-u-lg-3 am-u-md-3 am-u-sm-3">
                                                    <img src="images/f1.jpg" class="am-img">
                                                </div>
                                                <div class="message-id am-u-lg-5 am-u-md-5 am-u-sm-5" >
                                                    <div class="p-title">
                                                        <h2 >不亦乐乎网</h2>
                                                    </div>
                                                    <div class="p-content">
                                                        <p>欢迎来到不亦乐乎!</p>
                                                    </div>
                                                </div>
                                                <div class="message-time am-u-lg-4 am-u-md-4 am-u-sm-4" >
                                                    <p >2017-12-11</p><span style="padding-left:20px;font-size: 16px;color: #999;">10:58</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab2">
                                    <div class="am-g am-g-fixed">
                                        <div class="am-container">
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12" >
                                                <!--站内信息-->
                                                <ul class="am-comments-list am-comments-list-flip">
                                                    <li class="am-comment">
                                                        <a href="#link-to-user-home">
                                                            <img src="images/touxiang.jpg" alt="" class="am-comment-avatar" width="48" height="48"/>
                                                        </a>

                                                        <div class="am-comment-main">
                                                            <header class="am-comment-hd">
                                                                <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                <div class="am-comment-meta">
                                                                    <a href="#link-to-user" class="am-comment-author">某人</a>
                                                                    评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
                                                                </div>
                                                            </header>

                                                            <div class="am-comment-bd">
                                                                ...
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="am-comment am-comment-flip am-comment-danger">
                                                        <a href="#link-to-user-home">
                                                            <img src="images/touxiang.jpg" alt="" class="am-comment-avatar" width="48" height="48"/>
                                                        </a>

                                                        <div class="am-comment-main">
                                                            <header class="am-comment-hd">
                                                                <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                <div class="am-comment-meta">
                                                                    <a href="#link-to-user" class="am-comment-author">某人</a>
                                                                    评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
                                                                </div>
                                                            </header>

                                                            <div class="am-comment-bd">
                                                                ...
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="am-comment">
                                                        <a href="#link-to-user-home">
                                                            <img src="images/touxiang.jpg" alt="" class="am-comment-avatar" width="48" height="48"/>
                                                        </a>

                                                        <div class="am-comment-main">
                                                            <header class="am-comment-hd">
                                                                <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                <div class="am-comment-meta">
                                                                    <a href="#link-to-user" class="am-comment-author">某人</a>
                                                                    评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
                                                                </div>
                                                            </header>

                                                            <div class="am-comment-bd">
                                                                ...
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="am-comment am-comment-flip">
                                                        <a href="#link-to-user-home">
                                                            <img src="images/touxiang.jpg" alt="" class="am-comment-avatar" width="48" height="48"/>
                                                        </a>

                                                        <div class="am-comment-main">
                                                            <header class="am-comment-hd">
                                                                <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                <div class="am-comment-meta">
                                                                    <a href="#link-to-user" class="am-comment-author">某人</a>
                                                                    评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
                                                                </div>
                                                            </header>

                                                            <div class="am-comment-bd">
                                                                ...
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="am-comment am-comment-highlight">
                                                        <a href="#link-to-user-home">
                                                            <img src="images/touxiang.jpg" alt="" class="am-comment-avatar" width="48" height="48"/>
                                                        </a>

                                                        <div class="am-comment-main">
                                                            <header class="am-comment-hd">
                                                                <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                <div class="am-comment-meta">
                                                                    <a href="#link-to-user" class="am-comment-author">某人</a>
                                                                    评论于 <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
                                                                </div>
                                                            </header>

                                                            <div class="am-comment-bd">
                                                                ...
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!--发送信息-->
                                                <div class="send-message">
                                                    <div class="am-form-group">
                                                        <input type="" class="am-u-lg-9 am-u-md-9 am-u-sm-9" id="" placeholder="" style="height: 80px;">
                                                        <button type="button" class="am-btn am-btn-danger am-btn-lg am-u-lg-3 am-u-md-3 am-u-sm-3" style="    margin-top: 20px;

      															width: 200px;">发送信息</button>
                                                    </div>
                                                </div>

                                            </div>
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