@extends('demo.admin3',['title'=>2])
@section('title', '需求详情')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>--}}
    <style type="text/css">
        .long-title{
            display: none;
        }
        .comcategory li {
            font-size: 14px;
            padding: 3px;
        }

        .comcategory li a:hover {
            color: #b84554;
        }

        .comcategory li i {
            color: gray;
            margin-left: 10px;
        }

        .title-first a {
            text-align: center;
            padding: 60px;
            font-size: 18px;
            color: #000;
            font-weight: bold;
        }

        .title-first a:hover {
            color: #b84554;
            font-weight: bold;
        }

        .demo li {
            float: none;
            width: 100%;
            padding: 0px 5px;
            border: none;
            height: 30px;
            line-height: 30px;
        }
        .form-group {
            margin-bottom: 16px;
            width: 100%;
        }
        .form-control {
            width: 100%;
            border-top-style: outset;
            border-block-end-color: tomato;
        }
        .help-info {
            float: right;
            color: red;
        }

        .company_left {
            margin-left: -20px;
        }

        .company_right {
            margin-top: -90px;
            margin-left: 80px;
            font-family: SimSun;
            font-weight: 400;
            line-height: 28px;
            color: #666666;
            font-size: 12px;
            width: 80%;
        }
        .complaint{
            margin-right: 32%;
            float: right;
        }
        #demand_title p{
            display: inline;
            font-size: 1.5rem;
        }
        .container1{
            border: 2px solid #eee;
            padding: 20px;
            background: #fff;
        }
        .complaint-detail{
            display: none;
        }
        .complaint-detail h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .complaint-detail form{
            margin-top: 1rem;
        }
        .am-radio-inline{
            margin-left: 0px !important;
        }
    </style>
