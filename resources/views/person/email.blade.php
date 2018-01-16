@extends('demo.admin2')
@section('title','验证邮箱')
@section('custom-style')
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
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定邮箱</strong> / <small>Email</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">验证邮箱</p>
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
            <form class="am-form am-form-horizontal" id="doc-vld-msg">
                <div class="am-form-group">
                    <label for="doc-vld-email-2-1" class="am-form-label">验证邮箱</label>
                    <div class="am-form-content">
                        <input type="email" id="doc-vld-email-2-1" data-validation-message="请输入合法的邮箱" placeholder="输入邮箱" required/>
                    </div>
                </div>
                <div class="am-form-group code" style="margin-top: 2rem;">
                    <label for="user-code" class="am-form-label">验证码</label>
                    <div class="am-form-content">
                        <input type="tel" class="input_code" id="user-code" placeholder="验证码">
                    </div>
                    <a class="btn" href="javascript:void(0);" onclick="sendEmailCode();" id="sendEmailCode">
                        <div class="am-btn am-btn-danger" id="email_code">验证码</div>
                    </a>
                </div>
                <div class="info-btn">
                    <div class="am-btn am-btn-danger" id="update_mail">保存修改</div>
                </div>

            </form>

        </div>
        <!--底部-->
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
    <script type="text/javascript">
        $(function() {
            $('#doc-vld-msg').validator({
                onValid: function(validity) {
                    $(validity.field).closest('.am-form-group').find('.am-alert').hide();
                },

                onInValid: function(validity) {
                    var $field = $(validity.field);
                    var $group = $field.closest('.am-form-group');
                    var $alert = $group.find('.am-alert');
                    // 使用自定义的提示信息 或 插件内置的提示信息
                    var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

                    if (!$alert.length) {
                        $alert = $('<div class="am-alert am-alert-danger"></div>').hide().
                        appendTo($group);
                    }

                    $alert.html(msg).show();
                }
            });
        });
        function sendEmailCode() {
            var email = $('#doc-vld-email-2-1');
            if(email.val() === ''){
                swal("","邮箱不能为空", "error");
                return;
            }else if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email.val())){
                swal("", "邮箱格式不正确", "error");
                return;
            }
            var form_data = new FormData();
            form_data.append('email', email.val());
            $.ajax({
                url: "/account/sendMailCode",
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
                        swal("",result.msg,'success');
                        email.attr("disabled", true);
                        // 倒计时30秒
                        countDown(60);
                    } else if (result.status === 400) {
                        swal(result.msg);
                    }
                }
            });
        }
        function countDown(second) {
            var obj = $("#email_code");
            var btn = $("#sendEmailCode");
            // 如果秒数还是大于0，则表示倒计时还没结束
            if (second >= 0) {
                // 获取默认按钮上的文字
                // 按钮置为不可点击状态
                btn.attr('onclick', "");
                obj.attr('disabled', "true");
                // 按钮里的内容呈现倒计时状态
                obj.text(' (' + second + ')s');
                // 时间减一
                second--;
                // 一秒后重复执行
                setTimeout(function () {
                    countDown(second, "old");
                }, 1000);
                // 否则，按钮重置为初始状态
            } else {
                // 按钮置未可点击状态
                obj.removeAttr('disabled');
                btn.attr('onclick', "sendEmailCode();");
                // 按钮里的内容恢复初始状态
                obj.text("验证码");
            }
        }
        $('#update_mail').click(function () {
            var email = $('#doc-vld-email-2-1');
            var code = $('#user-code');
            if(email.val() === ''){
                swal("","邮箱不能为空", "error");
                return;
            }else if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email.val())){
                swal("", "邮箱格式不正确", "error");
                return;
            }
            if(code.val() == '' ||code.val().length !=6 ){
                swal("","验证码格式不正确","error");
                return;
            }
            var form_data = new FormData();
            form_data.append('email', email.val());
            form_data.append('code', code.val());
            $.ajax({
                url: "/account/verifyEmailCode",
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
                        swal("",result.msg,'success');
                        self.location = "/account/safety";
                    } else if (result.status === 400) {
                        swal(result.msg);
                    }
                }
            });
        });
    </script>
@endsection