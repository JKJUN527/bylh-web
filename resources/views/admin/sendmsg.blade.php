@extends('layout.admin')
@section('title', '发送站内信')

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
    @include('layout.adminAside', ['title' => 'sendmsg', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        用户查询
                    </h2>
                    <input id="username" type="text" value="请输入用户名查询" />
                    <input id="search" type="button" value="立即查询" />
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a id="send_msg_btn" data-toggle="modal" data-target="#addRegionModal1">发送站内信</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>用户ID</th>
                            <th>用户名</th>
                            <th>用户类型</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['userinfo'] as $user)
                            <tr>
                                <td>{{$user->uid}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    @if($user->type ==0)
                                        管理员
                                    @elseif($user->type ==1)
                                        需求用户
                                    @elseif($user->type ==2)
                                        服务用户
                                    @endif
                                </td>
                                <td>
                                    <i class="material-icons send" data-content="{{$user->uid}}">send</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">暂无地区</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav>
                        {!! $data['userinfo']->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dialogs ====================================================================================================================== -->
    <!-- Default Size -->
    <div class="modal fade" id="addRegionModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">发送站内信</h4>
                </div>
                <form role="form" method="post" id="send_msg_form">
                    <div class="modal-body">

                        <label for="name">用户ID</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="user_id" name="user_id" class="form-control"
                                       placeholder="请填入接收方用户ID">
                            </div>
                            <label id="name-error" class="error" for="user_id"></label>
                        </div>
                        <label for="name">站内信内容</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="content_msg" name="content_msg" class="form-control"
                                       placeholder="站内信内容">
                            </div>
                            <label id="name-error" class="error" for="content_msg"></label>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">发送</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        $('#username').focus(function () {
            $(this).val('');
        });
        $('#search').click(function () {
            var username = $('#username').val();
            window.location.href="/admin/sendmsg?username="+username;
        });
        $("#send_msg_form").submit(function (event) {
            event.preventDefault();

            var user_id = $("#user_id");
            var content = $("#content_msg");

            if (user_id.val() === '') {
                setError(user_id, 'user_id', '用户ID不能为空');
                return;
            } else {
                removeError(user_id, 'user_id');
            }
            if (content.val() === '') {
                setError(content, 'content', '站内信内容不能为空');
                return;
            } else {
                removeError(content, 'content');
            }

            var formData = new FormData();
            formData.append("uid", user_id.val());
            formData.append("content", content.val());

            $.ajax({
                url: "/admin/sendmsg",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#addRegionModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "发送成功", result.msg, null);

                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $(".send").click(function () {
            var element = $(this);
            $('#user_id').val(element.attr("data-content"));
            $("#send_msg_btn").click();
        })
    </script>
@show
