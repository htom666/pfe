@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Invoice List</h1>
    </div>
    <div class="panel-body">
        @if (Session::has('success'))
        <div class="alert alert-success-light alert-dismissible" data-animation="fadeOutUp" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui"
                        d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
                    </path>
                </svg>
            </button>
        </div>
    @endif
        <a href="{{route('estimate.create')}}" class="btn btn-info-lightened"><span>Add New Estimate</span></a>
        <br>
        <br>
        <div class="row">

            <div class="col-md-12 my-2">

                <table id="datatable-column-search" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Number</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Number</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($estimates as $estimate)
                            <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $estimate->estimate_number }}</td>
                            <td>{{ $estimate->company_name }}</td>
                            <td>{{ $estimate->company_address }}</td>
                            <td>{{ $estimate->estimate_date }}</td>
                            <td>{{ $estimate->expiration_date }}</td>
                            <td>{{$user->name}}</td>
                                  <td class="operations operations-buttons">
                                    <form action="{{ route('estimate.forcedelete', $estimate->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        {{-- <a href="{{ route('client.show',$company->id) }}" class="btn btn-sm btn-primary-light">View</a> --}}
                                        <a href="{{ route('estimate.restore', $estimate->id) }}"  class="btn btn-sm btn-info-light">Restore</a>
                                        <button type="submit" data-toggle="modal" data-target="#confirm-modal" class="btn btn-sm btn-danger-light">Delete</button>
                                        </form>
                                    </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="confirm-modal">
            
    <div class="modal-dialog modal-dialog-centered modal-confirm confirm-danger">
        <form action="{{ route('estimate.forcedelete', $estimate->id ?? "") }}" method="POST">
            @csrf
            @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-times"></i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Do you really want to delete this item? This process cannot be undone.</p>
            </div>
            <div class="modal-footer row">
                <div class="col-md-6 px-2">
                    <button class="btn my-1 btn-secondary btn-block" data-dismiss="modal">No</button>
                </div>
                <div class="col-md-6 px-2">
                    <button class="btn my-1 btn-danger btn-block" type="submit">YES</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection