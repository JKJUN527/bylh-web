@extends('demo.admin2')
@section('title','个人资料')
@section('custom-style')
    <link href="{{asset('css/infstyle.css')}}" rel="stylesheet" type="text/css">
    <style>
    .user_info{
        width: 80% !important;
        display: inline !important;
    }
    .label_tip{
        height: 2.4rem;
    }
    .label_title{
        min-width: 5rem;
    }
    </style>
@endsection
@section('content')
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
                        <input type="file" id="user_picture" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" onchange="loadPreview(this)">
                        <img class="am-circle am-img-thumbnail"  id="head-preview" src="
                            @if($data['userinfo']->photo =='' ||$data['userinfo']->photo ==null)
                                {{asset('images/mansmall.jpg')}}
                            @else
                                {{$data['userinfo']->photo}}
                            @endif
                                " alt="" style="width: 100px;height: 100px"/>
                    </div>

                    <p class="am-form-help">头像</p>

                    <div class="info-m">
                        <div onclick="focususername();"><b>用户名：<i>{{$data['username']}}</i></b></div>
                        <div onclick="focususernote();"><b>昵称：<i>{{$data['userinfo']->note}}</i></b></div>
                    </div>
                </div>

                <!--个人信息 -->
                <div class="info-main">
                    <form class="am-form" id="doc-vld-msg">
                        <fieldset>
                            <div class="am-form-group">
                                <label for="doc-vld-name-2-1" class="label_title">用户名：</label>
                                <input  class="user_info" name="username" type="text" id="doc-vld-name-2-1" minlength="3" placeholder="输入用户名（至少 3 个字符）"
                                        value="{{$data['username']}}" required/>
                            </div>
                            <div class="am-form-group">
                                <label class="label_title">性别： </label>
                                <label class="am-radio-inline">
                                    <input type="radio"  value="0" name="docVlGender" @if($data['userinfo']->sex ==0) checked @endif required> 男
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio"  value="1" name="docVlGender" @if($data['userinfo']->sex ==1) checked @endif> 女
                                </label>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-age-2-1" class="label_title">生日：</label>
                                <input type="text" class="user_info" id="doc-vld-age-2-1" placeholder="选择你的生日(选填)" value="{{substr($data['userinfo']->birthday,0,10)}}" data-am-datepicker readonly />
                                {{--<input class="user_info" type="date"   id="doc-vld-age-2-1" placeholder="" value="{{$data['userinfo']->birthday}}" required />--}}
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-email-2-1" class="label_title">邮箱：</label>
                                <input class="user_info" type="email" id="doc-vld-email-2-1" data-validation-message="请输入合法的邮箱" placeholder="输入邮箱" value="{{$data['userinfo']->mail}}" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-tel-2-1" class="label_title">电话：</label>
                                <input class="user_info" id="user-phone" placeholder="输入电话" type="tel"  data-validation-message="请输入合法的电话" value="{{$data['userinfo']->tel}}" required/>
                            </div>

                            <div class="am-form-group">
                                <label for="doc-vld-ta-2-1" class="label_title">昵称：</label>
                                <input class="user_info" id="user-note" placeholder="输入昵称(选填)" type="text" value="{{$data['userinfo']->note}}"/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-name-2-1" class="label_title">所在城市：</label>
                                <input  class="user_info" type="text" id="doc-vld-city-2-1" minlength="2" placeholder="输入城市(eg:上海)"
                                        value="{{$data['userinfo']->city}}" required/>
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
            var username = $('#doc-vld-name-2-1');
            if(username.val() == ''){
                return;
            }
            var formData = new FormData();
            formData.append('username', username.val());

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
                        username.val("");
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
            // if(birthday.val() === ""){
            //     swal('','请选择生日','error');
            //     return;
            // }
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
            // if(note.val() === '' || note.val().length <4){
            //     swal('','个人签名长度不能小于4个字符','error');
            //     return;
            // }
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
