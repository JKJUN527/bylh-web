@extends('demo.admin')
@extends('demo.nav')
@section('content')
<!--发布需求-->
<div class="am-g am-g-fixed" style="padding-top: 45px;">
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #df231b;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_y.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;padding-top: 40px;text-align: center;">选择类目，描述你的需求</div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #999;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_q.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
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
            <div class="fabu1" style="background:#eee;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">请选择你需要做什么</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 20px;">
                    <div class="am-btn-group am-btn-group-justify">
                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">LOGO设计</a>
                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">包装设计</a>
                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">策划设计</a>
                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">家教服务</a>


                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">营销推广</a>
                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">装修设计</a>
                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">网站开发</a>
                        <a class="am-btn am-btn-danger" role="button" style="margin-right: 10px;">起名</a>
                        <a class="" role="label" >查看更多 More>></a>
                    </div>
                </div>
            </div>
            <div class="fabu1" style="background:#eee;margin-bottom:10px;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">请确认你的联系方式</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                    <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                        <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">电子邮件</label>
                        <div class="am-u-sm-8" style="float: left;margin-left: 30px;">
                            <input type="email" id="doc-ipt-3-a" class="am-form-field" placeholder="输入你的电子邮件">
                            <span class="am-icon-warning"></span>
                        </div>
                    </div>
                </div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                    <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                        <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">电话号码</label>
                        <div class="am-u-sm-6" style="float: left;margin-left: 30px;">
                            <input type="telephonenumber" id="doc-ipt-3-a" class="am-form-field" placeholder="输入你的电话号码">
                            <span class="am-icon-warning"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fabu1" style="background:#eee;height: 650px;">
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
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                    <div class="am-form-group am-form-danger am-form-icon am-form-feedback">
                        <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">需求类型</label>
                        <div class="am-u-sm-8" style="float: left;margin-left: 30px;">
                            <label class="am-checkbox-inline">
                                <input type="checkbox"  value="" data-am-ucheck> 一般服务需求
                            </label>
                            <label class="am-checkbox-inline">
                                <input type="checkbox"  value="" data-am-ucheck> 金融需求
                            </label>
                            <label class="am-checkbox-inline">
                                <input type="checkbox"  value="" data-am-ucheck> 专业问答需求
                            </label>
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
                <button class="am-btn am-btn-danger am-round am-btn-lg" style="margin:20px;width: 15%;">下一步</button>
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
@section('footer')
<div class="footer " style="border: none;">
    <div class="footer-hd ">
    </div>
    <div class="footer-bd ">
        <br>
        <p style="text-align: center;">

            Copyright © 2017-2018  bylehu 版权所有  蜀ICP备17027037<br>
            客服电话：88888888<br>
            联系邮箱：不亦乐乎＠bylehu.com

        </p>
    </div>
</div>
    @endsection
@endsection