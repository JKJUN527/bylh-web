@extends('demo.admin')
@extends('demo.nav')
@section('content')
<!--发布服务-->
<div class="am-g am-g-fixed" style="padding-top: 45px;">
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #df231b;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_y.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;padding-top: 40px;text-align: center;">选择类目，描述你的服务</div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #df231b;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_y.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;text-align:center;padding-top: 40px;">确认服务</div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #999;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url(images/fabu_q.jpg) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;text-align:center;padding-top: 40px;">发布服务</div>
    </div>
</div>
<div class="am-container" style="padding: 60px;">
    <div class="fabu_step1 am-g am-g-fixed">
        <div class="am-u-lg-12 am-g-u-md-12 am-u-sm-12">
            <div class="fabu1" style="background:#eee;margin-bottom: 10px;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">联系方式</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 2
						0px;">
                    <label for="doc-ipt-3-a" class="am-u-sm-2 am-form-label" style="font-size: 16px;">18581872812</label>
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
            <div class="fabu1" style="background:#eee;height: 500px;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">您可能还需要</div>
                <div class="am-g am-g-fixed" style="padding-top: 20px;">
                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2" style="padding-left: 60px;">
                        <label class="am-radio am-danger" style="font-size: 16px;">
                            <input type="radio" name="radio3" value="" data-am-ucheck><h2>加急卡</h2>
                        </label>
                    </div>
                    <div class="am-u-lg-5 am-u-md-5 am-u-sm-5">
                        在首页项目加急处显示，同时也在悬赏大厅显示，持续24小时(使用时间不可叠加)。
                    </div>
                    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="float: left;padding: 5px;">
                        <span style="font-size: 24px;color: #b84554;">￥50/</span>张
                    </div>
                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2" style="float: left;">
                        <select data-am-selected>
                            <option value="a" selected>1</option>
                            <option value="b">2</option>
                            <option value="o">3</option>
                            <option value="m">4</option>
                            <option value="d" disabled>5</option>
                        </select>
                    </div>
                </div>
                <div class="am-g am-g-fixed" style="padding-top: 20px;">
                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2" style="padding-left: 60px;">
                        <label class="am-radio am-danger" style="font-size: 16px;">
                            <input type="radio" name="radio3" value="" data-am-ucheck><h2>置顶卡</h2>
                        </label>
                    </div>
                    <div class="am-u-lg-5 am-u-md-5 am-u-sm-5">
                        您已经成功发布的项目在悬赏大厅列表页面置顶保持24小时（使用时间不可叠加)。
                    </div>
                    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="float: left;padding: 5px;">
                        <span style="font-size: 24px;color: #b84554;">￥20/</span>张
                    </div>
                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2" style="float: left;">
                        <select data-am-selected>
                            <option value="a" selected>1</option>
                            <option value="b">2</option>
                            <option value="o">3</option>
                            <option value="m">4</option>
                            <option value="d" disabled>5</option>
                        </select>
                    </div>
                </div>
                <div class="am-g am-g-fixed" style="padding-top: 20px;">
                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2" style="padding-left: 60px;">
                        <label class="am-radio am-danger" style="font-size: 16px;">
                            <input type="radio" name="radio3" value="" data-am-ucheck><h2>排名提升卡</h2>
                        </label>
                    </div>
                    <div class="am-u-lg-5 am-u-md-5 am-u-sm-5">
                        使用该卡可以更新项目操作时间，让你的项目排名一次性提升到最前面。
                    </div>
                    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="float: left;padding: 5px;">
                        <span style="font-size: 24px;color: #b84554;">￥10/</span>张
                    </div>
                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2" style="float: left;">
                        <select data-am-selected>
                            <option value="a" selected>1</option>
                            <option value="b">2</option>
                            <option value="o">3</option>
                            <option value="m">4</option>
                            <option value="d" disabled>5</option>
                        </select>
                    </div>
                </div>
                <div class="account" style="float: right;padding: 10px;">
                    总计：<span style="font-size: 24px;color: #b84554">50</span>元
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
