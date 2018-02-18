<header>
	<div class="container">
		<div class="row logo">
			<div class="col-md-4 col-sm-8 col-xs-12">
				<img src="{{ $logo }}" alt="logo icon" class="logo logo-icon ld">
				<img src="{{ $logo_text }}" alt="logo text" class="logo-text">
			</div>
			<div class="col-md-8 col-sm-4 col-xs-12 lang">
				@foreach (Config::get('languages') as $lang => $label)
					@php
						$lang_icon = ($lang=='en') ? 'gb' : $lang;
					@endphp
					@if($lang == App::getLocale())
						<b><span class="flag-icon flag-icon-{{$lang_icon}}"></span> {{ $label }}</b>
					@else
						<a href="/lang/{{ $lang }}"><span class="flag-icon flag-icon-{{$lang_icon}}"></span> {{ $label }}</a>
					@endif
					&nbsp;&nbsp;
				@endforeach
			</div>
		</div>
	</div>
	<nav id="global-nav" class="navbar navigation">
		<div class="container">
			<img src="/images/logo.png" alt="logo icon" class="logo logo-icon ld">
			<ul class="nav navbar-nav">
				@foreach ($menu as $link => $menu)
					<li @if($menu==$page_title) class="active" @endif>
						<a href="{{$link}}">@lang($menu)</a>
					</li>
				@endforeach
		    </ul>
			<a href="/login" class="btn btn-default">
				@lang('create account')
			</a>
		</div>
	</nav>
</header>