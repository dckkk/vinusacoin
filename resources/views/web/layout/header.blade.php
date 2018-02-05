@php
	$menu = [
		"/"=>"Home",
		"#about"=>"About Us",
		"#contact"=>"Contact Us"
	];
@endphp

<header>
	<div class="container">
		<div class="row logo">
			<div class="col-md-4 col-sm-8 col-xs-12">
				<img src="/img/logo.png" alt="logo icon" class="logo logo-icon ld ld-flip-h">
				<img src="/img/logo-text.png" alt="logo text" class="logo-text">
			</div>
		</div>
	</div>
	<nav id="global-nav" class="navbar navigation">
		<div class="container">
			<img src="/img/logo.png" alt="logo icon" class="logo logo-icon ld ld-flip-h">
			<ul class="nav navbar-nav">
				@foreach ($menu as $link => $menu)
					<li @if($menu==$page_title) class="active" @endif>
						<a href="{{$link}}">@lang($menu)</a>
					</li>
				@endforeach
		    </ul>
			<a href="#" class="btn btn-default">
				CREATE ACCOUNT
			</a>
		</div>
	</nav>
</header>