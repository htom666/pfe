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

                            <img src="{{asset('storage/invoices/' . $invoice->id . '/' . $invoice->invoice)}}" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-header">
                            <h1 class="panel-title">Extracted invoice</h1>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('success'))
                            <div class="alert alert-success-light alert-dismissible" data-animation="fadeOutUp" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"></path></svg>
                                </button>
                            </div>
                            @endif
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
                                    <button type="submit" class="btn btn-primary-light">Update extracted invoice</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
