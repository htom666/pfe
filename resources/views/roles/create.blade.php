@extends('layout.main')
@section('content')
<form method="POST" action="{{route('roles.store')}}">
<br>
<br>
<br>
<br>
@csrf

<label> Name</label>
<input type="text" name="name">

<div class="form-grou">
    <label for="permissions"> Permissions</label>
    <select name="permissions[]" id="permissions" data-toggle="select2" class="form-control" multiple>
        @foreach ($permissions as $permission)
        <option value="{{ $permission->id}}">{{$permission->name}}</option>
        @endforeach
    </select>
</div>
<button class="btn tbn-wide btn-success">Add</button>
</form>





@endsection