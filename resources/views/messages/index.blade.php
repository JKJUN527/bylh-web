@extends('demo.admin2')

@section("title", "站内信")

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
            cursor: pointer;
        }

        .p-content > p:hover {
            color: #000;
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
                <small>Message</small>
            </div>
        </div>
        <hr/>

        <div class="am-g am-g-fixed">
            <div class="container">
                <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
                    <div class="am-tabs" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active am-u-lg-6"><a href="#tab1" class="msgmanage">消息管理</a></li>
                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <div class="am-g am-g-fixed">
                                    <div class="am-container">

                                        @foreach($data["listMessages"] as $m)
                                            <div class="am-message am-u-lg-12 am-u-md-12 am-u-sm-12">
                                                <div class="message-title am-u-lg-3 am-u-md-3 am-u-sm-3">
                                                    <img src="{{asset("images/f1.jpg")}}" class="am-img">
                                                </div>
                                                <div class="message-id am-u-lg-5 am-u-md-5 am-u-sm-5">
                                                    <div class="p-title">
                                                        <h2>
                                                            {{$data["user"][$m["from_id"]][0]["username"]}}
                                                        </h2>
                                                    </div>
                                                    <div class="p-content"
                                                         @if($m->from_id == $data["uid"])
                                                         data-content="{{$m->to_id}}"
                                                         @else
                                                         data-content="{{$m->from_id}}"
                                                            @endif
                                                    >
                                                        <p>{{$m->content}}</p>
                                                    </div>
                                                </div>
                                                <div class="message-time am-u-lg-4 am-u-md-4 am-u-sm-4">
                                                    <p>{{$m->created_at}}</p>
                                                </div>
                                            </div>
                                        @endforeach

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
        $(".p-content").click(function () {
            self.location = "/message/detail?id=" + $(this).attr("data-content");
        })
    </script>
@endsection
