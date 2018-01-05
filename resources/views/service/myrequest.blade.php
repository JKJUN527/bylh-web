@extends('demo.admin2')
@section('content')
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-orderinfo">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我发布的服务</strong> / <small>My&nbsp;services</small></div>
                </div>
                <hr/>
            </div>
            <div class="am-g am-g-fixed">
                <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
                    <ul>
                        <li style="border-bottom: 1px dotted #999;padding: 4px;">
                            <div class="am-container">
                                <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                    <img src="../images/f2.jpg" class="itemImage">
                                </div>
                                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                    <p>web网站开发</p>
                                </div>
                                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                    <p>价格：￥<span class="money">10000</span><br>
                                        浏览次数：<span class="people">4</span>次</p>
                                </div>
                                <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
                                <button type="button" class="am-btn am-btn-success">查看详情</button>
                                <button type="button" class="am-btn am-btn-danger">暂停服务</button>
                            </div>
                </div>
                </li>
                <li style="border-bottom: 1px dotted #999;padding: 4px;">
                    <div class="am-container">
                        <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                            <img src="../images/f2.jpg" class="itemImage">
                        </div>
                        <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                            <p>web网站开发</p>
                        </div>
                        <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                            <p>价格：￥<span class="money">10000</span><br>
                                浏览次数：<span class="people">4</span>次</p>
                        </div>
                        <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
                        <button type="button" class="am-btn am-btn-success">查看详情</button>
                        <button type="button" class="am-btn am-btn-danger">暂停服务</button>
                    </div>
            </div>
            </li>
            <li style="border-bottom: 1px dotted #999;padding: 4px;">
                <div class="am-container">
                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                        <img src="../images/f2.jpg" class="itemImage">
                    </div>
                    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                        <p>web网站开发</p>
                    </div>
                    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                        <p>价格：￥<span class="money">10000</span><br>
                            浏览次数：<span class="people">4</span>次</p>
                    </div>
                    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
                    <button type="button" class="am-btn am-btn-success">查看详情</button>
                    <button type="button" class="am-btn am-btn-danger">暂停服务</button>
                </div>
        </div>
        </li>
        <li style="border-bottom: 1px dotted #999;padding: 4px;">
            <div class="am-container">
                <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                    <img src="../images/f2.jpg" class="itemImage">
                </div>
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                    <p>web网站开发</p>
                </div>
                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                    <p>价格：￥<span class="money">10000</span><br>
                        浏览次数：<span class="people">4</span>次</p>
                </div>
                <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
                <button type="button" class="am-btn am-btn-success">查看详情</button>
                <button type="button" class="am-btn am-btn-danger">暂停服务</button>
            </div>
    </div>
    </li>
    </ul>
</div>
</div>
</div>
<!--底部-->
@section('footer')
<div class="footer ">
    <div class="footer-hd ">
    </div>
    <div class="footer-bd ">
        <p style="text-align: center;">
            ©2017-2018 bylh.com 成备xxxxxxxx号<br>
            不亦乐乎（成都）有限公司<br>
            客服：xxxx-xxx-xxx
        </p>
    </div>
</div>
@endsection
@endsection
