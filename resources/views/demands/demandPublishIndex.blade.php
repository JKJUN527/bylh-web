@extends('demo.admin')
@section('title', '发布需求')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('bootstrap-4.0.0-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
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
        <div class="fabu_guide_sign" style="background: url({{asset('images/fabu_y.jpg')}}) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;padding-top: 40px;text-align: center;">选择类目，描述你的需求</div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #999;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url({{asset('images/fabu_q.jpg')}}) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;text-align:center;padding-top: 40px;">确认需求</div>
    </div>
    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4">
        <div class="fabu_guide_y" style="height: 3px;background: #999;position: absolute;top: 17px;left: 0;z-index: 9;width: 100%"></div>
        <div class="fabu_guide_sign" style="background: url({{asset('images/fabu_q.jpg')}}) center top no-repeat;height: 35px;width: 35px;position: absolute;left: 146px;top: 0;z-index: 999;"></div>
        <div class="fabu_guide_text" style="font-size: 16px;color: #555;text-align:center;padding-top: 40px;">发布需求</div>
    </div>
</div>
<div class="am-container" style="padding: 60px;">
    <div class="fabu_step1 am-g am-g-fixed">
        <div class="am-u-lg-12 am-g-u-md-12 am-u-sm-12">
            <div class="fabu1" style="background:#eee;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">请选择你需要做什么</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 30px;padding-bottom: 30px;margin-bottom: 20px;">
                    <div class="am-g am-g-fixed">
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2 am-dropdown" data-am-dropdown>
                            <button class="am-btn am-btn-danger am-dropdown-toggle" data-am-dropdown-toggle>体育</button>
                            <ul class="am-dropdown-content">
                                <li class="am-danger"><a href="#">运动</a></li>
                                <li class="am-danger"><a href="#">健身</a></li>
                                <li class="am-danger"><a href="#">棋牌</a> </li>
                            </ul>
                        </div>
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
            <div class="fabu1" style="background:#eee;margin-bottom:10px;">
                <div class="fabu_showtitle" style="height: 25px;line-height: 25px;font-size: 24px;color: #333;margin-bottom: 20px;margin-left: 10px;padding-top: 10px;">请选择你的需求类型</div>
                <div class="fb_container" style="padding: 16px 3px;margin-left: 10px;padding-bottom: 30px;margin-bottom: 20px;">
                    <div class="am-form-group am-form-danger am-form-icon am-form-feedback" style="padding-bottom:20px;">
                        
                    </div>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
                    <button class="am-btn am-btn-danger am-round am-btn-lg" style="margin:20px;width: 15%;">下一步</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
