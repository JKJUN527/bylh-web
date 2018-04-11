@extends('demo.admin',['title'=>0])
@section('title','发布服务')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .long-title{
            display:none;
        }
        .comcategory li{
            font-size:14px;
            padding: 3px;
        }
        .comcategory li a:hover{
            color: #b84554;
        }
        .comcategory li i{
            color: gray;
            margin-left: 10px;
        }
        .title-first a{
            text-align: center;
            padding: 60px;
            font-size: 18px;
            color: #000;
            font-weight: bold;
        }
        .title-first a:hover{
            color: #b84554;
            font-weight: bold;
        }
        .demo li{
            float: none;
            width: 100%;
            padding: 0px 5px;
            border: none;
            height: 30px;
            line-height: 30px;
        }
        .guide_line{
            height: 3px;
            background: #df231b;
            position: absolute;
            top: 17px;
            left: 0;
            z-index: 9;
            width: 100%
        }
        .guide_pic{
            {{--background: url({{asset('images/fabu_y.jpg')}}) center top no-repeat;--}}
            {{--background: url({{asset('images/fabu_q.jpg')}}) center top no-repeat;--}}
            height: 35px;
            width: 35px;
            position: absolute;
            left: 180px;
            top: 0;
            z-index: 999;
        }
        .guide_font{
            font-size: 16px;
            color: #555;
            padding-top: 40px;
            text-align: center;
        }
        .title_tip_first{
            height: 25px;
            line-height: 25px;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            margin-left: 10px;
            padding-top: 10px;
            display: inline-block;
        }
        .title_tip{
            height: 25px;
            line-height: 25px;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            margin-left: 10px;
            padding-top: 10px;
        }
        .sub_title_tip{
            padding: 16px 3px;
            margin-left: 30px;
            padding-bottom: 30px;
            margin-bottom: 20px;
        }
        .base_info{
            font-size: 16px;
            width:100%;
            text-align: left;
            margin-top: 1rem;
        }
        span.insert:hover {
            text-decoration: underline;
        }

        span.delete:hover {
            background-color: #ebebeb;
        }

        span.delete {
            color: #aaaaaa;
            border: 2px solid #ebebeb;
            background-color: #f5f5f5;
        }

        span.insert {
            color: #4CAF50;
        }
        .preview_img{
            width: 150px;
            height: 100px;
        }
        .am-selected-status{
            text-align: right;
        }
        .warning{
            text-align: center;
            font-size: large;
        }
    </style>
