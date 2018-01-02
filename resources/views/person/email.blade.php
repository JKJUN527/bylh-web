@extends('demo.admin2')
@section('content')
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定邮箱</strong> / <small>Email</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
                <div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">验证邮箱</p>
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
            <form class="am-form am-form-horizontal" id="doc-vld-msg">
                <div class="am-form-group">
                    <label for="doc-vld-email-2-1" class="am-form-label">验证邮箱</label>
                    <div class="am-form-content">
                        <input type="email" id="doc-vld-email-2-1" data-validation-message="请输入合法的邮箱" placeholder="输入邮箱" required/>
                    </div>
                </div>
                <div class="am-form-group code">
                    <label for="user-code" class="am-form-label">验证码</label>
                    <div class="am-form-content">
                        <input type="tel" id="user-code" placeholder="验证码">
                    </div>
                    <a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
                        <div class="am-btn am-btn-danger">验证码</div>
                    </a>
                </div>
                <div class="info-btn">
                    <div class="am-btn am-btn-danger">保存修改</div>
                </div>

            </form>

        </div>
        <script type="text/javascript">
            $(function() {
                $('#doc-vld-msg').validator({
                    onValid: function(validity) {
                        $(validity.field).closest('.am-form-group').find('.am-alert').hide();
                    },

                    onInValid: function(validity) {
                        var $field = $(validity.field);
                        var $group = $field.closest('.am-form-group');
                        var $alert = $group.find('.am-alert');
                        // 使用自定义的提示信息 或 插件内置的提示信息
                        var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

                        if (!$alert.length) {
                            $alert = $('<div class="am-alert am-alert-danger"></div>').hide().
                            appendTo($group);
                        }

                        $alert.html(msg).show();
                    }
                });
            });
        </script>
        <!--底部-->
        @section('footer')
        <div class="footer ">
            <div class="footer-hd ">
            </div>
            <div class="footer-bd ">
                <p style="text-align: center;">
                    ©2017-2018 bylh.com 成备xxxxxxxx号<br>
                    不亦乐乎（成都）有限公司<br>
                    客服：xxxx-xxx-xxx

                </p>
            </div>
        </div>
    @endsection
@endsection