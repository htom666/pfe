@extends('layout.main')
@section('content')
<form method="POST" action="{{route('user.updateall',$user->id)}}" class="h-100">
@csrf
  <!-- Default -->
  <div class="panel panel-light">
    <div class="panel-header">
      <h1 class="panel-title">Update {{$user->id}}</h1>
    </div>
    <div class="panel-body">



      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="{{$user->name}}"class="form-control">
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="Email" name="email" value="{{$user->email}}" class="form-control">
      </div>


      <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password here...">
        <small class="form-text text-muted">
          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </small>
      </div>

      <div class="form-group">
        <label for="">Retype Password</label>
        <input type="password" name="password" class="form-control"  placeholder="Enter password here...">
        <small class="form-text text-muted">
          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </small>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Role</label>
        <select name="role_id" class="select2 form-control">
          @if($roles && $roles->count()>0)
          @foreach ($roles as $role)
          <option value="{{$role->id}}{{ $role->id == $user->role_id ? 'selected':'' }}">{{$role->name}}

          </option>
          @endforeach
          @endif
        </select>
      </div>


    </div>

    <div class="panel-footer">
      <button type="submit" class="btn btn-info-lightened">Update user</button>
    </div>
  </div><!-- / Default -->

</form>
@endsection
{{-- 
<br>
<br>
<br>
<br>
<form class="row g-3" method="POST" action="{{route('user.store')}}">
    @csrf
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="inputEmail4">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputAddress">
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label">Password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
      </div>
    <div class="col-md-6">
      <div class="form-group">
        <select name="role_id" class="select2 form-control">
          @if($roles && $roles->count()>0)
          @foreach ($roles as $role)
          <option value="{{$role->id}}">{{$role->name}}

          </option>
          @endforeach
          @endif
        </select>
      </div>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Permission</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>





@endsection --}}