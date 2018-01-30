@extends('demo.admin2')
@section('title','我的需求')
@section('content')
				<div class="main-wrap">
					<div class="user-orderinfo">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我发布的需求</strong> / <small>My&nbsp;requirements</small></div>
						</div>
						<hr/>
						
					</div>

					<div class="am-g am-g-fixed">
							<div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
								<ul>
									@foreach($data['demands'] as $demand)
										@if($demand->picture != null)
											<?php
											$pics = explode(';', $demand->picture);
											$baseurl = explode('@', $pics[0])[0];
											$baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
											$imagepath = explode('@', $pics[0])[1];
											?>
										@endif
								<li style="border-bottom: 1px dotted #999;padding: 4px;">
									<div class="am-container">
											<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
												<img src="
												@if($demand->picture == "" || $demand->picture == null)
													{{asset('images/f2.png')}}
												@else
													{{$baseurl}}{{$imagepath}}
												@endif
													" class="itemImage">
											</div>
											<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
												<p>{{$demand->title}}</p>
											</div>
											<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
												<p>价格：
													<span class="money">
													@if($demand->price == -1)
														价格面议
													@else
														￥{{$demand->price}}
													@endif
													</span><br>
												预约人数：<span class="people">{{$data['datenum'][$demand->id]}}</span>人<br>
												浏览次数:<span class="people">{{$demand->view_count}}</span>次
												</p>
											</div>
											<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
										<a href="/demands/detail?id={{$demand->id}}" ><button type="button" class="am-btn am-btn-success">查看详情</button></a>
												<button type="button" class="am-btn am-btn-danger" onclick="deleteDemand({{$demand->id}},'{{$demand->title}}');">删除需求</button>
											</div>
									</div>
								</li>
									@endforeach
								</ul>
								<nav>
									{!! $data['demands']->render() !!}
								</nav>
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
		function deleteDemand(demand_id,title) {
			swal({
				title: "确定删除该需求？",
				text: title,
				confirmButtonText: "确定删除",
				icon: "info",
				closeOnConfirm: true
			}, function () {
				var formData = new FormData();
				formData.append('did',demand_id);
				$.ajax({
					url: "/demands/deletedemand",
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
							swal("删除成功","","success");
							setTimeout(function () {
								self.location = "/demands/myneeds";
							}, 800);
						}else{
							swal('',result.msg,'error');
						}
					}
				});
			});
		}
	</script>
@endsection
