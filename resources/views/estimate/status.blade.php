@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Estimate Status</h1>
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
        <form action="{{route('estimate.updatestatus',$estimate->id)}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-12 my-2">
                <table class="table table-bordered" data-toggle="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>HTT</th>
                            <th>Status</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>{{ $estimate->estimate_number }}</td>
                        <td>{{ $estimate->company_name }}</td>
                        <td>{{ $estimate->company_address }}</td>
                        <td>{{ $estimate->estimate_date }}</td>
                        <td>{{ $estimate->expiration_date }}</td>
                        <td>{{ $estimate->ttc }}</td>
                            @if($estimate->status == 0)
                            <td><span class="badge color-badge badge-success"></span> Published</td>
                            @else
                            <td><span class="badge color-badge badge-danger"></span> Drafted</td>
                            @endif
                        <td><select name="status" class="selectpicker show-menu-arrow">
                            <option disabled selected>Select Status</option>
                            <option>Cancel</option>
                            <option>Publish</option>
                          </select>                          
                          </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
           <button type="submit" class="btn btn-info-lightened" value="submit">Update Status</button>
            </form>
    </div>
@endsection
