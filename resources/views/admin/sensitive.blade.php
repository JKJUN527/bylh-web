@extends('layout.admin')
@section('title', '敏感词系统')

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
    @include('layout.adminAside', ['title' => 'sensitive', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        敏感词库设置
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="industry-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="industry-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a data-toggle="modal" data-target="#addIndustryModal">添加敏感词</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>敏感词名称</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['sensitive'] as $sensitive)
                            <tr onclick="onIndustrySelected({{$sensitive->id}})">
                                <td>{{$sensitive->id}}</td>
                                <td>{{$sensitive->keyword}}</td>
                                <td>
                                    <i class="material-icons delete-egame"
                                       data-content="{{$sensitive->id}}">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">暂无敏感词</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{--分页--}}

                <nav>
                    {!! $data['sensitive']->render() !!}
                </nav>
            </div>
        </div>
    </div>

    <!-- Modal Dialogs ================================================================================================== -->
    <!-- Default Size -->
    <div class="modal fade" id="addIndustryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">添加一个敏感词</h4>
                </div>
                <form role="form" method="post" id="add_sensitive_form">
                    <div class="modal-body">

                        <label for="name">名称</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="敏感词名称">
                            </div>
                            <label id="name-error" class="error" for="name"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">添加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">

        $("#add_sensitive_form").submit(function (event) {
            event.preventDefault();

            var name = $("#name");

            if (name.val() === '') {
                setError(name, 'name', '不能为空');
                return;
            } else {
                removeError(name, 'name');
            }

            var formData = new FormData();
            formData.append("name", name.val());

            $.ajax({
                url: "/admin/sensitive/add",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#addIndustryModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "操作成功", result.msg, null);

                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $(".delete-egame").click(function () {
            var element = $(this);

            swal({
                type: "warning",
                title: "确认",
                text: "确定删除该游戏吗？",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/sensitive/delete?id=" + element.attr("data-content"),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], '操作成功', data['msg'], null);
                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                })
            });
        });
    </script>
@show
