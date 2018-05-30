@extends('demo.admin',['title'=>8])
@section('title','用户指引')
@section('custom-style')
    <style type="text/css">
        @media only screen and (min-width: 641px) {
            .am-offcanvas {
                display: block;
                position: static;
                background: none;
            }

            .am-offcanvas-bar {
                position: static;
                width: auto;
                background: none;
                -webkit-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
            .am-offcanvas-bar:after {
                content: none;
            }

        }

        @media only screen and (max-width: 640px) {
            .am-offcanvas-bar .am-nav>li>a {
                color:#ccc;
                border-radius: 0;
                border-top: 1px solid rgba(0,0,0,.3);
                box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
            }

            .am-offcanvas-bar .am-nav>li>a:hover {
                background: #404040;
                color: #fff
            }

            .am-offcanvas-bar .am-nav>li.am-nav-header {
                color: #777;
                background: #404040;
                box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
                text-shadow: 0 1px 0 rgba(0,0,0,.5);
                border-top: 1px solid rgba(0,0,0,.3);
                font-weight: 400;
                font-size: 75%
            }

            .am-offcanvas-bar .am-nav>li.am-active>a {
                background: #1a1a1a;
                color: #fff;
                box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
            }

            .am-offcanvas-bar .am-nav>li+li {
                margin-top: 0;
            }
        }

        .my-head {
            margin-top: 40px;
            text-align: center;
        }

        .my-button {
            position: fixed;
            top: 0;
            right: 0;
            border-radius: 0;
        }
        .my-sidebar {
            padding-right: 0;
            border-right: 1px solid #eeeeee;
        }

        .my-footer {
            border-top: 1px solid #eeeeee;
            padding: 10px 0;
            margin-top: 10px;
            text-align: center;
        }
        #sidebar{
            width: auto !important;
            padding-top: 0 !important;
            /*border: 1px solid #c7ddef;*/
        }
        .am-nav li a{
            font-size: 1.3rem;
        }
        .am-nav{
            border-right: 1px solid darkgray;
            font-size: 1.5rem;
        }
    </style>
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .long-title{
            display:none;
        }
    </style>
@endsection
@section('content')
    <hr class="am-article-divider"/>
    <div class="am-g am-g-fixed">
        <div class="am-u-md-9 am-u-md-push-3">
            <div class="am-g">
                <div class="am-u-sm-11 am-u-sm-centered">
                    <div class="am-cf am-article">
                        <div class="am-align-left">
                            <img src="images/guide.png" alt="" width="240">
                        </div>
                        <div>
                            有关不亦乐乎的使用规则:
                        </div>
                    </div>
                    <hr/>
                    <ul class="am-comments-list">
                        <li class="am-comment">
                            <a href="#link-to-user-home">
                                <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题一: 如何提出专业问题和回答专业问题？</a>  
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：有两种方法：</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;路径1：答主在自己主页上回答问题

①每一个用户都可以在自己的主页创建一个问题并报价；②其他人需要回答就支付，并在该问题页面的“提问列表”中描述你要求回答的关注点；③答主在个人主页的“订单管理”中处理“待处理订单”后，选择“服务列表”中的“专业问答服务”，查看订单详情，在提问列表中找到该问题，点击该问题下方的“回答问题”按钮，在页面底端的回答框内就支付者描述的关注点输入答案。</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;路径2：任何用户到需求大厅寻找别人提出的问题并回答

①点击需求大厅，点开“专业问答服务需求”，选择问题；②答主点击“立即预约”，输入报价，等待对方回应；③对方认可并支付；④答主在个人主页的“订单管理”中处理“待处理订单”后，选择“需求列表”的“专业问答需求”中找到该问题，点击该问题下方的“回答问题”按钮，在页面底端的回答框内输入答案。</p>
                                </div>
                            </div>
                        </li>
                        <li class="am-comment">
                            <a href="#link-to-user-home">
                                <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题二:我提出的专业问题的回答可以在哪里查看？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：在个人主页“服务中心”中“我的需求”点击“需求列表”可以查看。</p>
                                </div>
                            </div>
                        </li>

<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题三:我该如何使用网站的功能和服务？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：请至“用户指导”板块查看“新手指南”和“常见问题”，或致电我们的客服电话028-85593827或在邮箱 不亦乐乎@bylehu.com 留言。</p>
                                </div>
                            </div>
                        </li>

<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题四:专业服务的资质靠谱吗？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：本站设置了个人及机构的专业身份认证，要求个人或机构上传其专业证书，通过后台资格审核后，专业人员方可发布专业服务。</p>
                                </div>
                            </div>
                        </li>



<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题五:专业服务人员的身份靠谱吗？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：本站设置了专业服务人员的个人身份认证，要求其上传身份证正反面，通过审核后方可发布服务。</p>
                                </div>
                            </div>
                        </li>


<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题六:已通过身份认证，想要发布服务，首页点击“发布服务”，点击“登陆”后既无法正常登陆，也没有提示。</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：已通过身份认证，想要发布服务，需要退出登录状态，重新登录，才能发布。</p>
                                </div>
                            </div>
                        </li>


<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题七:如何撤销已经发布的服务？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：用户可进入自己的主页，点击“我的服务”-“暂停服务”进行处理。</p>
                                </div>
                            </div>
                        </li>


<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题八:如何撤销已经发布的需求？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：用户可进入自己的主页，点击“我的需求”-“删除需求”进行撤销。</p>
                                </div>
                            </div>
                        </li>


<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题九:服务用户已收款，但迟迟不联系我怎么办？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：用户可以通过在对方的主页上留言提醒对方，如对方仍未提供服务，您可点击“知友沙龙”吐槽。</p>
                                </div>
                            </div>
                        </li>


<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题十:付费后，我在哪里接受服务？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：目前平台提供专业服务、实习中介、专业问答等三种服务，前两者需要线下完成，专业问答只需要在线上查看答案即可。</p>
                                </div>
                            </div>
                        </li>

<li class="am-comment">
                            <a href="#link-to-user-home">
                               	<img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96/q/80" alt="" class="am-comment-avatar" width="48" height="48">
                            </a>
                            <div class="am-comment-main">
                                <header class="am-comment-hd">
                                    <div class="am-comment-meta">
                                        <a href="#link-to-user" class="am-comment-author">问题十一:提问者已经支付，但没有回答，怎么办？</a>
                                    </div>
                                </header>
                                <div class="am-comment-bd">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;答：1.可以站内信询问对方。2.向对方出示付款依据，如微信支付凭证，对方仍不理会，您可以选择投诉。3.对方在处理订单时如果误点“未收到付款”，仍可继续回答。</p>
                                </div>
                            </div>
                        </li>




                    </ul>
                </div>
            </div>
        </div>
        <div class="am-u-md-3 am-u-md-pull-9 my-sidebar">
            <div class="am-offcanvas" id="sidebar">
                <div class="am-offcanvas-bar">
                    <ul class="am-nav">
                        {{--<li><a href="#">不亦乐乎简介</a></li>--}}
                        <li class="am-nav-header">用户指引</li>
                        <li class="am-active"><a href="#">新手指导</a></li>
                        <li><a href="#">常见问题</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="#sidebar" class="am-btn am-btn-sm am-btn-success am-icon-bars am-show-sm-only my-button" data-am-offcanvas><span class="am-sr-only">侧栏导航</span></a>
    </div>
@endsection
@section('custom-script')

@endsection
