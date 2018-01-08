@extends('demo.admin2')
@section('content')
<div class="center">
	<div class="col-main">
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
					<p class="title" style="font-size: 18px;font-weight: bold;padding: 10px;">我发布的需求:&nbsp;&nbsp;<span style="font-size: 16px;">Web 网站开发</span></p>
				</div>
				<div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
					<ul>
						<li style="border-bottom: 1px dotted #999;padding: 4px;">
							<div class="am-container">
								<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
									<img src="../images/touxiang.jpg" class="itemImage">
								</div>
								<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
									<p>liuyang</p>
								</div>
								<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
									<p>他的报价：￥<span class="money">10000</span><br>
										联系方式：<span class="tel">18581828128</span></p>
								</div>
								<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
								<button type="button" class="am-btn am-btn-danger" id="buy">立即购买</button>
							</div>
				</div>
				</li>
				<li style="border-bottom: 1px dotted #999;padding: 4px;">
					<div class="am-container">
						<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
							<img src="../images/touxiang.jpg" class="itemImage">
						</div>
						<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
							<p>liuyang</p>
						</div>
						<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
							<p>他的报价：￥<span class="money">10000</span><br>
								联系方式：<span class="tel">18581828128</span></p>
						</div>
						<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
						<button type="button" class="am-btn am-btn-danger" id="buy">立即购买</button>
					</div>
			</div>
			</li>
			<li style="border-bottom: 1px dotted #999;padding: 4px;">
				<div class="am-container">
					<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
						<img src="../images/touxiang.jpg" class="itemImage">
					</div>
					<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
						<p>liuyang</p>
					</div>
					<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
						<p>他的报价：￥<span class="money">10000</span><br>
							联系方式：<span class="tel">18581828128</span></p>
					</div>
					<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
					<button type="button" class="am-btn am-btn-danger" id="buy" onclick="checkbuy()">立即购买</button>
				</div>
		</div>
		</li>
		<li style="border-bottom: 1px dotted #999;padding: 4px;">
			<div class="am-container">
				<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
					<img src="../images/touxiang.jpg" class="itemImage">
				</div>
				<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
					<p>liuyang</p>
				</div>
				<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
					<p>他的报价：￥<span class="money">10000</span><br>
						联系方式：<span class="tel">18581828128</span></p>
				</div>
				<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;"">
				<button type="button" class="am-btn am-btn-danger" id="buy">立即购买</button>
			</div>
	</div>
	</li>
	</ul>
</div>
</div>
</div>
<script>
	function checkbuy(){
	    alert('hello!');
	}
</script>
<!--底部-->
@section('footer')
<div class="footer ">
	<div class="footer-hd ">
	</div>
	<div class="footer-bd ">
		<p style="text-align: center;">
			©2017-2018 bylh.com 成备xxxxxxxx号<br>
			不亦乐乎（成都）有限公司<br>
			客服：xxxx-xxx-xxx

		</p>
	</div>
</div>
@endsection
@endsection