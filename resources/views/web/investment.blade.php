@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')
<h1>A RELATIONSHIP ON YOUR TERMS.</h1>
<br>
<p class="font-18">
	Trade & Invest in Stocks, Currencies, Indices and Commodities (CFDs). Investing in the world's most popular financial markets has never been easier.
</p>

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