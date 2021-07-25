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
						<h3 class="marginright">INVOICE-{{ $facture->invoice_number }}</h3>
						<span class="marginright">{{ $facture->invoice_date }}</span>
			    </div>

			</div>
			<hr>
			<div class="row">
				<input type="hidden" name="id" value="{{ $facture->id }}">
				<div class="col-xs-4 from">
					<p class="lead marginbottom">From : Dynofy</p>
					<p>350 Rhode Island Street</p>
					<p>Suite 240, San Francisco</p>
					<p>California, 94103</p>
					<p>Phone: 415-767-3600</p>
					<p>Email: contact@dynofy.com</p>
				</div>

				<div class="col-xs-4 to">
					<p class="lead marginbottom">To :{{ $facture->client->nom }} </p>
					<p>{{ $facture->company_address }}</p>
					<p>Phone: {{ $facture->company_phone }}</p>
					<p>Email: {{ $facture->client->email }}</p>

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
					@foreach ($facture->products as $product)
					<tr>
						<td class="text-center">{{ $product->id }}</td>
						<td>{{ $product->prodname }}</td>
						<td class="text-right">{{ $product->pivot->quantity }}</td>
						<td class="text-right">{{ $product->price }}</td>
						<td class="text-right">{{ $product->price * $product->pivot->quantity }}</td>
					</tr>
				@endforeach
			       </tbody>
			    </table>

			</div>

			<div class="row">
			<div class="col-xs-6 margintop">
				<p class="lead marginbottom">THANK YOU!</p>

				<button class="btn btn-success" id="invoice-print" @click.prevent="printme"><i class="fa fa-print"></i> Print Invoice</button>
				<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
			</div>
			<div class="col-xs-6 text-right pull-right invoice-total">
					  <p>Subtotal :{{$facture->pht}}</p>
			          <p>Discount (10%) : $101 </p>
			          <p>VAT ({{$facture->tva}}%) : {{$facture->tax}} </p>
			          <p>Total : {{$facture->ttc}} </p>
			</div>
			</div>

		  </div>
		</div>
	</div>
</div>
</div>