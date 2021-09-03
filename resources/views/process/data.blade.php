@extends('layout.main')
@section('content')
<div class="card panel panel-light page-intro border-0" style="max-width: 100%; border: 1px solid #aaa;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <div class="element-container">
                <div>
                    <img src="{{asset('storage/invoice/invoice.png')}}" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel" style="justify-content:none;">
                <div class="panel-header">
                    <h1 class="panel-title">Extracted invoice</h1>
                </div>
                <form action="{{route('process.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="panel-body">
                    <div class="form-panel">
                        <div class="form-panel-body">
        
                            <div class="form-group">
                                <label for="">Invoice Number</label>
                                <input type="text" name="number" class="form-control" value="{{$number}}">
                            </div>
        
        
                            <div class="form-group">
                                <label for="">Invoice Date</label>
                                <input type="text" name="date" class="form-control" value="{{$date}}">
                            </div>
        
        
        
                            <div class="form-group">
                                <label for="">Invoice Address</label>
                                <input type="text" name="address" class="form-control" value="{{$adress}}">
                            </div>
        
        
                            <div class="form-group">
                                <label for="">Bill to</label>
                                <input type="text" name="dest" class="form-control" value="{{$dest}}">
                            </div>
        
        
                            <div class="form-group">
                                <label for="">Invoice Amount</label>
                                <input type="text" name="amount" class="form-control" value="{{$amount}}">
                            </div>
        
        
                            <div class="form-group">
                                <label for="">Products</label>
                                <input type="text" name="products" class="form-control" value="{{$product}}">
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-md-3 pt-2">Invoice</label>
                                <div class="col-md-6">
                                    <div class="custom-file custom-image custom-image-avatar">
                                        <input type="file" name="invoice" data-placeholder="{{asset('storage/invoice/invoice.png')}}" value="{{asset('storage/invoice/invoice.png')}}" class="custom-image-input" id="customImage">
                                        <label class="custom-image-label" for="customImage">+</label>
                                    </div>
                                </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary px-5">Save</button>
                        </div>
                    </div>        
        
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection