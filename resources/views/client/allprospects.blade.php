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
                                        <a href="{{ route('client.edittype',$client->id) }}" class="btn btn-sm btn-primary-light">Type</a>
                                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-sm btn-info-light">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger-light">Delete</button>
                                        </form>
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
</div>
@endsection