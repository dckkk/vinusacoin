<?php 
	$coin = App\Wallet::where('user_email', Auth::user()->email)->first();
?>
<header class="main-header">
	<a href="/home" class="logo">
		<span class="logo-mini"><b>VNC</b></span>
		<span class="logo-lg"><b>VINUSACOIN</b></span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						{{-- <img src="{{ $images_user2 }}" class="user-image" alt="User Image"> --}}
						<span class="hidden-xs">{{ Auth::user()->name }}</span>
					</a>
					<ul class="dropdown-menu">
						{{--<li class="user-header">
							<img src="{{ $images_user2 }}" class="img-circle" alt="User Image">
							<span>Since {{  date("M d,Y", strtotime(Auth::user()->created_at)) }}</span>
							<p>
								{{ Auth::user()->name }} - Web Developer
								<small></small>
							</p> 
							<p>Since : {{ date("M d,Y", strtotime(Auth::user()->created_at)) }}</p>
							<ul>
								<li>My Wallet :  vns</li>
							</ul>
						</li> --}}
						<li class="user-body">
							<div class="row">
								<div class="col-xs-6">
									Since : <br>{{ date("M d,Y", strtotime(Auth::user()->created_at)) }}
								</div>
								<div class="col-xs-6">
									Wallet : <br>@if(empty($coin->total_coin)) 0 @else {{ $coin->total_coin }} @endif VNC
								</div>
							</div>
						</li>
						{{--
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<form action="{{ route('logout') }}" method="POST">
									{{ csrf_field() }}
									<button type="submit" class="btn btn-default btn-flat">@lang('Sign Out')</button>
								</form>
							</div>
						</li>
						--}}
					</ul>
				</li>
				<li>
					<a href="javascript:document.getElementById('logout').submit()" title="@lang('Sign Out')">
						@lang('Sign Out') <span class="fa fa-sign-out"></span>
					</a>
					<form action="{{ route('logout') }}"  id="logout" method="POST">
						{{ csrf_field() }}
					</form>
				</li>
				{{-- <li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li> --}}
			</ul>
		</div>
	</nav>
</header>
<aside class="main-sidebar">
	<section class="sidebar">
		{{-- <div class="user-panel">
			<div class="pull-left image">
				<img src="{{ $images_user2 }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ Auth::user()->name }}</p>
			</div>
		</div> --}}
		<ul class="sidebar-menu">
			{{-- <li class="header">MAIN NAVIGATION</li> --}}
			<li>
				<a href="/home">
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="/deposit">
					<i class="fa fa-credit-card"></i>
					<span>Deposit / Withdraw</span>
				</a>
			</li>
			<li>	
				<a href="/client-investment">
					<i class="fa fa-briefcase"></i>
					<span>Investment Plan</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-question"></i>
					<span>Support Center</span>
				</a>
			</li>
		</ul>
	</section>
</aside>