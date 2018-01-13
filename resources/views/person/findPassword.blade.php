@extends('demo.admin2')
@section('title','修改密码')
@section('custom-style')
    <link href="{{asset('css/stepstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    @endsection
@section('content')
        <div class="main-wrap">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
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
            <form action="" class="am-form" data-am-validator>
                <fieldset>
                    <div class="am-form-group">
                        <label for="doc-vld-name-2">原密码：</label>
                        <input type="text" id="doc-vld-name-2" minlength="6"
                               placeholder="输入原密码" required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-pwd-1">密码：</label>
                        <input type="password" id="doc-vld-pwd-1" placeholder="输入新密码，由字母和数字组成" pattern="^[0-9A-Za-z]{6,20}$" required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-pwd-2">确认密码：</label>
                        <input type="password" id="doc-vld-pwd-2" placeholder="请与上面输入的值一致" data-equal-to="#doc-vld-pwd-1" required/>
                    </div>

                    <div class="info-btn">
                        <div class="am-btn am-btn-danger">保存修改</div>
                    </div>
                </fieldset>
            </form>
        </div>
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection