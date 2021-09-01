@extends('layout.main')
@section('content')
<form method="POST" action="{{route('roles.update',$role->id)}}">
    @csrf
<br>
<br>
<br>
<br>

<label> Name</label>
<input type="text" value="{{$role->name}}" name="name">

<div class="form-grou">
    <label for="permissions"> Permissions</label>
        @foreach (config('global.permissions') as $name => $value)
        <input type ="checkbox"  name="permissions[]" id="permissions" value="{{$name}}" {{ in_array($name,$role->permissions)? 'checked' : ''}}> {{$value}}
        @endforeach
    </select>
</div>
<button class="btn tbn-wide btn-success">Add</button>
</form>





@endsection