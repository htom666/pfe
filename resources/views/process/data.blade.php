@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Extracted invoice</h1>
    </div>
    <div class="panel-body">

            <div class="separator subtitle mb-3">
                <span class="bar"></span>
                <span>1. Text Inputs</span>
            </div>

            <div class="form-panel">
                

                <div class="form-panel-body">

                    <div class="form-group">
                        <label for="">Invoice Number</label>
                        <input type="text" class="form-control" value="{{$number}}">
                    </div>


                    <div class="form-group">
                        <label for="">Invoice Date</label>
                        <input type="text" class="form-control" value="{{$date}}">
                    </div>



                    <div class="form-group">
                        <label for="">Invoice Address</label>
                        <input type="text" class="form-control" value="{{$adress}}">
                    </div>


                    <div class="form-group">
                        <label for="">Bill to</label>
                        <input type="text" class="form-control" value="{{$dest}}">
                    </div>


                    <div class="form-group">
                        <label for="">Invoice Amount</label>
                        <input type="text" class="form-control" value="{{$amount}}">
                    </div>


                    <div class="form-group">
                        <label for="">Products</label>
                        <input type="text" class="form-control" value="{{$product}}">
                    </div>
                </div>

            </div>        

    </div>

    <div class="panel-footer">
        <button type="submit" class="btn btn-primary px-5">Save</button>
        <a href="#" class="btn btn-secondary ml-2">Back</a>
    </div>
</div>
@endsection