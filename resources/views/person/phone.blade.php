@extends('demo.admin2')
@section('title', '绑定手机')
@section('custom-style')
<link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">
    <style>
        .input_code{
            width: 28rem !important;
        }
    </style>
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
                @if($data['userinfo']->tel_verify ==1)
                    <div class="am-form-group bind">
                        <label for="user-phone" class="am-form-label">已绑定手机</label>
                        <div class="am-form-content">
                            <input id="old_phone" style="display: none" value="{{$data['userinfo']->tel}}"/>
                            <span id="user-phone">{{substr($data['userinfo']->tel,0,3)}}xxxx{{substr($data['userinfo']->tel,7,4)}}</span>
                        </div>
                    </div>
                    <div class="am-form-group code" name="old_one">
                        <label for="user-code" class="am-form-label">验证码</label>
                        <div class="am-form-content">
                            <input type="tel" id="user-code"  class="input_code" placeholder="短信验证码">
                        </div>
                        <a class="btn" href="javascript:void(0);" onclick="sendMobileCode('old');" id="sendMobileCode1">
                            <div class="am-btn am-btn-danger" id="old_code">验证码</div>
                        </a>
                    </div>
                    <div class="info-btn" name="old_one">
                        <div class="am-btn am-btn-danger" id="submit">确认</div>
                    </div>
                    <div class="am-form-group" style="display: none" name="new_one">
                        <label for="user-new-phone" class="am-form-label">新手机号</label>
                        <div class="am-form-content">
                            <input type="tel" id="user-new-phone" class="input_code" placeholder="绑定新手机号">
                        </div>
                    </div>
                    <div class="am-form-group code" style="display: none" name="new_one">
                        <label for="user-new-code" class="am-form-label">验证码</label>
                        <div class="am-form-content">
                            <input type="tel" id="user-new-code" class="input_code" placeholder="短信验证码">
                        </div>
                        <a class="btn" href="javascript:void(0);" onclick="sendMobileCode('new');" id="sendMobileCode2">
                            <div class="am-btn am-btn-danger" id="new_code">验证码</div>
                        </a>
                    </div>
                    <div class="info-btn" style="display: none" name="new_one">
                        <div class="am-btn am-btn-danger" id="update_phone">保存修改</div>
                    </div>
                @else
                    <div class="am-form-group" name="new_one">
                        <label for="user-new-phone" class="am-form-label">新手机号</label>
                        <div class="am-form-content">
                            <input type="tel" id="user-new-phone" class="input_code" placeholder="绑定新手机号">
                        </div>
                    </div>
                    <div class="am-form-group code" name="new_one">
                        <label for="user-new-code" class="am-form-label">验证码</label>
                        <div class="am-form-content">
                            <input type="tel" id="user-new-code" class="input_code" placeholder="短信验证码">
                        </div>
                        <a class="btn" href="javascript:void(0);" onclick="sendMobileCode('new');" id="sendMobileCode2">
                            <div class="am-btn am-btn-danger" id="new_code">验证码</div>
                        </a>
                    </div>
                    <div class="info-btn" name="new_one">
                        <div class="am-btn am-btn-danger" id="update_phone">保存修改</div>
                    </div>
                @endif


            </form>

        </div>
        <!--底部-->
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
    <script>
        function sendMobileCode(option) {
            if(option == "old"){
                var phone = $('#old_phone');
                var form_data = new FormData();
                form_data.append('phone', phone.val());
                $.ajax({
                    url: "/account/sendSms",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: "post",
                    data: form_data,
                    success: function (data) {
                        console.log(data);
                        var result = JSON.parse(data);
                        if (result.status === 200) {
                            swal("短信验证码已发送");
                            // 倒计时30秒
                            countDown(30,'old');
                        } else if (result.status === 400) {
                            swal(result.msg);
                        }
                    }
                });
            }else{
                var phone = $('#user-new-phone');

                if (phone.val() === '') {
                    swal("","电话不能为空", "error");
                    return;
                } else if (!/^1[34578]\d{9}$/.test(phone.val())) {
                    swal("","手机号格式不正确", "error");
                    return;
                }

                var form_data = new FormData();
                form_data.append('phone', phone.val());
                $.ajax({
                    url: "/account/sendSms",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: "post",
                    data: form_data,
                    success: function (data) {
                        console.log(data);
                        var result = JSON.parse(data);
                        if (result.status === 200) {
                            swal("短信验证码已发送");
                            phone.attr("disabled", true);
                            // 倒计时30秒
                            countDown(30,'new');

                        } else if (result.status === 400) {
                            swal(result.msg);
                        }
                    }
                });
            }
        }
        function countDown(second,option) {
            if(option == 'old'){
                var obj = $("#old_code");
                var btn = $("#sendMobileCode1");
                // 如果秒数还是大于0，则表示倒计时还没结束
                if (second >= 0) {
                    // 获取默认按钮上的文字
                    // 按钮置为不可点击状态
                    btn.attr('onclick',"");
                    obj.attr('disabled',"true");
                    // 按钮里的内容呈现倒计时状态
                    obj.text(' (' + second + ')s');
                    // 时间减一
                    second--;
                    // 一秒后重复执行
                    setTimeout(function () {
                        countDown(second,"old");
                    }, 1000);
                    // 否则，按钮重置为初始状态
                } else {
                    // 按钮置未可点击状态
                    obj.removeAttr('disabled');
                    btn.attr('onclick',"sendMobileCode('old');");
                    // 按钮里的内容恢复初始状态
                    obj.text("验证码");
                }
            }else{
                var obj = $("#new_code");
                var btn = $("#sendMobileCode2");
                // 如果秒数还是大于0，则表示倒计时还没结束
                if (second >= 0) {
                    // 获取默认按钮上的文字
                    // 按钮置为不可点击状态
                    btn.attr('onclick',"");
                    obj.attr('disabled',"true");
                    // 按钮里的内容呈现倒计时状态
                    obj.text(' (' + second + ')s');
                    // 时间减一
                    second--;
                    // 一秒后重复执行
                    setTimeout(function () {
                        countDown(second,"new");
                    }, 1000);
                    // 否则，按钮重置为初始状态
                } else {
                    // 按钮置未可点击状态
                    obj.removeAttr('disabled');
                    btn.attr('onclick',"sendMobileCode('new');");
                    // 按钮里的内容恢复初始状态
                    obj.text("验证码");
                }
            }
        }
        $('#submit').click(function () {
            var phone = $('#old_phone');
            var old_code = $('#user-code');
            if(old_code.val() ===''){
                swal("","验证码不能为空", "error");
                return;
            }else if(!/^\d{6}$/.test(old_code.val())){
                swal("","验证码格式不正确", "error");
                return;
            }
            var formData = new FormData();
            formData.append("phone", phone.val());
            formData.append("code", old_code.val());
            $.ajax({
                url: "/account/verifySmsCode",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                       nextstep();
                    } else if (result.status === 400) {
                        swal(result.msg);
                    }
                }
            });
        });
        function nextstep() {
            var old_one = $('div[name=old_one]');
            var new_one = $('div[name=new_one]');
            old_one.hide();
            new_one.show();
        }
        $('#update_phone').click(function () {
            var new_phone = $('#user-new-phone')
            var new_code = $('#user-new-code')
            if(new_code.val() ===''){
                swal("","验证码不能为空", "error");
                return;
            }else if(!/^\d{6}$/.test(new_code.val())){
                swal("","验证码格式不正确", "error");
                return;
            }
            var formData = new FormData();
            formData.append("phone", new_phone.val());
            formData.append("code", new_code.val());
            $.ajax({
                url: "/account/verifySmsCode",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        update_phone(new_phone.val());
                    } else if (result.status === 400) {
                        swal(result.msg);
                    }
                }
            });

        });
        function update_phone(tel) {
            var formData = new FormData();
            formData.append("phone", tel);
            $.ajax({
                url: "/account/update_tel",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        swal(result.msg);
                        self.location = "/account/safety";
                    } else if (result.status === 400) {
                        swal(result.msg);
                    }
                }
            });
        }
    </script>
@endsection