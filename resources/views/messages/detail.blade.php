@extends('demo.admin2')
@section("title", "站内信详情")

@section("custom-style")
    <style type="text/css">
        .msgmanage {
            font-size: 16px;
            font-weight: bold;
        }

        .am-container {
            border: 2px solid #eee;
        }

        .am-message {
            border-bottom: 2px dotted #eee;
            margin-bottom: 20px;
        }

        .am-img {
            width: 120px;
            height: 120px;
        }

        .p-title {
            margin-top: 20px;
        }

        .p-title > h2 {
            font-size: 18px;
        }

        .p-content {
            margin-top: 20px;
        }

        .p-content > p {
            font-size: 16px;
            color: #999;
        }

        .message-time {
            margin-top: 40px;
        }

        .message-time > p {
            font-size: 16px;
            color: #999;
        }
    </style>
@endsection

@section('content')

    <div class="main-wrap">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">站内信</strong> /
                <small>
                    与
                    @if(is_array($data["userinfo"]) && ($data['userinfo'] == null || $data['userinfo'] == ""))
                        "未命名"
                    @elseif(isset($data["userinfo"]["real_name"]))
                        {{$data["userinfo"]["real_name"]}}
                    @elseif(!is_array($data["userinfo"]))
                        {{$data["userinfo"]}}
                    @endif
                    的对话
                </small>
            </div>
        </div>
        <hr/>

        <div class="am-g am-g-fixed">
            <div class="container">
                <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
                    <div class="am-tabs" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active am-u-lg-6"><a href="#tab2" class="msgmanage">消息详情</a></li>
                        </ul>

                        <div class="am-tabs-bd">

                            <div class="am-tab-panel am-fade am-in am-active" id="tab2">
                                <div class="am-g am-g-fixed">
                                    <div class="am-container">
                                        <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12">
                                            <!--站内信息-->
                                            <ul class="am-comments-list am-comments-list-flip">

                                                @foreach($data["message"] as $item)
                                                    @if($item["from_id"] == $data["uid"])
                                                        <li class="am-comment am-comment-flip am-comment-danger">
                                                            <a>
                                                                <img src="{{asset("images/touxiang.jpg")}}" alt=""
                                                                     class="am-comment-avatar" width="48" height="48"/>
                                                            </a>

                                                            <div class="am-comment-main">
                                                                <header class="am-comment-hd">
                                                                    <div class="am-comment-meta">
                                                                        <a class="am-comment-author">{{$data["username"]}}</a>
                                                                        回复于
                                                                        <time datetime="{{$item["created_at"]}}">
                                                                            {{$item["created_at"]}}
                                                                        </time>
                                                                    </div>
                                                                </header>

                                                                <div class="am-comment-bd">
                                                                    {{$item["content"]}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li class="am-comment am-comment-highlight">
                                                            <a>
                                                                <img src="{{asset("images/touxiang.jpg")}}" alt=""
                                                                     class="am-comment-avatar" width="48" height="48"/>
                                                            </a>

                                                            <div class="am-comment-main">
                                                                <header class="am-comment-hd">
                                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                                    <div class="am-comment-meta">
                                                                        <a class="am-comment-author">
                                                                            @if(is_array($data["userinfo"]) && ($data['userinfo'] == null || $data['userinfo'] == ""))
                                                                                "未命名"
                                                                            @elseif(isset($data["userinfo"]["real_name"]))
                                                                                {{$data["userinfo"]["real_name"]}}
                                                                            @elseif(!is_array($data["userinfo"]))
                                                                                {{$data["userinfo"]}}
                                                                            @endif
                                                                        </a>
                                                                        回复于
                                                                        <time datetime="{{$item["created_at"]}}">
                                                                            {{$item["created_at"]}}
                                                                        </time>
                                                                    </div>
                                                                </header>

                                                                <div class="am-comment-bd">
                                                                    {{$item["content"]}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach

                                                {{--<li class="am-comment">--}}
                                                    {{--<a href="#link-to-user-home">--}}
                                                        {{--<img src="images/touxiang.jpg" alt=""--}}
                                                             {{--class="am-comment-avatar" width="48" height="48"/>--}}
                                                    {{--</a>--}}

                                                    {{--<div class="am-comment-main">--}}
                                                        {{--<header class="am-comment-hd">--}}
                                                            {{--<!--<h3 class="am-comment-title">评论标题</h3>-->--}}
                                                            {{--<div class="am-comment-meta">--}}
                                                                {{--<a href="#link-to-user"--}}
                                                                   {{--class="am-comment-author">某人</a>--}}
                                                                {{--评论于--}}
                                                                {{--<time datetime="2013-07-27T04:54:29-07:00"--}}
                                                                      {{--title="2013年7月27日 下午7:54 格林尼治标准时间+0800">--}}
                                                                    {{--2014-7-12 15:30--}}
                                                                {{--</time>--}}
                                                            {{--</div>--}}
                                                        {{--</header>--}}

                                                        {{--<div class="am-comment-bd">--}}
                                                            {{--...--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</li>--}}
                                            </ul>
                                            <!--发送信息-->
                                            <div class="send-message">
                                                <div class="am-form-group">
                                                    <input type="hidden" name="to_id" value="{{$data['id']}}"/>
                                                    <input type="text" name="msg-content" class="am-u-lg-9 am-u-md-9 am-u-sm-9"
                                                           placeholder="" style="height: 80px;">
                                                    <button type="button" id="send-msg"
                                                            class="am-btn am-btn-danger am-btn-lg am-u-lg-3 am-u-md-3 am-u-sm-3"
                                                            style="    margin-top: 20px;

      															width: 200px;">发送信息
                                                    </button>
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

@section('custom-script')
    <script type="text/javascript">
        $("#send-msg").click(function () {
            var msg = $("input[name='msg-content']").val();

            msg = $.trim(msg);
            if (msg === "") {
                alert("回复信息不能为空");
            } else {

                var to_id = $("input[name='to_id']").val();

                var formData = new FormData();
                formData.append('to_id', to_id);
                formData.append('content', msg);

                $.ajax({
                    url: "/message/sendMessage",
                    type: "post",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        var result = JSON.parse(data);
                        if(result.status === 200) {
                            location.reload();
                        } else if (result.status === 400) {
                            alert("信息回复失败\n" + result.msg);
                        }
                    }
                })
            }
        })
    </script>
@endsection
