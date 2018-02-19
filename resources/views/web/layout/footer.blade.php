<footer>
	<div class="wrapper">
		<div class="container footer-menu">
			<div class="col-sm-12 col-md-3">
				<ul class="list-group">
					@foreach ($menu as $link => $menu)
						<li class="bottom-link">
							<a href="{{$link}}">@lang($menu)</a>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="col-sm-12 col-md-9 pull-right">
				<div class="row text-right social-media">
					<div class="col xs 12">
						<a href="#"><img src="/images/icon/facebook.svg" alt="facebook"></a>
						<a href="#"><img src="/images/icon/instagram.svg" alt="instagram"></a>
						<a href="#"><img src="/images/icon/twitter.svg" alt="twitter"></a>
						<a href="#"><img src="/images/icon/youtube.svg" alt="youtube"></a>
					</div>
				</div>
				<div class="row mobile-apps pull-right">
					<div class="text-right col-xs-12 col-md-6 nopadding">
						<a href="#"><img class="img img-responsive" src="/images/icon/download_apple.png" alt=""></a>
					</div>
					<div class="text-right col-xs-12 col-md-6 nopadding">
						<a href="#"><img class="img img-responsive" src="/images/icon/download_google.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
		<div class="container footer-copy">
			<p class="copyright">
				<span>Copyright ©{{ date('Y') }} Vinusa Coin. All Rights Reserved.</span>
			</p>
			<hr>
		</div>
	</div>
</footer>
