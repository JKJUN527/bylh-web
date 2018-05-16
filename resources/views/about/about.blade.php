@extends('demo.admin',['title'=>7])
@section('title','关于我们')
@section('custom-style')
    <style type="text/css">
        @media only screen and (min-width: 241px) {
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
        .abouth1 {
            font-size: 18px;
            padding: 3px;
            font-weight: normal;
            line-height: 36px;
        }

        @media only screen and (max-width: 340px) {
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
        <div class="am-u-md-9 am-u-md-push-2">
            <div class="am-g">
                <div class="am-u-sm-11 am-u-sm-centered">
                    <div class="am-cf am-article">
                        <div class="am-align-left">
                            <img src="images/3-2.png" alt="" width="120">
                        </div>
                        <div>
                           
<h1 class="abouth1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;语曰：有朋自远方来，不亦乐乎！以才能和知识会友，以成知友，其乐融融！<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;《不亦乐乎》（bylehu.com和bylehu.cn）定位于提供专业服务的知识技能共享平台，用户可以在【专业服务】【实习中介】【专业问答】开展知识技能的交易，也可以在【知友沙龙】就知识服务进行意见交流。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们的愿景是：让每个人的知识都变现。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;专业人士和知识人群的一个普遍问题，是你拥有专业技能和专业知识，却不知道谁需要这些技能和知识。广大社会公众对于专业技能和专业知识的大量需求，又往往不知道谁能够满足。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;现在，我们提供这个在线平台，将专业技能和专业知识的供求双方汇聚在一起，让你们能够顺利提供或者享受专业服务。分散存在于专业人士的各种专业技能以及知识人群富含专业知识的大量零星时间，都可以投射到这个平台上，与社会上大量的零散需求进行在线匹配以形成相应的专业服务，实现这些技能和知识的价值。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;大学生最困惑的问题，是你就业或者创业之前没有从业经历。现在，我们提供这个平台作为你的网上自助实习基地，在这里踏出你创业就业的第一步，你可以依据所学专业自由寻找对象进行专业服务开启你的从业生涯，还可以一展所学让知识变现。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;知友，与人分享你的才华、技能和智慧，不亦乐乎！<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们的使命是促进知识价值的实现，对于信息上传、信息发布和信息推送实行免费，平台撮合供求双方自愿成交，谁服务谁收益。<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们的营运主体是成都不亦乐乎网络科技有限公司。<br></h1>
                        </div>
                        <div class="am-align-center">
                            <br><br>
                            <img src="images/contact.png" alt="" width="80">
                        </div>

                    </div>
                    <hr/>
                    
                </div>
            </div>
        </div>
        <div class="am-u-md-3 am-u-md-pull-9 my-sidebar">
            <div class="am-offcanvas" id="sidebar">
                <div class="am-offcanvas-bar">
                    
                </div>
            </div>
        </div>
        <a href="#sidebar" class="am-btn am-btn-sm am-btn-success am-icon-bars am-show-sm-only my-button" data-am-offcanvas><span class="am-sr-only">侧栏导航</span></a>
    </div>
@endsection
@section('custom-script')

@endsection
