@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')
	<div class="row contactus">
		<div class="col-md-4">
			<h3 class="text-center">Help Center</h3>
			<ul class="list-group">
				<li class="list-group-item">
					<span class="fa fa-envelope-o"></span> <b>Email</b>
					<span class="pull-right">support@vinusacoin.co.uk</span>
				</li>
			</ul>
		</div>
		<div class="col-md-8">
			<h3 class="text-center">Send a Message</h3>
			<form action="/send/email" method="POST">
                {{ csrf_field() }}
				<div class="row">
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input name="name" placeholder="@lang('Your Name')" type="text" class="form-control">
						</div>
					</div>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
							<input name="email" placeholder="@lang('Your Email Address')" type="text" class="form-control">
						</div>
					</div>
					<div class="col-md-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
							<input name="subject" placeholder="@lang('Subject')" type="text" class="form-control">
						</div>
					</div>
					<div class="col-md-12">
						<textarea name="message" class="form-control" placeholder="@lang('Your Message')"></textarea>
					</div>
					<div class="col-md-12 text-right">
							<button class="btn btn-default">
								Send Email
							</button>
					</div>
				</div>
			</form>
		</div>
	</div>
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