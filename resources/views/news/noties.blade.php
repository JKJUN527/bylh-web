@extends('demo.admin2')
@section('title','全部公告')
@section("custom-style")
	<style>
		.main-wrap {
			margin-left: 0 !important;
		}
	</style>
@endsection
@section('content')
	<div class="main-wrap">
		<div class="user-orderinfo">
			<!--标题 -->
			<div class="am-cf am-padding">
				<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">不亦乐乎公告板</strong> / <small>Bulletin board</small></div>
			</div>
			<hr/>
		</div>
		<div class="am-g am-g-fixed">
			<div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
				@foreach($data['notices'] as $notice)
					<div class="am-panel am-panel-default">
						<div class="am-panel-bd">
							<p>{{$notice->content}}</p>
							<sapn style="float: right">{{$notice->created_at}}</sapn>
						</div>
					</div>
				@endforeach
			</div>
			<nav>
				{!! $data['notices']->render() !!}
			</nav>
		</div>
	</div>
@endsection
@section('custom-script')
	<script>

	</script>
@endsection
