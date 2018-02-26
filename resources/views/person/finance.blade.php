@extends('demo.admin2')
@section("title", "实习中介认证")

@section("custom-style")
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/sweetalert/sweetalert.css")}}"/>
    <style>
        .hide {
            display: none !important;
        }

        .preview {
            display: block;
            padding: 3px;
            background-color: #fff;
            border: 1px solid lightgray;
        }
        .am-form-label{
            min-width: 140px !important;
        }
        .am-form-content textarea{
            width: 400px;
            line-height:1.5;
        }

    </style>
@endsection

@section('content')

    <div class="main-wrap">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">实习中介认证</strong> /
                <small>Finance&nbsp;authentication</small>
            </div>
        </div>
        <hr/>
        <div class="authentication">
            <p class="tip">请填写你的中介机构的认证凭据，以用于平台审核</p>

            @if($data["is_vertify"] == -1)
                <div class="authenticationInfo">
                    <p class="title">填写机构信息</p>
                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">实习中介机构名称：</label>
                        <div class="am-form-content">
                            <input type="text" id="real-name" name="real_name" placeholder="请输入您的机构名称">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-tel" class="am-form-label">负责人联系电话：</label>
                        <div class="am-form-content">
                            <input type="tel" id="tel" name="tel" placeholder="请输入负责人联系电话">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-mail" class="am-form-label">负责人联系邮箱：</label>
                        <div class="am-form-content">
                            <input type="email" id="email" name="email" placeholder="请输入负责人联系邮箱">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-field" class="am-form-label">中介领域：</label>
                        <div class="am-form-content">
                            <input type="text" id="field" name="field" placeholder="请输入中介领域（工美设计、医院护士、公司职位等）">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-self-statement" class="am-form-label">机构自述：</label>
                        <div class="am-form-content">
                            <textarea  rows="3" name="self_statement" placeholder="描述你的机构职能，简介情况等" id="self_statement"></textarea>
                        </div>
                    </div>
                </div>
                <div class="authenticationPic">
                    <p class="title">上传营业执照</p>
                    <p class="tip">请按要求上传营业执照</p>

                    <input type="file" name="id-card-front" class="hide" onchange='showIdCardPreview(this, "front")'>
                    <input type="file" name="id-card-back" class="hide" onchange='showIdCardPreview(this, "back")'>

                    <ul class="cardlist">
                        <li>
                            <div class="cardPic" id="id-card-front_holder">
                                <img src="{{asset("images/cardbg.jpg")}}">
                                <div class="cardText" id="upload-front-btn"><i class="am-icon-plus"></i>
                                    <p>营业执照</p>
                                </div>
                                <p class="titleText">营业执照</p>
                            </div>
                            <div class="cardExample">
                                <img id="front-preview" src="{{asset("images/cardbg.jpg")}}">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                        <li>
                            <div class="cardPic" id="id-card-back_holder">
                                <img src="{{asset("images/cardbg.jpg")}}">
                                <div class="cardText" id="upload-back-btn"><i class="am-icon-plus"></i>
                                    <p>其他相关证件</p>
                                </div>
                                <p class="titleText">其他证件</p>
                            </div>
                            <div class="cardExample">
                                <img id="back-preview" src="{{asset("images/cardbg.jpg")}}">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="info-btn">
                    <div id="submit-form" class="am-btn am-btn-danger">提交</div>
                </div>
            @else
                <p>您已提交实习中介认证，请等待审核</p>
            @endif
        </div>
    </div>
    <!--底部-->

@endsection

@section('custom-script')
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        var isUploadIdCardFront = false;
        var isUploadIdCardBack = false;

        $("#upload-front-btn").click(function (event) {
            event.preventDefault();
            swal({
                title: "要求",
                type: "info",
                text: "营业执照照片，要求证件照片上字体清晰可辨",
                confirmButtonText: "知道了",
                closeOnConfirm: true
            }, function () {
                $("input[name='id-card-front']").click();
            });
        });

        $("#upload-back-btn").click(function (event) {
            event.preventDefault();
            swal({
                title: "要求",
                type: "info",
                text: "其他相关证件照片，可证明实习中介身份的照片",
                confirmButtonText: "知道了",
                closeOnConfirm: true
            }, function () {
                $("input[name='id-card-back']").click();
            });
        });

        $("#submit-form").click(function () {
            var realName = $("input[name='real_name']").val();
            var tel = $("input[name='tel']").val();
            var email = $("input[name='email']").val();
            var field = $("input[name='field']").val();
            var self_statement_raw = $("textarea[name='self_statement']");
            var self_statement = self_statement_raw.val().replace(/\r\n/g, '</br>');
            self_statement = self_statement.replace(/\n/g, '</br>');

            var idCardFront = $("input[name='id-card-front']");
            var idCardBack = $("input[name='id-card-back']");

            realName = $.trim(realName);

            if (realName === "") {
                swal({
                    title: "",
                    text: "请输入您的实习中介机构名称",
                    type: "error",
                    confirmButtonText: "确定",
                    showCancelButton: false,
                    closeOnConfirm: false
                });
                return;
            }
            if(tel ===''){
                swal("","联系电话不能为空", "error");
                return;
            }else if(!/^1[34578]\d{9}$/.test(tel)){
                swal("","手机号格式不正确", "error");
                return;
            }
            if(email === ''){
                swal("","邮箱不能为空", "error");
                return;
            }else if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email)){
                swal("", "邮箱格式不正确", "error");
                return;
            }
            if(field === ''){
                swal("","中介领域不能为空", "error");
                return;
            }else if(field.length > 100){
                swal("","中介领域长度不能超过100字", "error");
                return;
            }


            var formData = new FormData();
            formData.append("mediator_name", realName);
            formData.append("tel", tel);
            formData.append("email", email);
            formData.append("field", field);
            formData.append("self_statement", self_statement);

            if (!isUploadIdCardFront) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "请上传营业执照证件照片",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
                return;
            } else {
                formData.append("license_photo", idCardFront.prop("files")[0]);
            }

            if (isUploadIdCardBack) {
                formData.append("other_photo", idCardBack.prop("files")[0]);
            }


            $.ajax({
                url: "/account/authentication/1",
                type: 'post',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    console.log(data);
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        setTimeout(function () {
                            self.location = '/account';
                        }, 1000);
                    } else {
                        swal({
                            title: "错误",
                            type: "error",
                            text: result.msg,
                            cancelButtonText: "关闭",
                            showCancelButton: true,
                            showConfirmButton: false
                        });
                    }

                }

            })
        });

        function showIdCardPreview(element, frontOrBack) {
            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var idCardFrontPath = null;
            if (frontOrBack === "front") {
                idCardFrontPath = $("input[name='id-card-front']").val();
            } else {
                idCardFrontPath = $("input[name='id-card-back']").val();
            }

            if (!/.(jpg|jpeg|png|JPG|JPEG|PNG)$/.test(idCardFrontPath)) {
                isCorrect = false;
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片格式错误，支持：.jpg .jpeg .png类型。请选择正确格式的图片后再试！",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
            } else if (file.size > 5 * 1024 * 1024) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片文件最大支持：5MB",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
            } else {
                if (frontOrBack === "front") {
                    $("#front-preview").attr("src", objectUrl);
                    isUploadIdCardFront = true;
                } else if (frontOrBack === "back") {
                    $("#back-preview").attr("src", objectUrl);
                    isUploadIdCardBack = true;
                }
            }
        }
    </script>
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
