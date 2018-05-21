@extends('admin/layout/layout')
@section('page_title', $page_title)

@section('content')
	<section class="content-header">
		<h1>
			Deposit
		</h1>
		<ol class="breadcrumb">
			<li><a href="/home"><i class="fa fa-credit-card"></i> Dashboard</a></li>
			<li class="active">Deposit</li>
		</ol>
	</section>

	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#deposit" aria-controls="home" role="tab" data-toggle="tab">Deposit</a></li>
								<li role="presentation"><a href="#withdraw" aria-controls="profile" role="tab" data-toggle="tab">Withdraw</a></li>
							</ul>
						</div>
						<div class="panel-body">
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="deposit">
									<form action="/api/deposit" class="form-horizontal" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="email" value="{{Auth::user()->email}}">
										<p style="color: red">Note: Minimum deposit = 6VNC</p>
										<div class="col-md-6">
											<div class="form-group">
												<div class="col-md-4"><label for="">Balance VNC: </label></div> 
												<div class="col-md-8 text-right">@if(empty($wallet->total_coin)) 0 @else {{$wallet->total_coin}} @endif VNC</div>
											</div>
											<div class="form-group">
												<div class="col-md-4"><label for="vnc_eth">Total Deposit VNC: </label></div> 
												<div class="col-md-8 text-right"><input type="text" name="total_coin" id="vnc_eth" class="form-control" onkeyup="checkVal(event, 'vnc_eth')" onblur="checkConvertDeposit('vnc_eth', this.value, {{$account->id}})"></div>
											</div>
											<div class="form-group">
												<div class="col-md-4"><label for="input-vnc_eth">Total ETH Needed: </label></div>
												<div class="col-md-8 text-right"> <input type="hidden" id="input-vnc_eth" name="total_eth"> <span id="res-vnc_eth"></span>  ETH</div>
											</div>
											<h5>Please Transfer the result to the VIP Account: <strong>0x03bcb38b99481bd120e36c03374ebb73ee766678</strong></h5>
											<p style="color: red">Note: Your deposit will be checked as success if you're has transfer as same as the result. We will check 1x24 hours</p>
											<div class="form-group text-right">
												<button type="submit" class="btn btn-primary btn-vnc_eth" disabled>
													Submit
												</button>
											</div>
										</div>
									</form>
								</div>
								<div role="tabpanel" class="tab-pane" id="withdraw">
									<form action="/api/withdraw/callback" class="form-horizontal" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="email" value="{{Auth::user()->email}}">
										<div class="col-md-6">
											<div class="form-group">
												<p style="color: red">Note: Minimum withdraw = 6VNC</p>
												<p class="warn-eth_vnc" style="display:none;color:red"></p>
												<div class="col-md-4"><label for="">Balance ETH: </label></div> 
												<div class="col-md-8 text-right">@if(empty($wallet->total_eth)) 0 @else {{$wallet->total_eth}} @endif ETH</div>
											</div>
											<div class="form-group">
												<div class="col-md-4"><label for="vnc_eth">Total Withdraw ETH: </label></div> 
												<div class="col-md-8 text-right"><input type="text" name="total_eth" id="eth_vnc" class="form-control" onkeyup="checkVal(event, 'eth_vnc', this.value, {{$wallet->total_eth}})" onblur="checkConvert('eth_vnc', this.value, {{$wallet->total_eth}})"></div>
											</div>
											<div class="form-group text-right">
												<button type="submit" class="btn btn-primary btn-eth_vnc" disabled>
													Withdraw
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection


@section('javascript')
	<script src="{{ asset('plugins/flot/jquery.flot.min.js') }}"></script>
	<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
	<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
	<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
	<script src="{{ asset('js/admin/dashboard.js') }}"></script>

	<script>
		$(document).ready(function(){
		    var data = [];
		    var totalPoints = 100;
		    function getRandomData() {
				if (data.length > 0) data = data.slice(1);
				// Do a random walk
				while (data.length < totalPoints) {
					var prev = data.length > 0 ? data[data.length - 1] : 50;
				    var y = prev + Math.random() * 10 - 5;
					if (y < 0) {
				  		y = 0;
					} else if (y > 100) {
				  		y = 100;
					}
					data.push(y);
				}
				// Zip the generated y values with the x values
				var res = [];
				for (var i = 0; i < data.length; ++i) {
					res.push([i, data[i]]);
				}
				return res;
		    }

		    var interactive_plot = $.plot("#interactive", [getRandomData()], {
				grid: {
					borderColor: "#f3f3f3",
					borderWidth: 1,
					tickColor: "#f3f3f3"
				},
				series: {
					shadowSize: 0, // Drawing is faster without shadows
					color: "#3c8dbc"
				},
				lines: {
					fill: true, //Converts the line chart to area chart
					color: "#3c8dbc"
				},
				yaxis: {
					min: 0,
					max: 100,
					show: true
				},
				xaxis: {
					show: true
				}
		    });

		    var updateInterval = 500; //Fetch data ever x milliseconds
		    var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
		    function update() {
				interactive_plot.setData([getRandomData()]);
				// Since the axes don't change, we don't need to call plot.setupGrid()
				interactive_plot.draw();
				if (realtime === "on") setTimeout(update, updateInterval);
		    }

		    //INITIALIZE REALTIME DATA FETCHING
		    if (realtime === "on") {
	      		update();
		    }

		    //REALTIME TOGGLE
		    $("#realtime .btn").click(function () {
				if ($(this).data("toggle") == "on") {
					realtime = "on";
				} else {
					realtime = "off";
				}
				update();
		    });
		});
	</script>
@endsection