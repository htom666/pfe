@extends('layout.main')
@section('content')
    <div class="card panel panel-light page-intro border-0" style="max-width: 100%; border: 1px solid #aaa;">
        <form action="{{ route('process.update') }}" method="POST">
            <input type="hidden" name="id" value="{{ $invoice->id }}">
            @csrf
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="element-container">
                        <div>

                            <img src="{{ asset('storage/invoice/invoice.png') }}" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-header">
                            <h1 class="panel-title">Extracted invoice</h1>
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">


                                <div class="form-panel-body">

                                    <div class="form-group">
                                        <label for="">Invoice Number</label>
                                        <input type="text" name="number" class="form-control"
                                            value="{{ $invoice->number }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="">Invoice Date</label>
                                        <input type="text" name="date" class="form-control" value="{{ $invoice->date }}">
                                    </div>



                                    <div class="form-group">
                                        <label for="">Invoice Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $invoice->address }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="">Bill to</label>
                                        <input type="text" name="dest" class="form-control" value="{{ $invoice->dest }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="">Invoice Amount</label>
                                        <input type="text" name="amount" class="form-control" value="{{ $invoice->amout }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="">Products</label>
                                        <input type="text" name="products" class="form-control"
                                            value="{{ $invoice->product }}">
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
