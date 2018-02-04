@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')
<h1>content</h1>
<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pretium eros pharetra magna semper, nec mattis sapien dapibus. Nunc ut luctus purus. Sed lacinia lorem eget justo ultrices fringilla. Cras quis est augue. Cras faucibus leo ut magna maximus maximus. Maecenas feugiat pharetra nulla, ut volutpat arcu. Vivamus tempus erat mi, sit amet tincidunt massa ornare sit amet.

	Sed eget nunc ac lorem viverra egestas. Mauris sed tempus nisl, at ornare nulla. Duis in tempor nisi. Sed a lacus nec felis semper vestibulum. Aenean ex magna, varius elementum erat ac, aliquam consectetur est. Sed aliquam placerat quam, at hendrerit erat accumsan et. Etiam lorem urna, bibendum iaculis diam in, tincidunt rhoncus tortor. Mauris fringilla luctus ligula, ut cursus eros laoreet sit amet.

	Donec volutpat quam blandit lectus sollicitudin placerat. Maecenas rutrum nunc sed facilisis eleifend. Maecenas nisi diam, blandit a elit vitae, pulvinar porta sapien. Etiam malesuada luctus ex non tempor. Mauris sollicitudin tellus vel tortor convallis, eu vulputate ligula posuere. Duis ac tempus libero, vitae tristique dui. Nullam volutpat lacus vel velit tincidunt commodo ac ornare velit. Nulla ut ex a metus porttitor laoreet. In dolor augue, fringilla et rhoncus et, facilisis et tortor. Ut velit eros, tempor sed nisi non, vehicula tristique velit. Praesent eu laoreet neque. Morbi eget tellus quis metus iaculis tincidunt et eget erat. Nunc quis orci urna.

	Phasellus elit sem, ornare et ullamcorper sit amet, pharetra vitae dui. Quisque est turpis, rutrum vel fringilla lobortis, vehicula id mauris. Etiam ultrices quis ipsum eu convallis. Phasellus et leo posuere purus porta semper. Praesent vulputate rutrum risus in tincidunt. In bibendum mi eu ex aliquet rhoncus. Nullam at vehicula lorem. Nunc turpis eros, pharetra eu accumsan vel, fermentum sit amet nibh. Curabitur arcu arcu, varius nec euismod a, blandit eget ligula.

	Suspendisse sed ante ac arcu congue rutrum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse posuere, arcu accumsan tempus eleifend, mi urna bibendum mauris, sit amet gravida nunc tortor eget ex. Sed sed nisi quis tellus rhoncus eleifend. Duis in aliquam nisi, et varius dolor. Vivamus eget accumsan libero, sit amet ornare magna. Nunc condimentum arcu sit amet tempor faucibus. Donec scelerisque, nisl id ultrices laoreet, nisl velit sollicitudin nulla, a ultricies ipsum est vitae orci. Morbi sodales lorem ut bibendum molestie. Cras vehicula congue fringilla. Nulla sagittis euismod ante, eget dictum metus auctor vitae. 
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