@extends('layout.main')
@section('content')
<br>
<br>
<br>
<br>
<a href="{{route('user.create')}}" class="btn btn-primary btn-lg float-md-right" role="button">Create User</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Permission</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        {
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>permission</td>
                <td>role</td>
                <td>
                  <a href={{route('user.show',$user->id)}}><i class="fa fa-eye"></i></a>
                  <a hrer="{{route('user.edit',$user->id)}}"><i class='fa fa-edit'></i></a>

                </td>


        }
            </tr>
            @endforeach
    </tbody>
  </table>
@endsection