@extends('web/layout/web_layout')
@section('page_title', $page_title)

@section('css')
@endsection

@section('content')
<h1>About Us</h1>
<p>
	Vinusacoin adalah cryptocurrency, Vinusacoin misi dan visi untuk mempersatukan dunia melalui perdagangan cryptorrency, yang dapat anda percaya untuk mendapatkan keuntungan.
</p>
<p>
	Mengapa anda harus mempercayai Vinusacoin, karena Vinusacoin mempunyai nilai tersendiri tidak seperti cryptocurrency yang lain, yang hanya menentukan nilai ketika ICO, sejak awal Vinusacoin sudah mempunyai nilai jual yang baik yang dapat dipertanggungjawabkan.
</p>
<p>
	Harus kita fahami, bahwa perdagangan di cryptocurency mempunyai nilai resiko kerugian yang tinggi, namun juga mempunyai nilai keuntungan yang tinggi pula.
</p>
<p>
	Karena kenyataan ini, kami mulai mengembangkan sistem trading cryptocurency dengan tehnikal, karena cryptocurency modern yang bisa menghasilkan keuntungan lebih dengan risiko lebih kecil. Seperti kita ketahui bahwa dalam dunia trading kekuatan modal adalah yang utama, semakin modal kita maka akan semakin kita mendapatkan profit yang maksimal dan konsisten, Vinusacoin akan memberikan keuntungan yang konsisten.
</p>
<p>
	Vinusacoin mempunyai  platform lanjutan dengan tingkat keamanan yang tinggi. Platform ini mulai menyebar ke Asia Tenggara dan Eropa, sehingga memungkinkan siapapun untuk mengakses Layanan Pembiayaan, Investasi, dan Perdagangan Digital.
</p>
<p>
	Dengan bergabung dengan Vinusacoin , tidak hanya anggota yang dapat mengakses Layanan Pendanaan, Investasi, atau Perdagangan Digital kami; di kemudian hari seiring perjalanan dan perkembangan Vinusacoin akan memudahkan anda untuk betrtransasi online dalam dunia fintech.
</p>
<p>
	VINUSACOIN MEMUDAHKAN  ANDA  UNTUK MENDAPATKAN KEUNTUNGAN SEBELUM ICO DAN SESUDAH ICO DAN KAMI MEMBERIKAN RIIL BISNIS YANG MASUK AKAL SESUAI DENGAN KEMAMPUAN KAMI DALAM MENJALANKAN PERDAGANGAN CRYPTOCURENCY
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