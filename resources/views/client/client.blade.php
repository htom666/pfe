@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Customers List</h1>
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
        <div class="row">

            <div class="col-md-12 my-2">

                <div class="table-responsive">

                    <table id="datatable-toolbar" class="table table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Client Name
                                </th>
                                <th>
                                    Company Name 
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Type
                                </th>
                                
                                <th width="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($clients as $client)
                                @foreach($client->companies as $comp)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->nom}}</td>
                                    <td>{{$comp->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->telbureau}}</td>
                                    <td>
                                        @if($client->type == 0)
                                        <a href="#" class="badge badge-primary">Prospect</a>
                                        @else
                                        <a href="#" class="badge badge-warning">Client</a>
                                        @endif
                                    </td>
                                    <td class="operations operations-buttons">
                                        <a href="{{ route('client.show',$client->id) }}" class="btn btn-sm btn-primary-light">View</a>
                                        <a href="{{ route('client.edittype',$client->id) }}" class="btn btn-sm btn-primary-light">Type</a>
                                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-sm btn-info-light">Edit</a>
                                        <button type="submit"  class="btn btn-sm btn-danger-light"  data-toggle="modal" data-target="#confirm-modal">
                                            <span>Delete</span>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" tabindex="-1" role="dialog" id="confirm-modal">
            
                                    <div class="modal-dialog modal-dialog-centered modal-confirm confirm-danger">
                                        <form action="{{ route('client.destroy', $client->id) }}" method="POST">
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
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-info-lightened" href="{{ route('client.create') }}">Create Client</a>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Toolbar 2 -->
{{-- <div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Toolbar</h1>
    </div>
    <div class="panel-body">

        <p>This is a datatable by Datatables.net, with toolbar.</p>

        <div class="row">

            <div class="col-md-12 my-2">

                <div class="table-responsive">
                    <table id="datatable-toolbar" class="table table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="has-sorter" data-column="id">
                                    ID
                                    <div class="btn-group-vertical btn-group-sort">
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-up"></i></button>
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-down"></i></button>
                                    </div>
                                </th>
                                <th class="has-sorter" data-column="title">
                                    Client Name
                                    <div class="btn-group-vertical btn-group-sort">
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-up"></i></button>
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-down"></i></button>
                                    </div>
                                </th>
                                <th class="has-sorter" data-column="slug">
                                    Company Name 
                                    <div class="btn-group-vertical btn-group-sort">
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-up"></i></button>
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-down"></i></button>
                                    </div>
                                </th>
                                <th class="has-sorter" data-column="author">
                                    Email
                                    <div class="btn-group-vertical btn-group-sort">
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-up"></i></button>
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-down"></i></button>
                                    </div>
                                </th>
                                <th class="has-sorter" data-column="status">
                                    Phone
                                    <div class="btn-group-vertical btn-group-sort">
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-up"></i></button>
                                        <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-caret-down"></i></button>
                                    </div>
                                </th>
                                
                                <th width="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($clients as $client)
                                @foreach($client->companies as $comp)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->nom}}</td>
                                    <td>{{$comp->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->telbureau}}</td>
                                    <td class="operations operations-buttons">
                                        <a href="{{ route('client.show',$client->id) }}" class="btn btn-sm btn-primary-light">View</a>
                                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-sm btn-info-light">Edit</a>
                                        <a href="{{ route('client.destroy', $client->id) }}" class="btn btn-sm btn-danger-light">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <a class="button m-1 btn btn-primary" href="{{ route('client.create') }}">Create Client</a>
                </div>
            </div>

        </div>
    </div>
</div> --}}

























        {{-- <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Manage <b>Customers</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#deleteEmployeeModal" class="btn btn-success"><i
                                        class="material-icons"></i> <span>IMPORT CUSTOMER</span></a>
                                <a href="#deleteEmployeeModal" class="btn btn-success"><i
                                        class="material-icons"></i> <span>CONTACT</span></a>
                                <a href="{{route('client.create')}}" class="btn btn-success"><i
                                        class="material-icons">&#xE147;</i> <span>ADD NEW CUSTOMER</span></a>

                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Active</th>
                                <th>Date</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}<a href={{route('client.edit',$client->id)}}>Edit</a></td>
                                <td>{{ $client->nomsociete }}</td>
                                <td>{{ $client->nom }}{{ $client->prenom }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->telbureau }}</td>
                                <td><label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label></td>
                                <td>{{ $client->timestamps}}</td>
                                <td>
                                    <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                                        <a href="{{ route('client.edit',$client->id) }}" class="edit"><i
                                                class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="delete" class="btn btn-danger" data-toggle="tooltip" title="Delete"style="border: none; background-color:transparent;margin-top:-49px;margin-left:24px;"><i class="fa fa-trash text-danger"></i></button>
                                        <!--<a href="route('client.destroy') }}" class="delete"><i
                                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>-->
                                       <!-- <button type="submit" title="delete" class="btn btn-danger"
                                            style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                        </button>-->
                                    </form>
                                   
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
        </div> --}}
@endsection