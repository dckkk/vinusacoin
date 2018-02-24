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

<div class="table-responsive">
	<table class="table table-bordered table-striped text-center">
		<tr>
			<th>No.</th>
			<th>Plan Name</th>
			<th>Terms</th>
			<th>Monthly Return Guaranteed</th>
			<th>Min. Spend</th>
			<th>Max. Spend</th>
			<th>Action</th>
		</tr>
		@foreach($plan as $key => $plans)
		<tr>
			<td>{{ $plans->id }}</td>
			<td>{{ $plans->name }}</td>
			<td>{{ $plans->contract }} Bulan</td>
			<td>{{ $plans->reward }}%</td>
			<td>{{ $plans->min_deposit }}</td>
			<td>{{ $plans->max_deposit }}</td>
			<td><a href="/register" class="btn btn-default">Register</a></td>
		</tr>
		@endforeach
	</table>
</div>

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