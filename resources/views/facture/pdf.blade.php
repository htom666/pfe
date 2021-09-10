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
	<input type="hidden" name="id" value="{{$facture->id}}">
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
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{ $facture->client->nom }} .{{ $facture->client->prenom }}</h2>
          <div class="address">{{ $facture->company_address }}.</div>
        </div>
        <div id="invoice">
          <h1>INVOICE {{$facture->invoice_number }}</h1>
          <div class="date">Date of Invoice: {{ $facture->invoice_date }}</div>
          <div class="date">Due Date: {{ $facture->expiration_date }}</div>
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
			@foreach ($facture->products as $product)
			<tr>
				<td class="no">{{ $product->id }}</td>
				<td class="desc">{{ $product->name }}</td>
				<td class="unit">{{ $product->pivot->quantity }}</td>
				<td class="qty">{{ $product->price }} TND</td>
				<td class="total">{{ $product->price * $product->pivot->quantity }} TND</td>
			</tr>
			@endforeach
			@foreach ($facture->services as $service)
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
            <td>{{$facture->pht}} TND</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX {{$facture->tva}}%</td>
            <td>{{$facture->tax}} TND</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{$facture->ttc}} TND</td>
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





