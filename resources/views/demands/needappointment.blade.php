@extends('demo.admin2')
@section('title','需求预约信息')
@section('content')
		<div class="main-wrap">
			<div class="user-orderinfo">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">预约清单</strong> / <small>Appointment&nbsp;Lists</small></div>
				</div>
				<hr/>

			</div>
			<div class="am-g am-g-fixed">
				<div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
					<p class="title" style="font-size: 18px;font-weight: bold;padding: 10px;">我发布的需求:&nbsp;&nbsp;<span style="font-size: 16px;">{{$data['demand']->title}}</span></p>
				</div>
				<div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
					<ul>
						@foreach($data['selectlist'] as $servicer)
						<li style="border-bottom: 1px dotted #999;padding: 4px;">
							<div class="am-container">
								<div class="am-u-lg-2 am-u-md-2 am-u-sm-2" onclick="findServiceHome({{$servicer->sid}});">
								@if($servicer->elogo != null)
										<img src="{{$servicer->elogo}}" class="itemImage">
								@else
										<img src="../images/touxiang.jpg" class="itemImage">
								@endif
								</div>
								<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;" onclick="findServiceHome({{$servicer->sid}});">
									<p>{{$servicer->ename}}</p>
									<p>{!! $servicer->brief !!}</p>
								</div>
								<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
									<p>他的报价：<span class="money">
											@if($servicer->price == -1)
												价格面议
											@else
												￥{{$servicer->price}}
											@endif
										</span><br>
										所在城市：<span class="tel">
									{{$servicer->city}}
										</span></p>
								</div>
								<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
									<button type="button" class="am-btn am-btn-danger am-btn-lg js-alert" id="buy" onclick="buy({{$servicer->sid}})">立即购买</button>
								</div>
								<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert{{$servicer->sid}}" style="margin-top: -150px;">
									<div class="am-modal-dialog">
										<div class="am-modal-bd">
											<div>
												<div class="service-title" style="font-size: 20px;font-weight: bold;padding: 20px;">
													<!--服务用户id及-->
													<input type="hidden" id="service_info{{$servicer->sid}}" data-content="{{$data['demand']->id}}" value="{{$servicer->sid}}"/>
													<a href="#">服务商名称：<span style="font-size: 18px;">{{$data['serviceinfo'][$servicer->sid]['ename']}}</span></a>
												</div>
												<a href="#"><img src="{{$data['serviceinfo'][$servicer->sid]['pay_code']}}"
																 style="width:300px;height:300px;"></a>
												@if($data['serviceinfo'][$servicer->sid]['pay_way'] == 0)
													<div class="alibaba" type="1" style="font-size: 18px;background: #fff;font-weight: bold;padding: 20px;">请使用微信扫码支付</div>
												@elseif($data['serviceinfo'][$servicer->sid]['pay_way'] == 1)
													<div class="alibaba" type="2" style="font-size: 18px;background: #fff;font-weight: bold;padding: 20px;">请使用支付宝扫码支付</div>
												@endif
											</div>
											<div class="am-modal-footer">
												<span class="am-modal-btn am-btn-lg" data-am-modal-confirm>确认支付</span>
												<span class="am-modal-btn am-btn-lg" data-am-modal-cancel>取消支付</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<nav>
					{!! $data['selectlist']->appends('did',$data['demand']->id)->render() !!}
				</nav>
			</div>
		</div>
<!--底部-->
@endsection
@section('aside')
	@include('demo.aside',['type'=>$data['type']])
@endsection
@section('custom-script')
	<script>
		function findServiceHome(id) {
			self.location='/service/getAllservices?uid='+id;
//			self.location = "/account/index";
		}
		function buy(sid) {
			var id = "#my-alert"+sid;
			$(id).modal({
				onConfirm: function () {
					var service_info = $("#service_info"+sid);
					var formData = new FormData();
					formData.append("s_id", service_info.val());
					formData.append("demand_id", service_info.attr('data-content'));

					$.ajax({
						url: "/order/selectServicer",
						type: "post",
						dataType: 'text',
						cache: false,
						contentType: false,
						processData: false,
						data: formData,
						success: function (data) {
							//console.log(data);
							var result = JSON.parse(data);
							if (result.status == 200) {
								swal("","支付成功，等待服务商确认收款","success");
								setTimeout(function () {
									window.location.reload();
								}, 1000);
							}else{
								swal('',result.msg,'error');
							}
						}
					});
				}
			});
		}
	</script>
@endsection