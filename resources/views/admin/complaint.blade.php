@extends('layout.admin')
@section('title', '投诉建议列表')

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
    @include('layout.adminAside', ['title' => 'complaint', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        投诉建议详情列表
                    </h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>举报人id</th>
                            <th>举报类型</th>
                            <th>举报详情内容</th>
                            <th>举报位置</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['complaint'] as $complaint)
                            <tr @if($complaint->is_read == 0) style="color: indianred;" @endif>
                                <td onclick="window.open('{{$complaint->url}}');">
                                    {{$complaint->id}}
                                </td>
                                <td>{{$complaint->source_uid}}</td>
                                <td>
                                    @if($complaint->type == 0)
                                        垃圾营销
                                    @elseif($complaint->type == 1)
                                        不实信息
                                    @elseif($complaint->type == 2)
                                        有害信息
                                    @elseif($complaint->type == 3)
                                        违法信息
                                    @elseif($complaint->type == 4)
                                        污秽色情
                                    @elseif($complaint->type == 5)
                                        人身攻击
                                    @elseif($complaint->type == 6)
                                        内容抄袭
                                    @endif
                                </td>
                                <td>{{$complaint->content}}</td>
                                <td>{{$complaint->real_place}}</td>
                                <td>
                                    <i class="material-icons detail" data-content="{{$complaint->id}}"
                                       data-toggle='modal' data-target='#detailNewsModal'>visibility</i>
                                    <i class="material-icons delete" data-content="{{$complaint->id}}"
                                       style="margin-left: 16px;">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">暂无投诉记录</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav class="page">
                        {!! $data['complaint']->render() !!}
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
                        投诉详情
                    </h4>
                </div>
                <div class="modal-body">
                    <span class="news-time"></span>
                    <br>
                    <span><b>举报详情内容</b></span>
                    <div class="news-content"></div>
                    <span><b>举报位置</b></span>
                    <div class="real_place"></div>

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
            var id = element.attr("data-content");

            $.ajax({
                url: "/admin/complaint/detail?id=" + id,
                type: "get",
                success: function (data) {
                    var news = data['complaint'];

//                    $("#defaultModalLabel").html(");
                    $(".news-time").html(news['created_at']);
                    $(".news-content").html(news['content']);
                    $(".real_place").html(news['real_place']);
                }
            });
        });


        $(".delete").click(function () {
            var element = $(this);

            swal({
                title: "确认",
                text: "确认删除该投诉记录吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/complaint/del?id=" + element.attr('data-content'),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], "删除成功", data['msg'], null);

                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                });
            });
        });
    </script>
@show
