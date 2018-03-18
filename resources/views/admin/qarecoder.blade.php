@extends('layout.admin')
@section('title', '专业问答管理')

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
        }
    </style>
@endsection

@section('sidebar')
    @include('layout.adminAside', ['title' => 'qarecoder', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        专业问答详情列表
                    </h2>
                    {{--<div class="mdl-card__menu">--}}

                        {{--<button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">--}}
                            {{--<i class="material-icons">more_vert</i>--}}
                        {{--</button>--}}

                        {{--<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"--}}
                            {{--for="demo-menu-lower-right">--}}
                            {{--<li class="mdl-menu__item">--}}
                                {{--<a href="/admin/addNews">添加新闻</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>提问内容</th>
                            <th>回答内容</th>
                            <th>提问时间</th>
                            <th>回答时间</th>
                            <th>删除答案</th>
                            <th>删除全部</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['qarecoder'] as $qarecoder)
                            <tr>
                                <td onclick="window.open('/service/detail?id={{$qarecoder->service_id}}&type=2');">
                                    {{$qarecoder->id}}
                                </td>
                                {{--<td>{{mb_substr($qarecoder->question,0,20,'utf-8')}}...</td>--}}
                                {{--<td>{{mb_substr($qarecoder->answer, 0, 20,'utf-8')}}...</td>--}}
                                <td>{{$qarecoder->question}}</td>
                                <td>{{$qarecoder->answer}}</td>
                                <td>{{$qarecoder->created_at}}</td>
                                <td>{{$qarecoder->updated_at}}</td>
                                <td>
                                    {{--<i class="material-icons detail" data-content="{{$qarecoder->id}}"--}}
                                       {{--data-toggle='modal' data-target='#detailNewsModal'>visibility</i>--}}
                                    <i class="material-icons delete1" data-content="{{$qarecoder->id}}"
                                       style="margin-left: 16px;">delete</i>
                                </td>
                                <td>
                                    <i class="material-icons delete2" data-content="{{$qarecoder->id}}"
                                       style="margin-left: 16px;">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">暂无专业问答记录</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav class="page">
                        {!! $data['qarecoder']->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dialogs ====================================================================================================================== -->
    <!-- Default Size -->
    <div class="modal fade" id="detailNewsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">
                        评论详情
                    </h4>
                </div>
                <div class="modal-body">
                    <span class="news-time"></span>
                    <br>
                    <div class="news-content"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">

        $(".detail").click(function () {
            var element = $(this);
            var rid = element.attr("data-content");

            $.ajax({
                url: "/admin/serviceviews/detail?rid=" + rid,
                type: "get",
                success: function (data) {
                    var news = data['view_detail'];

//                    $("#defaultModalLabel").html(");
                    $(".news-time").html(news['created_at']);
                    $(".news-content").html(news['comments']);
                }
            });
        });


        $(".delete1").click(function () {
            var element = $(this);

            swal({
                title: "确认",
                text: "确认删除该项答案吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/qarecoder/delanswer?id=" + element.attr('data-content'),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], "删除成功", data['msg'], null);

                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                });
            });
        })
        $(".delete2").click(function () {
            var element = $(this);

            swal({
                title: "确认",
                text: "确认该项问答吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/qarecoder/delall?id=" + element.attr('data-content'),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], "删除成功", data['msg'], null);

                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                });
            });
        })
    </script>
@show
