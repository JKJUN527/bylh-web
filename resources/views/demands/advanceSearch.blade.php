@extends('demo.admin')
@section('title', '需求大厅')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/navstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        .listIndex dd {
            height: 35px !important;
        }

        .listIndex dd a {
            padding: 4px;
            margin: 4px;
        }

        .selected {
            background-color: #03A9F4;
            color: #ffffff !important;
        }

        .price-span {
            font-size: 18px;
            color: #b84554;
        }

    </style>
@endsection
@section('content')
    <div class="am-g am-g-fixed smallnav">
        <div class="am-u-sm-3">
            <a href="{{asset('demands/demandPublishIndex')}}"><img src="{{asset('images/navsmall.jpg')}}"/>
                <div class="title">发布需求</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="{{asset('services/genlpublish')}}"><img src="{{asset('images/huismall.jpg')}}"/>
                <div class="title">发布服务</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="{{asset('home')}}"><img src="{{asset('images/mansmall.jpg')}}"/>
                <div class="title">个人中心</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="#"><img src="{{asset('images/moneysmall.jpg')}}"/>
                <div class="title">关于我们</div>
            </a>
        </div>
    </div>
    <!--分类高级搜索-->
    <div class="selectNumberScreen">
        <form method="get" id="search-form">
            <input type="hidden" name="class1">
            <input type="hidden" name="class2">
            <input type="hidden" name="class3">
            <input type="hidden" name="price">
            <input type="hidden" name="region">
            <input type="hidden" name="keyword">
        </form>

        <div class="am-g am-g-fixed form-group search-position">
            <div class="am-u-lg-6 am-u-md-6 form-line" style="padding-left: 100px;">
                <input type="text" id="name" name="name" class="form-control"
                       value="@if(isset($data['condition']['keyword'])){{$data['condition']['keyword']}}@endif" placeholder="输入需求类别／描述进行搜索"
                       style="width: 250px;padding: 6px;border: 2px solid #b84554;">
                <a href="#" onclick="goSearch()"><i class="am-icon-search am-icon-fw"></i></a>
            </div>
            <p class="am-u-lg-6 am-u-md-6 sort-position">
                <span style="padding: 6px;font-weight: bold;font-size: 15px;"><b>排序</b>：</span>
                <a href="#"><span class="sort-item" style="padding: 6px;">热度</span></a>
                <a href="#"><span class="sort-item" style="padding: 6px;">价格</span></a>
                <a href="#"><span class="sort-item" style="padding: 6px;">发布时间</span></a>

            </p>
        </div>

        <div id="selectList" class="screenBox screenBackground">

            <dl class="listIndex" attr="terminal_brand_s">
                <dt>分类1：</dt>
                <dd class="span-holder class1-holder">
                    <a href="javascript:void(0)" @if(!isset($data["condition"]["class1"])) class="selected" @endif
                    data-content="-1">全部</a>
                    @foreach($data["class1"] as $c1)
                        <a href="javascript:void(0)"
                           @if(isset($data['condition']['class1']) && $data['condition']['class1'] == $c1->id)
                           class="selected"
                           @endif
                           data-content="{{$c1->id}}">{{$c1->name}}</a>
                    @endforeach
                </dd>
            </dl>

            <dl class="listIndex" attr="terminal_brand_s">
                <dt>分类2：</dt>
                <dd class="span-holder class2-holder">
                    <a href="javascript:void(0)" data-content="-1"
                       @if(!isset($data["condition"]["class2"])) class="selected" @endif>全部</a>
                    @foreach($data["class2"] as $c2)
                        <a href="javascript:void(0)"
                           @if(isset($data["condition"]["class2"]) && $data["condition"]["class2"] == $c2->id)
                           class="selected"
                           @endif
                           data-content="{{$c2->id}}" parent="{{$c2->class1_id}}">{{$c2->name}}</a>
                    @endforeach
                </dd>
            </dl>

            <dl class="listIndex" attr="terminal_brand_s">
                <dt>分类3：</dt>
                <dd class="span-holder class3-holder">
                    <a href="javascript:void(0)" data-content="-1"
                       @if(!isset($data["condition"]["class3"])) class="selected" @endif>全部</a>
                    @foreach($data["class3"] as $c3)
                        <a href="javascript:void(0)"
                           @if(isset($data["condition"]["class3"]) && $data["condition"]["class3"] == $c3->id)
                           class="selected"
                           @endif
                           data-content="{{$c3->id}}" parent="{{$c2->class2_id}}">{{$c3->name}}</a>
                    @endforeach
                </dd>
            </dl>

            <dl class="listIndex" attr="价格范围">
                <dt>价格范围：</dt>
                <dd class="span-holder price-holder">
                    @if(!isset($data["condition"]["price"]))
                        <a href="javascript:void(0)" data-content="-1" class="selected">不限</a>
                        <a href="javascript:void(0)" data-content="1">50以下</a>
                        <a href="javascript:void(0)" data-content="2">50-100</a>
                        <a href="javascript:void(0)" data-content="3">100-500</a>
                        <a href="javascript:void(0)" data-content="4">500-2000</a>
                        <a href="javascript:void(0)" data-content="5">2000-5000</a>
                        <a href="javascript:void(0)" data-content="6">5000-10000</a>
                        <a href="javascript:void(0)" data-content="7">10000以上</a>
                    @else
                        <a href="javascript:void(0)" @if($data['condition']['price'] == -1) class="selected"
                           @endif data-content="-1">不限</a>
                        <a href="javascript:void(0)" @if($data['condition']['price'] == 1) class="selected"
                           @endif data-content="1">50以下</a>
                        <a href="javascript:void(0)" @if($data['condition']['price'] == 2) class="selected"
                           @endif data-content="2">50-100</a>
                        <a href="javascript:void(0)" @if($data['condition']['price'] == 3) class="selected"
                           @endif data-content="3">100-500</a>
                        <a href="javascript:void(0)" @if($data['condition']['price'] == 4) class="selected"
                           @endif data-content="4">500-2000</a>
                        <a href="javascript:void(0)" @if($data['condition']['price'] == 5) class="selected"
                           @endif data-content="5">2000-5000</a>
                        <a href="javascript:void(0)" @if($data['condition']['price'] == 6) class="selected"
                           @endif data-content="6">5000-10000</a>
                    @endif
                </dd>
            </dl>

            <dl class=" listIndex" attr="terminal_os_s">
                <dt>地区：</dt>
                <dd class="span-holder region-holder">
                    <a href="javascript:void(0)" data-content="-1"
                       @if(!isset($data["condition"]["region"])) class="selected" @endif>不限</a>
                    @foreach($data["region"] as $region)
                        <a href="javascript:void(0)" data-content="{{$region->id}}"
                           @if(isset($data["condition"]["region"]) && $data["condition"]["region"] == $region->id)
                           class="selected"
                                @endif>{{$region->name}}</a>
                    @endforeach
                </dd>
            </dl>


        </div>
    </div>

    <!--需求展示-->
    <div class="shopMain" id="shopmain" style="background:white;">
        <div class="am-container ">
            <div class="shopTitle ">
                {{--<h4 class="floor-title"><span class="am-badge am-badge-warning am-round">1</span>&nbsp;&nbsp;设计需求</h4>--}}
                {{--<div class="today-brands " style="right:0px ;top:13px;">--}}
                {{--<a href="# ">商标/VI设计</a>|--}}
                {{--<a href="# ">包装设计</a>|--}}
                {{--<a href="# ">封面设计</a>|--}}
                {{--<a href="# ">海报设计</a>|--}}
                {{--<a href="# ">宣传品设计</a>|--}}
                {{--<a href="# ">服装设计</a>--}}
                {{--<span class="am-badge am-badge-warning am-round">More</span>--}}
                {{--</div>--}}

            </div>
        </div>
        <div class="am-g am-g-fixed">
            <div class="am-u-lg-8 am-u-md-8" style="padding: 10px;float: left;">
                <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }">
                    <?php
                    $num = 30;
                    $count = 0;
                    ?>
                    @foreach($data["result"]["demands"] as $demand)
                        @if(++$count > 8)
                            @break
                        @endif

                        <li>
                            <div class="am-gallery-item">
                                <a href="/demands/detail?id={{$demand->id}}">
                                    <img src="
                                    @if($demand->picture != null)
                                        <?php
                                            $pics = explode(';', $demand->picture);
                                            $baseurl = explode('@', $pics[0])[0];
                                            $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                            $imagepath = explode('@', $pics[0])[1];
                                        ?>
                                        {{$baseurl}}{{$imagepath}}
                                    @else
                                        {{asset("images/f3.jpg")}}
                                    @endif" alt="img" style="width: 175px;height: 175px;"/>
                                    <h3 class="am-gallery-title">{{$demand->title}}</h3>
                                    <div class="am-gallery-desc">{{str_replace(array("</br>","</br","</b"),"",mb_substr($demand->describe, 0, 20, 'utf-8'))}}</div>
                                </a>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="am-u-lg-4 am-u-md-4" style="padding: 10px;">
                <ul>
                    <?php $count = 0; ?>
                    @foreach($data["result"]["demands"] as $demand)
                        @if(++$count > 8)
                            <li><a href="/demands/detail?id={{$demand->id}}"><span class="price-span">￥{{$demand->price}}</span>&nbsp;&nbsp;&nbsp;&nbsp;{{$demand->title}}</a><span
                                        style="color: gray;float: right;">查看详情</span></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <!--分页-->

        <nav>
            {!! $data['result']['demands']->appends($data["condition"])->render() !!}
        </nav>

    </div>
    <!--广告-->
    {{--<div class="advertisement" style="padding: 10px;width: 50%;float: left;">--}}
    {{--<img src="{{asset('images/ad4.png')}}">--}}
    {{--</div>--}}
    {{--<div class="advertisement" style="padding: 10px;width: 50%;float: right;">--}}
    {{--<img src="{{asset('images/ad5.png')}}">--}}
    {{--</div>--}}
@endsection

@section("custom-script")
    <script type="text/javascript " src="{{asset('basic/js/quick_links.js')}} "></script>
    <script type="text/javascript">
        $(".span-holder").find("a").click(function () {
            var clickedElement = $(this);
            clickedElement.addClass("selected");
            clickedElement.siblings().removeClass("selected");

            goSearch();
        });

        function goSearch() {
            var class1 = $(".class1-holder").find("a.selected").attr("data-content");
            var class2 = $(".class2-holder").find("a.selected").attr("data-content");
            var class3 = $(".class3-holder").find("a.selected").attr("data-content");
            var price = $(".price-holder").find("a.selected").attr("data-content");
            var region = $(".region-holder").find("a.selected").attr("data-content");
            var search = $("input[name='name']").val();

            if (class1 !== "-1")
                $("input[name='class1']").val(class1);
            if (class2 !== "-1")
                $("input[name='class2']").val(class2);
            if (class3 !== "-1")
                $("input[name='class3']").val(class3);
            if (price !== "-1")
                $("input[name='price']").val(price);
            if (region !== "-1")
                $("input[name='region']").val(region);
            if (search !== "")
                $("input[name='keyword']").val(search);

            var $searchForm = $("#search-form");
            $searchForm.action = '/demands/advanceSearch';
            $searchForm.submit();
        }
    </script>
@endsection

