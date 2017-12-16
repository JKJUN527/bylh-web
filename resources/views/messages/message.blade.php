@extends('demo.admin2')
@section('content')
<div class="center">
    <div class="col-main">
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
                                <li class="am-active am-u-lg-6"><a href="#tab1" style="font-size: 16px;font-weight:bold;">消息管理</a></li>
                                <li class="am-u-lg-6"><a href="#tab2" style="font-size: 16px;font-weight:bold;">发送消息</a></li>
                            </ul>

                            <div class="am-tabs-bd">
                                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                    <div class="am-g am-g-fixed">
                                        <div class="am-container" style="border:2px solid #eee;">
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12" style="border-bottom: 2px dotted #eee;margin-bottom: 20px;">
                                                <div class="message-title am-u-lg-3 am-u-md-3 am-u-sm-3">
                                                    <img src="images/f1.jpg" style="width: 120px;height: 120px;">
                                                </div>
                                                <div class="message-id am-u-lg-5 am-u-md-5 am-u-sm-5" >
                                                    <div class="p-title" style="margin-top: 20px;">
                                                        <h2 style="font-size: 18px;">不亦乐乎网</h2>
                                                    </div>
                                                    <div class="p-content" style="margin-top: 20px;">
                                                        <p style="font-size: 16px;color: #999;">欢迎来到不亦乐乎!</p>
                                                    </div>
                                                </div>
                                                <div class="message-time am-u-lg-4 am-u-md-4 am-u-sm-4" style="margin-top: 40px;">
                                                    <p style="font-size: 16px;color: #999;">2017-12-11</p><span style="padding-left:20px;font-size: 16px;color: #999;">10:58</span>
                                                </div>
                                            </div>
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12" style="border-bottom: 2px dotted #eee;margin-bottom: 20px;">
                                                <div class="message-title am-u-lg-3 am-u-md-3 am-u-sm-3">
                                                    <img src="images/f1.jpg" style="width: 120px;height: 120px;">
                                                </div>
                                                <div class="message-id am-u-lg-5 am-u-md-5 am-u-sm-5" >
                                                    <div class="p-title" style="margin-top: 20px;">
                                                        <h2 style="font-size: 18px;">不亦乐乎网</h2>
                                                    </div>
                                                    <div class="p-content" style="margin-top: 20px;">
                                                        <p style="font-size: 16px;color: #999;">欢迎来到不亦乐乎!</p>
                                                    </div>
                                                </div>
                                                <div class="message-time am-u-lg-4 am-u-md-4 am-u-sm-4" style="margin-top: 40px;">
                                                    <p style="font-size: 16px;color: #999;">2017-12-11</p><span style="padding-left:20px;font-size: 16px;color: #999;">10:58</span>
                                                </div>
                                            </div>
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12" style="border-bottom: 2px dotted #eee;margin-bottom: 20px;">
                                                <div class="message-title am-u-lg-3 am-u-md-3 am-u-sm-3">
                                                    <img src="images/f1.jpg" style="width: 120px;height: 120px;">
                                                </div>
                                                <div class="message-id am-u-lg-5 am-u-md-5 am-u-sm-5" >
                                                    <div class="p-title" style="margin-top: 20px;">
                                                        <h2 style="font-size: 18px;">不亦乐乎网</h2>
                                                    </div>
                                                    <div class="p-content" style="margin-top: 20px;">
                                                        <p style="font-size: 16px;color: #999;">欢迎来到不亦乐乎!</p>
                                                    </div>
                                                </div>
                                                <div class="message-time am-u-lg-4 am-u-md-4 am-u-sm-4" style="margin-top: 40px;">
                                                    <p style="font-size: 16px;color: #999;">2017-12-11</p><span style="padding-left:20px;font-size: 16px;color: #999;">10:58</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab2">
                                    <div class="am-g am-g-fixed">
                                        <div class="am-container" style="border:2px solid #eee;">
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12" style="border-bottom: 2px dotted #eee;margin-bottom: 20px;">
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
        <!--底部-->
        @section('footer')
        <div class="footer ">
            <div class="footer-hd ">
            </div>
            <div class="footer-bd ">
                <p style="text-align: center;">
                    ©2017-2018 bylh.com 成备xxxxxxxx号<br>
                    不亦乐乎（成都）有限公司<br>
                    客服：xxxx-xxx-xxx

                </p>
            </div>
        </div>
            @endsection
@endsection