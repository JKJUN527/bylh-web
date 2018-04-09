<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
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
    <a href="/"><img alt="" src="{{asset('images/bylh2.png')}}" /></a>
</div>

<div class="res-banner">
    <div class="res-main">
        <div class="login-banner-bg"><span></span><img src="{{asset('images/big2.png')}}" /></div>
        <div class="login-box">

            <div class="am-tabs" id="doc-my-tabs">
                <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                    <li id="phone_register" class="am-active"><a href="">手机号注册</a></li>
                    <li id="mail_register"><a href="">邮箱注册</a></li>
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-active">
                        <form method="post">
                            <div class="user-phone">
                                <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                                <input type="tel" name="" id="phone" placeholder="请输入手机号">
                            </div>
                            <div class="verification">
                                <label for="code"><i class="am-icon-code-fork"></i></label>
                                <input type="text" name="" id="code" placeholder="请输入验证码">
                                <a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
                                    <span id="dyMobileButton">获取</span></a>
                            </div>
                            <div class="user-pass">
                                <label for="password"><i class="am-icon-lock"></i></label>
                                <input type="password" name="" id="phone_psw" placeholder="设置密码">
                            </div>
                            <div class="user-pass">
                                <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                <input type="password" name="" id="phone_pswRe" placeholder="确认密码">
                            </div>
                        </form>
                        <div class="login-links">
                            <label for="reader-me">
                                <input id="reader-me-phone" type="checkbox"><a href="/bylh/protocols" target="_blank"> 点击阅读不亦乐乎服务协议</a>
                            </label>
                        </div>
                        <div class="am-cf">
                            <input type="submit" name="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                        </div>
                        <hr>
                    </div>

                    <div class="am-tab-panel">
                        <form method="post">

                            <div class="user-email">
                                <label for="email"><i class="am-icon-envelope-o"></i></label>
                                <input type="email" name="" id="email" placeholder="请输入邮箱账号">
                            </div>
                            <div class="user-pass">
                                <label for="password"><i class="am-icon-lock"></i></label>
                                <input type="password" name="" id="mail_psw" placeholder="设置密码">
                            </div>
                            <div class="user-pass">
                                <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                <input type="password" name="" id="mail_pswRe" placeholder="确认密码">
                            </div>

                        </form>

                        <div class="login-links">
                            <label for="reader-me">
                                <input id="reader-me-mail" type="checkbox"> 点击阅读不亦乐乎服务协议
                            </label>
                        </div>
                        <div class="am-cf">
                            <input type="submit" name="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                        </div>

                    </div>
                </div>

            </div>

        </div>
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
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<script>
    $(function() {
        $('#doc-my-tabs').tabs();
    });
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
    function confirmReademe(option) {
        var reader_me_phone = $("#reader-me-phone");
        var reader_me_mail = $("#reader-me-mail");
        switch(option){
            case "mail":
                if(reader_me_mail.is(':checked')) {
                    // do something
                   return 1;
                }else
                    return 0;
                break;
            case "phone":
                if(reader_me_phone.is(':checked')) {
                    // do something
                    return 1;
                }else
                    return 0;
                break;
            default:
                return 0;
        }
    }


    $("input[name=submit]").click(function () {
        var is_mail = $("#mail_register");
        //数据合法性验证
        if(is_mail.attr('class') == "am-active"){//邮箱注册
            //验证是否点击reader——me
            if(!confirmReademe('mail')){
                swal("请先阅读不亦乐乎服务协议", '', "error");
                return;
            }
            var mail = $("#email");
            var mail_psw = $("#mail_psw");
            var mail_pswRe = $("#mail_pswRe");
            var reader_me_mail = $("#reader-me-mail");

            if(mail.val() === ''){
                swal("邮箱不能为空",'', "error");
                return;
            }else if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(mail.val())){
                swal("邮箱格式不正确", '', "error");
                return;
            }
            if(mail_psw.val() == '' ||mail_pswRe.val() == ''){
                swal("请设置密码",'', "error");
                return;
            }else if(mail_psw.val().length <6 ||mail_psw.val().length >60){
                swal("密码至少6位，至多60位",'', "error");
                return;
            }else if(mail_psw.val() != mail_pswRe.val()){
                swal("两次密码输入不一致",'', "error");
                return;
            }
            var formData = new FormData();
            formData.append("email", mail.val());
            formData.append("password", mail_psw.val());

            swal({
                title: mail.val(),
                text: "确定使用该邮箱注册吗",
                type: "info",
                confirmButtonText: "确定",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {

                $.ajax({
                    url: "/account/register",
                    type: "post",
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status === 200) {
                            swal({
                                title: "注册成功",
                                text: "激活邮件已发送到邮箱：" + mail.val() + "\n一周之内有效，请尽快激活!",
                                confirmButtonText: "返回登录页面"
                            }, function () {
                                self.location = "/account/login";
                            });

                        } else if (result.status === 400) {
                            swal(result.msg);
                        }
                    }
                })
            });

//            swal("数据正确", "", "success");

        }else{//电话注册
            //验证是否点击reader——me
            if(!confirmReademe('phone')){
                swal("请先阅读不亦乐乎服务协议", '', "error");
                return;
            }
            var phone = $("#phone");
            var code = $("#code");
            var phone_psw = $("#phone_psw");
            var phone_pswRe = $("#phone_pswRe");
            var reader_me_phone = $("#reader-me-phone");
            if(phone.val() ===''){
                swal("电话不能为空",'', "error");
                return;
            }else if(!/^1[34578]\d{9}$/.test(phone.val())){
                swal("手机号格式不正确",'', "error");
                return;
            }
            if(code.val() ===''){
                swal("验证码不能为空",'', "error");
                return;
            }else if(!/^\d{6}$/.test(code.val())){
                swal("验证码格式不正确",'', "error");
                return;
            }
            if(phone_psw.val() == '' ||phone_pswRe.val() == ''){
                swal("请设置密码",'', "error");
                return;
            }else if(phone_psw.val().length <6 ||phone_psw.val().length >60){
                swal("密码至少6位，至多60位",'', "error");
                return;
            }else if(phone_psw.val() != phone_pswRe.val()){
                swal("两次密码输入不一致",'', "error");
                return;
            }
            var formData = new FormData();
            formData.append("phone", phone.val());
            formData.append("code", code.val());
            formData.append("password", phone_psw.val());
            $.ajax({
                url: "/account/register",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        swal({
                            title: "注册成功",
                            text: "点击确定立即登录",
                            type: "info",
                            confirmButtonText: "确定",
                            closeOnConfirm: false
                        }, function () {
                            self.location = "/account/login";
                        });
                    } else if (result.status === 400) {
                        swal(result.msg);
                    }
                }
            });

        }

    });



//    if(is_mail.attr('class') =="am-active"){
//        alert(123);
//    }else{
//        alert(3456);
//    }
</script>
