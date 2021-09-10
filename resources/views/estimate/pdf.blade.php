{{-- <link rel="stylesheet" href="{{ ltrim(public_path('css/invoices/invoices.css'), '/') }}" />
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





 --}}




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <style>		  
		  .clearfix:after {
			content: "";
			display: table;
			clear: both;
		  }
		  
		  a {
			color: #0087C3;
			text-decoration: none;
		  }
		  
		  body {
			color: #555555;
			background: #FFFFFF; 
			font-family: Arial, sans-serif; 
			font-size: 14px; 
		  }
		  
		  header {
			padding: 10px 0;
			margin-bottom: 20px;
			border-bottom: 1px solid #AAAAAA;
		  }
		  
		  #logo {
			float: left;
			margin-top: 8px;
		  }
		  
		  #logo img {
			height: 70px;
		  }
		  
		  #company {
			text-align: right;
		  }
		  
		  
		  #details {
			margin-bottom: 50px;
		  }
		  
		  #client {
			padding-left: 6px;
			border-left: 6px solid #0087C3;
			float: left;
		  }
		  
		  #client .to {
			color: #777777;
		  }
		  
		  h2.name {
			font-size: 1.4em;
			font-weight: normal;
			margin: 0;
		  }
		  
		  #invoice {
			text-align: right;
		  }
		  
		  #invoice h1 {
			color: #0087C3;
			font-size: 2.4em;
			line-height: 1em;
			font-weight: normal;
			margin: 0  0 10px 0;
		  }
		  
		  #invoice .date {
			font-size: 1.1em;
			color: #777777;
		  }
		  
		  table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;
			margin-bottom: 20px;
		  }
		  
		  table th,
		  table td {
			padding: 20px;
			background: #EEEEEE;
			text-align: center;
			border-bottom: 1px solid #FFFFFF;
		  }
		  
		  table th {
			white-space: nowrap;        
			font-weight: normal;
		  }
		  
		  table td {
			text-align: right;
		  }
		  
		  table td h3{
			color: #57B223;
			font-size: 1.2em;
			font-weight: normal;
			margin: 0 0 0.2em 0;
		  }
		  
		  table .no {
			color: #FFFFFF;
			font-size: 1.6em;
			background: #57B223;
		  }
		  
		  table .desc {
			text-align: left;
		  }
		  
		  table .unit {
			background: #DDDDDD;
		  }
		  
		  table .qty {
		  }
		  
		  table .total {
			background: #57B223;
			color: #FFFFFF;
		  }
		  
		  table td.unit,
		  table td.qty,
		  table td.total {
			font-size: 1.2em;
		  }
		  
		  table tbody tr:last-child td {
			border: none;
		  }
		  
		  table tfoot td {
			padding: 10px 20px;
			background: #FFFFFF;
			border-bottom: none;
			font-size: 1.2em;
			white-space: nowrap; 
			border-top: 1px solid #AAAAAA; 
		  }
		  
		  table tfoot tr:first-child td {
			border-top: none; 
		  }
		  
		  table tfoot tr:last-child td {
			color: #57B223;
			font-size: 1.4em;
			border-top: 1px solid #57B223; 
		  
		  }
		  
		  table tfoot tr td:first-child {
			border: none;
		  }
		  
		  #thanks{
			font-size: 2em;
			margin-bottom: 50px;
		  }
		  
		  #notices{
			padding-left: 6px;
			border-left: 6px solid #0087C3;  
		  }
		  
		  #notices .notice {
			font-size: 1.2em;
		  }
		  
		  footer {
			color: #777777;
			width: 100%;
			height: 30px;
			position: absolute;
			bottom: 0;
			border-top: 1px solid #AAAAAA;
			padding: 8px 0;
			text-align: center;
		  }
		</style>
		
  </head>
  <body>
	<input type="hidden" name="id" value="{{$estimate->id}}">
    <header class="clearfix">
      <div id="logo">
		<img src="{{ ltrim(public_path('storage/logo/1/lg.jpg'), '/') }}">
      </div>
      <div id="company">
        <h2 class="name">{{$user->company}}</h2>
        <div>{{$user->address}}</div>
        <div>VAT {{$user->tax_ref_number}}</div>
        <div>SHARE CAPITAL  {{$user->capital}}</div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">ESTIMATE TO:</div>
          <h2 class="name">{{ $estimate->client->nom }} .{{ $estimate->client->prenom }}</h2>
          <div class="address">{{ $estimate->company_address }}.</div>
        </div>
        <div id="invoice">
          <h1>ESTIMATE {{$estimate->invoice_number }}</h1>
          <div class="date">Date of Invoice: {{ $estimate->estimate_date }}</div>
          <div class="date">Due Date: {{ $estimate->expiration_date }}</div>
        </div>
      </div>
      <table cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">QUANTITY</th>
            <th class="qty">UNIT PRICE</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
			@foreach ($estimate->products as $product)
			<tr>
				<td class="no">{{ $product->id }}</td>
				<td class="desc">{{ $product->name }}</td>
				<td class="unit">{{ $product->pivot->quantity }}</td>
				<td class="qty">{{ $product->price }} TND</td>
				<td class="total">{{ $product->price * $product->pivot->quantity }} TND</td>
			</tr>
			@endforeach
			@foreach ($estimate->services as $service)
			<tr>
				<td class="no">{{ $service->id }}</td>
				<td class="desc">{{ $service->name }}</td>
				<td class="unit">{{ $service->pivot->quantity }}</td>
				<td class="qty">{{ $service->price }} TND</td>
				<td class="total">{{ $service->price * $service->pivot->quantity }} TND</td>
			</tr>
			@endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>{{$estimate->pht}} TND</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX {{$estimate->tva}}%</td>
            <td>{{$estimate->tax}} TND</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{$estimate->ttc}} TND</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
  </body>
</html>





