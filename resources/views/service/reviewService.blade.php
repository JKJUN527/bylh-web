@extends('demo.admin2')
@section('title','评论')
@section('content')
		<div class="main-wrap">
			<div class="user-orderinfo">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的评论</strong> / <small>My&nbsp;Comments</small></div>
				</div>
				<hr/>
			</div>
			<div class="am-g am-g-fixed">
				<div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
					<ul>
						<li style="border-bottom: 1px dotted #999;padding: 4px;">
							<div class="am-container">
								<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
									<img src="../images/f2.jpg" class="itemImage">
								</div>
								<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
									<p>web网站开发</p>
								</div>
								<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
									<p>评分：<span class="score" style="color: #b84554;font-weight: bold;">5</span>分<br>
								</div>
								<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
								<p>对开发的网站十分满意，效率高，速度快，质量有保证。</p>
								</div>
							</div>
				</li>
						<li style="border-bottom: 1px dotted #999;padding: 4px;">
					<div class="am-container">
						<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
							<img src="../images/f2.jpg" class="itemImage">
						</div>
						<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
							<p>web网站开发</p>
						</div>
						<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
							<p>评分：<span class="score" style="color: #b84554;font-weight: bold;">5</span>分<br>
						</div>
						<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
						<p>对开发的网站十分满意，效率高，速度快，质量有保证。</p>
						</div>
					</div>
				</li>
						<li style="border-bottom: 1px dotted #999;padding: 4px;">
				<div class="am-container">
					<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
						<img src="../images/f2.jpg" class="itemImage">
					</div>
					<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
						<p>web网站开发</p>
					</div>
					<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
						<p>评分：<span class="score" style="color: #b84554;font-weight: bold;">5</span>分<br>
					</div>
					<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
					<p>对开发的网站十分满意，效率高，速度快，质量有保证。</p>
					</div>
				</div>
			</li>
						<li style="border-bottom: 1px dotted #999;padding: 4px;">
			<div class="am-container">
				<div class="am-u-lg-2 am-u-md-2 am-u-sm-2">
					<img src="../images/f2.jpg" class="itemImage">
				</div>
				<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
					<p>web网站开发</p>
				</div>
				<div class="am-u-lg-3 am-u-md-3 am-u-sm-3" style="padding: 20px;">
					<p>评分：<span class="score" style="color: #b84554;font-weight: bold;">5</span>分<br>
				</div>
				<div class="am-u-lg-4 am-u-md-4 am-u-sm-4" style="text-align: center;padding: 20px;">
				<p>对开发的网站十分满意，效率高，速度快，质量有保证。</p>
				</div>
			</div>
		</li>
					</ul>
				</div>
			</div>
		</div>
@endsection
@section('aside')
	<aside class="menu">
		<ul>
			<li class="person active">
				<a href="{{asset('home')}}"><i class="am-icon-user"></i>个人中心</a>
			</li>
			<li class="person">
				<p><i class="am-icon-newspaper-o"></i>个人资料</p>
				<ul>
					<li><a href="{{asset('user')}}">个人信息</a></li>
					<li><a href="{{asset('safety')}}">安全设置</a></li>
				</ul>
			</li>
			<li class="person">
				<p><i class="am-icon-balance-scale"></i>我的交易</p>
				<ul>
					<li><a href="{{asset('order')}}">订单管理</a></li>
					<li><a href="{{asset('comment')}}">评价服务</a></li>
				</ul>
			</li>
			<li class="person">
				<p><i class="am-icon-dollar"></i>我的服务</p>
				<ul>
					<li><a href="{{asset('advanceSearch')}}">发布服务</a></li>
					<li><a href="{{asset('myrequest')}}">服务列表</a></li>
				</ul>
			</li>
			<li class="person">
				<p><i class="am-icon-tags"></i>我的需求</p>
				<ul>
					<li><a href="{{asset('sendneed')}}">发布需求</a></li>
					<li><a href="{{asset('myneed')}}">需求列表</a></li>
				</ul>
			</li>
			<li class="person">
				<p><i class="am-icon-qq"></i>信息中心</p>
				<ul>
					<li><a href="{{asset('message')}}">站内信</a></li>
					<li><a href="/news">我的消息</a></li>
				</ul>
			</li>
		</ul>
	</aside>
@endsection