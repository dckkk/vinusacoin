@extends('admin/layout/layout')
@section('page_title', $page_title)

@section('content')
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<i class="fa fa-bar-chart-o"></i>
						<h3 class="box-title">Interactive Area Chart</h3>
						<div class="box-tools pull-right"> Real time
						<div class="btn-group" id="realtime" data-toggle="btn-toggle">
							<button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>
							<button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
						</div>
						</div>
					</div>
					<div class="box-body">
						<div id="interactive" style="height: 300px;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>150</h3>

						<p>New Orders</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3>53<sup style="font-size: 20px">%</sup></h3>

						<p>Bounce Rate</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>44</h3>

						<p>User Registrations</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
						<h3>65</h3>

						<p>Unique Visitors</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<section class="col-lg-7 connectedSortable">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs pull-right">
						<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
						<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
						<li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
					</ul>
					<div class="tab-content no-padding">
						<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
						<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
					</div>
				</div>

				<div class="box box-success">
					<div class="box-header">
						<i class="fa fa-comments-o"></i>

						<h3 class="box-title">Chat</h3>

						<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
							<div class="btn-group" data-toggle="btn-toggle">
								<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
								</button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
							</div>
						</div>
					</div>
					<div class="box-body chat" id="chat-box">
						<div class="item">
							<img src="{{ $images_user4 }}" alt="user image" class="online">

							<p class="message">
								<a href="#" class="name">
									<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
									Mike Doe
								</a>
								I would like to meet you to discuss the latest news about
								the arrival of the new theme. They say it is going to be one the
								best themes on the market
							</p>
							<div class="attachment">
								<h4>Attachments:</h4>

								<p class="filename">
									Theme-thumbnail-image.jpg
								</p>

								<div class="pull-right">
									<button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
								</div>
							</div>
						</div>
						<div class="item">
							<img src="{{ $images_user3 }}" alt="user image" class="offline">

							<p class="message">
								<a href="#" class="name">
									<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
									Alexander Pierce
								</a>
								I would like to meet you to discuss the latest news about
								the arrival of the new theme. They say it is going to be one the
								best themes on the market
							</p>
						</div>
						<div class="item">
							<img src="{{ $images_user2 }}" alt="user image" class="offline">

							<p class="message">
								<a href="#" class="name">
									<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
									Susan Doe
								</a>
								I would like to meet you to discuss the latest news about
								the arrival of the new theme. They say it is going to be one the
								best themes on the market
							</p>
						</div>
					</div>
					<div class="box-footer">
						<div class="input-group">
							<input class="form-control" placeholder="Type message...">

							<div class="input-group-btn">
								<button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
							</div>
						</div>
					</div>
				</div>

				<div class="box box-primary">
					<div class="box-header">
						<i class="ion ion-clipboard"></i>

						<h3 class="box-title">To Do List</h3>

						<div class="box-tools pull-right">
							<ul class="pagination pagination-sm inline">
								<li><a href="#">&laquo;</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">&raquo;</a></li>
							</ul>
						</div>
					</div>
					<div class="box-body">
						<ul class="todo-list">
							<li>
								<span class="handle">
											<i class="fa fa-ellipsis-v"></i>
											<i class="fa fa-ellipsis-v"></i>
										</span>
								<input type="checkbox" value="">
								<span class="text">Design a nice theme</span>
								<small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
								<div class="tools">
									<i class="fa fa-edit"></i>
									<i class="fa fa-trash-o"></i>
								</div>
							</li>
							<li>
										<span class="handle">
											<i class="fa fa-ellipsis-v"></i>
											<i class="fa fa-ellipsis-v"></i>
										</span>
								<input type="checkbox" value="">
								<span class="text">Make the theme responsive</span>
								<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
								<div class="tools">
									<i class="fa fa-edit"></i>
									<i class="fa fa-trash-o"></i>
								</div>
							</li>
							<li>
										<span class="handle">
											<i class="fa fa-ellipsis-v"></i>
											<i class="fa fa-ellipsis-v"></i>
										</span>
								<input type="checkbox" value="">
								<span class="text">Let theme shine like a star</span>
								<small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
								<div class="tools">
									<i class="fa fa-edit"></i>
									<i class="fa fa-trash-o"></i>
								</div>
							</li>
							<li>
										<span class="handle">
											<i class="fa fa-ellipsis-v"></i>
											<i class="fa fa-ellipsis-v"></i>
										</span>
								<input type="checkbox" value="">
								<span class="text">Let theme shine like a star</span>
								<small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
								<div class="tools">
									<i class="fa fa-edit"></i>
									<i class="fa fa-trash-o"></i>
								</div>
							</li>
							<li>
										<span class="handle">
											<i class="fa fa-ellipsis-v"></i>
											<i class="fa fa-ellipsis-v"></i>
										</span>
								<input type="checkbox" value="">
								<span class="text">Check your messages and notifications</span>
								<small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
								<div class="tools">
									<i class="fa fa-edit"></i>
									<i class="fa fa-trash-o"></i>
								</div>
							</li>
							<li>
										<span class="handle">
											<i class="fa fa-ellipsis-v"></i>
											<i class="fa fa-ellipsis-v"></i>
										</span>
								<input type="checkbox" value="">
								<span class="text">Let theme shine like a star</span>
								<small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
								<div class="tools">
									<i class="fa fa-edit"></i>
									<i class="fa fa-trash-o"></i>
								</div>
							</li>
						</ul>
					</div>
					<div class="box-footer clearfix no-border">
						<button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
					</div>
				</div>

				<div class="box box-info">
					<div class="box-header">
						<i class="fa fa-envelope"></i>

						<h3 class="box-title">Quick Email</h3>
						<div class="pull-right box-tools">
							<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
											title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<form action="#" method="post">
							<div class="form-group">
								<input type="email" class="form-control" name="emailto" placeholder="Email to:">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" placeholder="Subject">
							</div>
							<div>
								<textarea class="textarea" placeholder="Message"
													style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							</div>
						</form>
					</div>
					<div class="box-footer clearfix">
						<button type="button" class="pull-right btn btn-default" id="sendEmail">Send
							<i class="fa fa-arrow-circle-right"></i></button>
					</div>
				</div>

			</section>
			<section class="col-lg-5 connectedSortable">

				<div class="box box-solid bg-light-blue-gradient">
					<div class="box-header">
						<div class="pull-right box-tools">
							<button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
											title="Date range">
								<i class="fa fa-calendar"></i></button>
							<button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
											data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
								<i class="fa fa-minus"></i></button>
						</div>

						<i class="fa fa-map-marker"></i>

						<h3 class="box-title">
							Visitors
						</h3>
					</div>
					<div class="box-body">
						<div id="world-map" style="height: 250px; width: 100%;"></div>
					</div>
					<div class="box-footer no-border">
						<div class="row">
							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
								<div id="sparkline-1"></div>
								<div class="knob-label">Visitors</div>
							</div>
							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
								<div id="sparkline-2"></div>
								<div class="knob-label">Online</div>
							</div>
							<div class="col-xs-4 text-center">
								<div id="sparkline-3"></div>
								<div class="knob-label">Exists</div>
							</div>
						</div>
					</div>
				</div>

				<div class="box box-solid bg-teal-gradient">
					<div class="box-header">
						<i class="fa fa-th"></i>

						<h3 class="box-title">Sales Graph</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body border-radius-none">
						<div class="chart" id="line-chart" style="height: 250px;"></div>
					</div>
					<div class="box-footer no-border">
						<div class="row">
							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
								<input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
											 data-fgColor="#39CCCC">

								<div class="knob-label">Mail-Orders</div>
							</div>
							<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
								<input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
											 data-fgColor="#39CCCC">

								<div class="knob-label">Online</div>
							</div>
							<div class="col-xs-4 text-center">
								<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
											 data-fgColor="#39CCCC">

								<div class="knob-label">In-Store</div>
							</div>
						</div>
					</div>
				</div>

				<div class="box box-solid bg-green-gradient">
					<div class="box-header">
						<i class="fa fa-calendar"></i>

						<h3 class="box-title">Calendar</h3>
						<div class="pull-right box-tools">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bars"></i></button>
								<ul class="dropdown-menu pull-right" role="menu">
									<li><a href="#">Add new event</a></li>
									<li><a href="#">Clear events</a></li>
									<li class="divider"></li>
									<li><a href="#">View calendar</a></li>
								</ul>
							</div>
							<button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body no-padding">
						<!--The calendar -->
						<div id="calendar" style="width: 100%"></div>
					</div>
					<div class="box-footer text-black">
						<div class="row">
							<div class="col-sm-6">
								<div class="clearfix">
									<span class="pull-left">Task #1</span>
									<small class="pull-right">90%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green" style="width: 90%;"></div>
								</div>

								<div class="clearfix">
									<span class="pull-left">Task #2</span>
									<small class="pull-right">70%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green" style="width: 70%;"></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="clearfix">
									<span class="pull-left">Task #3</span>
									<small class="pull-right">60%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green" style="width: 60%;"></div>
								</div>

								<div class="clearfix">
									<span class="pull-left">Task #4</span>
									<small class="pull-right">40%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green" style="width: 40%;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>
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