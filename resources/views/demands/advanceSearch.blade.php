@extends('demo.admin')
@section('title', '需求大厅')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/navstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('js/jquery-1.4.3.min.js')}}" rel="stylesheet" type="text/css"></script>
@endsection
@section('content')
<div class="am-g am-g-fixed smallnav">
    <div class="am-u-sm-3">
        <a href="{{asset('demands/demandPublishIndex')}}"><img src="{{asset('images/navsmall.jpg')}}" />
            <div class="title">发布需求</div>
        </a>
    </div>
    <div class="am-u-sm-3">
        <a href="{{asset('services/genlpublish')}}"><img src="{{asset('images/huismall.jpg')}}" />
            <div class="title">发布服务</div>
        </a>
    </div>
    <div class="am-u-sm-3">
        <a href="{{asset('home')}}"><img src="{{asset('images/mansmall.jpg')}}" />
            <div class="title">个人中心</div>
        </a>
    </div>
    <div class="am-u-sm-3">
        <a href="#"><img src="{{asset('images/moneysmall.jpg')}}" />
            <div class="title">关于我们</div>
        </a>
    </div>
</div>
<!--分类高级搜索-->
<div class="selectNumberScreen">
    <div class="am-g am-g-fixed form-group search-position">
        <div class="am-u-lg-6 am-u-md-6 form-line" style="padding-left: 100px;">
            <input type="text" id="name" name="name" class="form-control" value="" placeholder="输入需求类别／描述进行搜索" style="width: 250px;padding: 6px;border: 2px solid #b84554;">
            <a href="#"><i class="am-icon-search am-icon-fw"></i></a>
        </div>
        <p class="am-u-lg-6 am-u-md-6 sort-position">
            <span style="padding: 6px;font-weight: bold;font-size: 15px;"><b>排序</b>：</span>
            <a href="#"><span class="sort-item" style="padding: 6px;">热度</span></a>
            <a href="#"><span class="sort-item" style="padding: 6px;">价格</span></a>
            <a href="#"><span class="sort-item" style="padding: 6px;">发布时间</span></a>

        </p>
    </div>

    <div id="selectList" class="screenBox screenBackground" >

        <dl class="listIndex" attr="terminal_brand_s">
            <dt>分类：</dt>
            <dd>
                <a href="javascript:void(0)" values2="" values1="" attrval="全部">全部</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="体育">体育</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="艺术">艺术</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="家教">家教</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="科技">科技</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="健康">健康</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="财经">财经</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="文化">文化</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="兴趣">兴趣</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="事务">事务</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="金融">金融</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="问答">问答</a>
            </dd>
        </dl>

        <dl class="listIndex" attr="价格范围">
            <dt>价格范围：</dt>
            <dd>
                <a href="javascript:void(0)" values2="" values1="" attrval="不限">不限</a>
                <a href="javascript:void(0)" values2="499" values1="1" attrval="1-499">1-499</a>
                <a href="javascript:void(0)" values2="999" values1="500" attrval="500-999">500-999</a>
                <a href="javascript:void(0)" values2="1999" values1="1000" attrval="1000-1999">1000-1999</a>
                <a href="javascript:void(0)" values2="2999" values1="2000" attrval="2000-2999">2000-2999</a>
                <a href="javascript:void(0)" values2="4999" values1="3000" attrval="3000-4999">3000-4999</a>
                <a href="javascript:void(0)" values2="9999" values1="5000" attrval="5000-9999">5000-9999</a>
                <a href="javascript:void(0)" values2="0" values1="10000" attrval="10000以上">10000以上</a>
            </dd>
        </dl>

        <dl class=" listIndex" attr="terminal_os_s">
            <dt>地区：</dt>
            <dd>
                <a href="javascript:void(0)" values2="" values1="" attrval="不限">不限</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="北京">北京</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="上海">上海</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="广州">广州</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="深圳">深圳</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="杭州">杭州</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="成都">成都</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="重庆">重庆</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="武汉">武汉</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="西安">西安</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="宁波">宁波</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="合肥">合肥</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="天津">天津</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="常州">常州</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="厦门">厦门</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="南京">南京</a>
                <a href="javascript:void(0)" values2="" values1="" attrval="苏州">苏州</a>
            </dd>
        </dl>


    </div>

    <div class="hasBeenSelected">
        <dl>
            <dt>您已选择：</dt>
            <dd style="display:none" class="clearDd">
                <div class="clearList"></div>
                <div style="display:none;" class="eliminateCriteria">清除筛选条件</div>
            </dd>
        </dl>
    </div>

</div>

<script type="text/javascript">
    var dlNum  =$("#selectList").find("dl");
    for (i = 0; i < dlNum.length; i++) {
        $(".hasBeenSelected .clearList").append("<div class=\"selectedInfor selectedShow\" style=\"display:none\"><span></span><label></label><em></em></div>");
    }

    var refresh = "true";

    $(".listIndex").on("click",'a',function(){
        var text =$(this).text();
        var selectedShow = $(".selectedShow");
        var textTypeIndex =$(this).parents("dl").index();
        var textType =$(this).parent("dd").siblings("dt").text();
        index = textTypeIndex -(2);
        $(".clearDd").show();
        $(".selectedShow").eq(index).show();
        $(this).addClass("selected").siblings().removeClass("selected");
        selectedShow.eq(index).find("span").text(textType);
        selectedShow.eq(index).find("label").text(text);
        var show = $(".selectedShow").length - $(".selectedShow:hidden").length;
        if (show > 1) {
            $(".eliminateCriteria").show();
        }

    });
    $(".selectedShow").on("click",'em',function(){
        $(this).parents(".selectedShow").hide();
        var textTypeIndex =$(this).parents(".selectedShow").index();
        index = textTypeIndex;
        $(".listIndex").eq(index).find("a").removeClass("selected");

        if($(".listIndex .selected").length < 2){
            $(".eliminateCriteria").hide();
        }
    });

    $(".eliminateCriteria").on("click",function(){
        $(".selectedShow").hide();
        $(this).hide();
        $(".listIndex a ").removeClass("selected");
    });
