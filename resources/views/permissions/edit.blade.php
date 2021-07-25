@extends('layout.main')
@section('content')
<form method="POST" action="{{route('permissions.update')}}">


<input type="hidden" name="id" value="{{$permission->id}}">
<label>name</label>
<input type="text" name="name" value="{{$permission->name}}">
<button class="btn tbn-wide btn-success">update</button>
</form>




@endsection