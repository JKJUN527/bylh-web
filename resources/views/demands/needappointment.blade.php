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
									<button type="button" class="am-btn am-btn-danger" id="buy">立即购买</button>
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
	</script>
@endsection