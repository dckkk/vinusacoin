@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')
	@foreach($coin as $key => $value)
		<div class="row">
			<h1>Selamat Datang !</h1>
			<div class="col-md-12 text-center" style="border: 1px solid; padding: 30px;">
				<h1>{{ number_format($value->total) }}</h1>
			</div>
			<div class="col-md-4 text-center" style="border: 1px solid; padding: 30px;">
				<h2>{{ number_format($value->stage_1) }}</h2>
			</div>
			<div class="col-md-4 text-center" style="border: 1px solid; padding: 30px;">
				<h2>{{ number_format($value->stage_2) }}</h2>
			</div>
			<div class="col-md-4 text-center" style="border: 1px solid; padding: 30px;">
				<h2>{{ number_format($value->stage_3) }}</h2>
			</div>
		</div>
	@endforeach
	<br>	
@endsection

@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		var scrollTop = 0;
		$(window).scroll(function(){
			scrollTop = $(window).scrollTop();
			$('.counter').html(scrollTop);

			if (scrollTop >= 100) {
				$('#global-nav').addClass('scrolled-nav');
			} else if (scrollTop < 100) {
				$('#global-nav').removeClass('scrolled-nav');
			}
		});
	});
</script>
@endsection