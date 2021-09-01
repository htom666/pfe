@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Add Roles</h1>
    </div>
    <form method="POST" action="{{route('roles.store')}}" >
        @csrf
    <div class="panel-body">
        <div class="form-group">
            <label for="">Role Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name here...">
        </div>
        
            {{-- <div class="field-row">
                <div class="form-group row">
                    <div class="col-md-8 m-auto">
                        <select data-toggle="select2" class="form-control" multiple>
                            
                                @foreach (config('global.permissions') as $name => $value)
                                <option  name="permissions[]" value="{{$name}}"> {{$value}}
                                @endforeach
                            
                        </select>

                    </div>
                </div>
            </div> --}}

                <div class="field-row">
                    <div class="form-group row">
                        <div class="col-md-8 m-auto">

                            <select data-toggle="select2" name="permissions[]" class="form-control" multiple>
                                @foreach (config('global.permissions') as $name => $value)
                                    <option  name="permissions[]" value="{{$name}}">{{$value}}</option>
                                    @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                {{-- <ul class="ks-cboxtags">
                    @foreach (config('global.permissions') as $name => $value)
                    <li>
                      <input  name="permissions[]" id="permissions" value="{{$name}}" type="checkbox">
                      <label for="permissions">{{$value}}</label>
                    </li>
                    @endforeach
                </ul> --}}
            <input type="submit" class="btn btn-info-lightened" value="Add Role">
        
    </div>
</form>
</div>
{{-- <form method="POST" action="{{route('roles.store')}}">
@csrf
<br>
<br>
<br>
<br>

<label> Name</label>
<input type="text" name="name">

<div class="form-group">
    <label for="permissions"> Permissions</label>
        @foreach (config('global.permissions') as $name => $value)
        <option  name="permissions[]" id="permissions" value="{{$name}}"> {{$value}}
        @endforeach
</div>
<button class="btn tbn-wide btn-success">Add</button>
</form>
 --}}
@endsection