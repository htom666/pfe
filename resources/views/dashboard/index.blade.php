@extends('layout.main')
@section('content')
<div class="page-content">
             								
						<div class="row mt-n24">

							<div class="col-md-12">

								<!-- Chart With Gaps In Data -->
								<div class="panel panel-light">
									<div class="panel-header">
										<h1 class="panel-title">Chart With Gaps In Data</h1>
									</div>
									<div class="panel-body">

										<div id="area-1" style="height: 400px; "></div>

									</div>
								</div><!-- / Chart With Gaps In Data -->

							</div><!-- .col-md-12 -->

							<div class="col-md-6">
	
								<div class="widget-media-2 mt-24" style="min-height: 228px;">

									<div class="widget-img">
										<img src="../../assets/svg/undraw/undraw_data_trends_b0wg.svg" class="img-fluid">
									</div>
									<div class="widget-body">
										<h5 class="widget-title">Welcome to the dashboard area!</h5>
										<p>
											Start by adding an invoice !
										</p>
										<a href="{{route('facture.create')}}" class="btn btn-has-icon btn-primary">
											<span>Create invoice</span>
											<span class="icon"><i class="fas fa-arrow-right"></i></span>
                    </a>
									</div>

								</div>

								<div class="widget-media-2 bg-primary mt-24" style="min-height: 228px; background-color: #31315d; background-image: linear-gradient(to left, #3c3c7a, #272742); ">

									<div class="widget-img">
										<img src="../../assets/svg/undraw/undraw_instant_support_elxh-light.svg" class="img-fluid">
									</div>
									<div class="widget-body">
										<h5 class="widget-title">Instant Support Is Available</h5>
										<p class="text-light">
											Lorem ipsum dolor sit amet consectetur adipisicing elit.
											Quasi maiores suscipit commodi amet facilis.
										</p>
										<button type="button" class="btn btn-has-icon btn-icon-split btn-light text-primary">
											<span class="icon"><i class="fas fa-envelope"></i></span>
											<span>Contact Us</span>
										</button>
									</div>

								</div>

							</div>

							<div class="col-md-6">

								<!-- Appointments -->
								<div class="panel panel-light">
									<div class="panel-header">
										<h3 class="panel-title">Appointments</h3>
										<div class="panel-toolbar">
											<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
												<button type="button" class="btn btn-sm btn-success-lightened">ADD</button>
											</div>
										</div>
									</div>
									<div class="panel-body pl-2 py-2 pr-1">

										<table class="table table-responsive table-appointments mb-0">
											<tbody>
												<tr>
													<td>
														<span class="badge date-badge badge-info-light"><strong>Fri</strong><br>12</span>
													</td>
													<td>
														<h6 class="project-title">Portrait Studio Project</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<h6 class="client-name" data-toggle="tooltip" title="Gold Level Client">
															<i class="fas fa-crown text-warning mr-1"></i>
															Norval Sauer</h6>
													</td>
													<td>
														<p class="time"><i class="far fa-clock"></i> 12:00 - 13:00</p>
													</td>
												</tr>
												<tr>
													<td>
														<span class="badge date-badge badge-warning-light"><strong>Sat</strong><br>9</span>
													</td>
													<td>
														<h6 class="project-title">PHP CRM</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<h6 class="client-name" data-toggle="tooltip" title="Level 1 Client">
															<i class="fas fa-crown text-secondary mr-1"></i>
															Janie Windler</h6>
													</td>
													<td>
														<p class="time"><i class="far fa-clock"></i> 12:00 - 13:00</p>
													</td>
												</tr>
												<tr>
													<td>
														<span class="badge date-badge badge-success-light"><strong>Wed</strong><br>4</span>
													</td>
													<td>
														<h6 class="project-title">Laravel SM</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<h6 class="client-name" data-toggle="tooltip" title="Gold Level Client">
															<i class="fas fa-crown text-warning mr-1"></i>
															Roger aniston</h6>
													</td>
													<td>
														<p class="time"><i class="far fa-clock"></i> 12:00 - 13:00</p>
													</td>
												</tr>
												<tr>
													<td>
														<span class="badge date-badge badge-primary-light"><strong>Sun</strong><br>29</span>
													</td>
													<td>
														<h6 class="project-title">ReactNative App</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<h6 class="client-name" data-toggle="tooltip" title="Level 1 Client">
															<i class="fas fa-crown text-secondary mr-1"></i>
															Thea Reichert</h6>
													</td>
													<td>
														<p class="time"><i class="far fa-clock"></i> 12:00 - 13:00</p>
													</td>
												</tr>
												<tr>
													<td>
														<span class="badge date-badge badge-dark-light"><strong>Thu</strong><br>25</span>
													</td>
													<td>
														<h6 class="project-title">Saas Project</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<h6 class="client-name" data-toggle="tooltip" title="Gold Level Client">
															<i class="fas fa-crown text-warning mr-1"></i>
															Leone Gutkowski</h6>
													</td>
													<td>
														<p class="time"><i class="far fa-clock"></i> 12:00 - 13:00</p>
													</td>
												</tr>
											</tbody>
										</table>
										
									</div>
								</div><!-- / Appointments -->

							</div>
									
							<div class="col-md-4 mt-24">
								<div class="widget widget-chart-8 h-full">
									<div class="title">
										<h5>Daily Incomes</h5>
										<span>
											Total : {{$chart3}}
										</span>
									</div>
									<div class="widget-chart" style="margin: 10px 0px -10px 0px;">
										<div id="bar-chart-7" style="height: 170px; margin: -20px 0px -50px;"></div>
									</div>
								</div>
							</div>
									
							<div class="col-md-4 mt-24">
								<div class="widget widget-chart-8 h-full">
									<div class="title">
										<h5>Monthly Incomes</h5>
										<span>
											Total : {{$chart4}}
										</span>
									</div>
									<div class="widget-chart">
										<div id="area-10" style="height: 100px"></div>
									</div>
								</div>
							</div>
									
							<div class="col-md-4 mt-24">
								<div class="widget widget-chart-8 h-full">
                    {!! $chart2->container() !!}
									</div>
							</div>

							{{-- <div class="col-lg-6">

								<!-- Progress List -->
								{{-- <div class="panel panel-light"> 
									<div class="panel-header d-block d-md-flex">
										<h3 class="panel-title">Progress List</h3>
										<div class="panel-toolbar">
											<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
												<button type="button" class="btn btn-sm btn-success-lightened">ADD</button>
											</div>
										</div>
									</div>
									<div class="panel-body p-0 py-2 pr-1">

										<table class="table table-responsive table-teams-3 mb-0">
											<tbody>
												<tr>
													<td>
														<h6 class="project-title">Portrait Studio Project</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<div class="img-stack">
															<img src="../../assets/avatars/4.jpg" alt="Avatar image">
															<a href="#" class="avatar">+5</a>
														</div>
													</td>
													<td>
														<span class="bar-2">5,3,9,6,5,9,7,3,5,3,9,6</span>
													</td>
													<td>
														<span class="badge badge-primary-light d-lg-none d-xl-inline-block">Today at 20:14</span>
													</td>
												</tr>
												<tr>
													<td>
														<h6 class="project-title">PHP CRM</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<div class="img-stack">
															<a class="avatar avatar-primary rounded-circle">AD</a>
															<a href="#" class="avatar">+5</a>
														</div>
													</td>
													<td>
														<span class="bar-2">5,3,9,6,5,9,7,3,5,3,9,6</span>
													</td>
													<td>
														<span class="badge badge-primary-light d-lg-none d-xl-inline-block">Today at 09:01</span>
													</td>
												</tr>
												<tr>
													<td>
														<h6 class="project-title">Laravel SM</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<div class="img-stack">
															<a class="avatar avatar-primary rounded-circle">LO</a>
															<a href="#" class="avatar">+5</a>
														</div>
													</td>
													<td>
														<span class="bar-2">5,3,9,6,5,9,7,3,5,3,9,6</span>
													</td>
													<td>
														<span class="badge badge-primary-light d-lg-none d-xl-inline-block">Yesterday at 15:47</span>
													</td>
												</tr>
												<tr>
													<td>
														<h6 class="project-title">ReactNative App</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<div class="img-stack">
															<img src="../../assets/avatars/18.jpg" alt="Avatar image">
															<a href="#" class="avatar">+5</a>
														</div>
													</td>
													<td>
														<span class="bar-2">5,3,9,6,5,9,7,3,5,3,9,6</span>
													</td>
													<td>
														<span class="badge badge-primary-light d-lg-none d-xl-inline-block">March 13, 2020</span>
													</td>
												</tr>
												<tr>
													<td>
														<h6 class="project-title">Saas Project</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<div class="img-stack">
															<a class="avatar avatar-primary rounded-circle">CB</a>
															<a href="#" class="avatar">+5</a>
														</div>
													</td>
													<td>
														<span class="bar-2">5,3,9,6,5,9,7,3,5,3,9,6</span>
													</td>
													<td>
														<span class="badge badge-primary-light d-lg-none d-xl-inline-block">March 3, 2020</span>
													</td>
												</tr>
												<tr>
													<td>
														<h6 class="project-title">Portrait Studio Project</h6>
														<p class="project-description">Lorem ipsum dolor sit.</p>
													</td>
													<td>
														<div class="img-stack">
															<img src="../../assets/avatars/4.jpg" alt="Avatar image">
															<a href="#" class="avatar">+5</a>
														</div>
													</td>
													<td>
														<span class="bar-2">5,3,9,6,5,9,7,3,5,3,9,6</span>
													</td>
													<td>
														<span class="badge badge-primary-light d-lg-none d-xl-inline-block">Today at 20:14</span>
													</td>
												</tr>
											</tbody>
										</table>
										
									</div>
								</div><!-- / Progress List -->

							</div> --}}

							{{-- <div class="col-lg-6">
					
								<!-- Payment History 2 -->
								<div class="panel h-auto">
									<div class="panel-header">
										<h1 class="panel-title">Payment History 2</h1>
									</div>
									<div class="panel-body p-0">

										<ul class="list-group payment-history-list recent-payments">
											
											<li class="list-group-item">
												<div class="row">
													<div class="col col-img">
														<div class="user-img">
															<img src="../../assets/avatars/8.jpg" alt="">
														</div>
													</div>
													<div class="col col-info">
														<span class="lister-item-title"> Jennifer Hudson </span>
														<span class="badge badge-primary-light" data-toggle="tooltip" title="paypal">
															<img src="../../assets/misc/finance/paypal-logo.png" alt="">
														</span>
													</div>
													<div class="col col-amount">
														<span>$100</span>
														<small>2020-10-07</small>
													</div>
												</div>
											</li>
											
											<li class="list-group-item">
												<div class="row">
													<div class="col col-img">
														<div class="user-img">
															<img src="../../assets/avatars/9.jpg" alt="">
														</div>
													</div>
													<div class="col col-info">
														<span class="lister-item-title"> Andy Dorian </span>
														<span class="badge badge-primary-light" data-toggle="tooltip" title="Visa">
															<img src="../../assets/misc/finance/visa-logo.png" alt="">
														</span>
													</div>
													<div class="col col-amount">
														<span>$80</span>
														<small>2020-10-06</small>
													</div>
												</div>
											</li>
											
											<li class="list-group-item">
												<div class="row">
													<div class="col col-img">
														<div class="user-img">
															<img src="../../assets/avatars/10.jpg" alt="">
														</div>
													</div>
													<div class="col col-info">
														<span class="lister-item-title"> Jennifer Hudson </span>
														<span class="badge badge-primary-light" data-toggle="tooltip" title="Master Card">
															<img src="../../assets/misc/finance/mastercard-logo.png" alt="">
														</span>
													</div>
													<div class="col col-amount">
														<span>$100</span>
														<small>2020-10-07</small>
													</div>
												</div>
											</li>
											
											<li class="list-group-item">
												<div class="row">
													<div class="col col-img">
														<div class="user-img">
															<img src="../../assets/avatars/11.jpg" alt="">
														</div>
													</div>
													<div class="col col-info">
														<span class="lister-item-title"> Jennifer Hudson </span>
														<span class="badge badge-primary-light" data-toggle="tooltip" title="Stripe">
															<img src="../../assets/misc/finance/stripe.png" alt="">
														</span>
													</div>
													<div class="col col-amount">
														<span>$100</span>
														<small>2020-10-07</small>
													</div>
												</div>
											</li>
											
											<li class="list-group-item list-group-loader">
												<button type="button" class="btn btn-ellipsis-loader" data-toggle="class" data-target="self" data-class="is-loading">
													<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
												</button>
											</li>

										</ul>
		
									</div>
								</div><!-- / Payment History 2 -->

							</div> --}}

							<div class="col-lg-6 mt-24">

								<div class="row no-gutters shadow-sm widgets-rounded h-full">
	
									<div class="col-6">
	
										<div class="widget-chart-6 h-full">

                        {!! $chart2->container() !!}
										</div>
	
									</div>
	
									<div class="col-6">
	
										<div class="widget-chart-6 h-full bg-secondary-lightened">
											<div class="widget-header">
												<h5 class="widget-title">Projects Progress</h5>
												<h6 class="widget-subtitle">Level 1 project</h6>
											</div>
											<div class="widget-chart">
                        {!! $chart2->container() !!}
											</div>
											<h6 class="widget-name">Medical Clinic</h6>
											<div class="widget-description">
												<a href="#" class="btn btn-rounded btn-secondary-light">View</a>
											</div>
										</div>
	
									</div>
	
								</div>

							</div>

							<div class="col-lg-6">
				
								<!-- Notifications -->
								<div class="panel panel-light">
									<div class="panel-header">
										<h1 class="panel-title">Notifications</h1>
										<div class="panel-toolbar">
											<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
												<button type="button" class="btn btn-sm btn-primary-lightened">VIEW ALL</button>
											</div>
										</div>
									</div>
									<div class="panel-body p-0">
												
										<ul class="list-group list-group-notifications-3">
											<li class="list-group-item">
												<div class="user-avatar">
													<img src="../../assets/avatars/5.jpg" class="avatar rounded-circle" alt="Avatar image">
													<span class="badge badge-success color-badge"></span>
												</div>
												<div class="item-info">
													<a href="#">Thea Reichert</a>
													<p class="item-description">
														Consectetur adipisicing elit.
													</p>
													<div class="timestamp">19:45</div>
												</div>
												<div class="timestamp">Today</div>
											</li>
											<li class="list-group-item">
												<div class="user-avatar">
													<img src="../../assets/avatars/18.jpg" class="avatar rounded-circle" alt="Avatar image">
													<span class="badge badge-secondary color-badge"></span>
												</div>
												<div class="item-info">
													<a href="#">Leone Gutkowski</a>
													<p class="item-description">
														Sit amet conse ctetur adipi sicing.
													</p>
													<div class="timestamp">19:45</div>
												</div>
												<div class="timestamp">Today</div>
											</li>
											<li class="list-group-item">
												<div class="user-avatar">
													<img src="../../assets/avatars/14.jpg" class="avatar rounded-circle" alt="Avatar image">
													<span class="badge badge-secondary color-badge"></span>
												</div>
												<div class="item-info">
													<a href="#">Sterling Robel</a>
													<p class="item-description">
														Lorem, ipsum dolor sit amet.
													</p>
													<div class="timestamp">19:45</div>
												</div>
												<div class="timestamp">Yesterday</div>
											</li>
											<li class="list-group-item">
												<div class="user-avatar">
													<img src="../../assets/avatars/22.jpg" class="avatar rounded-circle" alt="Avatar image">
													<span class="badge badge-secondary color-badge"></span>
												</div>
												<div class="item-info">
													<a href="#">Keon Boyer</a>
													<p class="item-description">
														Consectetur adipisicing elit.
													</p>
													<div class="timestamp">19:45</div>
												</div>
												<div class="timestamp">2020-08-01</div>
											</li>
										</ul>
		
									</div>
								</div><!-- / Notifications -->

							</div>

						</div>


                    </div>





<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{$chart3}}</span>
        <span class="count-name">Daily Incomes</span>
      </div>
    </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{$chart4}}</span>
        <span class="count-name">Monthly Incomes</span>
      </div>
    </div>
    </div>
</div>
    

{!! $chart->container() !!}
{!! $chart2->container() !!}

<script src="{{ $chart->cdn() }}"></script>

<script src="{{ $chart2->cdn() }}"></script>

{{ $chart->script() }}
{{ $chart2->script() }}



<style>
    .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>
@endsection