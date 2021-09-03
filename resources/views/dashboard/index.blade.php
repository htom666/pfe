@extends('layout.main')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"
        integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="page-content">

        <div class="row mt-n24">

            <div class="col-md-12">

                <!-- Chart With Gaps In Data -->
                <div class="panel panel-light">
                    <div class="panel-header">
                        <h1 class="panel-title">Invoices Per month</h1>
                    </div>
                    <div class="panel-body">
                        <canvas id="mainChart"></canvas>

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
                        <a href="{{ route('facture.create') }}" class="btn btn-has-icon btn-primary">
                            <span>Create invoice</span>
                            <span class="icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>

                </div>

                <div class="widget-media-2 bg-primary mt-24"
                    style="min-height: 228px; background-color: #31315d; background-image: linear-gradient(to left, #3c3c7a, #272742); ">

                    <div class="widget-img">
                        <img src="../../assets/svg/undraw/undraw_instant_support_elxh-light.svg" class="img-fluid">
                    </div>
                    <div class="widget-body">
                        <h5 class="widget-title">Instant Support Is Available</h5>
                        <p class="text-light">
                            If you need anything or you encountred anything
                            please contact us.
                        </p>
                        <a href="{{route('user.chat')}}" type="button" class="btn btn-has-icon btn-icon-split btn-light text-primary">
                            <span class="icon"><i class="fas fa-envelope"></i></span>
                            <span>Contact Us</span>
                        </a>
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <!-- Appointments -->
                <div class="panel panel-light">
                    <div class="panel-header">
                        <h3 class="panel-title">Invoices</h3>
                        <div class="panel-toolbar">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a type="button" href="{{route('facture.create')}}" class="btn btn-sm btn-success-lightened">ADD</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body pl-2 py-2 pr-1">

                        <table class="table table-responsive table-appointments mb-0">
                            <tbody>
								@foreach($invoices as $invoice)
                                <tr>
                                    <td>
                                        <span class="badge date-badge badge-info-light"><strong>{{$invoice->id}}</strong></span>
                                    </td>
                                    <td>
                                        <h6 class="project-title">{{$invoice->invoice_number}}</h6>
                                        <p class="project-description">{{$invoice->company_phone}}</p>
                                    </td>
                                    <td>
                                        <h6 class="client-name" data-toggle="tooltip" title="Gold Level Client">
											
                                            <i class="fas fa-crown text-warning mr-1"></i>
                                            {{$invoice->client->nom}} {{$invoice->client->prenom}}
                                        </h6>
                                    </td>
                                    <td>
                                        <p class="time"><i class="far fa-clock"></i> {{$invoice->expiration_date}}</p>
                                    </td>
									<td>
                                        @if($days==0)
                                        <span class="m-1 badge badge-danger-light">Expired</span>
										@elseif($days >= 10)
										<span class="m-1 badge badge-success-light">{{$days}} days left till expiration</span>
										@elseif($days<=10)
										<span class="m-1 badge badge-warning-light">{{$days}} days left till expiration</span>
										@endif

									</td>
                                </tr>
								@endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            <div class="col-md-4 mt-24">
                <div class="widget widget-chart-8 h-full">
                    <div class="title">
                        <h5>Daily Incomes</h5>
                        <span>
                            Total : {{ $chart3 }}
                        </span>
                    </div>
                    <svg height="100" version="1.1" width="122" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        style="overflow: hidden; position: relative; left: -0.875px; top: -0.75px;">
                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc>
                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                        <path fill="none" stroke="#0b62a4"
                            d="M25,53.57142857142857C26.83540874524715,46.42857142857143,30.506226235741444,26.783271448114128,32.341634980988594,25C34.182072243346006,23.21184287668556,37.86294676806084,33.92124291577096,39.70338403041825,39.285714285714285C41.5387927756654,44.635528630056676,45.20961026615969,66.07142857142857,47.04501901140684,67.85714285714286C48.880427756653994,69.64285714285715,52.55124524714829,58.92857142857143,54.38665399239544,53.57142857142857C56.22206273764259,48.21428571428571,59.89288022813688,26.783271448114128,61.72828897338403,25C63.568726235741444,23.21184287668556,67.24960076045627,33.92124291577096,69.09003802281369,39.285714285714285C70.92544676806084,44.63552863005667,74.59626425855512,66.07142857142858,76.43167300380227,67.85714285714286C78.26708174904942,69.64285714285715,81.93789923954373,52.67857142857142,83.77330798479088,53.57142857142857C85.60871673003803,54.46428571428571,89.27953422053231,75,91.11494296577946,75C92.95538022813687,75,96.63625475285171,57.14774281805745,98.47669201520912,53.57142857142857C100.31210076045627,50.00488567520031,103.98291825095056,50,105.81832699619771,46.42857142857143C107.65373574144486,42.857142857142854,111.32455323193916,25,113.15996197718631,25C114.99537072243346,25,118.66618821292775,42.862028532343174,120.5015969581749,46.42857142857143C122.34203422053231,50.00488567520031,126.02290874524715,56.253664256400235,127.86334600760456,53.57142857142857C129.6987547528517,50.896521399257374,133.369572243346,26.785714285714285,135.20498098859315,25C137.0403897338403,23.21428571428571,140.7112072243346,33.92857142857143,142.54661596958175,39.285714285714285C144.3820247148289,44.64285714285714,148.0528422053232,66.07387140902873,149.88825095057035,67.85714285714286C151.72868821292775,69.6452999804573,155.4095627376426,57.14285714285714,157.25,53.57142857142857"
                            stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <circle cx="25" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="32.341634980988594" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="39.70338403041825" cy="39.285714285714285" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="47.04501901140684" cy="67.85714285714286" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="54.38665399239544" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="61.72828897338403" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="69.09003802281369" cy="39.285714285714285" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="76.43167300380227" cy="67.85714285714286" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="83.77330798479088" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="91.11494296577946" cy="75" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="98.47669201520912" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="105.81832699619771" cy="46.42857142857143" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="113.15996197718631" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="120.5015969581749" cy="46.42857142857143" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="127.86334600760456" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="135.20498098859315" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="142.54661596958175" cy="39.285714285714285" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="149.88825095057035" cy="67.85714285714286" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="157.25" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                    </svg>
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
                            Total : {{ $chart4 }}
                        </span>
                    </div>
                    <svg height="100" version="1.1" width="122" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        style="overflow: hidden; position: relative; left: -0.875px; top: -0.75px;">
                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc>
                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                        <path fill="none" stroke="#0b62a4"
                            d="M25,53.57142857142857C26.83540874524715,46.42857142857143,30.506226235741444,26.783271448114128,32.341634980988594,25C34.182072243346006,23.21184287668556,37.86294676806084,33.92124291577096,39.70338403041825,39.285714285714285C41.5387927756654,44.635528630056676,45.20961026615969,66.07142857142857,47.04501901140684,67.85714285714286C48.880427756653994,69.64285714285715,52.55124524714829,58.92857142857143,54.38665399239544,53.57142857142857C56.22206273764259,48.21428571428571,59.89288022813688,26.783271448114128,61.72828897338403,25C63.568726235741444,23.21184287668556,67.24960076045627,33.92124291577096,69.09003802281369,39.285714285714285C70.92544676806084,44.63552863005667,74.59626425855512,66.07142857142858,76.43167300380227,67.85714285714286C78.26708174904942,69.64285714285715,81.93789923954373,52.67857142857142,83.77330798479088,53.57142857142857C85.60871673003803,54.46428571428571,89.27953422053231,75,91.11494296577946,75C92.95538022813687,75,96.63625475285171,57.14774281805745,98.47669201520912,53.57142857142857C100.31210076045627,50.00488567520031,103.98291825095056,50,105.81832699619771,46.42857142857143C107.65373574144486,42.857142857142854,111.32455323193916,25,113.15996197718631,25C114.99537072243346,25,118.66618821292775,42.862028532343174,120.5015969581749,46.42857142857143C122.34203422053231,50.00488567520031,126.02290874524715,56.253664256400235,127.86334600760456,53.57142857142857C129.6987547528517,50.896521399257374,133.369572243346,26.785714285714285,135.20498098859315,25C137.0403897338403,23.21428571428571,140.7112072243346,33.92857142857143,142.54661596958175,39.285714285714285C144.3820247148289,44.64285714285714,148.0528422053232,66.07387140902873,149.88825095057035,67.85714285714286C151.72868821292775,69.6452999804573,155.4095627376426,57.14285714285714,157.25,53.57142857142857"
                            stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <circle cx="25" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="32.341634980988594" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="39.70338403041825" cy="39.285714285714285" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="47.04501901140684" cy="67.85714285714286" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="54.38665399239544" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="61.72828897338403" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="69.09003802281369" cy="39.285714285714285" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="76.43167300380227" cy="67.85714285714286" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="83.77330798479088" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="91.11494296577946" cy="75" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="98.47669201520912" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="105.81832699619771" cy="46.42857142857143" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="113.15996197718631" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="120.5015969581749" cy="46.42857142857143" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="127.86334600760456" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="135.20498098859315" cy="25" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="142.54661596958175" cy="39.285714285714285" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="149.88825095057035" cy="67.85714285714286" r="0" fill="#0b62a4" stroke="#ffffff"
                            stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="157.25" cy="53.57142857142857" r="0" fill="#0b62a4" stroke="#ffffff" stroke-width="1"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                    </svg>
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
            <!-- Gradient Widgets -->
        </div>
		<div class="panel">
			<div class="panel-header">
				<h3 class="panel-title">Estimates Status</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="card-counter danger">
							<i class="fa fa-ticket"></i>
							<span class="count-numbers">{{ $active_estimates }}</span>
							<span class="count-name">Published Estimates</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-counter success">
							<i class="fa fa-database"></i>
							<span class="count-numbers">{{ $inactive_estimates }}</span>
							<span class="count-name">Drafted Estimates</span>
						</div>
					</div>
						<div class="col-md-3">
							<div class="card-counter primary">
								<i class="fa fa-code-fork"></i>
								<span class="count-numbers">{{ $total_estimates }}</span>
								<span class="count-name">Estimates Count</span>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-counter info">
								<i class="fa fa-dollar-sign"></i>
								<span class="count-numbers">{{ $amount_estimates }}</span>
								<span class="count-name">Active Estimates Amount</span>
							</div>
						</div>
				</div>
			</div>
		</div>
    </div>

		<!-- Notifications -->
		<div class="panel panel-light">
			<div class="panel-header">
				<h1 class="panel-title">Users</h1>
				<div class="panel-toolbar">
				</div>
			</div>
			<div class="panel-body p-0">
						
				<ul class="list-group list-group-notifications-3">
					@foreach($users as $user)
					<li class="list-group-item">
						<div class="user-avatar">
							<img src="{{asset('storage/personal_image/'.$user->id.'/'.$user->personal_image)}}" class="avatar rounded-circle" alt="Avatar image">
							<span class="badge badge-success color-badge"></span>
						</div>
						<div class="item-info">
							<a href="#">{{$user->name}}</a>
							<p class="item-description">
								{{$user->roles->name ?? ''}}
							</p>
							<div class="timestamp">{{$user->last_activity}}</div>
						</div>
						<div class="timestamp">{{Carbon\Carbon::parse($user->last_activity)->diffForHumans()}}</div>
					</li>
					@endforeach
				</ul>

			</div>
		</div>
    </div>





    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <script src="{{ $chart->cdn() }}"></script>

    <script src="{{ $chart2->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chart2->script() }}



    <style>
        .card-counter {
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover {
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary {
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger {
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success {
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info {
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter i {
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers {
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
        }

        .card-counter .count-name {
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
    <script>
        $(function() {
            var datas = <?php echo json_encode($datas); ?>;
            var mainChart = $("#mainChart");
            var barChart = new Chart(mainChart, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'Invoices Per month',
                        data: datas,
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'indigo',
                            'violet', 'purple', 'pink', 'silver', 'gold'
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });
    </script>
@endsection
