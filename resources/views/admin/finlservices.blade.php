@extends('layout.admin')
@section('title', '已发布实习中介服务')

@section('custom-style')
    <style>
        ul.mdl-menu,
        li.mdl-menu__item {
            padding: 0;
        }

        li.mdl-menu__item a {
            cursor: pointer;
            display: block;
            padding: 0 16px;
        }

        i.material-icons {
            cursor: pointer;
            margin-right: 12px;
        }

        .hot {
            color: #F44336;
        }
        .online {
            color: green;
        }
    </style>
@endsection

@section('sidebar')
    @include('layout.adminAside', ['title' => 'service', 'subtitle'=>'finlservice', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        实习中介服务列表
                    </h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>·
                            <th>#</th>
                            <th>服务名称</th>
                            <th>服务城市</th>
                            <th>服务行业</th>
                            <th>服务描述</th>
                            <th>发布时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['finlservices'] as $finlservices)
                            <tr>
                                <td>{{$finlservices->id}}</td>
                                <td>{{$finlservices->title or '无'}}</td>
                                <td>{{$finlservices->city}}</td>
                                <td>{{$finlservices->name}}</td>
                                <td>{{mb_substr($finlservices->describe, 0, 20)}}</td>
                                <td>{{$finlservices->created_at}}</td>
                                <td>
                                    @if($finlservices->state == 0)
                                        <span class="label label-success">正常</span>
                                    @elseif($finlservices->state == 1)
                                        <span class="label label-warning">已下架</span>
                                    @elseif($finlservices->state == 2)
                                        <span class="label label-danger">违规</span>
                                    @endif
                                </td>

                                <td>
                                    <i class="material-icons off-the-shelf @if($finlservices->state !=0) online @endif" data-content="{{$finlservices->id}}">remove_circle</i>
                                    <i class="material-icons set-hot @if($finlservices->is_urgency == 1) hot @endif"
                                       data-content="{{$finlservices->id}}">whatshot</i>
                                    {{--<i class="material-icons on-the-shelf" data-content="{{$position->pid}}">file_upload</i>--}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">暂无大学生服务</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <nav>
                {!! $data['finlservices']->render() !!}
            </nav>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        $(".off-the-shelf").click(function () {
            var element = $(this);
            var setOnline = element.hasClass("online") ? 0 : 1;
            if(setOnline){
                swal({
                    type: "warning",
                    title: "确认",
                    text: "确定下架该服务吗？",
                    confirmButtonText: "下架",
                    cancelButtonText: "取消",
                    showCancelButton: true,
                    closeOnConfirm: true
                }, function () {
                    $.ajax({
                        url: "/admin/services/offposition?type=1&id=" + element.attr("data-content"),
                        type: "get",
                        success: function (data) {
                            checkResult(data['status'], "操作成功", data['msg'], null);
                        }
                    })
                })
            }else{
                swal({
                    type: "warning",
                    title: "确认",
                    text: "确定重新上架该服务吗？",
                    confirmButtonText: "上架",
                    cancelButtonText: "取消",
                    showCancelButton: true,
                    closeOnConfirm: true
                }, function () {
                    $.ajax({
                        url: "/admin/services/onposition?type=1&id=" + element.attr("data-content"),
                        type: "get",
                        success: function (data) {
                            checkResult(data['status'], "操作成功", data['msg'], null);
                        }
                    })
                })
            }

        });

        $(".set-hot").click(function () {
            var element = $(this);
            var setUrgency = element.hasClass("hot") ? 0 : 1;

            var url = "/admin/services/urgency?type=1&id=" + element.attr("data-content") + "&urgency=" + setUrgency;

            $.ajax({
                url: url,
                type: "get",
                success: function (data) {
                    checkResult(data['status'], "操作成功", data['msg'], null);
                }
            })

        })
    </script>
@show
