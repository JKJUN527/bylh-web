<aside class="menu">
    <ul>
        @if($type == 1)
            <li class="person active">
                <a href="{{asset('account/index')}}"><i class="am-icon-user"></i>我的主页</a>
            </li>
            <li class="person">
                <p><i class="am-icon-newspaper-o"></i>个人资料</p>
                <ul>
                    <li><a href="{{asset('account/baseedit')}}">个人信息</a></li>
                    <li><a href="{{asset('account/safety')}}">安全设置</a></li>
                    <li><a href="{{asset('account/authentication/2')}}">身份认证</a></li>
                    <li><a href="{{asset('account/authentication/1')}}">机构认证</a></li>
                </ul>
            </li>
        @else
            <li class="person active">
                <a href="{{asset('account/index')}}"><i class="am-icon-user"></i>我的主页</a>
            </li>
            <li class="person">
                <p><i class="am-icon-newspaper-o"></i>服务资料</p>
                <ul>
                    <li><a href="{{asset('account/baseedit')}}">个人信息</a></li>
                    <li><a href="{{asset('account/serviceedit')}}">服务信息</a></li>
                    <li><a href="{{asset('account/safety')}}">安全设置</a></li>
                    <li><a href="{{asset('account/authentication/2')}}">身份认证</a></li>
                    <li><a href="{{asset('account/authentication/1')}}">机构认证</a></li>
                </ul>
            </li>
        @endif
        <li class="person">
            <p><i class="am-icon-balance-scale"></i>我的交易</p>
            <ul>
                <li><a href="{{asset('order')}}">订单管理</a></li>
            </ul>
        </li>
        @if($type == 2)
            <li class="person">
                <p><i class="am-icon-dollar"></i>我的服务</p>
                <ul>
                    <li><a href="{{asset('service/genlpublish')}}">专业服务</a></li>
                    <li><a href="{{asset('service/finlpublish')}}">实习中介</a></li>
                    <li><a href="{{asset('service/qapublish')}}">专业问答</a></li>
                    <li><a href="{{asset('service/getservicesList')}}">服务列表</a></li>
                </ul>
            </li>
        @endif

        <li class="person">
            <p><i class="am-icon-tags"></i>我的需求</p>
            <ul>
                <li><a href="{{asset('demands/demandPublishIndex')}}">发布需求</a></li>
                <li><a href="{{asset('demands/myneeds')}}">需求列表</a></li>
            </ul>
        </li>

        <li class="person">
            <p><i class="am-icon-qq"></i>信息中心</p>
            <ul>
                <li><a href="{{asset('message')}}">站内信</a></li>
                {{--<li><a href="/message">我的消息</a></li>--}}
            </ul>
        </li>
    </ul>
</aside>
