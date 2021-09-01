@extends('layout.main')
@section('content')
{{-- 
<div class="panel panel-light" id="selectables-custom-icon">
  <div class="panel-header">
    <h1 class="panel-title">Invoice N° - {{$fact->invoice_number}}</h1>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6 col-lg-6">
        <h2 class="panel-title">Client Info</h2>
        <p class="my-2">Client ID : {{$fact->client_id}}</p>
        <p class="my-2">Company Name : {{$fact->company_name}}</p>
        <p class="my-2">Phone: {{$fact->company_phone}}</p>
        <p class="my-2">Paiment : {{$fact->rest_to_pay}}</p>
        <h2 class="panel-title">Products</h2>
        <form method="POST" action="{{ route('delivery.store', $fact->id) }}">
          @csrf
          <input type="hidden" name="id" value="{{ $fact->id }}">
          @foreach ($products as $product)
                         <div class="col col-input" style="max-width: 40px;">
                        </div>
                        <div class="col col-info">
                          <hr class="mb-30"> 
                          <label class="check">
                             
                            
                                <input class="custom-control-input" type="checkbox" name="products[]" value="{{ $product['product_id'] }}">
                              <span class="info-title">{{ $product['product_name'] }} </span>

                            </label>
                            {{-- <input type="number" name="quant" value="{{$product['quantity']}}">
                        </div>
                       
                         @endforeach
                         <br>
                         <br>
                         <button type="submit"  class="btn btn-primary"  name="add">Make delivery
                         </button>
                         
        </form>
      
          {{-- @csrf
          @foreach ($products as $product)
          {{-- <div class="form-check"> --}}
            {{-- <div class="list-group checkbox-list-group">
            <div class="list-group-item list-group-item-info">
              <label>
                <input type="checkbox" name="products[]" value="{{ $product['product_id'] }}">
                <span class="list-group-item-text"><i class="fa fa-fw"></i>{{ $product['product_name'] }}
                </span></label>
              </div>
            </div> --}}
              {{-- <input type="checkbox" class="form-check-input" id="materialUnchecked" name="products[]" value="{{ $product['product_id'] }}">
            <label class="form-check-label" for="materialUnchecked"> {{ $product['product_name'] }}</label> --}}
          {{-- </div>
        @endforeach
      </div>
    </div>

  </div>
</div> --}}
<div class="panel panel-light">
  <div class="panel-header">
    <h1 class="panel-title">Toggle With Row</h1>
  </div>
  <div class="panel-body">
    <div class="row">

      <div class="col-md-12 my-2">
        <table class="table table-bordered table-responsive table-checklist-toggler">
          <form method="POST" action="{{ route('delivery.store', $fact->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $fact->id }}">
          <thead>
            <tr>
              <th width="1">
                <div class="custom-control custom-checkbox custom-checkbox-2">
                  <input type="checkbox"  class="custom-control-input table-checkbox-all" id="table-checkbox-all-with-rows">
                  <label class="custom-control-label" for="table-checkbox-all-with-rows"></label>
                </div>
              </th>
              <th>ID</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>
                <div class="custom-control custom-checkbox custom-checkbox-2">
                  <input type="checkbox" name="products[]" value="{{ $product['product_id'] }}" class="custom-control-input" id="table-checkbox-2">
                  <label class="custom-control-label" for="table-checkbox-2"></label>
                </div>
              </td>
              <td>{{ $product['product_id']}}</td>
              <td>{{ $product['product_name'] }} </td>
              <td>{{$product['quantity']}}</td>
                {{-- <form action="{{route('delivery.quant',$fact->id)}}" method="POST">
                <input type="number" name="qnt" value="{{ $product['quantity'] }}">
                <button class="btn-icon btn btn-primary-light" type="submit" name="add">add</button></td>
              </form> --}}
              <td>{{ $product['price'] }}</td>
              <td>{{ $product['total_price'] }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <button type="submit"  class="btn btn-info-lightened"  name="add">Make delivery</button>  
      </form>
      </div>

    </div>
  </div>
</div>
        {{-- @foreach ($facture->products as $product)
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        <div name="id">{{$product->id}}</div>
     <div name="name">{{ $product->prodname }}</div>
     <div name="quantity">{{ $product->pivot->quantity }}</div>
     <div name="price">{{ $product->prodprice * $product->pivot->quantity }}</div>
    </label>
    <br>
    @endforeach
  </div> --}}
        {{-- <form method="POST" action="{{ route('delivery.store', $fact->id) }}">
            @csrf
            <label><strong>Products :</strong></label><br>
            @foreach ($products as $product)
                <label><input type="checkbox" name="products[]"
                        value="{{ $product['product_id'] }}">{{ $product['product_name'] }}</label>
            @endforeach
            <input type="submit" name="add" value="add">
        </form>
       
       <a href="{{route('delivery.show',$delivery->id)}}">gg</a> --}}
      <style>
       body {
          background-color: #8E24AA
      }
      
      .mt-100 {
          margin-top: 100px
      }
      
      .mb-30 {
          margin-bottom: 30px
      }
      
      .card {
          position: relative;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          background-color: #fff;
          background-clip: border-box;
          border: 1px solid #d2d2dc;
          border-radius: 0
      }
      
      .card .card-body {
          padding: 1.25rem 1.75rem
      }
      
      .card-body {
          flex: 1 1 auto;
          padding: 1.25rem
      }
      
      .card .card-title {
          color: #000000;
          margin-bottom: 0.625rem;
          text-transform: capitalize;
          font-size: 0.875rem;
          font-weight: 500
      }
      
      .card .card-description {
          margin-bottom: .875rem;
          font-weight: 400;
          color: #76838f
      }
      
      p {
          font-size: 0.875rem;
          margin-bottom: .5rem;
          line-height: 1.5rem
      }
      
      label.check {
          cursor: pointer
      }
      
      label.check input {
          position: absolute;
          top: 0;
          left: 0;
          visibility: hidden;
          pointer-events: none
      }
      
      label.check span {
          padding: 7px 14px;
          border: 2px solid #8f37aa;
          display: inline-block;
          color: #8f37aa;
          border-radius: 3px;
          text-transform: uppercase
      }
      
      label.check input:checked+span {
          border-color: #8f37aa;
          background-color: #8f37aa;
          color: #fff
      }
    </style>
    @endsection