@endsection
@section('content')
    <!--发布需求-->
    <div class="am-g am-g-fixed" style="padding-top: 85px;">
        <div class="am-u-lg-8 am-u-md-8 am-u-sm-8">
            <div class="container1 complaint-detail">
                <div class="am-form-group">
                    <h3>请选择投诉类别</h3>
                    <input type="radio" name="complaint" value="-1" style="display: none" checked>
                    <label class="am-radio-inline">
                        <input type="radio" name="complaint" value="0" data-am-ucheck>垃圾营销
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="complaint" value="1" data-am-ucheck>不实信息
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="complaint" value="2" data-am-ucheck>有害信息
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="complaint" value="3" data-am-ucheck>违法信息
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="complaint" value="4" data-am-ucheck>污秽色情
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="complaint" value="5" data-am-ucheck>人事攻击
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="complaint" value="6" data-am-ucheck>内容抄袭
                    </label>

                    <form action="" class="am-form">
                        <fieldset>
                            <h3>投诉详情描述</h3>
                            <div class="am-form-group">
                                <textarea minlength="10" id="complaint_detail"></textarea>
                            </div>
                        </fieldset>
                    </form>
                    <button class="am-btn am-btn-secondary" type="submit" id="upload">提交</button>
                    <button class="am-btn am-btn-default cancel-complaint">取消</button>
                </div>
            </div>
            <div class="container1">
                <div id="demand_title" class="title" data-content="{{$data["detail"]->id}}"
                     style="height: 37px;font-family: 'Microsoft YaHei';color: #666666;font-size: 18px;font-weight: 700;line-height: 37px;width:  850px;overflow: hidden;">
                    <p>{{$data["detail"]->title}}</p>
                    <button type="button" class="am-btn am-btn-default complaint">投诉建议</button>
                </div>

                <hr/>
                <div class="item-mode">
                    {{--<div class="item-lesstime">--}}
                    {{--<div class="fl " id="djsTime"--}}
                    {{--style="font-family: 'Microsoft YaHei';color: #666666;font-size: 16px;font-weight: bold;">--}}
                    {{--剩余时间：--}}
                    {{--<strong id="RemainD" style="color: #FF6600">21</strong>天<strong id="RemainH" style="color: #FF6600">9</strong>时<strong id="RemainM" style="color: #FF6600">23</strong>分<strong id="RemainS" style="color: #FF6600">40</strong>秒--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="fl item_xs" style="margin-top: 10px;">
                        <div class="xs_morearr xs_morearr_nobg">赏金：
                            <span style="font-size: 20px;color: #b84554;padding-left: 20px;">
                            @if($data["detail"]->price == -1)
                                    价格面议
                                @else
                                    ￥{{$data["detail"]->price}}
                                @endif
                            </span>
                            <span style="float: right;">浏览量:{{$data["detail"]->view_count}}</span>&nbsp
                            <span style="float: right;margin-right: 1.5rem;">发布时间:{{substr($data["detail"]->created_at,0,10)}}</span>
                        </div>
                    </div>
                </div>
                <div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
                    <ul class="am-slides">
                        @if($data["detail"]->picture != null)
                            <?php
                            $pics = explode(';', $data["detail"]->picture);
                            $baseurl = explode('@', $pics[0])[0];
                            $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                            $temps = explode('@', $data["detail"]->picture);
                            ?>
                            @foreach($temps as $item)
                                @if(strstr($item,";"))
                                    <?php $imagepath = explode(';', $item)[0];?>
                                    <li><img src="{{$baseurl}}{{$imagepath}}" style="width:100%;height: 500px; "/></li>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        @else
                            <li><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg" /></li>
                            <li><img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" /></li>
                        @endif
                    </ul>
                </div>
                <hr style="">
                <div class="desct-container" style="margin-top: 10px;">
                    <div class="desct-title"
                         style="line-height: 25px;font-size: 18px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">
                        任务详情:
                        <div class="desct-content">
                            <p>
                            {!!$data["detail"]->describe !!}
                            <h3 style="font-size: 15px;font-weight: bold;">需求类型：
                                @if($data["detail"]->type == 0)
                                    一般服务需求
                                @elseif($data["detail"]->type == 1)
                                    金融需求
                                @elseif($data["detail"]->type == 2)
                                    专业问答需求
                                @else
                                    其他类型
                                @endif
                            </h3>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="guessrequest"
                 style="margin-top: 20px;border-width: 2px;border-color: #e9e5e5;border-style: solid;background-color: #ffffff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);padding-left:24px;padding-top: 35px;padding-bottom: 20px;padding-right: 20px;">
                <div class="title"
                     style="font-family: 'Microsoft YaHei';color: #333;font-size: 24px;font-weight: 400;line-height: 24px;">
                    <span class="sign" style="padding: 0px 3px;background-color: #ff8a00;margin-right: 15px;"></span>需求回答列表
                    <div class="moreItems">
                        <ul class="am-comments-list am-comments-list-flip">
                            @foreach($data['review'] as $review)
                                <li class="am-comment">
                                    <article class="am-comment">
                                        <a href="#link-to-user-home">
                                            <img src="{{$review->photo}}" alt="" class="am-comment-avatar" width="48"
                                                 height="48"/>
                                        </a>
                                        <div class="am-comment-main">
                                            <header class="am-comment-hd">
                                                <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                <div class="am-comment-meta">
                                                    <a href="#link-to-user" class="am-comment-author">{{$review->username}}</a>
                                                    回答于
                                                    <time>{{$review->created_at}}</time>
                                                </div>
                                            </header>

                                            <div class="am-comment-bd">
                                                {{$review->comments}}
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="answerdemand" style="margin-top: 20px;border-width: 2px;border-color: #e9e5e5;border-style: solid;background-color: #ffffff;box-shadow:0px 3px 0px 0px rgba(4,0,0,0.1);padding-left:24px;padding-top: 35px;padding-bottom: 20px;padding-right: 20px;">
                <form id="comment-form" method="post" >
                    <input type="hidden" name="did" value="{{$data["detail"]->id}}"/>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="2" class="form-control" name="content"
                                      id="additional-content"
                                      placeholder="写点什么..."></textarea>
                        </div>
                        <div class="help-info" id="comment-help">还可输入114字</div>
                        <label class="error" for="additional-content"></label>
                    </div>

                    <button id="btn-comment" type="button" class="am-btn am-btn-warning">
                        评论
                    </button>
                </form>

            </div>
        </div>
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
            <div class="need-user-title"
                 style="margin-left:20px;padding: 33px;border-width: 2px;border-color: #e9e5e5;border-style: solid;background-color: #ffffff;box-shadow: 0px 3px 0px 0px rgba(4, 0, 0, 0.1);">
                <div class="company_left am-u-lg-4 am-u-md-4 am-u-sm-4">
                    <a>
                        <img src="
                        @if($data["userinfo"]->photo == "")
                        {{asset('images/head1.gif')}}
                        @else
                        {{$data["userinfo"]->photo}}
                        @endif
                                " alt="" style="width: 84px; height: 84px;border: solid 1px #ddd;">
                    </a>
                </div>
                <div class="company_right am-u-lg-4 am-u-md-4 am-u-sm-4">
                    <a class="company_name"
                       style="font-family: SimSun; color: #333333; font-weight: 700;font-size: 16px;height: 30px;line-height: 30px;display: block;overflow: hidden;">
                        {{$data['username']}}</a>
                    <div>
                        {{$data["userinfo"]->city}}<br>
                        个人签名：<span style="color:#ff6600">{{$data["userinfo"]->note}}</span>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="company_button" style="padding-top:10px;">
                    <button class="am-btn am-btn-danger js-alert" type="button" onclick="date()">立即预约
                    </button>
                    <button class="am-btn am-btn-success" type="button" onclick="leaveMsg()" style="float: right;">
                        和我联系
                    </button>
                </div>

            </div>
            <!--预约弹窗-->
            <div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt" >
                <div class="am-modal-dialog" style="margin-top:20%;">
                    <div class="am-modal-hd">预约需求</div>
                    <div class="am-modal-bd">
                        我的报价：
                        <input type="text" class="am-modal-prompt-input" placeholder="请输入您的报价">
                    </div>
                    <div class="am-modal-footer">
                        <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                        <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                    </div>
                </div>
            </div>
            <!--留言弹窗-->
            <div class="am-modal am-modal-alert" tabindex="-1" id="my-content">
                <div class="am-modal-dialog" style="margin-top: 40%;">
                    <div class="am-modal-hd">和我联系</div>
                    <a href="#" >
                        <div class="serviceMsg">
                            <img src="{{$data["userinfo"]->photo or asset('images/head1.gif')}}" style="width:150px;height:150px;">
                            <p id="userinfo" data-content="{{$data["userinfo"]->uid}}">雇主姓名：<span>{{$data["userinfo"]->real_name}}</span></p>
                        </div>
                    </a>
                    <div class="am-modal-bd">
                        <label for="doc-ta-1"></label><br>
                        {{--<p><input type="textarea" class="am-form-field am-radius" placeholder="椭圆表单域" style="height: 300px;"/></p>--}}
                        <textarea id="leave_mesg" placeholder="请写上你想说的话" class="am-form-field am-radius" style="height:150px;" ></textarea>
                    </div>
                    <div class="am-modal-footer">
                        <span class="am-modal-btn" data-am-modal-confirm>提交</span>
                        <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                    </div>
                </div>
            </div>

            <div class="need-siminar"
                 style="padding-left: 24px;padding-top: 35px;padding-bottom: 20px;border-width: 2px;border-color: #e9e5e5;border-style: solid;background-color: #ffffff;margin-top: 25px;margin-left:20px;padding-right: 10px;">
                <div class="title"
                     style="height: 25px;font-family: 'Microsoft YaHei';color: #333;font-size: 24px;font-weight: 400;line-height: 24px;">
                    <span class="sign" style="padding: 0px 3px;background-color: #ff8a00;margin-right: 15px;"></span>用户发布其他需求
                </div>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                <div class="moreItems">

                    <ul style="line-height: 28px;">
                        <?php $i=0;?>
                        @foreach($data["otherDemands"] as $od)
                            <li><a href="/demands/detail?id={{$od->id}}"><span style="color: #ff0000;font-weight: 700;">￥{{$od->price}}</span>&nbsp;{{$od->title}}
                                </a>
                            </li>
                            <?php $i++;?>
                        @endforeach
                        @if($i==0)
                            <li>暂无其他需求</li>
                        @endif

                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection

@section("custom-script")
    <script src="{{asset("js/amazeui.dialog.min.js")}}" type="text/javascript"></script>
    <script>
        var maxSize = 114;

        $(".form-control").focus(function () {
            $(this.parentNode).addClass("focused");
        }).blur(function () {
            $(this.parentNode).removeClass("focused");
        });

        $('textarea').keyup(function () {

            var length = $(this).val().length;
            if (length > maxSize) {
                $(".error[for='additional-content']").html("内容超过114字");
                $("#btn-comment").prop("disabled", true);
            } else {
                $(".error[for='additional-content']").html("");
                $("#btn-comment").prop("disabled", false);
            }

            $("#comment-help").html("还可输入" + (maxSize - length < 0 ? 0 : maxSize - length) + "字");

        });
        $('#btn-comment').click(function () {
            var did = $('input[name=did]').val();
            var demandview = $('#additional-content');
            if(demandview.val().length <=0){
                swal("","评论为空","error");
                return;
            }
            if(demandview.val().length > maxSize){
                swal("字数超过最大值"+maxSize);
                return;
            }
            var formData = new FormData();
            formData.append("did", did);
            formData.append("review", demandview.val());

            $.ajax({
                url: "/demands/reviewDemand",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if(result.status == 400){
                        swal("",result.msg,"error");
                    }else{
                        swal("","评论成功","success");
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                }
            });
        });
        function date(){
            $('#my-prompt').modal({
                relatedTarget: this,
                onConfirm: function(e) {
                    var demand = $("#demand_title");

                    if(!/^[0-9]*(\.[0-9]{1,2})?$/.test(e.data)){
                        swal("","请输入正确的价格！","error");
                        return;
                    }
                    var formData = new FormData();
                    formData.append("did", demand.attr('data-content'));
                    formData.append("price", e.data);

                    $.ajax({
                        url: "/order/reservationDemand",
                        type: "post",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            var result = JSON.parse(data);
                            if (result.status == 200) {
                                swal("","预约成功！","success");
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }else{
                                swal('',result.msg,'error');
                            }
                        }
                    });
                }
            });
        }
        function leaveMsg(){
            $('#my-content').modal({
                onConfirm: function(){
                    var leave_mesg = $('#leave_mesg');
                    var to_id = $('#userinfo').attr('data-content');
                    if(leave_mesg.val().length >=250){
                        swal("","字数不能超过250字","error");
                        return;
                    }
                    var formData = new FormData();
                    formData.append("content", leave_mesg.val());
                    formData.append("to_id", to_id);
                    $.ajax({
                        url: "/message/sendMessage",
                        type: "post",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            //console.log(data);
                            var result = JSON.parse(data);
                            if (result.status == 200) {
                                swal("","留言成功","success");
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }else{
                                swal('',result.msg,'error');
                            }
                        }
                    });
                }
            });
        }
        //点击投诉后,显示投诉内容框
        $('.complaint').click(function () {
            $('.complaint-detail').fadeToggle();
        });
        $('.cancel-complaint').click(function () {
            $('.complaint-detail').fadeToggle();
        });
        $('#upload').click(function (event) {
            var type = $('input:radio[name="complaint"]:checked').val();
            var detail = $('#complaint_detail').val();
            var url = window.location.href;
            var real_place = "@需求标题：" + $.trim($('#demand_title').find('p').text());
            if(type == -1){
                swal('','请选择投诉类别','error');
                return;
            }
            if(detail.length <=5){
                swal('','投诉详情至少输入5个字','error');
                return;
            }

            var formData = new FormData();
            formData.append("type", type);
            formData.append("detail", detail);
            formData.append("url", url);
            formData.append("real_place", real_place);
            $.ajax({
                url: "/complaint",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    //console.log(data);
                    var result = JSON.parse(data);
                    if (result.status == 200) {
                        swal("", result.msg, "success");
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        swal('', result.msg, 'error');
                    }
                }
            });
        });
    </script>
@endsection
