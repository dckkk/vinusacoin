@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
<link rel="stylesheet" href="{{ asset('css/libs/animate.css') }}">
@endsection

@section('content')
	<div class="jumbotron">
		<div class="row staging">
			<div class="col-md-3 text-center hide animated">
				<span class="fa fa-hourglass-start"></span>
				<h4>Stage 1</h4>
				<h3>{{ number_format($coin->stage_1) }} <small>coin</small></h3>
			</div>
			<div class="col-md-3 text-center hide animated">
				<span class="fa fa-hourglass-half"></span>
				<h4>Stage 2</h4>
				<h3>{{ number_format($coin->stage_2) }} <small>coin</small></h3>
			</div>
			<div class="col-md-3 text-center hide animated">
				<span class="fa fa-hourglass-end"></span>
				<h4>Stage 3</h4>
				<h3>{{ number_format($coin->stage_3) }} <small>coin</small></h3>
			</div>
			<div class="col-md-3 text-center hide animated">
				<span class="fa fa-hourglass"></span>
				<h4>Total</h4>
				<h3>{{ number_format($coin->total) }}</h3>
			</div>
		</div>
	</div>
@endsection

@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		// navigation fixed top on scroll
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

		$(".staging .animated").each(function(i,el) {
		    var $this = $(this);
		    setTimeout(function() {
	            $this.addClass('tada').removeClass('hide');
	        }, i*500);
		});
	});
</script>
@endsection