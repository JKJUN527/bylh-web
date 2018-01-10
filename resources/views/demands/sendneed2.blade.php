@extends('demo.admin')
@section('title', '发布需求第二部')
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
    </style>
@endsection
@section('content')
<!--发布需求-->
<div class="am-g am-g-fixed" style="padding-top: 45px;">
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #df231b;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_y.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;padding-top: 40px;text-align: center;">选择类目，描述你的需求</div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #df231b;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_y.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;text-align:center;padding-top: 40px;">确认需求</div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #999;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_q.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;text-align:center;padding-top: 40px;">发布需求</div>
    </div>
</div>
<div class="am-container" style="padding: 60px;">
    <div class="fabu_step1 am-g am-g-fixed">
        <div class="am-u-lg-12 am-g-u-md-12 am-u-sm-12">
            <div class="fabu1" style="background:#eee;margin-bottom: 10px;height:300px;">
                    <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">联系方式</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 20px;">
                        <label for="doc-ipt-3-a" class="am-form-label" style="font-size: 16px;width:200px;text-align: left;">电话:&nbsp;&nbsp;<span>18581872812</span></label>
                        <br><br><br>
                        <label for="doc-ipt-3-a" class="am-form-label" style="font-size: 16px;width:200px;text-align: left;">邮箱:&nbsp;&nbsp;<span>18581872812@qq.com</span></label><br><br><br>
                        <label for="doc-ipt-3-a" class="am-form-label" style="font-size: 16px;width:200px;text-align: left;">需求类型:&nbsp;&nbsp;<span>一般服务需求</span></label><br><br><br>
                        <label for="doc-ipt-3-a" class="am-form-label" style="font-size: 16px;width:200px;text-align: left;">需求类别:&nbsp;&nbsp;<span>家教艺体</span></label>
                </div>
            </div>
            <div class="fabu1" style="background:#eee;margin-bottom:10px;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">选择交易模式，时间</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                    <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                        <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">赏金预算：</label>
                        <div class="am-u-sm-4" style="float: left;margin-left: 30px;">
                            <label class="am-radio-inline">
                                <input type="radio"  value="价格面议" data-am-ucheck> 价格面议
                            </label>
                            <label class="am-radio-inline" style="margin-left: 0px;">
                                <input type="radio"  value="我的报价" data-am-ucheck> 我的报价
                            </label>
                            <input type="burdge" id="doc-ipt-3-a" class="am-form-field" placeholder="" style="float: left;">
                        </div>
                    </div>
                </div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;margin-top:20px;">
                    <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                        <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">周期（天）</label>
                        <div class="am-u-sm-3" style="float: left;margin-left: 30px;">
                            <input type="telephonenumber" id="doc-ipt-3-a" class="am-form-field" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="fabu1" style="background:#eee;height: 600px;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">信息填写</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                    <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                        <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">需求标题</label>
                        <div class="am-u-sm-8" style="float: left;margin-left: 30px;">
                            <input type="title" id="doc-ipt-3-a" class="am-form-field">
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
							<i class="am-icon am-icon-home" style="padding-left: 20px;
"></i>
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
                        <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">添加附件</label>
                        <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                            <button type="button" class="am-btn am-btn-default am-btn-sm">
                                <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
                        </div>
                    </div>
                </div>
                <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                <label class="am-checkbox am-default" style="font-size: 16px;margin-left:20px;">
                    <input type="checkbox"  value="" data-am-ucheck><h2>同意《不亦乐乎》协议</h2>
                </label>
                <button class="am-btn am-btn-danger am-round am-btn-lg" style="margin:20px;width: 15%;">上一步</button>
                <button class="am-btn am-btn-success am-round am-btn-lg" style="margin:20px;width: 15%;float: right;">已确认，下一步</button>
            </div>

        </div>
    </div>
</div>
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
</script>
@endsection