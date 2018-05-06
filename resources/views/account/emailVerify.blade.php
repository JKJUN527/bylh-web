<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>邮箱验证</title>
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
        .verify-card-holder > h3,
        .verify-card-holder > p {
            min-width: 800px;
            font-weight: 500;
            text-align: center;
            /*color: #333333;*/
            color: white;
            font-size: 2rem;
        }

        .verify-card-holder > p {
            padding-bottom: 32px;
        }

        .verify-card {
            width: 800px;
            height: 300px;
            margin: 40px auto;
            padding: 0 30px;
            background-color: rgba(255, 255, 255, .95);
            border: 1px solid lightgray;
        }

        .verify-card > h5 {
            font-weight: 300;
            text-align: center;
            color: rgb(0, 0, 0);
            margin-top: 3rem;
        }

        .verify-card p {
            font-size: 16px;
            margin-top: 24px;
        }

        button {
            display: inline-block;
            width: 88px;
        }
        .verify-card p{
            text-align: center;

        }
    </style>
</head>

<body>
<div class="login-boxtitle">
    <a href="/"><img alt="logo" src="{{asset('images/bylh2.png')}}" /></a>
</div>

<div class="login-banner">
    <div class="login-main">
        <div class="verify-card-holder">
            <h3>不亦乐乎--邮箱验证</h3>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
            {{--Aenan convallis.</p>--}}

            <div class="verify-card mdl-card mdl-shadow--2dp">

                <h5>邮箱激活</h5>

                @if($data["status"] ==  200)
                    <p id="verify-result">{{$data["user"]->mail}} 邮箱激活成功，<br>请使用该邮箱直接登录</p>
                    <p>
                        <button class="btn btn-primary blue-btn" onclick="window.location.href='/account/login';">
                            点击登录
                        </button>
                    </p>
                @elseif($data["status"] == 400)
                    <p id="verify-result">{{$data["msg"]}}<br>请重新发送邮箱验证！</p>
                @endif

                {{--<p>激活链接已失效</p>--}}
                {{--<button id="resend"--}}
                {{--class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-blue-sky">--}}
                {{--重新发送验证码--}}
                {{--</button>--}}
            </div>
        </div>
    </div>
</div>

</body>

</html>