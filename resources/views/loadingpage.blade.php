<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="UTF-8">
	<title>VINUSA COIN - {{ $page_title }}</title>
	<link rel="shortcut icon" href="{{$header['logo']}}">
	{{-- high level css --}}
	@component('web/layout/css')
	@endcomponent
	{{-- highlevel javascript --}}
	@component('web/layout/javascript')
	@endcomponent
</head>
<body style="background: #fff url('/images/header_ornament.png') no-repeat 24% 0;">
	<div class="container">
		<div class="row" style="margin-top:8em;padding: 2em;border-radius: 1em;">
			<div class="col-xs-12 col-md-6 text-center">
				<img src="{{ $header['logo'] }}" alt="" class="img-responsive animated infinite bounce" style="margin:0 auto;">
			</div>
			<div class="col-xs-12 col-md-6" style="margin: 5em 0;color: #b49961;background: rgba(247, 244, 190, .5);padding: 1em;border-radius: 1em;border: 1px solid #b69b63;">
				<h1 style="margin:.2em 0;display: inline-block;">Currently Processing </h1>
				<h1 style="margin:.2em 0;display: inline-block;animation-duration:3s" class="animated infinite rollIn">. </h1>
				<h1 style="margin:.2em 0;display: inline-block;animation-duration:2.5s" class="animated infinite rollIn">. </h1>
				<h1 style="display: inline-block;animation-duration:2s" class="animated infinite rollIn">. </h1>
				<h4>Please wait a moment and dont close your browser</h4>
			</div>
		</div>
	</div>

</body>
</html>