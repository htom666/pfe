@extends('layout.main')
@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">created</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
      <tr>

        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>{{$role->created_at->diffForHumans()}}</td>
        <td>action</td>
      </tr>
      @endforeach
    </tbody>
  </table>


  @endsection