@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Client type</h1>
    </div>
    <div class="panel-body">
        <form action="{{route('client.type',$client->id)}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-12 my-2">
                <table class="table table-bordered" data-toggle="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Company name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->nom }} {{$client->prenom}}</td>
                        <td>
                            @foreach($client->companies as $com)
                            {{$com->name}}
                            @endforeach
                        </td>
                        <td>{{ $client->email}}</td>
                        <td>{{ $client->telbureau }}</td>
                        <td>  @if($client->type == 0)
                            <a href="#" class="badge badge-primary">Prospect</a>
                            @else
                            <a href="#" class="badge badge-warning">Client</a>
                            @endif
                        </td>
                        <td><select name="type" class="selectpicker show-menu-arrow">
                            <option disabled selected>Select Status</option>
                            <option>Client</option>
                            <option>Prospect</option>
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
