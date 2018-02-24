<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>AdminLTE 2 | @yield('page_title')</title>

		{{-- main style --}}
		{{-- adminLTE including --}}
		{{-- bootstrap --}}
		{{-- main css adminLTE --}}
		{{-- fontawesome --}}
		{{-- ionicons --}}
		<link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">

		@yield('css')
	</head>
	<body class="hold-transition skin-yellow-light sidebar-mini">
		<div class="wrapper">
			@component('admin/layout/header', $header)
			@endcomponent
			
      		<div class="content-wrapper">
				@yield('content')
			</div>

			@component('admin/layout/footer')
			@endcomponent
		</div>
		@component('admin/layout/javascript')
		@endcomponent

		@yield('javascript')
	</body>
</html>
