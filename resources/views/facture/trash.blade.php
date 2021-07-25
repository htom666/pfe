@extends('layout.main')
@section('content')
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
                                <th>Invoice Status</th>
                                <th>Rest to pay</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($facture as $facture)
                            <tr>
                                <td>{{ $facture->id }}<a href={{route('facture.edit',$facture->id)}}>Edit</a></td>
                                <td>{{ $facture->invoice_number }}</td>
                                <td>{{ $facture->company_name }}</td>
                                <td>{{ $facture->company_address }}</td>
                                <td>{{ $facture->company_phone }}</td>
                                <td>{{ $facture->invoice_date }}</td>
                                <td>{{ $facture->ttc }}</td>
                                <td>{{ $facture->client_id }}</td>
                                <td><label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label></td>
                                <td>{{ $facture->rest_to_pay}}</td>
                                <td>
                                    {{-- <form action="{{ route('facture.destroy', $facture->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="delete" class="btn btn-danger" data-toggle="tooltip" title="Delete"style="border: none; background-color:transparent;margin-top:-49px;margin-left:24px;"><i class="fa fa-trash text-danger"></i></button>
                                        {{-- <!--<a href="route('client.destroy') }}" class="delete"><i
                                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>-->
                                       <!-- <button type="submit" title="delete" class="btn btn-danger"
                                            style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                        </button>-->
                                    </form> --}}
                                    <a href="{{ route('facture.restore', $facture->id) }}" title="restore invoice">
                                        <i class="fas fa-window-restore text-success  fa-lg"></i>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#">Previous</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection