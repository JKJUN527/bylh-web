@extends('demo.admin2')
@section('title','安全中心')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    @endsection
@section('content')
        <div class="main-wrap">
            <!--标题 -->
            <div class="user-safety">
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
                </div>
                <hr/>
                <div class="check">
                    <ul>
                        <li>
                            <i class="i-safety-lock"></i>
                            <div class="m-left">
                                <div class="fore1">登录密码</div>
                                <div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
                            </div>
                            <div class="fore3">
                                <a href="/account/resetPassword">
                                    <div class="am-btn am-btn-secondary">修改</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="i-safety-iphone"></i>
                            <div class="m-left">
                                <div class="fore1">手机验证</div>
                                @if($data['userinfo']->tel_verify == 1)
                                    <div class="fore2"><small>您验证的手机:{{substr($data['userinfo']->tel,0,3)}}xxxx{{substr($data['userinfo']->tel,7,4)}}若已丢失或停用，请立即更换</small></div>
                                @else
                                    <div class="fore2"><small>您还未绑定手机，请立即绑定，绑定后可通过手机号登陆！</small></div>
                                @endif
                            </div>
                            <div class="fore3">
                                <a href="/account/setphone">
                                    @if($data['userinfo']->tel_verify == 1)
                                        <div class="am-btn am-btn-secondary">换绑</div>
                                    @else
                                        <div class="am-btn am-btn-secondary">绑定</div>
                                    @endif
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="i-safety-mail"></i>
                            <div class="m-left">
                                <div class="fore1">邮箱验证</div>
                                @if($data['userinfo']->email_verify == 1)
                                    <div class="fore2"><small>您验证的邮箱:{{substr(explode('@',$data['userinfo']->mail)[0],0,3)}}xxxx@ {{explode('@',$data['userinfo']->mail)[1]}}若已丢失或停用，请立即更换</small></div>
                                @else
                                    <div class="fore2"><small>您还未绑定邮箱，请立即绑定，绑定后可通过邮箱登陆！</small></div>
                                @endif
                            </div>
                            <div class="fore3">
                                <a href="/account/setemail">
                                    @if($data['userinfo']->email_verify == 1)
                                        <div class="am-btn am-btn-secondary">换绑</div>
                                    @else
                                        <div class="am-btn am-btn-secondary">绑定</div>
                                    @endif
                                </a>
                            </div>
                        </li>
                        {{--<li>--}}
                            {{--<i class="i-safety-idcard"></i>--}}
                            {{--<div class="m-left">--}}
                                {{--<div class="fore1">身份认证</div>--}}
                                {{--@if($data['userinfo']->realname_statue == -1)--}}
                                    {{--<div class="fore2"><small>认证通过后可发布服务。</small></div>--}}
                                {{--@elseif($data['userinfo']->realname_statue == 0)--}}
                                    {{--<div class="fore2"><small>您已提交审核，请耐心等待审核结果。</small></div>--}}
                                {{--@else--}}
                                    {{--<div class="fore2"><small>恭喜您已通过身份认证</small></div>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div class="fore3">--}}
                                {{--@if($data['userinfo']->realname_statue == -1)--}}
                                    {{--<a href="/account/authentication/0">--}}
                                        {{--<div class="am-btn am-btn-secondary">认证</div>--}}
                                    {{--</a>--}}
                                {{--@elseif($data['userinfo']->realname_statue == 0)--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="am-btn am-btn-secondary" style="opacity:0.5;">审核中</div>--}}
                                    {{--</a>--}}
                                {{--@else--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="am-btn am-btn-secondary" style="opacity:0.5;">通过</div>--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        <li>
                            {{--<i class="i-safety-security"></i>--}}
                            <i class="i-safety-idcard"></i>
                            <div class="m-left">
                                <div class="fore1">身份认证</div>
                                {{--@if($data['userinfo']->realname_statue != 1)--}}
                                    {{--<div class="fore2"><small></small></div>--}}
                                {{--@else--}}
                                    @if($data['userinfo']->majors_statue == -1)
                                        <div class="fore2"><small>认证通过后可进行专业服务、专业问答发布，同时可进一步提高账户安全性。</small></div>
                                    @elseif($data['userinfo']->majors_statue == 0)
                                        <div class="fore2"><small>您已提交审核，请耐心等待审核结果。</small></div>
                                    @else
                                        <div class="fore2"><small>恭喜您已通过身份认证</small></div>
                                    @endif
                                {{--@endif--}}
                            </div>
                            <div class="fore3">
                                {{--@if($data['userinfo']->realname_statue != 1)--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="am-btn am-btn-secondary" style="opacity:0.5;">认证</div>--}}
                                    {{--</a>--}}
                                {{--@else--}}
                                    @if($data['userinfo']->majors_statue == -1)
                                        <a href="/account/authentication/2">
                                            <div class="am-btn am-btn-secondary">认证</div>
                                        </a>
                                    @elseif($data['userinfo']->majors_statue == 0)
                                        <a href="#">
                                            <div class="am-btn am-btn-secondary" style="opacity:0.5;">审核中</div>
                                        </a>
                                    @else
                                        <a href="#">
                                            <div class="am-btn am-btn-secondary" style="opacity:0.5;">通过</div>
                                        </a>
                                    @endif
                                {{--@endif--}}
                            </div>
                        </li>
                        <li>
                            <i class="i-safety-final"></i>
                            <div class="m-left">
                                <div class="fore1">机构认证</div>
                                {{--@if($data['userinfo']->realname_statue != 1)--}}
                                    {{--<div class="fore2"><small></small></div>--}}
                                {{--@else--}}
                                    @if($data['userinfo']->finance_statue== -1)
                                        <div class="fore2"><small>认证通过后可发布中介信息，同时可进一步提高账户安全性。</small></div>
                                    @elseif($data['userinfo']->finance_statue== 0)
                                        <div class="fore2"><small>您已提交审核，请耐心等待审核结果。</small></div>
                                    @else
                                        <div class="fore2"><small>恭喜您已通过机构认证</small></div>
                                    @endif
                                {{--@endif--}}
                            </div>
                            <div class="fore3">
                                {{--@if($data['userinfo']->realname_statue != 1)--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="am-btn am-btn-secondary" style="opacity:0.5;">认证</div>--}}
                                    {{--</a>--}}
                                {{--@else--}}
                                    @if($data['userinfo']->finance_statue == -1)
                                        <a href="/account/authentication/1">
                                            <div class="am-btn am-btn-secondary">认证</div>
                                        </a>
                                    @elseif($data['userinfo']->finance_statue == 0)
                                        <a href="#">
                                            <div class="am-btn am-btn-secondary" style="opacity:0.5;">审核中</div>
                                        </a>
                                    @else
                                        <a href="#">
                                            <div class="am-btn am-btn-secondary" style="opacity:0.5;">通过</div>
                                        </a>
                                    @endif
                                {{--@endif--}}
                            </div>
                        </li>
                        {{--<li>--}}
                            {{--<i class="i-safety-security"></i>--}}
                            {{--<div class="m-left">--}}
                                {{--<div class="fore1">安全问题</div>--}}
                                {{--<div class="fore2"><small>保护账户安全，验证您身份的工具之一。</small></div>--}}
                            {{--</div>--}}
                            {{--<div class="fore3">--}}
                                {{--<a href="/question">--}}
                                    {{--<div class="am-btn am-btn-secondary">认证</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    </ul>
                </div>

            </div>
        </div>
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
