@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
      <h1 class="panel-title">Delivery</h1>
    </div>
    <div class="panel-body">
      <div class="row">
  
        <div class="col-md-12 my-2">
          <table class="table table-bordered table-responsive table-checklist-toggler">
            <form method="POST" action="{{ route('delivery.update') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $delivery->id  ?? ""}}">
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
                @foreach(json_decode($delivery->products) as $product)
                <tr>
                    <td>
                      <div class="custom-control custom-checkbox custom-checkbox-2">
                        <input type="checkbox" name="products[]" value="{{$product->product_id}}" class="custom-control-input" id="table-checkbox-2">
                        <label class="custom-control-label" for="table-checkbox-2"></label>
                      </div>
                    </td>
                    <td>{{$product->product_id}}</td>
                    <td>{{ $product->product_name}} </td>
                    <td>{{$product->quantity}}</td>
                      {{-- <form action="{{route('delivery.quant',$fact->id)}}" method="POST">
                      <input type="number" name="qnt" value="{{ $product['quantity'] }}">
                      <button class="btn-icon btn btn-primary-light" type="submit" name="add">add</button></td>
                    </form> --}}
                    <td>{{ $product->price}}</td>
                    <td>{{ $product->total_price}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <button type="submit"  class="btn btn-info-lightened" style="margin-bottom:19px;"  name="add">Delete delivery</button> 
            </form>
          </table>
        </div>
      </div>
    </div>
</div>
  @endsection