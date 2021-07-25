@extends('layout.main')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
      <tr>
        <td>{{$permission->id}}</td>
        <td>{{$permission->name}}</td>
        <td>{{$permission->created_at->diffForHumans()}}</td>
        <td>action</td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection