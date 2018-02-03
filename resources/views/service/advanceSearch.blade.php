@extends('demo.admin',['title'=>3,'subtitle'=>$data["condition"]["type"]])
@section('title','服务大厅')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/navstyle.css')}}" rel="stylesheet" type="text/css"/>
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

        .sort-item {
            padding: 4px;
            margin-right: 4px;
        }
    </style>
@endsection

@section('content')
    <!--小导航 -->
    <div class="am-g am-g-fixed smallnav">
        <div class="am-u-sm-3">
            <a href="{{asset('demands.demandPublishIndex')}}"><img src="images/navsmall.jpg"/>
                <div class="title">发布需求</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="{{asset('service.genlpublish')}}"><img src="images/huismall.jpg"/>
                <div class="title">发布服务</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="{{asset('person.home')}}"><img src="images/mansmall.jpg"/>
                <div class="title">个人中心</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="#"><img src="images/moneysmall.jpg"/>
                <div class="title">关于我们</div>
            </a>
        </div>
    </div>
    <!--主要内容-->
    <!--1
    <div class="am-container am-g am-g-fixed" style="width: 100%;">
        <div class="leftpanel col-md-3 am-u-md-3">
                <div class="am-sticky-placeholder" style="margin:0px;height: 403px;">
                <ul>
                    <li>专业 提供专业的方案</li>
                    <li>便捷 体验便捷的操作</li>
                    <li>高效 享受高效的服务</li>
                    <li>全面 涵盖全面的类别</li>
                </ul>
            </div>

        </div>
            <div class="advertisement col-md-9 am-u-md-9" style="padding: 10px;">
                <img src="../images/pg1.jpg" style="width: 100%;">
            </div>
    </div>
    -->
    <div class="get"
         style="background: url({{asset('images/00.jpg')}}) top center no-repeat; color: #fff;text-align: center;height: 278px;">
        <div class="am-g" style="max-width: 1500px;margin: 0 auto;width: 100%;">
            <div class="am-u-lg-12">
            </div>
        </div>
    </div>
    <!--分类高级搜索-->
    <div class="selectNumberScreen">

        <form method="get" id="search-form">
            <input type="hidden" name="type" value="{{$data["condition"]["type"]}}">
            <input type="hidden" name="class1">
            <input type="hidden" name="class2">
            <input type="hidden" name="class3">
            <input type="hidden" name="price">
            <input type="hidden" name="region">
            <input type="hidden" name="keyword">
            <input type="hidden" name="orderBy">
            <input type="hidden" name="desc">
        </form>

        <div class="am-g am-g-fixed form-group search-position">
            <div class="am-u-lg-6 am-u-md-6 form-line" style="padding-left: 100px;">
                <input type="text" id="name" name="name" class="form-control"
                       value="@if(isset($data['condition']['keyword'])){{$data['condition']['keyword']}}@endif" placeholder="输入服务类别／描述进行搜索"
                       style="width: 250px;padding: 6px;border: 2px solid #b84554;">
                <a href="#" onclick="goSearch()"><i class="am-icon-search am-icon-fw"></i></a>
            </div>
            <p class="am-u-lg-6 am-u-md-6 sort-position">
                <span style="padding: 6px;font-weight: bold;font-size: 15px;"><b>排序</b>：</span>
                @if(!isset($data['condition']['orderBy']))
                    <a class="sort-item selected" id="sort-hotness" data-content="1">
                        <span>热度</span>
                        <i class="am-icon-angle-down"></i>
                    </a>

                    <a class="sort-item" id="sort-price" data-content="0">
                        <span>价格</span>
                        <i class=""></i>
                    </a>

                    <a class="sort-item" id="sort-created_time" data-content="0">
                        <span>发布时间</span>
                        <i class=""></i>
                    </a>
                @elseif($data['condition']['orderBy'] == 0)
                    @if($data['condition']['desc'] == 1)
                        <a class="sort-item selected" id="sort-hotness" data-content="1">
                            <span>热度</span>
                            <i class="am-icon-angle-down"></i>
                        </a>
                    @else
                        <a class="sort-item selected" id="sort-hotness" data-content="2">
                            <span>热度</span>
                            <i class="am-icon-angle-up"></i>
                        </a>
                    @endif

                    <a class="sort-item" id="sort-price" data-content="0">
                        <span>价格</span>
                        <i class=""></i>
                    </a>

                    <a class="sort-item" id="sort-created_time" data-content="0">
                        <span>发布时间</span>
                        <i class=""></i>
                    </a>
                @elseif($data['condition']['orderBy'] == 1)
                    <a class="sort-item" id="sort-hotness" data-content="0">
                        <span>热度</span>
                        <i class=""></i>
                    </a>

                    @if($data['condition']['desc'] == 1)
                        <a class="sort-item selected" id="sort-price" data-content="1">
                            <span>价格</span>
                            <i class="am-icon-angle-down"></i>
                        </a>
                    @else
                        <a class="sort-item selected" id="sort-price" data-content="2">
                            <span>价格</span>
                            <i class="am-icon-angle-up"></i>
                        </a>
                    @endif

                    <a class="sort-item" id="sort-created_time" data-content="0">
                        <span>发布时间</span>
                        <i class=""></i>
                    </a>
                @elseif($data['condition']['orderBy'] == 2)
                    <a class="sort-item" id="sort-hotness" data-content="0">
                        <span>热度</span>
                        <i class=""></i>
                    </a>

                    <a class="sort-item" id="sort-price" data-content="0">
                        <span>价格</span>
                        <i class=""></i>
                    </a>

                    @if($data['condition']['desc'] == 1)
                        <a class="sort-item selected" id="sort-created_time" data-content="1">
                            <span>发布时间</span>
                            <i class="am-icon-angle-down"></i>
                        </a>
                    @else
                        <a class="sort-item selected" id="sort-created_time" data-content="2">
                            <span>发布时间</span>
                            <i class="am-icon-angle-up"></i>
                        </a>
                    @endif
                @endif

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

            @if(isset($data['condition']['class1']))
                <dl class="listIndex" attr="terminal_brand_s">
                    <dt>分类2：</dt>
                    <dd class="class2-holder">
                        <a href="javascript:void(0)" data-content="-1"
                           @if(!isset($data["condition"]["class2"])) class="selected" @endif>全部</a>
                        @foreach($data["class2"] as $c2)
                            @if($c2->class1_id == $data['condition']['class1'])
                                <a href="javascript:void(0)"
                                   @if(isset($data["condition"]["class2"]) && $data["condition"]["class2"] == $c2->id)
                                   class="selected"
                                   @endif
                                   data-content="{{$c2->id}}" parent="{{$c2->class1_id}}">{{$c2->name}}</a>
                            @endif
                        @endforeach
                    </dd>
                </dl>
            @endif

            @if(isset($data['condition']['class2']))
                <dl class="listIndex" attr="terminal_brand_s">
                    <dt>分类3：</dt>
                    <dd class="span-holder class3-holder">
                        <a href="javascript:void(0)" data-content="-1"
                           @if(!isset($data["condition"]["class3"])) class="selected" @endif>全部</a>
                        @foreach($data["class3"] as $c3)
                            @if($c3->class2_id == $data['condition']['class2'])
                                <a href="javascript:void(0)"
                                   @if(isset($data["condition"]["class3"]) && $data["condition"]["class3"] == $c3->id)
                                   class="selected"
                                   @endif
                                   data-content="{{$c3->id}}" parent="{{$c2->class2_id}}">{{$c3->name}}</a>
                            @endif
                        @endforeach
                    </dd>
                </dl>
            @endif

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
    <div class="am-g am-g-fixed" style="background:white;">
        <div class="am-u-lg-8 am-u-md-8">

            {{--type 0--}}
            @if($data["condition"]["type"] == "0")
                <div class="shopMain" id="shopmain">
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4 class="floor-title"><span class="am-badge am-badge-warning am-round">1</span>&nbsp;&nbsp;一般服务
                            </h4>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed">
                        <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
                            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  							am-avg-md-3 am-avg-lg-4 am-gallery-default" data-am-gallery="{ pureview: true }">
                                @foreach($data["result"]["services"] as $s)
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="/service/detail?id={{$s->id}}&type=0" class="">
                                                @if($s->picture != null)
                                                    <?php
                                                    $pics = explode(';', $s->picture);
                                                    $baseurl = explode('@', $pics[0])[0];
                                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                    $imagepath = explode('@', $pics[0])[1];
                                                    ?>
                                                    <img src="{{$baseurl}}{{$imagepath}}"/>
                                                @else
                                                    <img src="{{asset("images/f1.jpg")}}"/>
                                                @endif
                                                <h3 class="am-gallery-title">{{$s->title}}</h3>
                                                <div class="am-gallery-desc">{{$s->price}}|{{$s->city}}</div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            {{--type 1--}}
            @if($data["condition"]["type"] == "1")
                <div class="shopMain" id="shopmain">
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4 class="floor-title"><span class="am-badge am-badge-primary am-round">2</span>&nbsp;&nbsp;实习中介
                            </h4>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed">
                        @foreach($data["result"]["services"] as $s)
                        <div class="am-u-lg-3 am-u-md-4" style="padding:10px;">
                            <a href="/service/detail?id={{$s->id}}&type=1">
                                @if($s->picture != null)
                                    <?php
                                    $pics = explode(';', $s->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                    <img src="{{$baseurl}}{{$imagepath}}"/>
                                @else
                                    <img src="{{asset("images/f1.jpg")}}"/>
                                @endif
                            </a>
                            <div class="left_bottom"
                                 style="background-color: gray;text-align: center;padding: 3px;color:#fff;">
                                <a href="/service/detail?id={{$s->id}}&type=1" style="color: #fff">
                                    {{$s->title}}
                                </a>
                                <p>{{$s->price}}|{{$s->city}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{--type 2--}}
            @if($data["condition"]["type"] == "2")
                <div class="shopMain" id="shopmain">
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4 class="floor-title"><span class="am-badge am-badge-success am-round">3</span>&nbsp;&nbsp;专业问答
                            </h4>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed">
                        <div class="am-u-lg-12 am-u-md-12" style="padding:10px;height: 80%;">
                            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-6
  							am-avg-md-6 am-avg-lg-6 am-gallery-default" data-am-gallery="{ pureview: true }">
                                @foreach($data["result"]["services"] as $s)
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="/service/detail?id={{$s->id}}&type=2" class="">
                                            @if($s->picture != null)
                                                <?php
                                                $pics = explode(';', $s->picture);
                                                $baseurl = explode('@', $pics[0])[0];
                                                $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                $imagepath = explode('@', $pics[0])[1];
                                                ?>
                                                <img src="{{$baseurl}}{{$imagepath}}"/>
                                            @else
                                                <img src="{{asset("images/f1.jpg")}}"/>
                                            @endif
                                            <h3 class="am-gallery-title">{{$s->title}}</h3>
                                            <div class="am-gallery-desc">{{$s->price}}|{{$s->city}}</div>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <nav>
                {!! $data['result']['services']->appends($data["condition"])->render() !!}
            </nav>
        </div>
        <div class="am-u-lg-4 am-u-md-4">
            <div class="request_rank">
                <div class="rank_title" style="background:url('../images/tit_bg.jpg')no-repeat center;height: 114px;">
                    <p style="font-size: 16px;font-weight: bold;text-align: center;color: #fff;padding-top: 20px;">
                        服务商排行榜</p>
                </div>
                <div class="rank_content"
                     style="margin: 0 60px;border-bottom: 2px solid #df3536;border-left: 2px solid #df3536;border-right: 2px solid #df3536;">
                    <ul>
                        @foreach([1,2,3] as $i)
                            <li style="text-align: center;">
                                <div class="box1"></div>
                                <div class="outer-con" style="padding: 10px;position: inherit;">
                                    <a href="# "><img src="{{asset("images/f2.jpg")}}" style="width: 50%;"/>
                                        <div class="title ">
                                            专业{{$i}}
                                        </div>
                                        <div class="sub-title ">
                                            好评率 100%
                                        </div>
                                        <div class="right-panel">
                                            <button type="button" class="am-btn am-btn-danger">查看详情</button>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!--猜你喜欢-->
    <div class="guesslike">
        <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted">
    </div>
    <!--广告-->
    <div class="advertisement" style="padding: 10px;width: 50%;float: left;">
        <img src="{{asset('images/ad4.jpg')}}">
    </div>
    <div class="advertisement" style="padding: 10px;width: 50%;float: right;">
        <img src="{{asset('images/ad5.jpg')}}">
    </div>



    <!--引导 -->
    <div class="navCir">
        <li class="active"><a href="/index"><i class="am-icon-home "></i>首页</a></li>
        <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
        <li><a href="/orderinfo"><i class="am-icon-shopping-basket"></i>订单详情</a></li>
        <li><a href="/home"><i class="am-icon-user"></i>我的</a></li>
    </div>
    <!--菜单 -->
    <div class=tip>
    </div>
@endsection

@section("custom-script")
    <script type="text/javascript " src="{{asset('basic/js/quick_links.js')}} "></script>
    <script type="text/javascript">
        var sortHotness = $("#sort-hotness");
        var sortPrice = $("#sort-price");
        var sortTime = $("#sort-created_time");

        function resetSort() {
            sortHotness.attr('data-content', 0);
            sortPrice.attr('data-content', 0);
            sortTime.attr('data-content', 0);

            sortHotness.find("i").removeClass("am-icon-angle-down").removeClass("am-icon-angle-up");
            sortPrice.find("i").removeClass("am-icon-angle-down").removeClass("am-icon-angle-up");
            sortTime.find("i").removeClass("am-icon-angle-down").removeClass("am-icon-angle-up");

            sortHotness.removeClass("selected");
            sortPrice.removeClass("selected");
            sortTime.removeClass("selected");
        }

        $(".sort-item").click(function () {

            if ($(this).attr('data-content') === '0') {
                resetSort();
                $(this).attr('data-content', 1);
                $(this).find('i').addClass("am-icon-angle-down");
                if (!$(this).hasClass('selected'))
                    $(this).addClass('selected');
            } else if ($(this).attr('data-content') === '1') {
                resetSort();
                $(this).attr('data-content', 2);
                $(this).find('i').addClass("am-icon-angle-up");
                if (!$(this).hasClass('selected'))
                    $(this).addClass('selected');
            } else if ($(this).attr('data-content') === '2') {
                resetSort();
                $(this).attr('data-content', 1);
                $(this).find('i').addClass("am-icon-angle-down");
                if (!$(this).hasClass('selected'))
                    $(this).addClass('selected');
            }
            goSearch();
        });

        $(".class1-holder").find("a").click(function () {
            var clickedElement = $(this);
            clickedElement.addClass("selected");
            clickedElement.siblings().removeClass("selected");
            var class2Holder = $(".class2-holder");
            class2Holder.find("a").removeClass("selected");
            class2Holder.find("a[data-content='-1']").addClass("selected");

            goSearch();
        });

        $(".class2-holder").find("a").click(function () {
            var clickedElement = $(this);
            clickedElement.addClass("selected");
            clickedElement.siblings().removeClass("selected");
            var class3Holder = $(".class3-holder");
            class3Holder.find("a").removeClass("selected");
            class3Holder.find("a[data-content='-1']").addClass("selected");

            goSearch();
        });

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

            if (sortHotness.attr('data-content') !== '0') {
                $("input[name='orderBy']").val(0);
                $("input[name='desc']").val(sortHotness.attr("data-content"));
            }

            if (sortPrice.attr('data-content') !== '0') {
                $("input[name='orderBy']").val(1);
                $("input[name='desc']").val(sortPrice.attr("data-content"));
            }

            if (sortTime.attr('data-content') !== '0') {
                $("input[name='orderBy']").val(2);
                $("input[name='desc']").val(sortTime.attr("data-content"));
            }

            var $searchForm = $("#search-form");
            $searchForm.action = '/service/advanceSearch';
            $searchForm.submit();
        }
    </script>
@endsection
