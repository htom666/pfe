@extends('layout.main')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
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
						<h3 class="marginright">ESTIMATE-{{ $estimate->estimate_number }}</h3>
						<span class="marginright">{{ $estimate->estimate_date }}</span>
			    </div>

			</div>
			<hr>
			<div class="row">
				<input type="hidden" name="id" value="{{ $estimate->id }}">
				<div class="col-xs-4 from">
					<p class="lead marginbottom">From : Dynofy</p>
					<p>350 Rhode Island Street</p>
					<p>Suite 240, San Francisco</p>
					<p>California, 94103</p>
					<p>Phone: 415-767-3600</p>
					<p>Email: contact@dynofy.com</p>
				</div>

				<div class="col-xs-4 to">
					<p class="lead marginbottom">To :{{ $estimate->client->nom }} </p>
					<p>{{ $estimate->company_address }}</p>
					<p>Phone: {{ $estimate->company_phone }}</p>
					<p>Email: {{ $estimate->client->email }}</p>

			    </div>

			    {{-- <div class="col-xs-4 text-right payment-details">
					<p class="lead marginbottom payment-info">Payment details</p>
					<p>Date: 14 April 2014</p>
					<p>VAT: DK888-777 </p>
					<p>Total Amount: $1019</p>
					<p>Account Name: Flatter</p>
			    </div> --}}

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
					@foreach ($estimate->products as $product)
					<tr>
						<td class="text-center">{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
						<td class="text-right">{{ $product->pivot->quantity }}</td>
						<td class="text-right">{{ $product->price }}</td>
						<td class="text-right">{{ $product->price * $product->pivot->quantity }}</td>
					</tr>
				@endforeach
                @foreach ($estimate->services as $service)
					<tr>
						<td class="text-center">{{ $service->id }}</td>
						<td>{{ $service->name }}</td>
						<td class="text-right">{{ $service->pivot->quantity }}</td>
						<td class="text-right">{{ $service->price }}</td>
						<td class="text-right">{{ $service->price * $service->pivot->quantity }}</td>
					</tr>
				@endforeach
			       </tbody>
			    </table>

			</div>

			<div class="row">
			<div class="col-xs-6 margintop">
				<p class="lead marginbottom">THANK YOU!</p>

				<button class="btn btn-success" id="invoiceprint"><i class="fa fa-print"></i> Print Invoice</button>
				<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
			</div>
			<div class="col-xs-6 text-right pull-right invoice-total">
					  <p>Subtotal :{{$estimate->pht}}</p>
			          <p>Discount (10%) : $101 </p>
			          <p>VAT ({{$estimate->tva}}%) : {{$estimate->tax}} </p>
			          <p>Total : {{$estimate->ttc}} </p>
			</div>
			</div>

		  </div>
		</div>
	</div>
</div>
</div>
{{--

                    <div class="col-xs-4 to">
                        <p class="lead marginbottom">To :{{ $facture->client->nom }} </p>
                        <p>{{ $facture->company_address }}</p>
                        <p>Phone: {{ $facture->company_phone }}</p>
                        <p>Email: {{ $facture->client->email }}</p>

                    </div>
                    <input type="hidden" name="id" value="{{ $facture->id }}">

                    <div class="col-xs-4 text-right payment-details">
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
                            @foreach ($facture->products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td>{{ $product->prodname }}</td>
                                    <td class="text-right">{{ $product->pivot->quantity }}</td>
                                    <td class="text-right">{{ $product->prodprice }}</td>
                                    <td class="text-right">{{ $product->prodprice * $product->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-xs-6 margintop">
                        <p class="lead marginbottom">THANK YOU!</p>

                        <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print
                            Invoice</button>
                        <button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
                    </div>
                    <div class="col-xs-6 text-right pull-right invoice-total">
                        <p>Subtotal : $1019</p>
                        <p>Discount (10%) : $101 </p>
                        <p>VAT (8%) : $73 </p>
                        <p>Total : $991 </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        body {
            margin-top: 20px;
            background: #eee;
        }

        /*Invoice*/
        .invoice .top-left {
            font-size: 65px;
            color: #3ba0ff;
        }

        .invoice .top-right {
            text-align: right;
            padding-right: 20px;
        }

        .invoice .table-row {
            margin-left: -15px;
            margin-right: -15px;
            margin-top: 25px;
        }

        .invoice .payment-info {
            font-weight: 500;
        }

        .invoice .table-row .table>thead {
            border-top: 1px solid #ddd;
        }

        .invoice .table-row .table>thead>tr>th {
            border-bottom: none;
        }

        .invoice .table>tbody>tr>td {
            padding: 8px 20px;
        }

        .invoice .invoice-total {
            margin-right: -10px;
            font-size: 16px;
        }

        .invoice .last-row {
            border-bottom: 1px solid #ddd;
        }

        .invoice-ribbon {
            width: 85px;
            height: 88px;
            overflow: hidden;
            position: absolute;
            top: -1px;
            right: 14px;
        }

        .ribbon-inner {
            text-align: center;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            position: relative;
            padding: 7px 0;
            left: -5px;
            top: 11px;
            width: 120px;
            background-color: #66c591;
            font-size: 15px;
            color: #fff;
        }

        .ribbon-inner:before,
        .ribbon-inner:after {
            content: "";
            position: absolute;
        }

        .ribbon-inner:before {
            left: 0;
        }

        .ribbon-inner:after {
            right: 0;
        }

        @media(max-width:575px) {

            .invoice .top-left,
            .invoice .top-right,
            .invoice .payment-details {
                text-align: center;
            }

            .invoice .from,
            .invoice .to,
            .invoice .payment-details {
                float: none;
                width: 100%;
                text-align: center;
                margin-bottom: 25px;
            }

            .invoice p.lead,
            .invoice .from p.lead,
            .invoice .to p.lead,
            .invoice .payment-details p.lead {
                font-size: 22px;
            }

            .invoice .btn {
                margin-top: 10px;
            }
        }

        @media print {
            .invoice {
                width: 900px;
                height: 800px;
            }
        }

    </style> --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#invoiceprint').printPage();
        });
    </script>
@endsection
