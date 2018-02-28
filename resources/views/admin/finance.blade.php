@extends('layout.admin')
@section('title', '企业审核')

@section('custom-style')
    <style>
        i.material-icons {
            cursor: pointer;
        }
    </style>
@endsection

@section('sidebar')
    @include('layout.adminAside', ['title' => 'verify', 'subtitle'=>'finance', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        实习中介认证列表
                    </h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-apply-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>类别</th>
                            <th>真实姓名</th>
                            <th>审核状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['finance'] as $finance)
                            <tr>
                                <td>{{$finance->id}}</td>
                                <td>实习中介认证</td>
                                <td>{{$finance->real_name or '未填写姓名'}}</td>
                                <td>
                                    @if($finance->finance_statue == 0)
                                        <span class="label label-primary">未审核</span>
                                    @elseif($finance->finance_statue == 1)
                                        <span class="label label-success">审核通过</span>
                                    @elseif($finance->finance_statue == 2)
                                        <span class="label label-danger">审核拒绝</span>
                                    @endif
                                </td>
                                <td>
                                    <i class="material-icons detail" data-content="{{$finance->uid}}"
                                       data-toggle='modal' data-target='#detailApplyModal'>visibility</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">无实习中介认证待审核</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <nav>
                {!! $data['finance']->render() !!}
            </nav>

        </div>
    </div>

    <!-- Modal Dialogs ====================================================================================================================== -->
    <!-- Default Size -->
    <div class="modal fade" id="detailApplyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">实习中介详情/审核</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="cu-apply-detail-table">
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect" onclick="pass()">审核通过</button>
                    <button type="button" class="btn btn-danger waves-effect" onclick="deny()">审核拒绝</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">

        function pass() {
            var uid = $("#user_id").html();

            swal({
                title: "确认",
                text: "确认审核通过？",
                type: "info",
                confirmButtonText: "确认",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true,
                showLoaderOnConfirm: true
            }, function () {
                doPostVerify(uid, 1);
            });
        }

        function deny() {
            var uid = $("#user_id").html();

            swal({
                title: "确认",
                text: "确认拒绝审核？",
                type: "info",
                confirmButtonText: "确认",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true,
                showLoaderOnConfirm: true
            }, function () {
                doPostVerify(uid, 0);
            });
        }

        function doPostVerify($uid, $status) {
            $.ajax({
                url: "/admin/examine_verify?uid=" + $uid + "&status=" + $status+"&type=finance",
                type: "get",
                success: function (data) {
                    $("#detailApplyModal").modal('hide');

                    checkResult(data['status'], "操作成功", data['msg'], null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        }


        $(".detail").click(function () {
            var element = $(this);
            var uid = element.attr("data-content");

            $.ajax({
                url: "/admin/showverify/detail?uid=" + uid,
                type: "get",
                success: function (data) {
                    var userinfo = data['userinfo'];
                    var serviceinfo = data['serviceinfo'];

                    var sex = "男";
                    if(userinfo['sex']==1){
                        sex = "女"
                    }
                    var photo = userinfo['finance_photo'].split("+@+");

                    var html = "<tr class='hide'><td>item</td><td id='user_id'>" + userinfo['uid'] + "</td></tr>";
                    html += "<tr>" +
                        "<td>用户姓名</td>" +
                        "<td>" + userinfo['real_name'] + "</td>" +
                        "</tr>";
                    html += "<tr>" +
                        "<td>身份证号</td>" +
                        "<td>" + userinfo['id_card'] + "</td>" +
                        "</tr>";
                    html += "<tr>" +
                        "<td>性别</td>" +
                        "<td>" + sex + "</td>" +
                        "</tr>";
                    html += "<tr>" +
                        "<td>联系电话</td>" +
                        "<td>" + userinfo['tel'] + "</td>" +
                        "</tr>";
                    html += "<tr>" +
                        "<td>联系邮箱</td>" +
                        "<td>" + userinfo['mail'] + "</td>" +
                        "</tr>";
                    html += "<tr>" +
                        "<td>所在城市</td>" +
                        "<td>" + userinfo['city'] + "</td>" +
                        "</tr>";
                    html += "<tr>" +
                            "<td>中介领域</td>" +
                            "<td>" + serviceinfo['field'] + "</td>" +
                            "</tr>";
                    html += "<tr>" +
                            "<td>机构自述</td>" +
                            "<td>" + serviceinfo['self_statement'] + "</td>" +
                            "</tr>";

                    html += "<tr>" +
                        "<td colspan='2'>营业执照图片</td></tr>" +
                        "<tr><td colspan='2'><img src=" + photo[0] + " width='100%'/></td>" +
                        "</tr>";
                    html += "<tr>" +
                            "<td colspan='2'>其他证件照片</td></tr>" +
                            "<tr><td colspan='2'><img src=" + photo[1] + " width='100%'/></td>" +
                            "</tr>";


                    $("#cu-apply-detail-table").find("tbody").html(html);
                }
            })
        })
    </script>
@show
