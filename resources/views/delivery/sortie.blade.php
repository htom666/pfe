
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
		@if (Session::has('success'))
		<div class="alert alert-success alert-dismissible alert-dismissible-2" data-animation="fadeOut"
			role="alert">
			<strong>{{ Session::get('success') }}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
					<path class="heroicon-ui"
						d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
					</path>
				</svg>
			</button>
		</div>
  @endif
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
                <h5 class="heading">{{$user->company}}</h5>
                <p class="address">{{$user->company}} {{$user->address}} VAT {{$user->tax_ref_number}}  SHARE CAPITAL  {{$user->capital}}</p>
            </div>
            <div class="col-md-6 text-right">
                <div class="recipient-block">
                    <h5 class="heading">To</h5>
                    <p>{{$client->nom}} {{ $client->prenom }} {{$facture->company_address}}</p>
                </div>
            </div>

        </div>
		<div class="row mt-1 no-gutters bg-primary-lightened p-3">

			<div class="col-md-6">
				<p class="key-value">Issue Date : <span>{{$delivery->created_at}}</span></p>
			</div>
			<div class="col-md-6 text-right">
				<div class="recipient-block">
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
						@foreach (json_decode($delivery->products) as $product)
						<tr>
							<td class="text-center">{{ $product->product_id}}</td>
							<td>{{ $product->product_name}}</td>
							<td class="text-right">{{ $product->quantity}}</td>
							<td class="text-right">{{ $product->price}}</td>
							<td class="text-right">{{ $product->total_price}}</td>
						</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>

</div>

</div>
<div class="row d-print-none mt-4">
	<div class="col-md-12">
	<button type="button" class="btn btn-secondary btn-has-icon btn-icon-split btn-panel-print">
		<span class="icon"><i class="fas fa-print"></i></span>
		<span>Print</span>
	</button>
</div>

</div>

</div>
</div>
</div>
@endsection
{{-- 























<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
			<div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div>
		    <div class="row">

				<div class="col-sm-6 top-left">
					<i class="fa fa-rocket"></i>
				</div>

				<div class="col-sm-6 top-right">
						<h3 class="marginright">INVOICE-{{$facture->invoice_number}}</h3>
						<span class="marginright">{{$delivery->created_at}}</span>
			    </div>

			</div>
			<hr>
			<div class="row">
				<input type="hidden" name="id" value="{{ $delivery->id }}">
				<div class="col-xs-4 from">
					<p class="lead marginbottom">From : Dynofy</p>
					<p>350 Rhode Island Street</p>
					<p>Suite 240, San Francisco</p>
					<p>California, 94103</p>
					<p>Phone: 415-767-3600</p>
					<p>Email: contact@dynofy.com</p>
				</div>

				<div class="col-xs-4 to">
					<p class="lead marginbottom">To :{{$client->nom}} </p>
					<p>{{$facture->company_address}}</p>
					<p>Phone: {{ $facture->company_phone }}</p>
					<p>Email: {{$client->email}}</p>

			    </div>

			    {{-- <div class="col-xs-4 text-right payment-details">
					<p class="lead marginbottom payment-info">Payment details</p>
					<p>Date: 14 April 2014</p>
					<p>VAT: DK888-777 </p>
					<p>Total Amount: $1019</p>
					<p>Account Name: Flatter</p>
			    </div> 

			</div>

			<div class="row table-row">
				<table class="table table-striped">
			      <thead>
			        <tr>
			          <th class="text-center" style="width:5%">#</th>
			          <th style="width:50%">Item</th>
			          <th class="text-right" style="width:15%">Quantity</th>
			          <th class="text-right" style="width:15%">Unit Price</th>
			          <th class="text-right" style="width:15%">Total Price</th>
			        </tr>
			      </thead>
			      <tbody>
					@foreach (json_decode($delivery->products) as $product)
					<tr>
						<td class="text-center">{{ $product->product_id}}</td>
						<td>{{ $product->product_name}}</td>
						<td class="text-right">{{ $product->quantity}}</td>
						<td class="text-right">{{ $product->price}}</td>
						<td class="text-right">{{ $product->total_price}}</td>
					</tr>
				@endforeach
			       </tbody>
			    </table>

			</div>

			<div class="row">
			<div class="col-xs-6 margintop">
				<p class="lead marginbottom">THANK YOU!</p>

				<button class="btn btn-success" id="print_Button" onclick="printDiv()"><i class="fa fa-print"></i> Print Invoice</button>
				<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
			</div>
			{{-- <div class="col-xs-6 text-right pull-right invoice-total">
					  <p>Subtotal :{{$subtotal}}</p>
			          <p>Discount (10%) : $101 </p>
			          <p>VAT ({{$delivery->facture->tva}}%) : {{$tax}} </p>
			          <p>Total : {{$ttc}} </p>
			</div> 
			</div>

		  </div>
		</div>
	</div>
</div>
</div>
<style>
    @media print {
        #print_Button {
            display: none;
        }
    }
</style>
<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        localtion.reload();
    }
    </script>
@endsection --}}