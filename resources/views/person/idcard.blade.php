@extends('demo.admin2')
@section("title", "身份认证")

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

    </style>
@endsection

@section('content')

    <div class="main-wrap">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">实名认证</strong> /
                <small>Real&nbsp;authentication</small>
            </div>
        </div>
        <hr/>
        <div class="authentication">
            @if($data["is_vertify"] == -1)
                <p class="tip">请填写您身份证上的真实信息，以用于报关审核</p>
                <div class="authenticationInfo">
                    <p class="title">填写个人信息</p>

                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">真实姓名</label>
                        <div class="am-form-content">
                            <input type="text" id="real-name" name="real_name" placeholder="请输入您的真实姓名">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-IDcard" class="am-form-label">身份证号</label>
                        <div class="am-form-content">
                            <input type="tel" id="id-card" name="id_card" placeholder="请输入您的身份证信息">
                        </div>
                    </div>
                </div>
                <div class="authenticationPic">
                    <p class="title">上传身份证照片</p>
                    <p class="tip">请按要求上传身份证</p>

                    <input type="file" name="id-card-front" class="hide" onchange='showIdCardPreview(this, "front")'>
                    <input type="file" name="id-card-back" class="hide" onchange='showIdCardPreview(this, "back")'>

                    <ul class="cardlist">
                        <li>
                            <div class="cardPic" id="id-card-front_holder">
                                <img src="{{asset("images/cardbg.jpg")}}">
                                <div class="cardText" id="upload-front-btn"><i class="am-icon-plus"></i>
                                    <p>正面照片</p>
                                </div>
                                <p class="titleText">手持身份证正面</p>
                            </div>
                            <div class="cardExample">
                                <img id="front-preview" src="{{asset("images/cardexample1.jpg")}}">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                        <li>
                            <div class="cardPic" id="id-card-back_holder">
                                <img src="{{asset("images/cardbg.jpg")}}">
                                <div class="cardText" id="upload-back-btn"><i class="am-icon-plus"></i>
                                    <p>背面照片</p>
                                </div>
                                <p class="titleText">身份证背面</p>
                            </div>
                            <div class="cardExample">
                                <img id="back-preview" src="{{asset("images/cardexample2.jpg")}}">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="info-btn">
                    <div id="submit-form" class="am-btn am-btn-danger">提交</div>
                </div>
            @else
                <span class="am-badge am-badge-warning am-round">您已提交实名认证，请等待审核</span>
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
                text: "身份证正面照片，要求身份证上字体清晰可辨",
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
                text: "身份证反面照片，要求身份证上字体清晰可辨",
                confirmButtonText: "知道了",
                closeOnConfirm: true
            }, function () {
                $("input[name='id-card-back']").click();
            });
        });

        $("#submit-form").click(function () {
            var realName = $("input[name='real_name']").val();
            var idCardNum = $("input[name='id_card']").val();
            var idCardFront = $("input[name='id-card-front']");
            var idCardBack = $("input[name='id-card-back']");

            realName = $.trim(realName);
            idCardNum = $.trim(idCardNum);

            if (realName === "") {
                swal({
                    title: "",
                    text: "请输入您的真实姓名",
                    type: "error",
                    confirmButtonText: "确定",
                    showCancelButton: false,
                    closeOnConfirm: false
                });
                return;
            }

            if (idCardNum === "") {
                swal({
                    title: "",
                    text: "请输入您的身份证信息",
                    type: "error",
                    confirmButtonText: "确定",
                    showCancelButton: false,
                    closeOnConfirm: false
                });
                return;
            }
            if(!/^[1-9]{1}[0-9]{14}$|^[1-9]{1}[0-9]{16}([0-9]|[xX])$/.test(idCardNum)){
                swal({
                    title: "",
                    text: "请输入正确的身份证号码",
                    type: "error",
                    confirmButtonText: "确定",
                    showCancelButton: false,
                    closeOnConfirm: false
                });
                return;
            }

            var formData = new FormData();
            formData.append("real_name", realName);
            formData.append("id_card", idCardNum);


            if (!isUploadIdCardFront) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "请上传身份证正面照片",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
                return;
            } else {
                formData.append("idcard1_photo", idCardFront.prop("files")[0]);
            }

            if (!isUploadIdCardBack) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "请上传身份证反面照片",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
                return;
            } else {
                formData.append("idcard2_photo", idCardBack.prop("files")[0]);
            }


            $.ajax({
                url: "/account/authentication/0",
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
                idCardFrontPath = $("input[name='id-card-front']").val();
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
