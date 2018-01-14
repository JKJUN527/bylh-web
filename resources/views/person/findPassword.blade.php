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
                        <div class="am-btn am-btn-danger" id="change_pwd">保存修改</div>
                    </div>
                </fieldset>
            </form>
        </div>
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
        <script>
            $('#change_pwd').click(function () {

                var old_pwd = $('#doc-vld-name-2');
                var new_pwd = $('#doc-vld-pwd-1');
                var new_pwdRE = $('#doc-vld-pwd-2');
                if(old_pwd.val().length <6){
                    swal("","密码长度不能小于6位", "error");
                    return;
                }
                if(new_pwd == "" ||new_pwd.val().length <6){
                    swal("","新密码长度不能小于6位", "error");
                    return;
                }
                if(new_pwd.val() != new_pwdRE.val()){
                    swal("","两次输入密码不一致", "error");
                    return;
                }
                var formData = new FormData();

                formData.append("oldPassword", old_pwd.val());
                formData.append("password", new_pwd.val());
                formData.append("passwordConfirm", new_pwdRE.val());

                $.ajax({
                    url: "/account/resetPassword",
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
                            swal("","修改成功","success");
                            self.location = "/account/logout";
                            return;
                        }else{
                            swal('',result.msg,'error');
                        }
                    }
                });
            })
        </script>
@endsection