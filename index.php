<?php
	include('layout/header.php');

	if(empty($_SESSION['account'])){
		 	header('Location: login.php');
	} else{
		if(!isset($_SESSION['lock'])){
			header('Location: lock-screen.php');
		} else{

		
?>
<body class="tooltips">
<?php 
	
include('layout/narbar.php');
include('layout/sidebar.php');

?>
<title>Trang chủ | Cổng thông tin kế hoạch Viettronics </title>
<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">
				<div class="container-fluid">
				
				<!-- Begin page heading -->
				<h1 class="page-heading">DASHBOARD <small>Sub heading here</small></h1>
				<!-- End page heading -->				
					<!-- BEGIN SiTE INFORMATIONS -->
					<div class="row">
						<div class="col-sm-3">
							<div class="the-box no-border bg-success tiles-information">
								<i class="fa fa-users icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY VISITORS</p>
									<h1 class="bolded">12,254K</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-success -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Better than yesterday ( 7,5% )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-primary tiles-information">
								<i class="fa fa-shopping-cart icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY SALES</p>
									<h1 class="bolded">521</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-primary -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Better than yesterday ( 10,5% )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-danger tiles-information">
								<i class="fa fa-comments icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY FEEDBACK</p>
									<h1 class="bolded">124</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-danger -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Less than yesterday ( <span class="text-danger">-7,5%</span> )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-warning tiles-information">
								<i class="fa fa-money icon-bg"></i>
								<div class="tiles-inner text-center">
									<p>TODAY EARNINGS</p>
									<h1 class="bolded">10,241</h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-warning -->
									</div><!-- /.progress .no-rounded -->
									<p><small>Better than yesterday ( 2,5% )</small></p>
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
					</div><!-- /.row -->
					<!-- END SITE INFORMATIONS -->
				
					
					<div class="row">
						<div class="col-lg-8">
							
							<!-- BEGIN CHART WIDGET 1 -->
							<div class="panel panel-info panel-no-border panel-square">
							  <div class="panel-heading">
								<div class="right-content">
									<div class="btn-group">
										<button class="btn btn-info btn-sm active">
										Lifetime
										</button>
										<button class="btn btn-info btn-sm">
										This year
										</button>
									</div>
								</div>
								<h3 class="panel-title">EARNINGS AND SALES CHART</h3>
							  </div><!-- /.panel-heading -->
								<div class="the-box no-border full no-margin">
									<div class="the-box no-border bg-info no-margin full">
										<div id="morris-widget-1" style="height: 250px;"></div>
									</div><!-- the-box no-border bg-info no-margin full -->
									<div class="the-box no-border bg-dark no-margin chart-des">
										<div class="row">
											<div class="col-xs-7">
												<h3 class="bolded">LAST YEAR</h3>
												<p>Today May 20 2014</p>
											</div><!-- /.col-xs-7 -->
											<div class="col-xs-5 text-right">
												<h3 class="bolded text-success">+805.00</h3>
												<p>-10,1(11%)</p>
											</div><!-- /.col-xs-5 -->
										</div><!-- /.row -->
									</div><!-- the-box no-border bg-dark no-margin -->
									<div class="the-box no-border no-margin">
										<div class="row">
											<div class="col-xs-7">
												<h1 class="bolded">50,024K</h1>
												<p class="text-muted">Lifetime earnings</p>
											</div><!-- /.col-xs-5 -->
											<div class="col-xs-5">
												<div id="morris-widget-2" style="height: 120px;"></div>
											</div><!-- /.col-xs-5 -->
										</div><!-- /.row -->
									</div><!-- the-box no-border no-margin -->
								</div><!-- /.the-box no-border .full -->
							</div><!-- /.the-box no-border .full -->
							<!-- END CHART WIDGET 1 -->
							
							<hr />
							<div class="row">
								<div class="col-sm-6">
									<!-- BEGIN PROPERTY CARD -->
									<div class="panel panel-danger panel-square panel-no-border task-list-wrap">
									  <div class="panel-heading lg text-center">
										<h3 class="panel-title">SPECIAL OFFERS</h3>
									  </div>
										<div class="the-box full no-border property-card">
											<div id="property-slide-8" class="owl-carousel">
											  <div class="item full"><img src="assets/img/photo/small/img-15.jpg" alt="Image"></div>
											  <div class="item full"><img src="assets/img/photo/small/img-16.jpg" alt="Image"></div>
											  <div class="item full"><img src="assets/img/photo/small/img-17.jpg" alt="Image"></div>
											</div>
											<div class="the-box no-margin no-border bg-warning">
												<div class="row">
													<div class="col-xs-3">
														<p class="property-type-circle bg-danger">RENT</p>
													</div><!-- /.col-xs-3 -->
													<div class="col-xs-9">
														<h1>&#36;750/Wk</h1>
														<p>Bond : &#36;3,000</p>
													</div><!-- /.col-xs-9 -->
												</div><!-- /.row -->
											</div><!-- /.the-box .no-margin .no-border .bg-warning -->
											<div class="the-box no-margin no-border">
												<p class="property-detail-wrap">
													<span class="item-detail"><i class="fa fa-inbox"></i> 2 bedroom</span>
													<span class="item-detail"><i class="fa fa-male"></i> 2 bathroom</span>
												</p>
												<p class="has-margin text-center">
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
													<i class="fa fa-star text-warning"></i>
												</p>
												<div class="row">
													<div class="col-xs-6">
														<button class="btn btn-danger btn-block">Favorite</button>
													</div><!-- /.col-xs-6 -->
													<div class="col-xs-6">
														<button class="btn btn-success btn-block">Apply rent</button>
													</div><!-- /.col-xs-6 -->
												</div><!-- /.row -->
											</div><!-- /.the-box .no-margin .no-border .bg-warning -->
										</div><!-- /.the-box no-margin -->
									</div><!-- /.panel panel-danger panel-no-border panel-square task-list-wrap -->
									<!-- END PROPERTY CARD -->
								</div><!-- /.col-sm-6 -->
								<div class="col-sm-6">
									<!-- BEGIN TASK LIST -->
									<div class="panel panel-success panel-square panel-no-border task-list-wrap">
									  <div class="panel-heading lg">
										<h3 class="panel-title"><i class="fa fa-check-square-o"></i> Your current tasks</h3>
									  </div>
										<ul class="list-group">
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-1">
													<label for="task-1">Eating woods</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-2" checked />
													<label for="task-2">Washing my pets</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-3" checked />
													<label for="task-3">Uploading selfie photos</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-4" checked />
													<label for="task-4">Downloading movie</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-5">
													<label for="task-5">Updating my <i>alay</i> status</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-6" checked />
													<label for="task-6">Hunting cabe-cabean</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-7">
													<label for="task-7">Creating web template</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-8" checked />
													<label for="task-8">Walking to Malioboro</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-9" checked />
													<label for="task-9">Listening Alay songs</label>
											</div><!-- /.checkbox -->
										  </li>
										  <li class="list-group-item">
											<div class="checkbox">
													<input type="checkbox" id="task-10" />
													<label for="task-10">Being an elite author</label>
											</div><!-- /.checkbox -->
										  </li>
										</ul>
									  <div class="panel-footer">
										<p><button class="btn btn-danger btn-perspective btn-block">See all tasks</button></p>
									  </div>
									</div><!-- /.panel panel-success -->
									<!-- END TASK LIST -->
								</div><!-- /.col-sm-6 -->
							</div><!-- /.row -->
							
						</div><!-- /.col-sm-8 -->
						<div class="col-lg-4">
						
							<!-- BEGIN WEATHER WIDGET 3 -->
							<div class="the-box no-border" id="weather-widget-1">
								<h4 class="text-center bolded white-text">YOGYAKARTA, ID</h4>
								<p class="text-center white-text">TONIGHT</p>
								<div class="weather-widget">
									<div class="row">
										<div class="col-xs-6 text-center">
											<canvas id="sleet" width="140" height="140"></canvas>
										</div><!-- /.col-xs-6 -->
										<div class="col-xs-6">
											<h1 class="bolded degrees white-text">28<i class="wi-degrees"></i></h1>
											<p class="white-text">Will rain at night</p>
										</div><!-- /.col-xs-6 -->
									</div><!-- /.row -->
								</div><!-- /.weather-widget -->
								<div class="row">
									<div class="col-xs-4 text-center">
									<h4 class="white-text">SAT</h4>
									<canvas id="clear-night" width="50" height="50"></canvas>
									<h4 class="bolded white-text">27<i class="wi-degrees"></i></h4>
									</div><!-- /.col-xs-4 -->
									<div class="col-xs-4 text-center">
									<h4 class="white-text">SUN</h4>
									<canvas id="fog" width="50" height="50"></canvas>
									<h4 class="bolded white-text">26<i class="wi-degrees"></i></h4>
									</div><!-- /.col-xs-4 -->
									<div class="col-xs-4 text-center">
									<h4 class="white-text">MON</h4>
									<canvas id="snow" width="50" height="50"></canvas>
									<h4 class="bolded white-text">15<i class="wi-degrees"></i></h4>
									</div><!-- /.col-xs-4 -->
								</div><!-- /.row -->
							</div><!-- /.the-box bg-info no-border -->
							<!-- END WEATHER WIDGET 2 -->
							
							<!-- BEGIN SOCIAL TILES -->
							<div class="row">
								<div class="col-xs-6">
									<div class="tiles facebook-tile text-center">
										<i class="fa fa-facebook icon-lg-size"></i>
										<h4><a href="#fakelink">10K likes</a></h4>
									</div><!-- /.tiles .facebook-tile -->
								</div><!-- /.col-xs-6 -->
								<div class="col-xs-6">
									<div class="tiles twitter-tile text-center">
										<i class="fa fa-twitter icon-lg-size"></i>
										<h4><a href="#fakelink">2K followers</a></h4>
									</div><!-- /.tiles .twitter-tile -->
								</div><!-- /.col-xs-6 -->
								<div class="col-xs-6">
									<div class="tiles dribbble-tile text-center">
										<i class="fa fa-dribbble icon-lg-size"></i>
										<h4><a href="#fakelink">1K followers</a></h4>
									</div><!-- /.tiles .dribbble-tile -->
								</div><!-- /.col-xs-6 -->
								<div class="col-xs-6">
									<div class="tiles linkedin-tile text-center">
										<i class="fa fa-linkedin icon-lg-size"></i>
										<h4><a href="#fakelink">1K followers</a></h4>
									</div><!-- /.tiles .dribbble-tile -->
								</div><!-- /.col-xs-6 -->
							</div><!-- /.row -->
							<!-- END SOCIAL TILES -->
							
							
							<h4 class="small-title"><strong><i class="fa fa-users"></i> FRIEND REQUESTS</strong></h4>
							
							<!-- BEGIN USER CARD LONG -->
							<div class="the-box bg-success no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-9.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">Mya Weastell</h4>
									<p class="text-success">@myaweastell</p>
								  </div>
								  <div class="right-button">
									<button data-toggle="tooltip" title="Accepted" class="btn btn-success active"><i class="fa fa-check"></i></button>
								  </div><!-- /.right-button -->
								</div>
							</div><!-- /.the-box .no-border -->
							<!-- BEGIN USER CARD LONG -->
							
							<!-- BEGIN USER CARD LONG -->
							<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">Elizabeth Owens</h4>
									<p class="text-info">@elizabethowens</p>
								  </div>
								  <form>
								  <div class="right-button">
									<button type="submit" data-toggle="tooltip" title="Accept" class="btn btn-info"><i class="fa fa-check"></i></button>
								  </div><!-- /.right-button -->
								  </form>
								</div>
							</div><!-- /.the-box .no-border -->
							<!-- BEGIN USER CARD LONG -->
									
							<!-- BEGIN USER CARD LONG -->
							<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-6.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">Harold Chavez</h4>
									<p class="text-info">@haroldchaves</p>
								  </div>
								  <div class="right-button">
									<button data-toggle="tooltip" title="Accept" class="btn btn-info"><i class="fa fa-check"></i></button>
								  </div><!-- /.right-button -->
								</div>
							</div><!-- /.the-box .no-border -->
							<!-- BEGIN USER CARD LONG -->
							
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->
					
					
					<div class="row">
						<div class="col-lg-4 col-md-12">
							
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-12">
									
									<!-- BEGIN HEADLINE NEWS TILES -->
									<div class="the-box bg-warning no-border full">
										<div id="tiles-slide-2" class="owl-carousel tiles-carousel">
										  <div class="item full">
											<img src="assets/img/avatar/avatar-1.jpg" class="avatar img-circle has-white-shadow" alt="avatar">
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome headline news title</a></h4>
												<p class="small">02 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
											<img src="assets/img/photo/medium/img-14.jpg" alt="Image">
										  </div><!-- /.item full -->
										  <div class="item full">
											<img src="assets/img/avatar/avatar-2.jpg" class="avatar img-circle has-white-shadow" alt="avatar">
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome headline news title</a></h4>
												<p class="small">01 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
											<img src="assets/img/photo/medium/img-12.jpg" alt="Image">
										  </div><!-- /.item full -->
										  <div class="item full">
											<img src="assets/img/avatar/avatar-3.jpg" class="avatar img-circle has-white-shadow" alt="avatar">
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome headline news title</a></h4>
												<p class="small">29 APRIL, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
											<img src="assets/img/photo/medium/img-13.jpg" alt="Image">
										  </div><!-- /.item full -->
										</div><!-- /#tiles-slide-2 -->
									</div><!-- /.the-box no-border full -->
									<!-- END HEADLINE NEWS TILES -->
									
								</div><!-- /.col-sm-6 col-md-12 -->
								<div class="col-sm-6 col-md-6 col-lg-12">
									
									<!-- BEGIN HEADLINE NEWS TILES -->
									<div class="the-box no-border bg-info full">
										<div id="tiles-slide-3" class="owl-carousel tiles-carousel-color">
										  <div class="item full">
											<div class="avatar-wrap">
												<div class="media">
												  <a class="pull-left" href="#fakelink">
													<img src="assets/img/avatar/avatar-1.jpg" class="avatar img-circle has-white-shadow media-object" alt="avatar">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading">@parishawker</h4>
												  </div><!-- /.media-body -->
												</div><!-- /.media -->
											</div><!-- /.avatar-wrap -->
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome life story title</a></h4>
												<p class="small">02 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
												<button class="btn btn-info btn-sm">Read more</button>
											</div>
										  </div><!-- /.item full -->
										  <div class="item full">
											<div class="avatar-wrap">
												<div class="media">
												  <a class="pull-left" href="#fakelink">
													<img src="assets/img/avatar/avatar-2.jpg" class="avatar img-circle has-white-shadow media-object" alt="avatar">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading">@thomaswhite</h4>
												  </div><!-- /.media-body -->
												</div><!-- /.media -->
											</div><!-- /.avatar-wrap -->
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome life story title</a></h4>
												<p class="small">01 MAY, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
												<button class="btn btn-info btn-sm">Read more</button>
											</div>
										  </div><!-- /.item full -->
										  <div class="item full">
											<div class="avatar-wrap">
												<div class="media">
												  <a class="pull-left" href="#fakelink">
													<img src="assets/img/avatar/avatar-3.jpg" class="avatar img-circle has-white-shadow media-object" alt="avatar">
												  </a>
												  <div class="media-body">
													<h4 class="media-heading">@doinaslaivici</h4>
												  </div><!-- /.media-body -->
												</div><!-- /.media -->
											</div><!-- /.avatar-wrap -->
											<div class="des">
												<h4 class="bolded"><a href="#fakelink">Awesome life story title</a></h4>
												<p class="small">29 APRIL, 2014</p>
												<p class="small">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
												<button class="btn btn-info btn-sm">Read more</button>
											</div>
										  </div><!-- /.item full -->
										</div><!-- /#tiles-slide-2 -->
									</div><!-- /.the-box no-border full -->
									<!-- END HEADLINE NEWS TILES -->
									
								</div><!-- /.col-sm-6 col-md-12 -->
							</div><!-- /.row -->
						</div><!-- /.col-lg-4 col-md-12 -->
						
						<div class="col-lg-8 col-md-12">
						
							<!-- BEGIN SERVER STATUS WIDGET -->
							<div class="panel panel-success panel-square panel-no-border">
							  <div class="panel-heading lg">
								<div class="right-content">
									<button class="btn btn-success to-collapse" data-toggle="collapse" data-target="#panel-chart-widget-1"><i class="fa fa-chevron-up"></i></button>
								</div>
								<h3 class="panel-title"><strong>YOUR SERVER STATUS</strong></h3>
							  </div>
								<div id="panel-chart-widget-1" class="collapse in">
									<div class="the-box no-border full bg-success no-margin">
										<div id="realtime-chart-widget">
											<div id="realtime-chart-container-widget"></div>
										</div><!-- /.realtime-chart -->
									</div><!-- /.the-box .no-border -->
									<div class="the-box no-border">
										<div class="row">
											<div class="col-sm-6">
												<div class="row">
													<div class="col-xs-6 text-center">
														<h4 class="small-heading">Kernel memory</h4>
														<span class="chart chart-widget-pie widget-easy-pie-1" data-percent="45">
															<span class="percent"></span>
														</span>
													</div><!-- /.col-xs-6 -->
													<div class="col-xs-6 text-center">
														<h4 class="small-heading">Physical memory</h4>
														<span class="chart chart-widget-pie widget-easy-pie-2" data-percent="85">
															<span class="percent"></span>
														</span>
													</div><!-- /.col-xs-6 -->
												</div><!-- /.row -->
												<hr />
												<button class="btn btn-block btn-danger"><i class="fa fa-cogs"></i> Resource monitor</button>
											</div><!-- /.col-sm-6 -->
											<div class="col-sm-6">
												<h4 class="small-heading">System status</h4>
												<p class="small">Handles - <span class="text-danger">80%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												  </div><!-- /.progress-bar .progress-bar-danger -->
												</div><!-- /.progress .no-rounded -->
												<p class="small">Threads - <span class="text-warning">65%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
												  </div><!-- /.progress-bar .progress-bar-warning -->
												</div><!-- /.progress .no-rounded -->
												<p class="small">Proccess - <span class="text-success">40%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
												  </div><!-- /.progress-bar .progress-bar-success -->
												</div><!-- /.progress .no-rounded -->
												<p class="small">Cached - <span class="text-info">70%</span></p>
												<div class="progress no-rounded progress-xs">
												  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
												  </div><!-- /.progress-bar .progress-bar-info -->
												</div><!-- /.progress .no-rounded -->
											</div><!-- /.col-sm-6 -->
										</div><!-- /.row -->
									</div><!-- /.the-box .no-border -->
								</div><!-- /#panel-chart-widget-1 -->
							</div><!-- /.the-box .no-border -->
							<!-- END SERVER STATUS WIDGET -->
						</div>
					</div><!-- /.row -->
					
					
					
					
<?php

include('layout/footer.php');
	}
}
?>
