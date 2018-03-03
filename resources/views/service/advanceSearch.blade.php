@extends('demo.admin',['title'=>3,'subtitle'=>$data["condition"]["type"]])
@section('title','服务大厅')
@section('custom-style')
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/hmstyle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/navstyle.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="{{asset('bootstrap-4.0.0-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>--}}
    <style>
        .card{
            width: 32%;
            padding: 5px;
            border: 1px solid #ccc;
            margin: 5px;
            height: 150px;
        }

        .card img {
            width: 110px;
            height: 110px;
            top:11%
        }
        .card-deck{
            padding:10px;
        }
        .card-block{
            padding: 5px;
            width: 120px;
            overflow: hidden;
            text-align: left;
            top:20%;
        }

        .card-title {
            margin-left: 10px;
            padding: 5px;
            font-weight: bold;
        }

        .card-text {
            padding: 5px;
            margin-left: 10px;
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
        .card-title{
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
    @endsection
@section('content')
<!--小导航 -->
<div class="am-g am-g-fixed smallnav">
    <div class="am-u-sm-3">
        <a href="{{asset('demands.demandPublishIndex')}}"><img src="images/navsmall.jpg" />
            <div class="title">发布需求</div>
        </a>
    </div>
    <div class="am-u-sm-3">
        <a href="{{asset('service.genlpublish')}}"><img src="images/huismall.jpg" />
            <div class="title">发布服务</div>
        </a>
    </div>
    <div class="am-u-sm-3">
        <a href="{{asset('person.home')}}"><img src="images/mansmall.jpg" />
            <div class="title">个人中心</div>
        </a>
    </div>
    <div class="am-u-sm-3">
        <a href="#"><img src="images/moneysmall.jpg" />
            <div class="title">关于我们</div>
        </a>
    </div>
</div>
<!--广告-->
    {{--<div class="get"--}}
         {{--style="background: url({{asset('images/00.jpg')}}) top center no-repeat; color: #fff;text-align: center;height: 278px;">--}}
        {{--<div class="am-g" style="max-width: 1500px;margin: 0 auto;width: 100%;">--}}
            {{--<div class="am-u-lg-12">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
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
                       value="@if(isset($data['condition']['keyword'])){{$data['condition']['keyword']}}@endif"
                       placeholder="输入服务类别／描述进行搜索"
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
                <dd class="span-holder class1-holder">
                    <a href="javascript:void(0)" @if(!isset($data["condition"]["class1"])) class="selected" @endif
                    data-content="-1">全部</a>
                    @foreach($data["class1"] as $c1)
                        @if($c1->type == $data["condition"]["type"])
                            <a href="javascript:void(0)"
                               @if(isset($data['condition']['class1']) && $data['condition']['class1'] == $c1->id)
                               class="selected"
                               @endif
                               data-content="{{$c1->id}}">{{$c1->name}}</a>
                        @endif
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
                            <h4 class="floor-title">
                                <span class="am-badge am-badge-warning am-round">1</span>&nbsp;&nbsp;
                                一般服务
                            </h4>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed">
                        <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
                            <div class="card-deck-wrapper">
                                <div class="card-deck">
                                @foreach($data["result"]["services"] as $s)
                                        <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                            <a href="/service/detail?id={{$s->id}}&type=0" class="">
                                                @if($s->picture != null)
                                                    <?php
                                                    $pics = explode(';', $s->picture);
                                                    $baseurl = explode('@', $pics[0])[0];
                                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                    $imagepath = explode('@', $pics[0])[1];
                                                    ?>
                                                    <img class="card-img-top am-u-lg-1 am-u-md-1 am-u-sm-1"
                                                         src="{{$baseurl}}{{$imagepath}}"/>
                                                @else
                                                    <img class="card-img-top am-u-lg-1 am-u-md-1 am-u-sm-1"
                                                         src="{{asset("images/f1.jpg")}}"/>
                                                @endif
                                                <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                                <h4 class="card-title">{{mb_substr($s->title,0,10,'utf-8')}}</h4>
                                                <hr>
                                                <p class="card-text"><small class="text-muted" style="color: #885621">
                                                        @if($s->price ==-1)
                                                            价格面议
                                                        @else
                                                            ￥{{$s->price}}
                                                            @if($s->price_type ==0)
                                                                /小时
                                                            @elseif($s->price_type ==1)
                                                                /天
                                                            @elseif($s->price_type ==2)
                                                                /次
                                                            @elseif($s->price_type ==3)
                                                                /套
                                                            @elseif($s->price_type ==4)
                                                                /其他
                                                            @endif
                                                        @endif
                                                    </small><br>
                                                    <small class="text-muted">{{$s->name}}</small>
                                                </p>
                                            </div>
                                            </a>
                                        </div>
                                @endforeach
                                </div>
                           </div>
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
                        <div class="am-u-lg-12 am-u-md-12" style="padding: 10px;float: left;">
                            <div class="card-deck-wrapper">
                                <div class="card-deck">
                                    @foreach($data["result"]["services"] as $s)
                                        <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                            <a href="/service/detail?id={{$s->id}}&type=1">
                                                @if($s->picture != null)
                                                    <?php
                                                    $pics = explode(';', $s->picture);
                                                    $baseurl = explode('@', $pics[0])[0];
                                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                    $imagepath = explode('@', $pics[0])[1];
                                                    ?>
                                                    <img class="card-img-top am-u-lg-1 am-u-md-1 am-u-sm-1"
                                                         src="{{$baseurl}}{{$imagepath}}"/>
                                                @else
                                                    <img class="card-img-top am-u-lg-1 am-u-md-1 am-u-sm-1"
                                                         src="{{asset("images/f1.jpg")}}"/>
                                                @endif
                                            <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                                <h4 class="card-title">{{mb_substr($s->title,0,10,'utf-8')}}</h4>
                                                <hr>
                                                <p class="card-text"><small class="text-muted" style="color: #885621">
                                                        @if($s->price ==-1)
                                                            价格面议
                                                        @else
                                                            ￥{{$s->price}}
                                                            @if($s->price_type ==0)
                                                                /小时
                                                            @elseif($s->price_type ==1)
                                                                /天
                                                            @elseif($s->price_type ==2)
                                                                /次
                                                            @elseif($s->price_type ==3)
                                                                /套
                                                            @elseif($s->price_type ==4)
                                                                /其他
                                                            @endif
                                                        @endif
                                                    </small><br>
                                                    <small class="text-muted">{{$s->name}}</small>
                                                </p>
                                            </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
                            <div class="card-deck-wrapper">
                                <div class="card-deck">
                                @foreach($data["result"]["services"] as $s)
                                        <div class="card am-u-lg-3 am-u-md-3 am-u-sm-3 am-u-end">
                                            <a href="/service/detail?id={{$s->id}}&type=2" class="">
                                                @if($s->picture != null)
                                                    <?php
                                                    $pics = explode(';', $s->picture);
                                                    $baseurl = explode('@', $pics[0])[0];
                                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                                    $imagepath = explode('@', $pics[0])[1];
                                                    ?>
                                                    <img class="card-img-top am-u-lg-1 am-u-md-1 am-u-sm-1"
                                                         src="{{$baseurl}}{{$imagepath}}"/>
                                                @else
                                                    <img class="card-img-top am-u-lg-1 am-u-md-1 am-u-sm-1"
                                                         src="{{asset("images/f1.jpg")}}"/>
                                                @endif
                                                    <div class="card-block am-u-lg-2 am-u-md-2 am-u-sm-2">
                                                        <h4 class="card-title">{{mb_substr($s->title,0,10,'utf-8')}}</h4>
                                                        <hr>
                                                        <p class="card-text"><small class="text-muted" style="color: #885621">
                                                                @if($s->price ==-1)
                                                                    价格面议
                                                                @else
                                                                    ￥{{$s->price}}
                                                                    @if($s->price_type ==0)
                                                                        /小时
                                                                    @elseif($s->price_type ==1)
                                                                        /天
                                                                    @elseif($s->price_type ==2)
                                                                        /次
                                                                    @elseif($s->price_type ==3)
                                                                        /套
                                                                    @elseif($s->price_type ==4)
                                                                        /其他
                                                                    @endif
                                                                @endif
                                                            </small><br>
                                                            <small class="text-muted">{{$s->name}}</small>
                                                        </p>
                                                    </div>
                                                </a>
                                          </div>
                                @endforeach
                                </div>
                           </div>
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
                        @foreach($data['Service_list'] as $service)
                            <li style="text-align: center;">
                                <div class="box1"></div>
                                <div class="outer-con" style="padding: 10px;position: inherit;">
                                    <a href="/service/getAllservices?uid={{$service->uid}}">
                                        <img src="{{$service->elogo or asset("images/f2.jpg")}}" style="width: 50%;"/>
                                        <div class="title ">
                                            {{$service->ename}}
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