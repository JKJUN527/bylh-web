@extends('layout.admin')
@section('title', '服务评论')

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
    @include('layout.adminAside', ['title' => 'serviceview', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        评论详情列表
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
                            <th>评论内容</th>
                            {{--<th>内容</th>--}}
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['serviceviews'] as $serviceview)
                            <tr onclick="window.open('/service/detail?id={{$serviceview->sid}}&type={{$serviceview->type}}');">
                                <td>{{$serviceview->rid}}</td>
                                {{--<td>{{$news->title}}</td>--}}
                                <td>{{substr($serviceview->comments, 0, 120)}}...</td>
                                <td>
                                    <i class="material-icons detail" data-content="{{$serviceview->rid}}"
                                       data-toggle='modal' data-target='#detailNewsModal'>visibility</i>
                                    <i class="material-icons delete" data-content="{{$serviceview->rid}}"
                                       style="margin-left: 16px;">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">暂无服务评论</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav class="page">
                        {!! $data['serviceviews']->render() !!}
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


        $(".delete").click(function () {
            var element = $(this);

            swal({
                title: "确认",
                text: "确认该评论吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/serviceviews/del?rid=" + element.attr('data-content'),
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
