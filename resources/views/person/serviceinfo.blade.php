@extends('demo.admin2')
@section('title','服务资料')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <style>
    .service_info{
        width: 80% !important;
        display: inline !important;
    }
    .label_tip{
        height: 2.4rem;
    }
    .label_title{
        min-width: 5rem;
    }
    .label_two {
        width: 40% !important;
        display: inline !important;
        height: 2.4rem;
    }
    </style>
@endsection
@section('content')
    <div class="main-wrap">
            <div class="user-info">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">服务相关资料</strong> / <small>Service&nbsp;information</small></div>
                </div>
                <hr/>

                <!--头像 -->
                <div class="user-infoPic">

                    <div class="filePic">
                        <input type="file" id="user_picture" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" onchange="loadPreview(this)">
                        <img class="am-circle am-img-thumbnail"  id="head-preview" src="
                            @if($data['serviceinfo']->elogo =='' ||$data['serviceinfo']->elogo ==null)
                                {{asset('images/mansmall.jpg')}}
                            @else
                                {{$data['serviceinfo']->elogo}}
                            @endif
                                " alt="" style="width: 100px;height: 100px"/>
                    </div>

                    <p class="am-form-help">企业logo</p>

                    <div class="info-m">
                        <div onclick="focususername();"><b>企业名称：<i>{{$data['serviceinfo']->ename}}</i></b></div>
                        <div onclick="focususernote();"><b>服务者自述：<i>{{$data['serviceinfo']->brief}}</i></b></div>
                    </div>
                </div>

                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form" id="doc-vld-msg">
                        <fieldset>
                            <div class="am-form-group">
                                <label for="doc-vld-name-2-1" class="label_title">企业名称：</label>
                                <input  class="service_info" name="username" type="text" id="service_name" minlength="3" placeholder="给你的服务起一个响亮的名字吧！"
                                        value="{{$data['serviceinfo']->ename}}" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-age-2-1" class="label_title">服务城市：</label>
                                <input class="service_info" type="text"   id="service_city" placeholder="你所在的城市（eg:成都）" value="" required />
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-email-2-1" class="label_title">毕业院校：</label>
                                <input class="label_two" type="text" id="service_grdu_school" placeholder="输入毕业院校及取得学位" value="" required/>
                                <select class="label_two" id="service_grdu_degree" required>
                                    <option value="0">博士及以上</option>
                                    <option value="1">硕士</option>
                                    <option value="2">学士</option>
                                    <option value="3">高中及以下</option>
                                </select>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-email-2-1" class="label_title">就读院校：</label>
                                <input class="label_two" type="text" id="service_current_school" placeholder="(选填)正在攻读院校、攻读学位" value="" />
                                <select class="label_two" id="service_current_degree">
                                    <option value="0">博士及以上</option>
                                    <option value="1">硕士</option>
                                    <option value="2">学士</option>
                                    <option value="3">高中及以下</option>
                                </select>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-tel-2-1" class="label_title">最高：</label>
                                <input class="service_info" id="user-phone" placeholder="输入电话" type="tel"  data-validation-message="请输入合法的电话" value="" required/>
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-ta-2-1" class="label_title">签名：</label>
                                <input class="service_info" id="user-note" placeholder="输入个人签名" type="text" minlength="4"  data-validation-message="请输入长度大于4个字符" value="{{$data['serviceinfo']->brief}}" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-name-2-1" class="label_title">所在城市：</label>
                                <input  class="service_info" type="text" id="doc-vld-city-2-1" minlength="2" placeholder="输入城市(eg:上海)"
                                        value="" required/>
                            </div>

                            <div class="info-btn">
                                <button class="am-btn am-btn-danger" id="changeinfo">提交</button>
                            </div>
                        </fieldset>
                    </form>

                </div>

            </div>

        </div>
@endsection
@section('aside')
@include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
    <script>
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
                        $alert = $('<div class="am-alert am-alert-danger label_tip"></div>').hide().
                        appendTo($group);
                    }

                    $alert.html(msg).show();
                }
            });
        });
        function focususername() {
            var username = $("#doc-vld-name-2-1");
            username.focus();
        }
        function focususernote() {
            var usernote = $("#user-note");
            usernote.focus();
        }
        //判断用户名是否存在
        $('#doc-vld-name-2-1').blur(function() {
            var username = $('#doc-vld-name-2-1').val();
            if(username == ''){
                return;
            }
            var formData = new FormData();
            formData.append('username', username);

            $.ajax({
                url: "/account/HasUsername",
                type: 'post',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if(result.status == 400){
                        swal('','用户名已存在',"error");
                    }
                }
            })

        });
        $('#changeinfo').click(function (event) {
            event.preventDefault();

           var username = $('#doc-vld-name-2-1');
           var photo = $('#user_picture');
           var birthday = $('#doc-vld-age-2-1');
           var sex = $("input[name='docVlGender']:checked");
           var email = $('#doc-vld-email-2-1');
           var tel = $('#user-phone');
           var note = $('#user-note');
           var city = $('#doc-vld-city-2-1');

            if(username.val() === "" ||username.val().length<3){
                swal('','用户名长度需大于3个字符','error');
                return;
            }
            if(birthday.val() === ""){
                swal('','请选择生日','error');
                return;
            }
            if(sex.val()===''){
                swal('','请选择性别','error');
                return;
            }
            if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email.val())){
                swal('','邮箱格式非法','error');
                return;
            }
            if(!/^1[34578]\d{9}$/.test(tel.val())){
                swal('','电话格式非法','error');
                return;
            }
            if(note.val() === '' || note.val().length <4){
                swal('','个人签名长度不能小于4个字符','error');
                return;
            }

           var formData = new FormData();
           formData.append('username', username.val());
           formData.append('birthday', birthday.val());
           formData.append('sex', sex.val());
           formData.append('mail', email.val());
           formData.append('tel', tel.val());
           formData.append('note', note.val());
           formData.append('city', city.val());

            if (photo.prop("files")[0] === undefined) {
                console.log("file is empty");
                //formData.append('photo', "");
            } else {
                formData.append('photo', photo.prop("files")[0]);
            }
            $.ajax({
                url: "/account/baseedit",
                type: 'post',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if(result.status == 400){
                        swal('',result.msg,"error");
                    }else{
                        swal('',result.msg,"success");
                        location.href = "/account/index";
                    }
                }
            })

        });

        function loadPreview(element) {
            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var idCardPath = $("input[id='user_picture']").val();

            if (!/.(jpg|jpeg|png|JPG|JPEG|PNG)$/.test(idCardPath)) {
                isCorrect = false;
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片格式错误，支持：.jpg .jpeg .png类型。请选择正确格式的图片后再试！",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
            } else if (file.size > 2 * 1024 * 1024) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片文件最大支持：2MB",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
            } else {
                $("#head-preview").attr("src", objectUrl);
            }
        }

    </script>
@endsection
