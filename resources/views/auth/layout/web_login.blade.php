<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>VINUSA COIN - @yield('page_title')</title>
	<link rel="shortcut icon" href="{{$header['logo']}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- high level css --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/libs/flag-icon-css.css') }}">
	<link rel="stylesheet" href="{{ asset('css/libs/animate.css') }}">
	{{-- low level css--}}
	@yield('css')
	{{-- highlevel javascript --}}
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>
<body>
	<div class="row login">
		<div class="col-xs-12 col-sm-8 col-sm-push-1 col-md-4 col-md-push-4">
			<div class="well animated bounceInDown" id="login-well">
				<div class="row top">
					<div class="col-xs-3 text-center back">
						<a href="javascript:void(0)" id="backlink">
							<span class="fa fa-chevron-left"></span> Website
						</a>
					</div>
					<div class="col-xs-6">
						<div class="logo text-center">
							<img src="{{$header['logo_text']}}" class="img img-responsive" alt="logo text">
						</div>
					</div>
					<div class="col-xs-3 lang text-center">
						@foreach (Config::get('languages') as $lang => $label)
							@php
								$lang_icon = ($lang=='en') ? 'gb' : $lang;
							@endphp
							@if($lang == App::getLocale())
								<b><span class="flag-icon flag-icon-{{$lang_icon}}"></span></b>
							@else
								<a href="/lang/{{ $lang }}"><span class="flag-icon flag-icon-{{$lang_icon}}"></span></a>
							@endif
							&nbsp;&nbsp;
						@endforeach
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-xs-push-3">
						<div class="logo text-center">
							<img src="{{$header['logo']}}" class="img img-responsive logo ld ld-flip-h" alt="logo">
						</div>
					</div>
				</div>
				@yield('content')
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#backlink').on('click', function(){
				$('#login-well').addClass('bounceOutUp');
				setTimeout(function() {
					window.location.href = '{{ URL::to('/') }}';
				}, 500);
			});
		});
	</script>
	@yield('javascript')
</body>
</html>