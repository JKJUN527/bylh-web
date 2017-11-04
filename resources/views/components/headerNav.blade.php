<div class="header-nav">
    <div class="container">
        <!-- Title -->
        <div class="header-nav-title">
            <a href="/index">
                <img src="{{asset("images/logo-white.png")}}" width="150px"/>
            </a>
            <small style="vertical-align: bottom; position: relative; bottom: 5px; left: 12px;"><?=$site_desc ?></small>
        </div>

        <!-- Add spacer, to align navigation to the right -->
        <!--<div class="spacer"></div>-->
        <!-- Navigation -->
        <nav class="nav">
            @if($isLogged == true)
                <a href="/account/">欢迎
                    @if($username != null)
                        {{$username}}
                    @else
                        未命名
                    @endif
                </a>
                <a href="/account/logout">退出登录</a>
            @else
                <a href="/account/login">登录</a>
                <a href="/account/register">立即注册</a>
            @endif
            {{--<a href="/about">关于我们</a>--}}
        </nav>
    </div>
</div>
