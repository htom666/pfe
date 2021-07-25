@extends('layout.main')
@section('content')
<form method="post" action="{{route('roles.update')}}">
<input type="hidde" name="id" value="{{ $role->id}}">



<label for="">Name</label>

<input type="text" name="name" class="form-control" value="{{$role->name}}">


<div class="form-group">
    <label for="permissions">Permission</label>
    <select name="permissions[]" id="permissions" data-toggle="select2" class="form-control" multiple>
        @foreach ($permissions as $permission)
        <option value="{{ $permission->id}}"
            @foreach ($role->permissions as $item)
            @if ($permissions->id == $item->id)
            selected
            @endif
            @endforeach>{{$permission->name}}</option>
            @endforeach
    </select>
</div>
<button class="btn btn-wide btn-success">update</button>


</form>
@endsection