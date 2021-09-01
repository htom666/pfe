@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Company List</h1>
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
                                    Client Name
                                </th>
                                <th>
                                    Company Name 
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Immartriclulation
                                </th>
                                
                                <th width="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td>{{$company->id}}</td>
                                  
                                    <td>
                                      {{$company->client->nom}} {{$company->client->prenom}}
                                    </td>
                                    
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->adresse}}</td>
                                    <td>{{$company->immatricule}}</td>
                                    <td class="operations operations-buttons">
                                    <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        {{-- <a href="{{ route('client.show',$company->id) }}" class="btn btn-sm btn-primary-light">View</a> --}}
                                        <a href="{{ route('company.editage', $company->id) }}" class="btn btn-sm btn-info-light">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger-light">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-info-lightened" href="{{ route('company.cr') }}">create a new company</a>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection