<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>VINUSA COIN - @yield('page_title')</title>
	<link rel="shortcut icon" href="{{$header['logo']}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- high level css --}}
	@component('auth/layout/css')
	@endcomponent
	{{-- low level css--}}
	@yield('css')
	{{-- highlevel javascript --}}
	@component('auth/layout/javascript')
	@endcomponent

</head>
<body>	
	<div class="wrapper login">
		<div class="col-xs-12 col-sm-8 col-sm-push-1 col-md-4 col-md-push-4">
			<div class="well animated bounceInDown">
				<div class="row">
					<div class="col-xs-6 col-xs-push-3">
						<div class="logo text-center">
							<img src="{{$header['logo']}}" class="img img-responsive logo ld ld-flip-h" alt="">
						</div>
						<div class="logo text-center">
							<img src="{{$header['logo_text']}}" class="img img-responsive" alt="">
						</div>
					</div>
				</div>
				@yield('content')
			</div>
		</div>
	</div>
	@yield('javascript')
</body>
</html>