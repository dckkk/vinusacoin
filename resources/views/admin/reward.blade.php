@extends('admin/layout/layout')
@section('page_title', $page_title)

@section('content')
	<section class="content-header">
		<h1>
			Details Your Investment
		</h1>
		<ol class="breadcrumb">
			<li><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Reward</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="table-responsive">
				<table class="table table-bordered table-striped text-center">
					<tr>
						<th>Email</th>
						<th>Your Plan</th>
						<th>Reward Total per Month</th>
						<th>Contract Expired</th>
					</tr>
					
					<tr>
                        <td>{{$reward->user_email}}</td>
                        <td>{{$reward->paket_name}}</td>
                        <td>{{$reward->total_reward}}</td>
                        <td>{{$reward->expired_date}}</td>
                    </tr>
					
				</table>
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