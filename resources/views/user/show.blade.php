@extends('layout.main')
@section('content')
<table class="table">
    <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>Action</td>
    </tr>
        
    @endforeach
</tbody>
</table>
@endsection