</script>
<!--需求展示-->
<div class="shopMain" id="shopmain" style="background:white;">
    <div class="am-container " >
        <div class="shopTitle ">
            <h4 class="floor-title"><span class="am-badge am-badge-warning am-round">1</span>&nbsp;&nbsp;设计需求</h4>
            <div class="today-brands " style="right:0px ;top:13px;">
                <a href="# ">商标/VI设计</a>|
                <a href="# ">包装设计</a>|
                <a href="# ">封面设计</a>|
                <a href="# ">海报设计</a>|
                <a href="# ">宣传品设计</a>|
                <a href="# ">服装设计</a>
                <span class="am-badge am-badge-warning am-round">More</span>
            </div>

        </div>
    </div>
    <div class="am-g am-g-fixed">
        <div class="am-u-lg-8 am-u-md-8" style="padding: 10px;float: left;">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="不要太担心 只因为我相信"/>
                            <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="终会走过这条遥远的道路"/>
                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
            </ul>
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="不要太担心 只因为我相信"/>
                            <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="images/f1.jpg" class="">
                            <img src="images/f1.jpg"  alt="终会走过这条遥远的道路"/>
                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="am-u-lg-4 am-u-md-4" style="padding: 10px;">
            <ul>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥50</font>&nbsp;&nbsp;&nbsp;&nbsp;宝贝起名</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥1500</font>&nbsp;&nbsp;&nbsp;&nbsp;昆利达logo及名片设计</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥2000</font>&nbsp;&nbsp;&nbsp;&nbsp;业态装修布局图</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥300</font>&nbsp;&nbsp;&nbsp;&nbsp;java程序bug调试</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥70</font>&nbsp;&nbsp;&nbsp;&nbsp;帮助排队取号</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥30</font>&nbsp;&nbsp;&nbsp;&nbsp;测星座，测运势，塔罗牌占卜</a><span style="color: gray;float: right;">查看详情</span></li>
            </ul>
            <ul>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥1000</font>&nbsp;&nbsp;&nbsp;&nbsp;室内装修设计</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥10000</font>&nbsp;&nbsp;&nbsp;&nbsp;web网页设计</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥4000</font>&nbsp;&nbsp;&nbsp;&nbsp;本科毕业论文编写</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥50</font>&nbsp;&nbsp;&nbsp;&nbsp;电脑装系统</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥90</font>&nbsp;&nbsp;&nbsp;&nbsp;照片转漫画</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥150</font>&nbsp;&nbsp;&nbsp;&nbsp;专业心理咨询</a><span style="color: gray;float: right;">查看详情</span></li>
            </ul>
            <ul>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥1000</font>&nbsp;&nbsp;&nbsp;&nbsp;室内装修设计</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥10000</font>&nbsp;&nbsp;&nbsp;&nbsp;web网页设计</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥4000</font>&nbsp;&nbsp;&nbsp;&nbsp;本科毕业论文编写</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥50</font>&nbsp;&nbsp;&nbsp;&nbsp;电脑装系统</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥90</font>&nbsp;&nbsp;&nbsp;&nbsp;照片转漫画</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥150</font>&nbsp;&nbsp;&nbsp;&nbsp;专业心理咨询</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥50</font>&nbsp;&nbsp;&nbsp;&nbsp;电脑装系统</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥90</font>&nbsp;&nbsp;&nbsp;&nbsp;照片转漫画</a><span style="color: gray;float: right;">查看详情</span></li>
                <li><a href="#"><font color="#b84554" style="font-size: 18px;">￥150</font>&nbsp;&nbsp;&nbsp;&nbsp;专业心理咨询</a><span style="color: gray;float: right;">查看详情</span></li>
            </ul>
        </div>
    </div>
    <!--分页-->
    <ul class="am-pagination am-pagination-centered">
        <li class="am-disabled"><a href="#">&laquo;</a></li>
        <li class="am-active am-warning"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</div>
<!--广告-->
<div class="advertisement" style="padding: 10px;width: 50%;float: left;">
    <img src="{{asset('images/ad4.png')}}">
</div>
<div class="advertisement" style="padding: 10px;width: 50%;float: right;">
    <img src="{{asset('images/ad5.png')}}">
</div>
<script type="text/javascript">
    (function() {
        $('.am-slider').flexslider();
    });
    $(document).ready(function() {
        $("li").hover(function() {
            $(".category-content .category-list li.first .menu-in").css("display", "none");
            $(".category-content .category-list li.first").removeClass("hover");
            $(this).addClass("hover");
            $(this).children("div.menu-in").css("display", "block")
        }, function() {
            $(this).removeClass("hover")
            $(this).children("div.menu-in").css("display", "none")
        });
    })
</script>
<script>
    window.jQuery || document.write('<script src="{{asset('basic/js/jquery.min.js')}} "><\/script>');
</script>
<script type="text/javascript " src="{{asset('basic/js/quick_links.js')}} "></script>
@endsection

