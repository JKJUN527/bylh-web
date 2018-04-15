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
                                                        
                            
                        {{--<li>--}}
                            {{--<i class="i-safety-idcard"></i>--}}
                            {{--<div class="m-left">--}}
                                {{--<div class="fore1">实名认证</div>--}}
                                {{--@if($data['userinfo']->realname_statue == -1)--}}
                                    {{--<div class="fore2"><small>认证通过后、才能进一步认证专业身份或实习机构，同时可提高账户安全性。</small></div>--}}
                                {{--@elseif($data['userinfo']->realname_statue == 0)--}}
                                    {{--<div class="fore2"><small>您已提交审核，请耐心等待审核结果。</small></div>--}}
                                {{--@else--}}
                                    {{--<div class="fore2"><small>恭喜您已通过实名认证</small></div>--}}
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
                                <div class="fore1">专业技能认证</div>
                                {{--@if($data['userinfo']->realname_statue != 1)--}}
                                    {{--<div class="fore2"><small>先通过实名认证后才能提交专业技能认证！</small></div>--}}
                                {{--@else--}}
                                    @if($data['userinfo']->majors_statue == -1)
                                        <div class="fore2"><small>认证通过后可进行专业服务、专业问答发布，同时可进一步提高账户安全性。</small></div>
                                    @elseif($data['userinfo']->majors_statue == 0)
                                        <div class="fore2"><small>您已提交审核，请耐心等待审核结果。</small></div>
                                    @else
                                        <div class="fore2"><small>恭喜您已通过专业技能认证</small></div>
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
                                <div class="fore1">实习中介认证</div>
                                {{--@if($data['userinfo']->realname_statue != 1)--}}
                                    {{--<div class="fore2"><small>先通过实名认证后才能提交实习中介认证！</small></div>--}}
                                {{--@else--}}
                                    @if($data['userinfo']->finance_statue== -1)
                                        <div class="fore2"><small>认证通过后可进行实习中介服务发布，同时可进一步提高账户安全性。</small></div>
                                    @elseif($data['userinfo']->finance_statue== 0)
                                        <div class="fore2"><small>您已提交审核，请耐心等待审核结果。</small></div>
                                    @else
                                        <div class="fore2"><small>恭喜您已通过实习中介认证</small></div>
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
