@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')
	<h1>About Us</h1>
	<p>
		Vinusacoin is a cryptocurrency, Vinusacoin mission and vision to unite the world through cryptorrency trading, which you can trust to gain profit.
	</p>
	<p>
		Why you should trust Vinusacoin, because Vinusacoin has its own value unlike the other cryptocurrency, which only determines the value when ICO, since the beginning of Vinusacoin already has good selling points that can be accounted for.
	</p>
	<p>
		We must understand that trading in cryptocurency has a high risk of loss, but also has a high profit value as well.
	</p>
	<p>
		Due to this fact, we began to develop the cryptocurency trading system technically, because modern cryptocurency can generate more profit with less risk. As we know that in the world of trading capital strength is the main, the more our capital will be the more we get the maximum profit and consistent, Vinusacoin will provide a consistent profit.
	</p>
	<p>
		Vinusacoin has an advanced platform with a high level of security. The platform is beginning to spread to Southeast Asia and Europe, enabling anyone to access the Digital Financing, Investment and Trade Service.
	</p>
	<p>
		By joining Vinusacoin, not only members may access our Digital Financing, Investment, or Commerce Services; in the future as Vinusacoin's journey and development will make it easier for you to betrtransasi online in the fintech world.
	</p>
	<p>
		VINUSACOIN EASILES YOU TO GET THE BENEFITS BEFORE ICO AND AFTER ICO AND WE PROVIDE REAL BUSINESS ISSUES ACCORDING TO OUR ABILITY IN TRYING CRYPTOCURENCY TRADING
	</p>
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