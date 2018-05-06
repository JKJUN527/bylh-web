@extends('demo.admin2')
@section("title", "专业问答认证")

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
        .authenticationInfo{
            /*text-align: center !important;*/
        }
        .am-form-label{
            min-width: 140px !important;
        }
        .am-badge a{
            padding: 0.25em 0.625em;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
        }

        .am-form-group{
            height: auto !important;
        }
        .grdu input,.current input{
            display: block;
            margin-bottom: 0.5rem;
        }
        .grdu select,.current select{
            display: block;
            height: 36px;
            line-height: 36px;
            border: 1px solid #eee !important;
            width: 400px;
            padding: 0px 5px;
        }
        .am-form-content textarea, .am-form-content select{
            line-height: 36px;
            border: 1px solid #eee !important;
            width: 400px;
            padding: 0px 5px;
        }
        .pay_code{
            margin-left: 170px;
        }

    </style>
@endsection

@section('content')
    <div class="main-wrap">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">专业认证</strong> /
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
                            <input type="text" id="id-card" name="id_card" placeholder="请输入您的身份证信息">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-profession" class="am-form-label">从事专业：</label>
                        <div class="am-form-content">
                            <input type="text" id="profession" name="profession" placeholder="请设置您从事的专业">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-mail" class="am-form-label">联系邮箱：</label>
                        <div class="am-form-content">
                            <input type="email" id="email" name="email" placeholder="请输入联系邮箱">
                        </div>
                    </div>
                </div>
                
                <div class="authenticationPic">
                    <p class="title">请上传证件照片</p>
                    <p class="tip">请按要求上传身份证</p>

                    <input type="file" name="id-card-first" class="hide" onchange='showIdCardPreview(this, "front")'>
                    <input type="file" name="id-card-secend" class="hide" onchange='showIdCardPreview(this, "back")'>

                    <ul class="cardlist">
                        <li>
                            <div class="cardPic" id="id-card-front_holder">
                                <img src="{{asset("images/cardbg.jpg")}}">
                                <div class="cardText" id="upload-idcard-front-btn"><i class="am-icon-plus"></i>
                                    <p>正面照片</p>
                                </div>
                                <p class="titleText">手持身份证正面</p>
                            </div>
                            <div class="cardExample">
                                <img id="first-preview" src="{{asset("images/cardexample1.jpg")}}">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                        <li>
                            <div class="cardPic" id="id-card-back_holder">
                                <img src="{{asset("images/cardbg.jpg")}}">
                                <div class="cardText" id="upload-idcard-back-btn"><i class="am-icon-plus"></i>
                                    <p>背面照片</p>
                                </div>
                                <p class="titleText">身份证背面</p>
                            </div>
                            <div class="cardExample">
                                <img id="secend-preview" src="{{asset("images/cardexample2.jpg")}}">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                        
                    </ul>
                    </div>
                    
                    <div class="authenticationPic">
                    <p class="title">请上传 学生证、毕业证、资格证或者其它技能证书</p>
                    <p class="tip">请按要求上传相关证书</p>

                    <input type="file" name="id-card-front" class="hide" onchange='showMajorPreview(this, "front")'>
                    <input type="file" name="id-card-back" class="hide" onchange='showMajorPreview(this, "back")'>

                    <ul class="cardlist">
                        <li>
                            <div class="cardPic" id="id-card-front_holder">
                                <img src="{{asset("images/cardbg.jpg")}}">
                                <div class="cardText" id="upload-front-btn"><i class="am-icon-plus"></i>
                                    <p>证书1</p>
                                </div>
                                <p class="titleText">证书材料1</p>
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
                                    <p>证书2</p>
                                </div>
                                <p class="titleText">证书材料2</p>
                            </div>
                            <div class="cardExample">
                                <img id="back-preview" src="{{asset("images/cardbg.jpg")}}">
                                <p class="titleText">示例</p>
                            </div>

                        </li>
                    </ul>
                </div>

                <div class="authenticationInfo">
                    <p class="title">填写服务基本信息</p>

                            <div class="am-form-group">
                                {{--<label for="doc-vld-name-2-1" class="label_title">服务商昵称：</label>--}}
                                <label for="user-name" class="am-form-label">服务商昵称:</label>
                                <div class="am-form-content">
                                    <input  class="service_info" name="username" type="text" id="service_name" minlength="3" placeholder="给你的服务起一个响亮的名字吧！" required/>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-age-2-1" class="am-form-label">服务城市：</label>
                                <div class="am-form-content">
                                    <input class="service_info" type="text"   id="service_city" placeholder="你所在的城市（eg:成都）" value="" required />
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-tel-2-1" class="am-form-label">是否在校生:</label>
                                <div class="am-form-content">
                                    <label class="am-radio am-secondary" style="width: 50%;margin-left: 4rem">
                                        <input type="radio" name="hasstudent" value="1" data-am-ucheck checked> 在读
                                    </label>
                                    <label class="am-radio am-secondary" style="width: 50%;margin-left: 4rem">
                                        <input type="radio" name="hasstudent" value="0" data-am-ucheck> 毕业
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group grdu" style="display: none">
                                <label for="doc-vld-email-2-1" class="am-form-label" style="height: 100px;">毕业院校：</label>
                                <div class="am-form-content">
                                    <input class="label_two" type="text" id="service_grdu_school" placeholder="输入毕业院校及取得学位" value="" required/>
                                    <input class="label_two" type="text" id="service_grdu_major" placeholder="输入主修专业" value="" required/>
                                    <select class="label_two" id="service_grdu_degree" required>
                                        <option value="0">博士及以上</option>
                                        <option value="1" selected>硕士</option>
                                        <option value="2">学士</option>
                                        <option value="3">高中及以下</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group current" style="display: block">
                                <label for="doc-vld-email-2-1" class="am-form-label" style="height: 100px;">就读院校：</label>
                                <div class="am-form-content">
                                    <input class="label_two" type="text" id="service_current_school" placeholder="正在攻读院校、攻读学位"  />
                                    <input class="label_two" type="text" id="service_current_major" placeholder="正在攻读专业" />
                                    <select class="label_two" id="service_current_degree">
                                        <option value="0">博士及以上</option>
                                        <option value="1" selected>硕士</option>
                                        <option value="2">学士</option>
                                        <option value="3">高中及以下</option>
                                    </select>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-tel-2-1" class="am-form-label">是否支持线下服务:</label>
                                <div class="am-form-content">
                                    <label class="am-radio am-secondary" style="width: 50%;margin-left: 4rem">
                                        <input type="radio" name="offline" value="0" data-am-ucheck  checked> 仅线下
                                    </label>
                                    <label class="am-radio am-secondary" style="width: 50%;margin-left: 4rem">
                                        <input type="radio" name="offline" value="1" data-am-ucheck> 仅线上
                                    </label>
                                    <label class="am-radio am-secondary" style="width: 50%;margin-left: 4rem">
                                        <input type="radio" name="offline" value="2" data-am-ucheck> 线上线下均支持
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-tel-2-1" class="am-form-label">是否有视频教程:</label>
                                <div class="am-form-content">
                                    <label class="am-radio am-secondary" style="width: 50%;margin-left: 4rem">
                                        <input type="radio" name="hasvideo" value="1" data-am-ucheck> 有
                                    </label>
                                    <label class="am-radio am-secondary" style="width: 50%;margin-left: 4rem">
                                        <input type="radio" name="hasvideo" value="0" data-am-ucheck checked> 没有
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                {{--<input class="service_info" id="user-note" placeholder="描述你的服务经历、个人能力等" type="text" minlength="4"  data-validation-message="请输入长度大于4个字符" value="{{$data['serviceinfo']->brief}}" required/>--}}
                                <div class="am-u-sm-12">
                                    <label for="doc-vld-ta-2-1" class="am-form-label">服务者自述：</label>
                                    <div class="am-form-content">
                                        <textarea class="" rows="3  " name="description" placeholder="描述你的服务经历、个人能力等" id="service-note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-email-2-1" class="am-form-label">选择收款方式:</label>
                                <div class="am-form-content">
                                    <select class="service_info" id="pay_way" required>
                                        <option value="0" selected>支付宝扫码</option>
                                        <option value="1">微信扫码</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pay_code">
                                <input type="file" id="paycode_picture" class="paypic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" onchange="loadPreviewPaycode(this)">
                                <img class="am-radius am-img-thumbnail "  id="paypic-preview" src="{{asset('images/paycode.png')}}
                                        " alt="" style="width: 150px;height: 150px"/>
                            </div>

                </div>
                
                <div class="info-btn">
                    <div id="submit-form" class="am-btn am-btn-danger">提交</div>
                </div>
            @else
                <span class="am-badge am-badge-warning am-round"><a href="/account/safety">您已提交专业身份认证，请等待审核,点击查看审核结果</a></span>
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

        var isUploadIdCardFirst = false;
        var isUploadIdCardSecend = false;

        $("#upload-idcard-front-btn").click(function (event) {
            event.preventDefault();
            swal({
                title: "要求",
                type: "info",
                text: "身份证正面照片，要求身份证上字体清晰可辨",
                confirmButtonText: "知道了",
                closeOnConfirm: true
            }, function () {
                $("input[name='id-card-first']").click();
            });
        });

        $("#upload-idcard-back-btn").click(function (event) {
            event.preventDefault();
            swal({
                title: "要求",
                type: "info",
                text: "身份证反面照片，要求身份证上字体清晰可辨",
                confirmButtonText: "知道了",
                closeOnConfirm: true
            }, function () {
                $("input[name='id-card-secend']").click();
            });
        });
        function showIdCardPreview(element, frontOrBack) {
            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var idCardFrontPath = null;
            if (frontOrBack === "front") {
                idCardFrontPath = $("input[name='id-card-first']").val();
            } else {
                idCardFrontPath = $("input[name='id-card-secend']").val();
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
                    $("#first-preview").attr("src", objectUrl);
                    isUploadIdCardFirst = true;
                } else if (frontOrBack === "back") {
                    $("#secend-preview").attr("src", objectUrl);
                    isUploadIdCardSecend = true;
                }
            }
        }


        //专业证书上传
        $("#upload-front-btn").click(function (event) {
            event.preventDefault();
            swal({
                title: "要求",
                type: "info",
                text: "专业认证证明材料，要求证书照片上字体清晰可辨",
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
                text: "专业认证证明材料，要求证书照片上字体清晰可辨",
                confirmButtonText: "知道了",
                closeOnConfirm: true
            }, function () {
                $("input[name='id-card-back']").click();
            });
        });

        $("#submit-form").click(function () {
            // var majorName = $("input[name='major_name']").val();
            // var tel = $("input[name='tel']").val();
            var email = $("input[name='email']").val();
            var profession = $("input[name='profession']").val();

            // var workplace = $("input[name='workplace']").val();
            // var certificate_name = $("input[name='certificate_name']").val();
            // var identity = $("input[name='identity']").val();

            var idCardFront = $("input[name='id-card-front']");
            var idCardBack = $("input[name='id-card-back']");

            var realName = $("input[name='real_name']").val();
            var idCardNum = $("input[name='id_card']").val();
            var idCardFirst = $("input[name='id-card-first']");
            var idCardSecend = $("input[name='id-card-secend']");

            // majorName = $.trim(majorName);
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


            if(email === ''){
                swal("","邮箱不能为空", "error");
                return;
            }else if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email)){
                swal("", "邮箱格式不正确", "error");
                return;
            }
            if(profession === ''){
                swal("","从事专业不能为空", "error");
                return;
            }else if(profession.length >100){
                swal("","专业名称不能长于100字", "error");
                return;
            }

            if (!isUploadIdCardFirst) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "请上传身份证正面照片",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
                return;
            }

            if (!isUploadIdCardSecend) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "请上传身份证反面照片",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
                return;
            }

            //服务基本信息获取
            var ename = $('#service_name');
            // var elogo = $('#user_picture');
            var paycode = $('#paycode_picture');
            var city = $('#service_city');
            var has_student = $('input:radio[name="hasstudent"]:checked').val();
            var grdu_school = $('#service_grdu_school');
            var grdu_major = $('#service_grdu_major');
            var grdu_degree = $('#service_grdu_degree');
            var current_degree = $('#service_current_degree');
            var current_school = $('#service_current_school');
            var current_major = $('#service_current_major');
            var offline = $('input:radio[name="offline"]:checked').val();
            var hasvideo = $('input:radio[name="hasvideo"]:checked').val();
            var payway = $('#pay_way');
            var description_raw = $("textarea[name='description']");
            var description = description_raw.val().replace(/\r\n/g, '</br>');
            description = description.replace(/\n/g, '</br>');
            var formData = new FormData();

            if(ename.val() === "" ||ename.val().length<3){
                swal('','企业名称长度需大于3个字符','error');
                return;
            }
            if(city.val() === ""){
                swal('','请填写你所在城市名称（eg:成都）','error');
                return;
            }
            if (paycode.prop("files")[0] === undefined) {
                console.log("file is empty");
                swal('','必须上传收款二维码','error');
                return;
            } else {
                formData.append('paycode', paycode.prop("files")[0]);
            }
            formData.append('hasstudent', has_student);
            if(has_student == 1){//在校
                if(current_school.val()==='' || current_major.val()==='' ){
                    swal('','请务必设置当前就读学校及主修专业','error');
                    return;
                } else {
                    formData.append('current', current_school.val()+"@"+current_degree.val()+"@"+current_major.val());
                    formData.append('graduation', "@@@");
                }
            }
            if(has_student == 0){//毕业
                if(grdu_school.val()==='' ){
                    swal('','请务必设置毕业学校','error');
                    return;
                } else {
                    formData.append('graduation', grdu_school.val()+"@"+grdu_degree.val()+"@"+grdu_major.val());
                    formData.append('current', "@@@");
                }
            }

            formData.append('ename', ename.val());
            formData.append('city', city.val());
            formData.append('offline', offline);
            formData.append('hasvideo', hasvideo);
            formData.append('payway', payway.val());
            formData.append('description', description);

            // if (elogo.prop("files")[0] === undefined) {
            //     console.log("file is empty");
            //     //formData.append('photo', "");
            // } else {
            //     formData.append('elogo', elogo.prop("files")[0]);
            // }

            //
            //
            // var formData = new FormData();
            // formData.append("mediator_name", majorName);
            // formData.append("tel", tel);
            formData.append("email", email);
            formData.append("profession", profession);
            // formData.append("workplace", workplace);
            // formData.append("certificate_name", certificate_name);
            // formData.append("identity", identity);

            formData.append("real_name", realName);
            formData.append("id_card", idCardNum);
            formData.append("idcard1_photo", idCardFirst.prop("files")[0]);
            formData.append("idcard2_photo", idCardSecend.prop("files")[0]);

            if (!isUploadIdCardFront) {
                swal({
                    title: "错误",
                    type: "error",
                    text: "请至少上传一个证书",
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
                url: "/account/authentication/2",
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

        function showMajorPreview(element, frontOrBack) {
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
    <script>
        //判断用户名是否存在
        $('#service_name').blur(function() {
            var ename = $('#service_name');
            if(ename.val() == ''){
                return;
            }
            var formData = new FormData();
            formData.append('ename', ename.val());

            $.ajax({
                url: "/account/HasServicename",
                type: 'post',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    if(result.status == 400){
                        swal('','企业名已存在',"error");
                        ename.val("");
                    }
                }
            })

        });
        //判断是否在读生
        $('input:radio[name="hasstudent"]').change( function () {
            var has_student = $('input:radio[name="hasstudent"]:checked').val();
            var grdu = $('.grdu');
            var current = $('.current');

            if(has_student == 1){
                grdu.css('display','none');
                current.css('display','block');
            }
            if(has_student == 0){
                grdu.css('display','block');
                current.css('display','none');
            }
        });
        $('#paypic-preview').click(function () {
            var user_picture = $('#user_picture');
            user_picture.click();
        });
        function loadPreviewPaycode(element) {
//            alert(123);
            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var idCardPath = $("input[id='paycode_picture']").val();

            if (!/.(jpg|jpeg|png|JPG|JPEG|PNG)$/.test(idCardPath)) {
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
                $("#paypic-preview").attr("src", objectUrl);
            }
        }
    </script>
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
