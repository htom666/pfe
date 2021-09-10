@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Prospects List</h1>
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
                                <th>
                                    Type
                                </th>
                                
                                <th width="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($prospects as $client)
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
                                        <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <a href="{{ route('client.show',$client->id) }}" class="btn btn-sm btn-primary-light">View</a>
                                        @can('edit-clients-type')
                                        <a href="{{ route('client.edittype',$client->id) }}" class="btn btn-sm btn-primary-light">Type</a>
                                        @endcan
                                        @can('edit-clients')
                                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-sm btn-info-light">Edit</a>
                                        @endcan
                                        @can('delete-clients')
                                        <button type="submit" class="btn btn-sm btn-danger-light">Delete</button>
                                        @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    @can('add-clients')
                    <a class="button m-1 btn btn-primary" href="{{ route('client.create') }}">Create Client</a>
                    @endcan
                </div>

            </div>

        </div>
    </div>
</div>
@endsection