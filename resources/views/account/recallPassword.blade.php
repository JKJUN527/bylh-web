<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>找回密码</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.min.css')}}" />
    <link href="{{asset('css/dlstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('AmazeUI-2.4.2/assets/js/amazeui.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/sweetalert/sweetalert.css")}}"/>
</head>
<body>
<div class="login-boxtitle">
    <a href="/"><img alt="logo" src="{{asset('images/bylh2.png')}}" /></a>
</div>

<div class="res-banner">
    <div class="res-main">
        <div class="login-banner-bg"><span></span><img src="{{asset('images/big2.png')}}" /></div>
        <div class="login-box findpassword1">
            <div class="am-tabs" id="doc-my-tabs">
                <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                    <li class="am-active"><a href="">邮箱找回</a></li>
                    <li><a href="">手机找回</a></li>
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-active">
                        <form method="post">

                            <div class="user-email">
                                <label for="email"><i class="am-icon-envelope-o"></i></label>
                                <input type="email" name="" id="email" placeholder="请输入邮箱账号">
                            </div>
                            <div class="verification">
                                <label for="code"><i class="am-icon-code-fork"></i></label>
                                <input type="tel" name="" id="email-verify-code" placeholder="请输入验证码">
                                <a class="btn" href="javascript:void(0);">
                                    <span id="dyMobileButton" id="send-email">获取</span></a>
                            </div>
                        </form>
                        <div class="am-cf">
                            <input type="submit" name="" value="下一步" class="am-btn am-btn-primary am-btn-sm am-fl" id="changeShow">
                        </div>
                    </div>
                    <div class="am-tab-panel">
                        <form method="post">
                            <div class="user-phone">
                                <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                                <input type="tel" name="" id="phone" placeholder="请输入手机号">
                            </div>
                            <div class="verification">
                                <label for="code"><i class="am-icon-code-fork"></i></label>
                                <input type="tel" name="" id="phone-verify-code" placeholder="请输入验证码">
                                <a class="btn" href="javascript:void(0);" onclick="sendMobileCode()">
                                    <span id="dyMobileButton"  id="send-SMS">获取</span></a>
                            </div>
                        </form>
                        <div class="am-cf">
                            <input type="submit" name="" value="下一步" class="am-btn am-btn-primary am-btn-sm am-fl" id="changeShow">
                        </div>

                        <hr>
                    </div>

                    <script>
                        $(function() {
                            $('#doc-my-tabs').tabs();
                        })
                    </script>

                </div>
            </div>
        </div>

        <div class="login-box findpassword2" style="display: none;">
            <div class="changePwd">
                <h3 class="title">修改密码</h3>

                <div class="clear"></div>

                <div class="login-form">
                    <form>
                        <div class="user-pass">
                            <label for="password"><i class="am-icon-lock"></i></label>
                            <input type="password" name="" id="password" placeholder="请输入新密码">
                        </div>
                        <div class="user-pass">
                            <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                            <input type="password" name="" id="passwordRepeat" placeholder="确认密码">
                        </div>
                    </form>
                </div>
                <div class="am-cf">
                    <input type="submit" name="" value="完成" class="am-btn am-btn-primary am-btn-sm" style="margin-top: 30px;">
                </div>
            </div>
        </div>
        <script type="text/javascript">
            // $phoneVerifyCode = $("#phone-verify-code");
            // $phoneVerifyCode.prop("disabled", true);
            // $emailVerifyCode = $("#email-verify-code");
            // $emailVerifyCode.prop("disabled", true);
            // $('#changePhoneshow').click(function(){
            //             var formData1 = new FormData();
            //                 var phone = $("#phone");
            //                 var phoneCode = $phoneVerifyCode.val();
            //                 if (phone.val() === '') {
            //                     setError(phone, 'phone', "不能为空");
            //                     return;
            //                 } else {
            //                     removeError(phone, 'phone');
            //                 }
            //                 if (phoneCode === '') {
            //                     setError($phoneVerifyCode, 'phone-verify-code', '不能为空');
            //                     return;
            //                 } else {
            //                     removeError($phoneVerifyCode, 'phone-verify-code');
            //                 }
            //                 formData.append("tel", phone.val());
            //                 formData.append("code", phoneCode);
            //                 $('.findpassword1').hide();
            //                 $('.findpassword2').show();

            //     $.ajax({
            //         url: "/account/recallPassword",
            //         dataType: 'text',
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         type: "post",
            //         data: formData1,
            //         success: function (data) {
            //             var result = JSON.parse(data);
            //
            //             if (result.status === 200) {
            //                 swal({
            //                     type: "success",
            //                     title: "密码已重置",
            //                     confirmButtonText: "关闭"
            //                 });
            //
            //                 setTimeout(function () {
            //                     self.location = '/account/login';
            //                 }, 1000);
            //             } else {
            //                 currentStep = 3;
            //                 swal({
            //                     type: "error",
            //                     title: "密码重置失败",
            //                     confirmButtonText: "关闭"
            //                 });
            //             }
            //
            //         }
            //     });
            //  })
            // $('#changeEmailshow').click(function(){
            //     formData2 = new FormData();
            //     var email = $("#email");
            //     var emailCode = $emailVerifyCode.val();
            //     if (email.val() === '') {
            //         setError(email, 'email', "不能为空");
            //         return;
            //     } else {
            //         removeError(email, 'email');
            //     }
            //     if (emailCode === '') {
            //         setError($emailVerifyCode, 'email-verify-code', '不能为空');
            //         return;
            //     } else {
            //         removeError($emailVerifyCode, 'email-verify-code');
            //     }
            //
            //     formData.append('email', email.val());
            //     formData.append('code', emailCode);
            //
            //     $('.findpassword1').hide();
            //     $('.findpassword2').show();
            // })
            // $('#send-SMS').click(function(){
            //     var phone = $('#phone');
            //     if (phone.val() === ''){
            //         setError(phone, 'phone', '不能为空');
            //         alert('电话不能为空！')
            //     } else if (phone.is(":visible") && !/^1[34578]\d{9}$/.test(phone.val())) {
            //         setError(phone, 'phone', '手机号格式不正确');
            //     } else {
            //         removeError(phone, 'phone');
            //         var form_data = new FormData();
            //         form_data.append('tel', phone.val());
            //         countDown(this, 60);
            //         $.ajax({
            //             url: "/recallPassword",
            //             dataType: 'text',
            //             cache: false,
            //             contentType: false,
            //             processData: false,
            //             type: "post",
            //             data: form_data,
            //             success: function (data) {
            //                 console.log(data);
            //                 var result = JSON.parse(data);
            //                 if (result.status === 200) {
            //                     swal({
            //                         type: "success",
            //                         title: "短信验证码已发送",
            //                         confirmButtonText: "关闭"
            //                     });
            //                     uid = result.uid;
            //                     $phoneVerifyCode.prop("disabled", false);
            //                     $phoneVerifyCode.focus();
            //                 } else {
            //                     swal({
            //                         type: "error",
            //                         title: "短信验证码发送失败",
            //                         confirmButtonText: "关闭"
            //                     });
            //                 }
            //             },
            //             error:function(xhr, ajaxOptions, thrownError){
            //                 swal(xhr.status + "：" + thrownError);
            //                 //checkResult(400, "", xhr.status + "：" + thrownError, null);
            //             }
            //         })
            //
            //     }
            //
            // });
            function sendMobileCode() {
                var phone = $('#phone');

                if (phone.val() === '') {
                    swal("电话不能为空",'', "error");
                    return;
                } else if (!/^1[34578]\d{9}$/.test(phone.val())) {
                    swal("手机号格式不正确",'', "error");
                    return;
                }

                var form_data = new FormData();
                form_data.append('telnum', phone.val());
                swal({
                    title: phone.val(),
                    text: "将发送短信验证码到此手机号",
                    type: "info",
                    confirmButtonText: "确定",
                    cancelButtonText: "取消",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                    $.ajax({
                        url: "/account/sms",
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
                                countDown(30);

                            } else if (result.status === 400) {
                                swal(result.msg);
                            }
                        }
                    });
                });
            }
            function countDown(second) {
                var obj = $("#dyMobileButton");
                var btn = $("#sendMobileCode");
                // 如果秒数还是大于0，则表示倒计时还没结束
                if (second >= 0) {
                    // 获取默认按钮上的文字
                    // 按钮置为不可点击状态
                    btn.attr('disabled',"true");
                    obj.attr('disabled',"true");
                    // 按钮里的内容呈现倒计时状态
                    obj.text(' (' + second + ')s');
                    // 时间减一
                    second--;
                    // 一秒后重复执行
                    setTimeout(function () {
                        countDown(second);
                    }, 1000);
                    // 否则，按钮重置为初始状态
                } else {
                    // 按钮置未可点击状态
                    obj.disabled = false;
                    // 按钮里的内容恢复初始状态
                    obj.text("获取");
                }
            }
            $('#send-email').click(function(){
                var email = $("#email");
                if(email.val() === ''){
                    setError(email, 'email', "不能为空");
                } else if (email.is(":visible") &&
                    !/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())){
                    setError(email, 'email', "请输入格式正确的邮箱");
                } else {
                    removeError(email, 'email');

                    var form_data = new FormData();
                    form_data.append('email', email.val());

                    countDown(this, 30);

                    $.ajax({
                        url: "/recallPassword",
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
                                swal({
                                    type: "success",
                                    title: "验证码已发送至您的邮箱",
                                    confirmButtonText: "关闭"
                                });
                                uid = result.uid;
                                $emailVerifyCode.prop("disabled", false);
                                $emailVerifyCode.focus();
                            } else {
                                swal({
                                    type: "error",
                                    title: "邮箱验证码发送失败",
                                    confirmButtonText: "关闭"
                                });
                            }

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal(xhr.status + "：" + thrownError);
                            //checkResult(400, "", xhr.status + "：" + thrownError, null);
                        }
                    })
                }
            });
            $('#changeShow').click(function(){
                $('.findpassword1').hide();
                $('.findpassword2').show();
            });
        </script>
    </div>


    <div class="footer ">
        <div class="footer-hd ">
        </div>
        <div class="footer-bd ">
            <br>
            <p style="text-align: center;">

                Copyright © 2017-2018  bylehu 版权所有  蜀ICP备17027037<br>
                客服电话：88888888<br>
                联系邮箱：不亦乐乎＠bylehu.com
            </p>
        </div>
    </div>
</body>
</html>