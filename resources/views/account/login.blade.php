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

    <link rel="stylesheet" href="AmazeUI-2.4.2/assets/css/amazeui.css" />
    <link href="css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body>

<div class="login-boxtitle">
    <a href="/"><img alt="logo" src="images/bylh.png" /></a>
</div>

<div class="login-banner">
    <div class="login-main">
        <div class="login-banner-bg"><span></span><img src="images/big2.png" /></div>
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
                <a href="#" class="am-fr">忘记密码</a>
                <a href="/" class="zcnext am-fr am-btn-default">注册</a>
                <br />
            </div>
            <div class="am-cf">
                <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm" style="margin-top: 30px;">
            </div>

        </div>
    </div>
</div>
<script>
    $("input[type='submit']").click(function (event) {
        var username = $('#user');
        var password = $('#password');
        {{--if (phone.is(':visible') && phone.val() === '') {--}}
            {{--setError(phone, 'phone', '不能为空');--}}
            {{--return;--}}
        {{--} else if (phone.is(":visible") && !/^1[34578]\d{9}$/.test(phone.val())) {--}}
            {{--setError(phone, 'phone', '手机号格式不正确');--}}
            {{--return;--}}
        {{--} else {--}}
            {{--removeError(phone, 'phone');--}}
        {{--}--}}

        {{--if (email.is(':visible') && email.val() === '') {--}}
            {{--setError(email, 'email', '不能为空');--}}
            {{--return;--}}
        {{--} else if (email.is(':visible') &&--}}
                {{--!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email.val())) {--}}
            {{--setError(email, 'email', '邮箱格式不正确');--}}
            {{--return;--}}
        {{--} else {--}}
            {{--removeError(email, 'email')--}}
        {{--}--}}

        {{--if (password.val() === '') {--}}
            {{--setError(password, 'password', '不能为空');--}}
            {{--return;--}}
        {{--} else {--}}
            {{--removeError(password, 'password')--}}
        {{--}--}}

        var formData = new FormData();
        formData.append("username", username.val());
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
                if(result.status == 200){
                    alert('登陆成功');
                }
//                checkResultWithLocation(result.status, "登录成功，正在跳转", result.msg, "/index");

            }
        });
    });
</script>

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