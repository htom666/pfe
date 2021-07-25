@extends('layout.main')
@section('content')
<h3> Name : {{$user->name}}</h3>
<h3> Email : {{$user->email}}</h3>

<h1> Permission</h1>
<h1> Role</h1>
@endsection