@extends('layout.main')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>
<div class="page-content">
	<!-- Invoice #3452321 -->
	<div class="panel">
		<input type="hidden" name="id" value="{{$facture->id}}">
		<div class="panel-header">
			<h3 class="panel-title">Invoice {{$facture->invoice_number }}</h3>
		</div>
		<div class="panel-body">
			<div class="invoice-1">
				<div>

				<div class="row">

					<div class="col-md-6">
						<img src="{{asset("/public/storage/logo/$user->id/$user->logo")}}" alt="Company logo" class="logo">
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
							<p>{{ $facture->client->nom }} {{ $facture->client->prenom }} {{ $facture->company_address }}</p>
						</div>
					</div>

				</div>

				<div class="row mt-1 no-gutters bg-primary-lightened p-3">

					<div class="col-md-6">
						<p class="key-value">Issued Date : <span>{{ $facture->invoice_date }}</span></p>
					</div>
					<div class="col-md-6 text-right">
						<div class="recipient-block">
							<p class="key-value">Due Date : <span>{{ $facture->expiration_date }}</span></p>
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
              					@foreach ($facture->products as $product)
									<tr>
										<td>{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->pivot->quantity }}</td>
										<td>{{ $product->price }}</td>
										<td>{{ $product->price * $product->pivot->quantity }}</td>
									</tr>
									@endforeach
									@foreach ($facture->services as $service)
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
										<td>{{$facture->pht}}</td>
									</tr>
									<tr class="aggregation">
										<td colspan="3"></td>
										<td>Discount</td>
										<td>%5</td>
									</tr>
									<tr class="aggregation">
										<td colspan="3"></td>
										<td>VAT</td>
										<td>%{{$facture->tva}}</td>
									</tr>
									<tr class="aggregation">
										<td colspan="3"></td>
										<td>Tax</td>
										<td>{{$facture->tax}}</td>
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
							<h5 class="text-danger font-weight-600 mb-0">{{$facture->ttc}}</h5>
						</div>
					</div>

				</div>

				<hr class="m-0 d-print-none">
				<div class="row mt-3">

					<div class="col-md-6 d-flex flex-column justify-content-center ">
						<h5 class="text-uppercase">Total Amount : </h5>
						<h3 class="text-danger font-weight-600 mb-0">{{$facture->ttc}}</h3>
					</div>
				</div>
			</div>

				<div class="row d-print-none mt-4">

					<div class="col-md-12">
						<a href="#" class="btn btn-primary btn-has-icon btn-icon-split">
							<span class="icon"><i class="fas fa-credit-card"></i></span>
							<span>Proceed To Payment</span>
						</a>
						<button type="button" class="btn btn-secondary btn-has-icon btn-icon-split btn-panel-print">
							<span class="icon"><i class="fas fa-print"></i></span>
							<span>Print</span>
						</button>
						<a class="btn btn-primary" href="{{ URL::to('/facture/pdf',$facture->id) }}">Export to PDF</a>
						<form method="POST" action="{{route('facture.send',$facture->id)}}">
							@csrf
							<input type="submit" value="send">
						
							{{-- <a class="btn btn-primary" href="{{ URL::to('/facture/sendmail',$facture->id)}}">Send Mail</a> --}}
						</form>
						</div>

				</div>

			</div>
		</div>
	</div>
@endsection
