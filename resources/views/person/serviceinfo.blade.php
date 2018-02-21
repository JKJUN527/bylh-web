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
        width: 26% !important;
        display: inline !important;
        height: 2.4rem;
    }
    .pay_code{
        width: 100%;
        text-align: center;
        margin-top: 5rem;
    }
    .paypic{
        cursor: pointer;
        opacity: 0;
        width: 150px;
        height: 150px;
        z-index: 9;
        margin-left: 17%;
        position: absolute;
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
                        <div onclick="focususernote();"><b>服务者自述：</b><br><i>{!! $data['serviceinfo']->brief !!}</i></div>
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
                                <input class="service_info" type="text"   id="service_city" placeholder="你所在的城市（eg:成都）" value="{{$data['serviceinfo']->city}}" required />
                            </div>
                            <div class="am-form-group" style="width: 50%;display:inline">
                                <label for="doc-vld-tel-2-1" class="label_title">是否在校生:</label>
                                <label class="am-radio am-secondary" style="width: 50%">
                                    <input type="radio" name="hasstudent" value="1" data-am-ucheck @if($data['serviceinfo']->has_student == 1) checked @endif> 在读
                                </label>
                                <label class="am-radio am-secondary" style="width: 50%">
                                    <input type="radio" name="hasstudent" value="0" data-am-ucheck @if($data['serviceinfo']->has_student == 0) checked @endif> 毕业
                                </label>
                            </div>
                            @if($data['serviceinfo']->graduate_edu === "" || $data['serviceinfo']->graduate_edu ===null)
                                <?php
                                    $degree1 =0;
                                ?>
                            @else
                                <?php
                                $degree1 = explode("@",$data['serviceinfo']->graduate_edu)[1];
                                ?>
                            @endif
                            <div class="am-form-group grdu" @if($data['serviceinfo']->has_student == 1) style="display: none" @endif>
                                <label for="doc-vld-email-2-1" class="label_title">毕业院校：</label>
                                <input class="label_two" type="text" id="service_grdu_school" placeholder="输入毕业院校及取得学位" value="{{explode("@",$data['serviceinfo']->graduate_edu)[0]}}" required/>
                                <input class="label_two" type="text" id="service_grdu_major" placeholder="输入主修专业" value="{{explode("@",$data['serviceinfo']->graduate_edu)[2]}}" required/>
                                <select class="label_two" id="service_grdu_degree" required>
                                    <option value="0" @if($degree1 ==0 ) selected @endif>博士及以上</option>
                                    <option value="1" @if($degree1 ==1 ) selected @endif>硕士</option>
                                    <option value="2" @if($degree1 ==2 ) selected @endif>学士</option>
                                    <option value="3" @if($degree1 ==3 ) selected @endif>高中及以下</option>
                                </select>
                            </div>
                            @if($data['serviceinfo']->current_edu === "" || $data['serviceinfo']->current_edu ===null)
                                <?php
                                $degree2 =0;
                                ?>
                            @else
                                <?php
                                $degree2 = explode("@",$data['serviceinfo']->current_edu)[1];
                                ?>
                            @endif
                            <div class="am-form-group current" @if($data['serviceinfo']->has_student == 0) style="display: none" @endif>
                                <label for="doc-vld-email-2-1" class="label_title">就读院校：</label>
                                <input class="label_two" type="text" id="service_current_school" placeholder="正在攻读院校、攻读学位" value="{{explode("@",$data['serviceinfo']->current_edu)[0]}}" />
                                <input class="label_two" type="text" id="service_current_major" placeholder="正在攻读专业" value="{{explode("@",$data['serviceinfo']->current_edu)[2]}}" />
                                <select class="label_two" id="service_current_degree">
                                    <option value="0" @if($degree2 ==0 ) selected @endif>博士及以上</option>
                                    <option value="1" @if($degree2 ==1 ) selected @endif>硕士</option>
                                    <option value="2" @if($degree2 ==2 ) selected @endif>学士</option>
                                    <option value="3" @if($degree2 ==3 ) selected @endif>高中及以下</option>
                                </select>
                            </div>
                            <div class="am-form-group" style="width: 50%;display: inline">
                                <label for="doc-vld-tel-2-1" class="label_title">是否支持线下服务:</label>
                                <label class="am-radio am-secondary" style="width: 50%">
                                    <input type="radio" name="offline" value="0" data-am-ucheck @if($data['serviceinfo']->is_offline == 0) checked @endif> 仅线下
                                </label>
                                <label class="am-radio am-secondary" style="width: 50%">
                                    <input type="radio" name="offline" value="1" data-am-ucheck @if($data['serviceinfo']->is_offline == 1) checked @endif> 仅线上
                                </label>
                                <label class="am-radio am-secondary" style="width: 50%">
                                    <input type="radio" name="offline" value="2" data-am-ucheck @if($data['serviceinfo']->is_offline == 2) checked @endif> 线上线下均支持
                                </label>
                            </div>
                            <div class="am-form-group" style="width: 50%;display:inline">
                                <label for="doc-vld-tel-2-1" class="label_title">是否有视频教程:</label>
                                <label class="am-radio am-secondary" style="width: 50%">
                                    <input type="radio" name="hasvideo" value="1" data-am-ucheck @if($data['serviceinfo']->has_video == 1) checked @endif> 有
                                </label>
                                <label class="am-radio am-secondary" style="width: 50%">
                                    <input type="radio" name="hasvideo" value="0" data-am-ucheck @if($data['serviceinfo']->has_video == 0) checked @endif> 没有
                                </label>
                            </div>

                            <div class="am-form-group">
                                {{--<input class="service_info" id="user-note" placeholder="描述你的服务经历、个人能力等" type="text" minlength="4"  data-validation-message="请输入长度大于4个字符" value="{{$data['serviceinfo']->brief}}" required/>--}}
                                <div class="am-u-sm-12">
                                    <label for="doc-vld-ta-2-1" class="label_title">服务者自述：</label>
                                    <input value="{{$data['serviceinfo']->brief}}" style="display: none" id="brief" />
                                    <textarea class="" rows="8" name="description" placeholder="描述你的服务经历、个人能力等" id="service-note"></textarea>
                                </div>
                            </div>
                            <div class="am-form-group" style="padding-top: 10rem;">
                                <label for="doc-vld-email-2-1" class="label_title">选择付款方式:</label>
                                <select class="service_info" id="pay_way" required>
                                    <option value="0" @if($data['serviceinfo']->pay_way ==0 ) selected @endif>支付宝扫码</option>
                                    <option value="1" @if($data['serviceinfo']->pay_way ==1 ) selected @endif>微信扫码</option>
                                </select>
                            </div>
                                <div class="pay_code">
                                    <input type="file" id="paycode_picture" class="paypic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" onchange="loadPreviewPaycode(this)">
                                    <img class="am-radius am-img-thumbnail "  id="paypic-preview" src="
                            @if($data['serviceinfo']->pay_code =='' ||$data['serviceinfo']->pay_code ==null)
                                    {{asset('images/paycode.png')}}
                                    @else
                                    {{$data['serviceinfo']->pay_code}}
                                    @endif
                                            " alt="" style="width: 150px;height: 150px"/>
                                </div>

                            <div class="info-btn">
                                <button class="am-btn am-btn-danger" id="changeinfo" >提交</button>
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
            var brief = $('#brief');
            var service_note = $('#service-note');
            if(brief.val()){
                service_note.val(brief.val().replace(/<\/br>/g, "\r\n"));
            }
        });
        function focususername() {
            var username = $("#service_name");
            username.focus();
        }
        function focususernote() {
            var usernote = $("#service-note");
            usernote.focus();
        }
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
        $('#changeinfo').click(function (event) {
            event.preventDefault();

            var ename = $('#service_name');
            var elogo = $('#user_picture');
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
            if (paycode.prop("files")[0] === undefined && $('#paypic-preview').attr('src') ==="images/paycode.png") {
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

            if (elogo.prop("files")[0] === undefined) {
                console.log("file is empty");
                //formData.append('photo', "");
            } else {
                formData.append('elogo', elogo.prop("files")[0]);
            }
            $.ajax({
                url: "/account/serviceedit",
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

    </script>
@endsection
