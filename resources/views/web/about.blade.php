@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')
	<h1>About Us</h1>
	@foreach(__('about_us') as $key => $content)
		{!! $content !!}
	@endforeach
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
