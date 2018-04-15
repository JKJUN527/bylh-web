@extends('demo.admin',['title'=>2])
@section('title', '需求大厅')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/navstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="{{asset('bootstrap-4.0.0-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>--}}
    <style>
        .long-title{
            display:none;
        }
        .card{
            width: 24%;
            padding: 10px;
            border: 1px solid #ccc;
            margin: 5px;
            height: 150px;
        }
        .card-deck{
            padding:10px;
        }
        .card-block{
            padding: 5px;
            width: 120px;
            overflow: hidden;
            text-align: left;
        }

        .card-title {
            /*margin-left: 10px;*/
            /*padding: 5px;*/
            font-weight: bold;
        }

        .card-text {
            /*padding: 5px;*/
            /*margin-left: 10px;*/
            line-height:140%
        }
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
        .card-title b{
            /*font-size: 1.2rem;*/
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
            <input type="hidden" name="type">
            <input type="hidden" name="keyword">
            <input type="hidden" name="orderBy">
            <input type="hidden" name="desc">
        </form>

        <div class="am-g am-g-fixed form-group search-position">
            <div class="am-u-lg-6 am-u-md-6 form-line" style="padding-left: 100px;">
                <input type="text" id="name" name="name" class="form-control"
                       value="@if(isset($data['condition']['keyword'])){{$data['condition']['keyword']}}@endif"
                       placeholder="输入需求类别／描述进行搜索"
                       style="width: 250px;padding: 6px;border: 2px solid #b84554;">
                <a href="#" onclick="goSearch()"><i class="am-icon-search am-icon-fw" style="margin-top: -26px;
    margin-left: 260px;font-size: 20px;"></i></a>
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
                <dd class="class1-holder">
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

            <dl class="listIndex" attr="terminal_brand_s">
                <dt>需求类型：</dt>
                <dd class="span-holder type-holder">
                    <a href="javascript:void(0)" @if(!isset($data["condition"]["type"])) class="selected" @endif
                    data-content="-1">全部</a>
                    <a href="javascript:void(0)"
                       @if(isset($data['condition']['type']) && $data['condition']['type'] == 0)
                       class="selected"
                       @endif
                       data-content="0">大学生服务需求
                    </a>
                    <a href="javascript:void(0)"
                       @if(isset($data['condition']['type']) && $data['condition']['type'] == 1)
                       class="selected"
                       @endif
                       data-content="1">实习中介服务需求
                    </a>
                    <a href="javascript:void(0)"
                       @if(isset($data['condition']['type']) && $data['condition']['type'] == 2)
                       class="selected"
                       @endif
                       data-content="2">专业问答服务需求
                    </a>
                </dd>
            </dl>


        </div>
    </div>

    <!--需求展示-->
    <div class="shopMain" id="shopmain" style="background:white;">
        <div class="am-g am-g-fixed">
            <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
                <div class="card-deck-wrapper">
                    <div class="card-deck">
                        <?php
                        $num = 30;
                        $count = 0;
                        ?>
                        @foreach($data["result"]["demands"] as $demand)
                            <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                <a href="/demands/detail?id={{$demand->id}}">
                                    <img class="card-img-top am-u-lg-1 am-u-md-1 am-u-sm-1" src="
                                    @if($demand->picture != null)
                                    <?php
                                    $pics = explode(';', $demand->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                    {{$baseurl}}{{$imagepath}}
                                    @else
                                    {{asset("images/f9.png")}}
                                    @endif" alt="需求图片" style="width: 120px;height:120px;"/>
                                    <div class="card-block am-u-lg-3 am-u-md-3 am-u-sm-3">
                                        <h4 class="card-title"><b>{{mb_substr($demand->title,0,10,'utf-8')}}</b></h4>
                                        <hr>
                                        <p class="card-text"><small class="text-muted">{{str_replace(array("</br>","</br","</b"),"",mb_substr($demand->describe, 0, 20, 'utf-8'))}}</small></p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                     </div>
                </div>
            </div>
            {{--<div class="am-u-lg-3 am-u-md-3" style="padding: 10px;">--}}
                {{--<ul>--}}
                    {{--@foreach($data["result"]["demands"] as $demand)--}}
                        {{--@if(++$count > 8)--}}
                            {{--<li><a href="/demands/detail?id={{$demand->id}}"><span--}}
                                            {{--class="price-span">￥{{$demand->price}}</span>&nbsp;&nbsp;&nbsp;&nbsp;{{$demand->title}}--}}
                                {{--</a><span--}}
                                        {{--style="color: gray;float: right;">查看详情</span></li>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
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
    <script src="{{asset('js/jquery-1.4.3.min.js')}}" rel="stylesheet" type="text/css"></script>
    <script src="{{asset('bootstrap-4.0.0-dist/js/bootstrap.min.js')}}" rel="stylesheet" type="text/css"></script>
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
            var type = $(".type-holder").find("a.selected").attr("data-content");
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
            if (type !== "-1")
                $("input[name='type']").val(type);
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
            $searchForm.action = '/demands/advanceSearch';
            $searchForm.submit();
        }
    </script>
@endsection
