@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Discount for Invoice :{{$facture->invoice_number}}</h1>
    </div>
    <div class="panel-body">

        <div class="row">

            <div class="col-md-12 my-2">

                <div class="table-responsive">

                    <table class="table table-bordered" data-toggle="table">
                        <input type="hidden" name="id" value="{{$facture->id}}">
                        <thead>
                            <tr>
                                <th>
                                    Invoice Number
                                </th>
                                <th>
                                    Company Name
                                </th>
                                <th>
                                    Invoice Date
                                </th>
                                <th>
                                    TTC
                                </th>
                                <th>
                                    Client
                                </th>
                                <th>
                                   Discount
                                </th>
                                <th>
                                    Rest to pay
                                </th>
                                <th>
                                    Invoice Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $facture->invoice_number }}</td>
                                    <td>{{ $facture->company_name }}</td>
                                    <td>{{ $facture->invoice_date }}</td>
                                    <td>{{ $facture->ttc }}</td>
                                    <td>{{$facture->client_id  }}</td>
                                    <td><form method="POST" {{ route('adddis', $facture->id) }}>
                                        @csrf 
                                        <input type="text" name="discount" style="height:40px" >
                                         <button class="btn-icon btn btn-primary-light" type="submit" name="add">add</button>
                                    </form> 
                                </td>
                                <td>@php echo $d->rest_to_pay ?? $facture->ttc @endphp </td>
                                <td>
                                    @if($facture->rest_to_pay > 0)

                                        <span class="badge rounded-pill bg-danger">Unpaid</span>
                                    @else
                                    <span class="badge rounded-pill bg-success">Paid</span>  
                                    @endif

                                </td>
                                </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
{{-- 

        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Manage <b>Invoices</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#deleteEmployeeModal" class="btn btn-success"><i
                                        class="material-icons"></i> <span>IMPORT CUSTOMER</span></a>
                                <a href="#deleteEmployeeModal" class="btn btn-success"><i
                                        class="material-icons"></i> <span>CONTACT</span></a>
                                <a href="{{route('facture.create')}}" class="btn btn-success"><i
                                        class="material-icons">&#xE147;</i> <span>ADD NEW INVOICE</span></a>

                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice Number</th>
                                <th>Company Name</th>
                                <th>Company Address</th>
                                <th>Company Phone</th>
                                <th>Invoice Date</th>
                                <th>TTC</th>
                                <th>Client</th>
                                <th></th>
                                <th>Action</th>
                                <th>Invoice Status</th>
                                <th>Rest To pay</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <tr>
                                <input type="hidden" name="id" value="{{$facture->id}}">
                                <td>{{ $facture->id }}<a href={{route('facture.edit',$facture->id)}}>Edit</a></td>
                                <td>{{ $facture->invoice_number }}</td>
                                <td>{{ $facture->company_name }}</td>
                                <td>{{ $facture->company_address }}</td>
                                <td>{{ $facture->company_phone }}</td>
                                <td>{{ $facture->invoice_date }}</td>
                                <td>{{ $facture->ttc }}</td>
                                <td>{{ $facture->client_id }}</td>
                                <td>{{ $facture->timestamps}}</td>
                                 <td><form method="POST" {{ route('adddis', $facture->id) }}>
                                    @csrf 
                                    <input type="text" name="discount" >
                                     <input  type="submit" name="add" value="add">
                                </form> 
                            </td>
                            {{-- @if($d->rest_to_pay > 0)
                            {
                                <td>unpaid</td>
                            }
                            @else
                               <td>paid</td>
                            @endif
                            <td>rest  @php echo $d->rest_to_pay ?? $facture->ttc @endphp </td>

@endsection --}}