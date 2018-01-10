@extends('demo.admin3')
@section('content')
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-info">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
                </div>
                <hr/>

                <!--头像 -->
                <div class="user-infoPic">

                    <div class="filePic">
                        <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                        <img class="am-circle am-img-thumbnail" src="images/touxiang.jpg" alt="" />
                    </div>

                    <p class="am-form-help">头像</p>

                    <div class="info-m">
                        <div><b>用户名：<i>小叮当</i></b></div>
                        <div class="vip">
                            <span></span><a href="#">会员专享</a>
                        </div>
                    </div>
                </div>

                <!--个人信息 -->
                <div class="info-main">
                    <form action="" class="am-form" id="doc-vld-msg">
                        <fieldset>
                            <div class="am-form-group">
                                <label for="doc-vld-name-2-1">用户名：</label>
                                <input type="text" id="doc-vld-name-2-1" minlength="3" placeholder="输入用户名（至少 3 个字符）" required/>
                            </div>
                            <div class="am-form-group">
                                <label>性别： </label>
                                <label class="am-radio-inline">
                                    <input type="radio"  value="" name="docVlGender" required> 男
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="docVlGender"> 女
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="docVlGender"> 其他
                                </label>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-email-2-1">邮箱：</label>
                                <input type="email" id="doc-vld-email-2-1" data-validation-message="请输入合法的邮箱" placeholder="输入邮箱" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-age-2-1">年龄：</label>
                                <input type="number" class=""  id="doc-vld-age-2-1" placeholder="输入年龄  3-120" min="3" max="120" required />
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-tel-2-1">电话：</label>
                                <input id="user-phone" placeholder="输入电话" type="tel"  data-validation-message="请输入合法的电话" required/>
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-ta-2-1">签名：</label>
                                <textarea id="doc-vld-ta-2-1" minlength="10" maxlength="100"></textarea>
                            </div>

                            <div class="info-btn">
                                <button class="am-btn am-btn-danger" type="submit">提交</button>
                            </div>
                        </fieldset>
                    </form>

                </div>

            </div>

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