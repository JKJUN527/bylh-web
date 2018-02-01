@extends('demo.admin2')
@section('title','我的服务')
@section('content')
        <div class="main-wrap">
            <div class="user-orderinfo">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我发布的服务</strong> / <small>My&nbsp;services</small></div>
                </div>
                <ul class="am-nav am-nav-pills">
                    <li class="@if($data['type_tab'] ==1) am-active @endif" name="type_tab" data-content="tab1"><a href="#">大学生服务</a></li>
                    <li class="@if($data['type_tab'] ==2) am-active @endif" name="type_tab" data-content="tab2"><a href="#">实习中介服务</a></li>
                    <li class="@if($data['type_tab'] ==3) am-active @endif" name="type_tab" data-content="tab3"><a href="#">专业问答服务</a></li>
                </ul>
                <hr/>
            </div>
            <div class="am-g am-g-fixed">
                <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" id="genlservices" style="display: @if($data['type_tab'] ==1) block @else none @endif">
                    <ul>
                        @foreach($data['genlservices'] as $genlservice)
                        <li style="border-bottom: 1px dotted #999;padding: 4px;">
                            <div class="am-container">
                                @if($genlservice->picture != null)
                                    <?php
                                    $pics = explode(';', $genlservice->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                @endif
                                <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                    <img src="
                                    @if($genlservice->picture == "" || $genlservice->picture == null)
                                        {{asset('images/f2.png')}}
                                    @else
                                        {{$baseurl}}{{$imagepath}}
                                    @endif" class="itemImage">
                                </div>
                                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                    <p>{{$genlservice->title}}</p>
                                    @if($genlservice->state == 0)
                                        <a class="am-badge am-badge-success am-radius">正常</a>
                                    @elseif($genlservice->state == 1)
                                        <a class="am-badge am-badge-warning am-radius">暂停服务</a>
                                    @else
                                        <a class="am-badge am-badge-danger am-radius">下架</a>
                                    @endif
                                </div>
                                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                    <p>价格：<span class="money">
                                            @if($genlservice->price == -1)
                                                价格面议
                                            @else
                                            ￥{{$genlservice->price}}
                                                @if($genlservice->price_type == 0)
                                                    /8小时
                                                @elseif($genlservice->price_type == 1)
                                                    /天
                                                @elseif($genlservice->price_type == 2)
                                                    /次
                                                @elseif($genlservice->price_type == 3)
                                                    /套
                                                @endif
                                            @endif</span><br>
                                        浏览次数：<span class="people">{{$genlservice->view_count}}</span>次<br>
                                        成交量：<span class="total_order">{{$data['total_order']['genl'][$genlservice->id]}}</span>次
                                    </p>
                                </div>
                                <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
                                <button type="button" class="am-btn am-btn-success" onClick="location.href='/service/detail?id={{$genlservice->id}}&type={{$genlservice->type}}'">
                                    查看详情
                                </button>
                                <button type="button" class="am-btn am-btn-danger" onClick="deleteService({{$genlservice->id}},{{$genlservice->type}});">
                                    @if($genlservice->state == 0)
                                        暂停服务
                                    @elseif($genlservice->state == 1)
                                        重新上线
                                    @endif
                                </button>
                                </div>
                            </div>
                         </li>
                        @endforeach
                    </ul>
                    <!--分页-->
                    <div class="pager_container" style="margin-left: 50px;">
                        <nav>
                            {!! $data['genlservices']->appends(['type_tab'=>1])->render() !!}
                        </nav>
                    </div>
                </div>

                <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" id="finlservices" style="display: @if($data['type_tab'] ==2) block @else none @endif">
                    <ul>
                        @foreach($data['finlservices'] as $finlservice)
                            <li style="border-bottom: 1px dotted #999;padding: 4px;">
                                <div class="am-container">
                                    @if($finlservice->picture != null)
                                        <?php
                                        $pics = explode(';', $finlservice->picture);
                                        $baseurl = explode('@', $pics[0])[0];
                                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                        $imagepath = explode('@', $pics[0])[1];
                                        ?>
                                    @endif
                                    <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                        <img src="
                                    @if($finlservice->picture == "" || $finlservice->picture == null)
                                        {{asset('images/f2.png')}}
                                        @else
                                        {{$baseurl}}{{$imagepath}}
                                        @endif" class="itemImage">
                                    </div>
                                    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                        <p>{{$finlservice->title}}</p>
                                        @if($finlservice->state == 0)
                                            <a class="am-badge am-badge-success am-radius">正常</a>
                                        @elseif($finlservice->state == 1)
                                            <a class="am-badge am-badge-warning am-radius">暂停服务</a>
                                        @else
                                            <a class="am-badge am-badge-danger am-radius">下架</a>
                                        @endif
                                    </div>
                                    <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                        <p>价格：<span class="money">
                                            @if($finlservice->price == -1)
                                                    价格面议
                                                @else
                                                    ￥{{$finlservice->price}}
                                                    @if($finlservice->price_type == 0)
                                                        /8小时
                                                    @elseif($finlservice->price_type == 1)
                                                        /天
                                                    @elseif($finlservice->price_type == 2)
                                                        /次
                                                    @elseif($finlservice->price_type == 3)
                                                        /套
                                                    @endif
                                                @endif</span><br>
                                            浏览次数：<span class="people">{{$finlservice->view_count}}</span>次<br>
                                            成交量：<span class="total_order">{{$data['total_order']['finl'][$finlservice->id]}}</span>次
                                        </p>
                                    </div>
                                    <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
                                        <button type="button" class="am-btn am-btn-success" onClick="location.href='/service/detail?id={{$finlservice->id}}&type={{$finlservice->type}}'">
                                            查看详情
                                        </button>
                                        <button type="button" class="am-btn am-btn-danger" onClick="deleteService({{$finlservice->id}},{{$finlservice->type}});">
                                            @if($finlservice->state == 0)
                                                暂停服务
                                            @elseif($finlservice->state == 1)
                                                重新上线
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <!--分页-->
                    <div class="pager_container" style="margin-left: 50px;">
                        <nav>
                            {!! $data['finlservices']->appends(['type_tab'=>2])->render() !!}
                        </nav>
                    </div>
                </div>

                <div class="am-u-lg-12 am-u-md-12 am-u-sm-12" id="qaservices" style="display: @if($data['type_tab'] ==3) block @else none @endif">
                    @foreach($data['qaservices'] as $qaservices)
                        <li style="border-bottom: 1px dotted #999;padding: 4px;">
                            <div class="am-container">
                                @if($qaservices->picture != null)
                                    <?php
                                    $pics = explode(';', $qaservices->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                @endif
                                <div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
                                    <img src="
                                    @if($qaservices->picture == "" || $qaservices->picture == null)
                                    {{asset('images/f2.png')}}
                                    @else
                                    {{$baseurl}}{{$imagepath}}
                                    @endif" class="itemImage">
                                </div>
                                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                    <p>{{$qaservices->title}}</p>
                                    @if($qaservices->state == 0)
                                        <a class="am-badge am-badge-success am-radius">正常</a>
                                    @elseif($qaservices->state == 1)
                                        <a class="am-badge am-badge-warning am-radius">暂停服务</a>
                                    @else
                                        <a class="am-badge am-badge-danger am-radius">下架</a>
                                    @endif
                                </div>
                                <div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
                                    <p>价格：<span class="money">
                                            @if($qaservices->price == -1)
                                                价格面议
                                            @else
                                                ￥{{$qaservices->price}}
                                                @if($qaservices->price_type == 0)
                                                    /8小时
                                                @elseif($qaservices->price_type == 1)
                                                    /天
                                                @elseif($qaservices->price_type == 2)
                                                    /次
                                                @elseif($qaservices->price_type == 3)
                                                    /套
                                                @endif
                                            @endif</span><br>
                                        浏览次数：<span class="people">{{$qaservices->view_count}}</span>次<br>
                                        成交量：<span class="total_order">{{$data['total_order']['qa'][$qaservices->id]}}</span>次
                                    </p>
                                </div>
                                <div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
                                    <button type="button" class="am-btn am-btn-success" onClick="location.href='/service/detail?id={{$qaservices->id}}&type={{$qaservices->type}}'">
                                        查看详情
                                    </button>
                                    <button type="button" class="am-btn am-btn-danger" onClick="deleteService({{$qaservices->id}},{{$qaservices->type}});">
                                        @if($qaservices->state == 0)
                                            暂停服务
                                        @elseif($qaservices->state == 1)
                                            重新上线
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        </ul>
                        <!--分页-->
                        <div class="pager_container" style="margin-left: 50px;">
                            <nav>
                                {!! $data['qaservices']->appends(['type_tab'=>3])->render() !!}
                            </nav>
                        </div>
                </div>
            </div>
        </div>
<!--底部-->
@endsection
@section('aside')
    @include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
    <script>
        $("li[name=type_tab]").click(function(){
            var type_tab = $("li[name=type_tab]");
            type_tab.attr('class',"");
            $(this).attr('class',"am-active");
            if($(this).attr('data-content') === "tab1"){
                $('#genlservices').show();
                $('#finlservices').hide();
                $('#qaservices').hide();
            }
            if($(this).attr('data-content') === "tab2"){
                $('#qaservices').hide();
                $('#genlservices').hide();
                $('#finlservices').show();
            }
            if($(this).attr('data-content') === "tab3"){
                $('#qaservices').show();
                $('#genlservices').hide();
                $('#finlservices').hide();
            }
        });
        function deleteService(sid,type) {
            swal({
                title: "确认此操作",
                text: "暂定服务后，用户将搜索不到你的服务内容！",
                type: "info",
                confirmButtonText: "确定",
                closeOnConfirm: false
            }, function () {
                var formData = new FormData();
                formData.append("sid", sid);
                formData.append("type", type);
                $.ajax({
                    url: "/service/delete",
                    type: 'post',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status === 200) {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        } else {
                            swal({
                                title: "错误",
                                type: "error",
                                text: result.msg,
                                cancelButtonText: "关闭",
                                showCancelButton: true,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            });
        }
    </script>
@endsection