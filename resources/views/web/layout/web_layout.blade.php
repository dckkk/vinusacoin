<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>VINUSA COIN - @yield('page_title')</title>
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
	@component('web/layout/header', ['page_title' => $page_title])
	@endcomponent

	<div class="container">
		@yield('content')
	</div>
	
	@component('web/layout/footer', ['page_title' => $page_title])
	@endcomponent
	{{-- lowlevel script script --}}
	@yield('javascript')
</body>
</html>