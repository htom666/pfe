@extends('layout.main')
@section('content')

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<input type="hidden" name="id" value="{{ $facture->id }}">
<div class="form-check">
    @foreach ($facture->products as $product)
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        <div name="id">{{$product->id}}</div>
     <div name="name">{{ $product->name }}</div>
     <div name="quantity">{{ $product->pivot->quantity }}</div>
     <div name="price">{{ $product->price * $product->pivot->quantity }}</div>
    </label>
    <br>
    @endforeach
  </div>
@endsection