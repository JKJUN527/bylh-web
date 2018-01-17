@extends('demo.admin')
@section('title','发布服务')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
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
    </style>
@endsection
@section('content')
    <!--发布服务-->
    <div class="am-g am-g-fixed" style="padding-top: 45px;">
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
            <div class="fabu_guide_y guide_line guide_line"></div>
            <div class="fabu_guide_sign guide_pic" style="background: url({{asset('images/fabu_y.png')}}) center top no-repeat;"></div>
            <div class="fabu_guide_text guide_font">选择类目，描述你的服务</div>
        </div>
        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
            <div class="fabu_guide_y guide_line" style="background: #999;"></div>
            <div class="fabu_guide_sign guide_pic" style="background: url('/images/fabu_q.png') center top no-repeat;"></div>
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
                    <div class="fb_container sub_title_tip">
                    <div class="am-g am-g-fixed">
                        @foreach($data['serviceclass1'] as $class1)
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
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
                <div class="fabu1" style="background:#eee;margin-bottom:10px;">
                    <div class="fabu_showtitle title_tip">请确认你的联系方式</div>
                    <div class="fb_container sub_title_tip">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">电子邮件</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="email" id="email" class="am-form-field" placeholder="输入你的电子邮件">
                                <span id="email_warning" class="am-icon-warning" style="display: none;color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="fb_container sub_title_tip">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">电话号码</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="tel" id="phone" class="am-form-field" placeholder="输入你的电话号码">
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
                                    <input type="radio"  name="service_type" value="0" data-am-ucheck checked> 一般服务
                                </label>
                                <label class="am-checkbox-inline">
                                    <input type="radio"  name="service_type" value="1" data-am-ucheck> 实习中介
                                </label>
                                <label class="am-checkbox-inline">
                                    <input type="radio"  name="service_type" value="2" data-am-ucheck> 专业问答
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
                <div class="fabu1" style="background:#eee;margin-bottom:10px;">
                    <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">设置服务金额</div>
                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">赏金预算：</label>
                            <div class="am-u-sm-4" style="float: left;margin-left: 30px;">
                                <label class="am-checkbox-inline">
                                    <input type="checkbox"  value="价格面议" data-am-ucheck> 价格面议
                                </label>
                                <input type="text" id="service_price" class="am-form-field" placeholder="单次服务价格" style="float: left;">
                            </div>
                        </div>
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
                </div>
                <div class="fabu1" style="background:#eee;height: 600px;">
                    <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">服务信息填写</div>
                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">服务标题</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="service_title" id="doc-ipt-3-a" class="am-form-field" placeholder="好的标题更能吸引眼球哟">
                            </div>
                        </div>
                    </div>
                    <!--城市联动-->
                    <div class="fb_container" style="padding: 0px 3px;margin-left: 10px;margin-bottom: 2
						0px;">

                        <form class="am-form-group am-form-danger am-form-icon am-padding-sm">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;padding-left: 20px;
">你所在城市</label>
                            <div class="am-form-group am-input-group" id="address3" style="padding-left: 20px;
">
							<span class="am-input-group-label">
							    <i class="am-icon am-icon-home" style="padding-left: 20px;"></i>
                                <span class="am-padding-horizontal-xs">省市</span>
							</span>
                                <input readonly type="text" name="nickname" class="am-form-field am-radius" placeholder="请选择地址" required="" value="" style="width: 50%;">
                            </div>
                        </form>
                    </div>

                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">描述需求</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <textarea class="" rows="8" id="doc-ta-1" style="width: 100%;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;margin-top: 100px;">
                        <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                            <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">上传服务照片</label>
                            <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                                <input type="file" class="am-btn am-btn-default am-btn-sm">
                                <img src="/images/add.png" style="width: 100px;height: 100px;">
                                <img src="/images/add.png" style="width: 100px;height: 100px;">
                                <img src="/images/add.png" style="width: 100px;height: 100px;" onclick="addimages();">
                            </div>

                        </div>
                    </div>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                    <label class="am-checkbox am-default" style="font-size: 16px;margin-left:20px;">
                        <input type="checkbox"  value="" data-am-ucheck><h2 data-am-modal="{target: '#my-popup'}">同意《不亦乐乎》协议</h2>
                    </label>
                    <button class="am-btn am-btn-danger am-round am-btn-lg" style="margin:20px;width: 15%;">上一步</button>
                    <button class="am-btn am-btn-success am-round am-btn-lg" style="margin:20px;width: 15%;float: right;">已确认，下一步</button>
                </div>

            </div>
        </div>
    </div>
    <div class="am-popup" id="my-popup">
        <div class="am-popup-inner">
            <div class="am-popup-hd">
                <h4 class="am-popup-title">《不亦乐乎》协议</h4>
                <span data-am-modal-close class="am-close">&times;</span>
            </div>
            <div class="am-popup-bd">
                this is the protocol!
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="dist/iscroll.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="dist/address.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(function() {
            document.addEventListener('touchmove', function (e) {
                e.preventDefault();
            }, false);

            //	配置级联层数
            $("#address3").address({
                prov: "广东省",
                city: "中山市",
                scrollToCenter: true,
                selectNumber: 2,
            });

        });
        function select_class(element) {
            var btn1 = $('#select_class1')
            var btn2 = $('#select_class2')
//            alert($(element).parent().parent().attr('data-content'));
            //show select data
            btn2.html($(element).html());
            btn2.attr('data-content',$(element).attr('data-content'));
            btn1.attr('data-content',$(element).parent().parent().attr('data-content'));
            btn1.html($(element).parent().parent().attr('data-name'));
            btn1.show();
            btn2.show();
        }
        function goto_next() {
            var tel = $('#phone');
            var email = $('#email');
            var btn1 = $('#select_class1');
            var btn2 = $('#select_class2');
            var type = $('input:radio[name="service_type"]:checked').val();
            var step1 = $('#publish_step1');
            var step2 = $('#publish_step2');

            {{--if(btn1.attr('data-content') === "" ||btn2.attr('data-content') === ""){--}}
                {{--swal('',"请选择服务领域","error");--}}
                {{--return;--}}
            {{--}--}}
            {{--if(email.val() === ""){--}}
                {{--swal('',"邮箱不能为空","error");--}}
                {{--return;--}}
            {{--}else if(!/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/.test(email.val())) {--}}
                {{--swal("", "邮箱格式不正确", "error");--}}
                {{--return;--}}
            {{--}--}}
            {{--if(tel.val() === ""){--}}
                {{--swal("","电话不能为空", "error");--}}
                {{--return;--}}
            {{--}else if(!/^1[34578]\d{9}$/.test(tel.val())){--}}
                {{--swal("","手机号格式不正确", "error");--}}
                {{--return;--}}
            {{--}--}}
            {{--//打开下一步--}}
            {{--var baseinfo_tel = $('#baseinfo_tel');--}}
            {{--var baseinfo_email = $('#baseinfo_email');--}}
            {{--var baseinfo_type = $('#baseinfo_type');--}}
            {{--var baseinfo_class = $('#baseinfo_class');--}}
            {{--var base_type;--}}
            {{--if(type === '0') base_type = "一般服务";--}}
            {{--if(type === '1') base_type = "实习中介";--}}
            {{--if(type === '2') base_type = "专业问答";--}}
            {{--baseinfo_tel.find("span").html(tel.val());--}}
            {{--baseinfo_email.find("span").html(email.val());--}}
            {{--baseinfo_type.find("span").html(base_type);--}}
            {{--baseinfo_class.find("span").html(btn1.html()+"-"+btn2.html());--}}
            step1.hide();
            step2.show();
        }

    </script>
@endsection