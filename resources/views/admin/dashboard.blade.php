@extends('layout.admin')
@section('title', '网站信息')

@section('custom-style')
    <style>
        .btn:hover,
        .btn:focus {
            color: #ffffff;
        }
        #indicatorContainer{
            position: absolute;
            right: 2rem;
            top: 1rem;
        }
    </style>
@endsection

@section('sidebar')
    @include('layout.adminAside', ['title' => 'dashboard', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">

        <div class="address-panel">
            <div class="container" style="margin-left: 0.5rem;">

                <dl>
                    <dt><span>电话</span></dt>
                    <dd><span>{{$data['webinfo']->tel or '联系电话未填写'}}</span></dd>
                </dl>

                <dl>
                    <dt><span>邮箱</span></dt>
                    <dd><span><a
                                    href="{{$data['webinfo']->email or '#'}}">{{$data['webinfo']->email or '邮箱未填写'}}</a></span>
                    </dd>
                </dl>

                <dl>
                    <dt><span>地址</span></dt>
                    <dd>
                        <span>{{$data['webinfo']->address or '地址未填写'}}</span>
                        <br>
                        <span class="secondary">
                            邮编：200433
                        </span>
                    </dd>
                </dl>

                <dl>
                    <dt><span>介绍</span></dt>
                    <dd>
                        <span>{{$data['webinfo']->content or '无介绍'}}</span>
                    </dd>
                </dl>

                <dl>
                    <dt><span>订单量</span></dt>
                    <dd>
                        <span>订单总量:{{$data['order_total']}}</span>
                    </dd>
                    <dd>
                        <span>交易成功量:{{$data['order_success']}}</span>
                    </dd>
                </dl>

                <dl>
                    <dt><span>服务需求发布量</span></dt>
                    <dd>
                        <span>服务发布量:{{$data['service_count']}}</span>
                    </dd>
                    <dd>
                        <span>需求发布量:{{$data['demand_count']}}</span>
                    </dd>
                </dl>

                <dl>
                    <dt><span>用户注册量</span></dt>
                    <dd>
                        <span>注册用户数:{{$data['user_count']}}</span>
                    </dd>
                </dl>
            </div>
        </div>
        {{--<input style="display: none" id="completionvalue" value="230" />--}}
        {{--<div class="prg-cont rad-prg" id="indicatorContainer"></div>--}}

        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setTelModal">修改公司电话
        </button>
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setEmailModal">修改公司邮箱
        </button>
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setAddressModal">修改公司地址
        </button>
        {{--<button class="btn bg-teal waves-effect">修改公司工作时间</button>--}}
        {{--<button class="btn bg-teal waves-effect">修改副标题</button>--}}
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setContentModal">修改网站介绍
        </button>

    </div>

    <div class="modal fade" id="setTelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置公司电话</h4>
                </div>
                <form role="form" method="post" id="set-phone-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="tel" name="tel" class="form-control"
                                       placeholder="公司联系电话">
                            </div>
                            <label id="tel-error" class="error" for="tel"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setEmailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置公司邮箱</h4>
                </div>
                <form role="form" method="post" id="set-email-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="email" name="email" class="form-control"
                                       placeholder="公司联系邮箱">
                            </div>
                            <label id="email-error" class="error" for="email"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setAddressModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置公司地址</h4>
                </div>
                <form role="form" method="post" id="set-address-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <textarea type="text" rows="3" id="address" name="address" class="form-control"
                                          placeholder="公司地址"></textarea>
                            </div>
                            <label id="address-error" class="error" for="address"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setContentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置网站介绍</h4>
                </div>
                <form role="form" method="post" id="set-content-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <textarea type="text" rows="3" id="content" name="content" class="form-control"
                                          placeholder="网站介绍"></textarea>
                            </div>
                            <label id="content-error" class="error" for="content"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script src="{{asset('js/radialindicator.min.js')}}"></script>
    <script type="text/javascript">
        window.onload = function(){
            setTimeout("location.reload()",10000);//10秒自动刷新
        }

        $("#set-phone-form").submit(function (event) {
            event.preventDefault();
            var phone = $("#tel");

            if (phone.val() === '') {
                setError(phone, 'tel', "不能为空");
                return;
            } else {
                removeError(phone, 'tel');
            }

            var formData = new FormData();
            formData.append("tel", phone.val());

            $.ajax({
                url: "/admin/about/setPhone",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setTelModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })

        });

        $("#set-email-form").submit(function (event) {
            event.preventDefault();
            var email = $("#email");

            if (email.val() === '') {
                setError(email, 'email', "不能为空");
                return;
            } else {
                removeError(email, 'email');
            }

            var formData = new FormData();
            formData.append("email", email.val());

            $.ajax({
                url: "/admin/about/setEmail",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setEmailModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $("#set-address-form").submit(function (event) {
            event.preventDefault();
            var address = $("#address");

            if (address.val() === '') {
                setError(address, 'address', "不能为空");
                return;
            } else {
                removeError(address, 'address');
            }

            var formData = new FormData();
            formData.append("address", address.val());

            $.ajax({
                url: "/admin/about/setAddress",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setAddressModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $("#set-content-form").submit(function (event) {
            event.preventDefault();
            var content = $("#content");

            if (content.val() === '') {
                setError(content, 'content', "不能为空");
                return;
            } else {
                removeError(content, 'content');
            }

            var formData = new FormData();
            formData.append("content", content.val());

            $.ajax({
                url: "/admin/about/setContent",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setContentModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });
        //设置百分比
        $('#indicatorContainer').radialIndicator({
            barColor: {
                0: '#FF0000',
                33: '#FFFF00',
                66: '#0066FF',
                100: '#33CC33'
            },
            percentage: false,
            initValue: $('#completionvalue').val()
        });
    </script>
@show
