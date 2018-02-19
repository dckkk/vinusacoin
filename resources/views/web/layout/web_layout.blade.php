<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>VINUSA COIN - @yield('page_title')</title>
	<link rel="shortcut icon" href="{{$header['logo']}}">
	{{-- high level css --}}
	@component('web/layout/css')
	@endcomponent
	{{-- low level css--}}
	@yield('css')
	{{-- highlevel javascript --}}
	@component('web/layout/javascript')
	@endcomponent

</head>
<body>
	@component('web/layout/header', $header)
	@endcomponent

	<div class="container">
		@yield('content')
	</div>
	
	@component('web/layout/footer', $footer)
	@endcomponent
	{{-- lowlevel script script --}}
	@yield('javascript')
</body>
</html>