@endsection
@section('content')
    <!--发布服务-->
    @if($data['verification'] == 0)
        <div style="min-height: 450px">
            <div class="am-alert am-alert-warning warning">
                <a href="/account/serviceedit" style="font-size: large;color: white">请先设置服务基本信息！点击设置。。。。</a>
            </div>
        </div>
    @else
    <div class="am-g am-g-fixed" style="padding-top: 45px;">
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
            <div class="fabu_guide_y guide_line"></div>
            <div class="fabu_guide_sign guide_pic" style="background: url({{asset('images/fabu_y.png')}}) center top no-repeat;"></div>
            <div class="fabu_guide_text guide_font">选择类目，描述你的服务</div>
        </div>
        <div id="step2" class="am-u-lg-4 am-u-md-4 am-u-sm-4">
            <div id="step2-1" class="fabu_guide_y guide_line" style="background: #999;"></div>
            <div id="step2-2" class="fabu_guide_sign guide_pic" style="background: url('/images/fabu_q.png') center top no-repeat;"></div>
            <div class="fabu_guide_text guide_font">确认服务</div>
        </div>
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
            <div class="fabu_guide_y guide_line" style="background: #999;"></div>
            <div class="fabu_guide_sign guide_pic" style="background: url('/images/fabu_q.png') center top no-repeat;"></div>
            <div class="fabu_guide_text guide_font">发布服务</div>
        </div>
    </div>
    <div class="am-container" style="padding: 60px;" id="publish_step1">
        <div class="fabu_step1 am-g am-g-fixed">
            <div class="am-u-lg-12 am-g-u-md-12 am-u-sm-12">
                <div class="fabu1" style="background:#eee;">
                    <div class="fabu_showtitle title_tip_first">请选择你的服务领域:</div>
                    <button id='select_class1' data-content="" class="am-btn am-btn-warning am-radius " style="display:none;margin-bottom: 0.5rem">btn1</button>
                    <button id='select_class2' data-content="" class="am-btn am-btn-warning am-radius " style="display:none;margin-bottom: 0.5rem">btn2</button>
                    <button id='select_class3' data-content="" class="am-btn am-btn-warning am-radius " style="display:none;margin-bottom: 0.5rem">btn3</button>
                    <div class="fb_container sub_title_tip">
                    <div class="am-g am-g-fixed">
                        @foreach($data['serviceclass1'] as $class1)
                            <div class="am-u-lg-1 am-u-md-1 am-u-sm-1 am-dropdown am-u-end" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>{{$class1->name}}</button>
                            <ul class="am-dropdown-content" data-content="{{$class1->id}}" data-name="{{$class1->name}}">
                                @foreach($data['serviceclass2'] as $class2)
                                    @if($class2->class1_id == $class1->id)
                                        <li class="am-danger"><a onclick="select_class(this);" name="service_class2" data-content="{{$class2->id}}">{{$class2->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                    <div class="fabu_showtitle title_tip_first" id="project_label" style="display: none;">请选择你的服务项目:</div>
                    @foreach($data['serviceclass2'] as $class2)
                        <div style="display: none;" id="project_{{$class2->id}}" name="project_id">
                            <select data-am-selected="{btnWidth: '10%', btnSize: 'sm', btnStyle: 'secondary'}" name="project">
                                <option value="-1">任意</option>
                                @foreach($data['serviceclass3'] as $class3)
                                    @if($class3->class2_id == $class2->id)
                                        <option value="{{$class3->id}}">{{$class3->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                <div class="fabu1" style="background:#eee;margin-bottom:10px;">
                    <div class="fabu_showtitle title_tip">请确认你的联系方式</div>
                    <div class="fb_container sub_title_tip">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">电子邮件</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="email" id="email" class="am-form-field" placeholder="输入你的电子邮件" value="{{$data['userinfo']->mail}}">
                                <span id="email_warning" class="am-icon-warning" style="display: none;color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="fb_container sub_title_tip">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">电话号码</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="tel" id="phone" class="am-form-field" placeholder="输入你的电话号码" value="{{$data['userinfo']->tel}}">
                                <span id="tel_warning" class="am-icon-warning" style="display: none; color: red;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fabu1" style="background:#eee;margin-bottom:10px;">
                    <div class="fabu_showtitle title_tip">请选择你的需求类型</div>
                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 20px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback" style="padding-bottom:20px;">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">服务类型</label>
                            <div class="am-u-sm-8" style="float: left;margin-left: 30px;">
                                <label class="am-checkbox-inline">
                                    <input type="radio" disabled name="service_type" value="0" data-am-ucheck @if($data['type'] === '0') checked @endif> 专业服务
                                </label>
                                <label class="am-checkbox-inline">
                                    <input type="radio" disabled name="service_type" value="1" data-am-ucheck @if($data['type'] === '1') checked @endif> 实习中介
                                </label>
                                <label class="am-checkbox-inline">
                                    <input type="radio" disabled  name="service_type" value="2" data-am-ucheck @if($data['type'] === '2') checked @endif> 专业问答
                                </label>
                            </div>
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                        <button  onclick="goto_next();" class="am-btn am-btn-danger am-round am-btn-lg" style="margin:20px;width: 15%;">下一步</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="am-container" style="padding: 60px; display: none" id="publish_step2">
        <div class="fabu_step1 am-g am-g-fixed">
            <div class="am-u-lg-12 am-g-u-md-12 am-u-sm-12">
                <div class="fabu1" style="background:#eee;margin-bottom: 10px;height:300px;">
                    <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">服务基本信息</div>
                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 20px;">
                        <p id="baseinfo_tel" class="am-form-label base_info">联系电话:<span>fdsfsdf</span></p>
                        <p id="baseinfo_email" class="am-form-label base_info">联系邮箱:<span>gfdgdfgfd</span></p>
                        <p id="baseinfo_type" class="am-form-label base_info">服务类型:<span>hfghfgh</span></p>
                        <p id="baseinfo_class" class="am-form-label base_info">服务类别:<span>rwerwe</span></p>
                    </div>
                </div>
                <div class="fabu1" style="background:#eee;">
                    <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">设置服务金额</div>
                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">赏金预算</label>
                            <div class="am-u-sm-4" style="float: left;margin-left: 30px;">
                                <label class="am-checkbox-inline">
                                    <input type="checkbox" id="is_NoPrice" onclick="setNonePrice(this);" value="价格面议" data-am-ucheck> 价格面议
                                </label>
                                <input type="text" id="service_price" class="am-form-field" placeholder="单次服务价格" style="float: left;">
                                <div style="display: grid;" id="price_type">
                                    <select data-am-selected="{btnWidth: '130%',btnStyle: 'warning'}" name="price_type">
                                        <option value="0">/小时</option>
                                        <option value="1">/天</option>
                                        <option value="2" selected>/次</option>
                                        <option value="3">/套</option>
                                        <option value="4">/其他</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fabu1" style="background:#eee;height: 650px;">
                    <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">服务信息填写</div>
                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">服务特色</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="service_title" id="doc-ipt-3-a" class="am-form-field" placeholder="好的标题更能吸引眼球哟">
                            </div>
                        </div>
                    </div>
                    <!--城市联动-->
                    <div class="fb_container" style="padding: 0px 3px;margin-left: 10px;margin-bottom: 2
						0px;">

                        <form class="am-form-group am-form-danger am-form-icon am-padding-sm">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;padding-left: 20px;margin-right: 1.2rem">你所在城市</label>
                            <select data-am-selected="{btnWidth: '20%', btnSize: 'sm', btnStyle: 'secondary', searchBox: 1}" id="select_city">
                                @foreach($data['province'] as $province)
                                <optgroup label="{{$province->name}}">
                                    @foreach($data['city'] as $city)
                                        @if($city->parent_id == $province->id)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;margin-top:20px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">展示网站</label>
                            <div class="am-u-sm-4" style="float: left;margin-left: 30px;">
                                <input type="text" id="home_page" class="am-form-field" placeholder="(选填)展示网站eg:www.xxxx.com">
                            </div>
                        </div>
                    </div>

                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">描述服务详情</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <textarea class="" rows="8" name="description" id="doc-ta-1" style="width: 100%;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 20px;margin-top: 9rem;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">上传服务照片</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="text" style="display: none" id="pic_info">
                                <img src="/images/add.png" style="width: 50px;height: 50px;" id="insert_img">
                            </div>
                            <div class="am-u-sm-6" id="preview-holder" style="float: left;margin-left: 15rem;margin-bottom: 1rem;margin-top: -5rem;">
                                {{--<img src="/images/add.png" style="width: 100px;height: 100px;">--}}
                                {{--<span class='delete' onclick='deleteImage(this)'>删除</span>--}}
                                {{--<img src="/images/add.png" style="width: 100px;height: 100px;">--}}
                                {{--<span class='delete' onclick='deleteImage(this)'>删除</span>--}}
                                {{--<img src="/images/add.png" style="width: 100px;height: 100px;" onclick="addimages();">--}}
                                {{--<span class='delete' onclick='deleteImage(this)'>删除</span>--}}
                            </div>

                        </div>
                    </div>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                    <label class="am-checkbox am-default" style="font-size: 16px;margin-left:20px;">
                        <input type="checkbox"  id="protocol" value="" data-am-ucheck><h2><a href="/bylh/protocols" target="_blank">同意《不亦乐乎》协议</a></h2>
                    </label>
                    <button id="back_step1" class="am-btn am-btn-danger am-round am-btn-lg" style="margin:0 20px 0 20px;width: 15%;">上一步</button>
                    <button id="submit_info" class="am-btn am-btn-success am-round am-btn-lg" style="margin:0 20px 0 20px;width: 15%;float: right;">已确认，下一步</button>
                </div>

            </div>
        </div>
    </div>
    @endif
@endsection
@section('custom-script')
    <script type="text/javascript">
//        $(function() {
//            document.addEventListener('touchmove', function (e) {
//                e.preventDefault();
//            }, false);
//        });
        $('#back_step1').click(function () {
            var step1 = $('#publish_step1');
            var step2 = $('#publish_step2');
            step2.hide();
            step1.show();
        });
        function setNonePrice() {
            if($("#is_NoPrice").is(':checked')){
                $('#service_price').hide();
                $('#price_type').hide();
            }else{
                $('#service_price').show();
                $('#price_type').show();

            }

        }
        function select_class(element) {
            var btn1 = $('#select_class1');
            var btn2 = $('#select_class2');
            var btn3 = $('#select_class3');
            var project_label = $('#project_label');
            var project_id = $('div[name=project_id]');
//            alert($(element).parent().parent().attr('data-content'));
            //show select data
            var class1_id = $(element).parent().parent().attr('data-content');
            var class1_name = $(element).parent().parent().attr('data-name');
            var class2_id = $(element).attr('data-content');
            var class2_name = $(element).html();
            btn3.html("任意");
            btn3.attr("data-content",-1);
            btn2.html(class2_name);
            btn2.attr('data-content',class2_id);
            btn1.attr('data-content',class1_id);
            btn1.html(class1_name);

            project_id.hide();
            $('#project_'+class2_id).css('display','inline');
            project_label.show();
            btn1.show();
            btn2.show();
            btn3.show();
        }
        $('select[name=project]').change(function () {
            var btn3 = $('#select_class3');
            var btn2 = $('#select_class2');

            var class2_id = btn2.attr('data-content');
            // alert(btn3.html());
//            alert($(this).val());
            //获取class2id 对应的select
            var project = $("#project_"+class2_id).find("select option:selected");
            // alert(project.html());
            btn3.html(project.html());
            btn3.attr('data-content',project.val());
        });
        function goto_next() {
            var tel = $('#phone');
            var email = $('#email');
            var btn1 = $('#select_class1');
            var btn2 = $('#select_class2');
            var btn3 = $('#select_class3');
            var type = $('input:radio[name="service_type"]:checked').val();
            var step1 = $('#publish_step1');
            var step2 = $('#publish_step2');
            var guide_color = $('#step2-1');
            var guide_pic = $('#step2-2');

            if(btn1.attr('data-content') === "" ||btn2.attr('data-content') === ""){
                swal('',"请选择服务领域","error");
                return;
            }
            if(email.val() === ""){
                swal('',"邮箱不能为空","error");
                return;
            }else if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email.val())) {
                swal("", "邮箱格式不正确", "error");
                return;
            }
            if(tel.val() === ""){
                swal("","电话不能为空", "error");
                return;
            }else if(!/^1[34578]\d{9}$/.test(tel.val())){
                swal("","手机号格式不正确", "error");
                return;
            }
            //打开下一步
            var baseinfo_tel = $('#baseinfo_tel');
            var baseinfo_email = $('#baseinfo_email');
            var baseinfo_type = $('#baseinfo_type');
            var baseinfo_class = $('#baseinfo_class');
            var base_type;
            if(type === '0') base_type = "专业服务";
            if(type === '1') base_type = "实习中介";
            if(type === '2') base_type = "专业问答";
            baseinfo_tel.find("span").html(tel.val());
            baseinfo_email.find("span").html(email.val());
            baseinfo_type.find("span").html(base_type);
            baseinfo_class.find("span").html(btn1.html()+"-"+btn2.html()+"-"+btn3.html());

            //
            guide_color.attr('style','');
            guide_pic.css("background-image","url(/images/fabu_y.png)");
            step1.hide();
            step2.show();
        }
        var index = 1;
        var previewHolder = $("#preview-holder");
        var appendFileInput = true;
        $('#insert_img').click(function (event) {
//            var pictureIndex = $("input[id='pic_info']");
            var pictureIndex = $("input[id='pic_info']");
            num = pictureIndex.val().split("@");
//            alert(num.length);
            if(!appendFileInput){
                swal('',"任有图片待上传","error");
                return;
            }
            if (appendFileInput && num.length <= 3) {
                previewHolder.append("<input type='file' name='pic" + index + "' style='display: none' onchange='showPreview(this, index)'/>");
                $("input[name='pic" + index + "']").click();
            }else{
                swal('',"最多上传三张图片","error");
                return;
            }

        });
        function showPreview(element, i) {
            var isCorrect = true;
            appendFileInput = false;
            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var picture = $("input[name='pic" + i + "']");
            var imagePath = picture.val();

            if (!/.(jpg|jpeg|png|JPG|JPEG|PNG)$/.test(imagePath)) {
                isCorrect = false;
                picture.val("");
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片格式错误，支持：.jpg .jpeg .png类型。请选择正确格式的图片后再试！",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
                appendFileInput = true;
                picture.remove();
            } else if (file.size > 5 * 1024 * 1024) {
                isCorrect = false;
                picture.val("");
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片文件最大支持：5MB",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
                appendFileInput = true;
                picture.remove();
            } else {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var data = e.target.result;
                    //加载图片获取图片真实宽度和高度
                    var image = new Image();
                    image.onload = function () {
                        var width = image.width;
                        var height = image.height;
                        console.log(width + "//" + height);

                        if (width > 1500 || height > 1500) {
                            isCorrect = false;
                            picture.val("");
                            swal({
                                title: "错误",
                                type: "error",
                                text: "当前选择图片分辨率为: " + width + "px * " + height + "px \n图片分辨率应小于 1500像素 * 1500像素",
                                cancelButtonText: "关闭",
                                showCancelButton: true,
                                showConfirmButton: false
                            });
                            appendFileInput = true;
                            picture.remove();
                        } else if (isCorrect) {
                            previewHolder.append("<img src='" + objectUrl + "' class='preview_img' name='pic"+ i + "'>" +
                                    "<span class='delete' onclick='deleteImage(this, " + i + ")'>删除</span>");

                            insertImageCode(i);

                            index++;
                            appendFileInput = true;
                        }
                    };
                    image.src = data;
                };
                reader.readAsDataURL(file);
            }
        }

        function deleteImage(element, i) {
            swal({
                title: "确认",
                text: "确认删除图片吗",
                type: "info",
                confirmButtonText: "确认",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: false
            }, function () {
                swal("图片已删除");

                var pictureIndex = $("input[id='pic_info']");

                pictureIndex.val(pictureIndex.val().replace("@" + i, ""));


                $("input[name='pic" + i + "']").remove();
                $("img[name='pic" + i + "']").remove();
                element.remove();
//                alert( pictureIndex.val());
            });
        }

        function insertImageCode(i) {
            var pictureIndex = $("input[id='pic_info']");

            pictureIndex.val(pictureIndex.val() + i + "@");
//            alert( pictureIndex.val());
        }

/**
 * 提交service所有信息到服务器端
 */
        $('#submit_info').click(function () {
            var city = $('#select_city'); //城市
            var tel = $('#phone'); //电话号码
            var email = $('#email');//邮箱
            var btn1 = $('#select_class1');//class1  btn1.attr('data-content')
            var btn2 = $('#select_class2');//class2  btn2.attr('data-content')
            var btn3 = $('#select_class3');//class2  btn2.attr('data-content')
            var type = $('input:radio[name="service_type"]:checked').val(); //服务类型
            var price = $('#service_price');
            var price_type = $('select[name=price_type]');
            var home_page = $('#home_page');
            var title = $('#doc-ipt-3-a');
            var pictureIndex = $("input[id='pic_info']");//图片index

            var description_raw = $("textarea[name='description']");
            var description = description_raw.val().replace(/\r\n/g, '</br>');
            description = description.replace(/\n/g, '</br>');

            if(!$('#protocol').is(':checked')){
                swal("","请先勾选不亦乐乎协议","error");
                return;
            }
            var formdata = new FormData();
            //设置price
            if($("#is_NoPrice").is(':checked')){
                formdata.append('price',-1);
            }else{
                if(price.val() ==="" || price.val() ===null){
                    swal("","请设置服务价格","error");
                    return;
                }
                if(!/^[0-9]*(\.[0-9]{1,2})?$/.test(price.val())){
                    swal("","请输入正确的价格！","error");
                    return;
                }else{
                    formdata.append('price',price.val());
                    formdata.append('price_type',price_type.val());
                }
            }
            if(title.val() ==="" ||title.val() ===null){
                swal("","请设置服务标题","error");
                return;
            }
            if(title.val().length > 50){
                swal("","服务标题长度不能大于50个字符","error");
                return;
            } else
                formdata.append('title',title.val());
            if(description ===""){
                swal("","请认真填写服务描述","error");
                return;
            }
            if(description.length > 1000){
                swal("","服务描述长度不能大于1000个字符","error");
                return;
            } else
                formdata.append('describe',description);
            //上传图片
            formdata.append("pictures", pictureIndex.val());
//            alert(pictureIndex.val());

            var pictureIndexArray = pictureIndex.val().split('@');
            console.log(pictureIndexArray);
            if (pictureIndexArray[0] !== "") {
                for (var i in pictureIndexArray) {
                    if(pictureIndexArray[i + ''] === "")
                        break;
                    var index = 'pic' + pictureIndexArray[i + ''];
                    console.log(index);
                    formdata.append(index, $("input[name='" + index + "']").prop("files")[0]);
                }
            }
            formdata.append('city',city.val());
            formdata.append('tel',tel.val());
            formdata.append('email',email.val());
            formdata.append('class1',btn1.attr('data-content'));
            formdata.append('class2',btn2.attr('data-content'));
            formdata.append('class3',btn3.attr('data-content'));
            formdata.append('type',type);
            formdata.append('home_page',home_page.val());
            //设置上传接口url
            var url = "/service/genlpublish";
            if(type == 1)
                url = "/service/finlpublish";
            if(type == 2)
                url = "/service/qapublish";
            $.ajax({
                url: url,
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.status === 200) {
                        swal("",result.msg,"success");
                        setTimeout(function () {
                            self.location = '/account/';
                        }, 1200);
                    }else{
                        swal("",result.msg,"error");
                        return;
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            })

        });


    </script>
@endsection