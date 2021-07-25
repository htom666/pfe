@extends('layout.main')
@section('content')
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
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