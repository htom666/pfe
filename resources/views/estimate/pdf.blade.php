<link rel="stylesheet" href="{{ ltrim(public_path('css/invoices/invoices.css'), '/') }}" />
<link rel="stylesheet" href="{{ltrim(public_path('vendor/ari_d/js-list-manager/js-list-manager.css'), '/')}}">
<link rel="stylesheet" href="{{ltrim(public_path('layouts/layout-1/css/app8bb9.css?v=545'), '/')}}">

<link rel="stylesheet" href="{{ltrim(public_path('css/vendor.css'), '/') }}" />
<link rel="stylesheet" href="{{ltrim(public_path('vendor/jquery-dataTables/css/dataTables.bootstrap4.min.css'), '/')}}">
<link rel="stylesheet" href="{{ltrim(public_path('vendor/jquery-dataTables/css/buttons.bootstrap.min.css'), '/')}}">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
    <!-- Dosis & Poppins Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
        <div class="page-wrapper sidebar-open navbar-fixed ">
<div class="page-content">
	<!-- Invoice #3452321 -->
	<div class="panel">
		<input type="hidden" name="id" value="{{$estimate->id}}">
		<div class="panel-header">
			<h3 class="panel-title">Invoice {{$estimate->invoice_number }}</h3>
		</div>
		<div class="panel-body">
			<div class="invoice-1">
				<div>

				<div class="row">

					<div class="col-md-6">
						<img src="{{asset('storage/logo/'.$user->id.'/'.$user->logo)}}" alt="Company logo" class="logo">
					</div>

				</div>

				<div class="row mt-4">

					<div class="col-md-6">
						<h5 class="heading">Cummings Agency</h5>
						<p class="address">8888 Cummings Vista Apt. 101, Susanbury, NY 95473</p>
					</div>
					<div class="col-md-6 text-right">
						<div class="recipient-block">
							<h5 class="heading">To</h5>
							<p>{{ $estimate->client->nom }} {{ $estimate->client->prenom }} {{ $estimate->company_address }}</p>
						</div>
					</div>

				</div>

				<div class="row mt-1 no-gutters bg-primary-lightened p-3">

					<div class="col-md-6">
						<p class="key-value">Issued Date : <span>{{ $estimate->estimate_date }}</span></p>
					</div>
					<div class="col-md-6 text-right">
						<div class="recipient-block">
							<p class="key-value">Due Date : <span>{{ $estimate->expiration_date }}</span></p>
						</div>
					</div>

				</div>
				
				<div class="row mt-4">

					<div class="col-md-12">

						<div class="table-responsive">

							<table class="table table-bordered mb-0">
								<thead>
									<tr class="bg-dark">
										<th>#</th>
										<th>Description</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
              					@foreach ($estimate->products as $product)
									<tr>
										<td>{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->pivot->quantity }}</td>
										<td>{{ $product->price }}</td>
										<td>{{ $product->price * $product->pivot->quantity }}</td>
									</tr>
									@endforeach
									@foreach ($estimate->services as $service)
									<tr>
										<td>{{ $service->id }}</td>
										<td>{{ $service->name }}</td>
										<td>{{ $service->pivot->quantity }}</td>
										<td>{{ $service->price }}</td>
										<td>{{ $service->price * $service->pivot->quantity }}</td>
									</tr>
									@endforeach
									<tr class="aggregation">
										<td colspan="3"></td>
										<td>Sub Total</td>
										<td>{{$estimate->pht}}</td>
									</tr>
									<tr class="aggregation">
										<td colspan="3"></td>
										<td>Discount</td>
										<td>%5</td>
									</tr>
									<tr class="aggregation">
										<td colspan="3"></td>
										<td>VAT</td>
										<td>%{{$estimate->tva}}</td>
									</tr>
									<tr class="aggregation">
										<td colspan="3"></td>
										<td>Tax</td>
										<td>{{$estimate->tax}}</td>
									</tr>
								</tbody>
							</table>
							
						</div>

					</div>

				</div>

				<div class="row mt-1 no-gutters bg-primary-lightened p-3 d-none">

					<div class="col-md-6">
						<h5 class="text-uppercase text-dark mb-0">Total Amount </h5>
					</div>
					<div class="col-md-6 text-right">
						<div class="recipient-block">
							<h5 class="text-danger font-weight-600 mb-0">{{$estimate->ttc}}</h5>
						</div>
					</div>

				</div>

				<hr class="m-0 d-print-none">
				<div class="row mt-3">

					<div class="col-md-6 d-flex flex-column justify-content-center ">
						<h5 class="text-uppercase">Total Amount : </h5>
						<h3 class="text-danger font-weight-600 mb-0">{{$estimate->ttc}}</h3>
					</div>
				</div>
			</div>
			</div>
		</div>
    </div>
	</div>
    <script src="{{ltrim(public_path('js/vendor.js'), '/')}}"></script>

    <!-- Page's links to JS dependencies goes here. -->
    <script src="{{ltrim(public_path('vendor/jquery-dataTables/js/jquery.dataTables.min.js'), '/')}}"></script>
    <script src="{{ltrim(public_path('vendor/jquery-dataTables/js/dataTables.bootstrap4.min.js'), '/')}}"></script>
    <script src="{{ltrim(public_path('vendor/jquery-dataTables/js/buttons.min.js'), '/')}}"></script>
    <script src="{{ltrim(public_path('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js'), '/')}}"></script>
    <script src="{{ltrim(public_path('js/pages/form/extended/datetimepicker.js'), '/')}}"></script>


    <!-- Page script codes or links goes here. -->
    
    <script src="{{ltrim(public_path('js/pages/datatables/datatables.net/toolbar.js'), '/')}}"></script>

    <script src="{{ltrim(public_path('layouts/layout-1/js/app.js'), '/')}}"></script>

    <!-- Page script codes or links goes here. -->
    
    <script src="{{ltrim(public_path('vendor/jquery-dataTables/js/jquery.dataTables.min.js'), '/')}}"></script>
    <script src="{{ltrim(public_path('vendor/jquery-dataTables/js/dataTables.bootstrap4.min.js'), '/')}}"></script>

    <!-- Page script codes or links goes here. -->
    
    <script src="{{ltrim(public_path('js/pages/datatables/datatables.net/column-search.js'), '/')}}"></script>
<script src="{{ltrim(public_path('js/pages/index.js'), '/')}}"></script>
