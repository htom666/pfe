@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Toolbar</h1>
    </div>
    <div class="panel-body">

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
                                    Prospect Name
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
                                
                                <th width="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($prospects as $prospect)
                                @foreach($prospect->companies as $comp)
                                <tr>
                                    <td>{{$prospect->id}}</td>
                                    <td>{{$prospect->nom}}</td>
                                    <td>{{$comp->name}}</td>
                                    <td>{{$prospect->email}}</td>
                                    <td>{{$prospect->telbureau}}</td>
                                    <td class="operations operations-buttons">
                                        <form action="{{ route('prospect.destroy', $prospect->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <a href="{{ route('prospect.show',$prospect->id) }}" class="btn btn-sm btn-primary-light">View</a>
                                        <a href="{{ route('prospect.edit', $prospect->id) }}" class="btn btn-sm btn-info-light">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger-light">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <a class="button m-1 btn btn-primary" href="{{ route('prospect.create') }}">Create Prospect</a>
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