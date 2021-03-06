<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" />
    <link href="{{asset('css/dlstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('js/jquery.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/sweetalert/sweetalert.css")}}"/>
    <style>
        .login-banner-bg{
            margin-top: 20px;
        }
        .login-banner-bg img {
            height: 315px;
        }
        .login-box {
            height: auto !important;
        }
    </style>
</head>

<body>
<div class="login-boxtitle">
    <a href="/"><img alt="logo" src="{{asset('images/bylh2.png')}}" /></a>
</div>

<div class="login-banner">
    <div class="login-main">
        <div class="login-banner-bg"><span></span><img src="{{asset('images/big2.png')}}" /></div>
        <div class="login-box">

            <h3 class="title">登录</h3>

            <div class="clear"></div>


            <div class="login-form">
                <form>
                    <div class="user-name">
                        <label for="user"><i class="am-icon-user"></i></label>
                        <input type="text" name="" id="user" placeholder="邮箱/手机/用户名">
                    </div>
                    <div class="user-pass">
                        <label for="password"><i class="am-icon-lock"></i></label>
                        <input type="password" name="" id="password" placeholder="请输入密码">
                    </div>
                </form>
            </div>

            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
                <a href="/account/findPassword" class="am-fr">忘记密码</a>
                <a href="{{asset('account/register')}}" class="zcnext am-fr am-btn-default">注册</a>
                <br />
            </div>
            <div class="am-cf">
                <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm" style="margin-top: 30px;">
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
                客服电话：028-85593827<br>
                联系邮箱：不亦乐乎＠bylehu.com

            </p>
        </div>
    </div>

<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<script>
    $("#password").keyup(function (event) {
        if (event.keyCode == 13) {
            $("input[type='submit']").click();
        }
        return event;
    });
    $("input[type='submit']").click(function (event) {
        var username = $('#user');
        var password = $('#password');
        if (username.val() === '') {
            swal("","请输入用户名", "error");
            return;
        }
        if (password.val() === '') {
            swal("","请输入登录密码", "error");
            return;
        }
        var formData = new FormData();

        if (/^1[34578]\d{9}$/.test(username.val())) {
            formData.append("phone", username.val());
        } else if(/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(username.val())) {
            formData.append("email", username.val());
        } else{
            formData.append("username", username.val());
        }

        formData.append("password", password.val());

        $.ajax({
            url: "/account/login",
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
//                    swal("登录成功","","success");
                    setTimeout(function () {
                        self.location = "/account/index";
                    }, 1000);
                }else{
                    swal('',result.msg,'error');
                }
            }
        });
    });
</script>

</body>

</html>
