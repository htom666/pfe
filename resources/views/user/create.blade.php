@extends('layout.main')
@section('content')
<form method="POST" action="{{route('user.store')}}" class="h-100"  enctype="multipart/form-data">
@csrf
@if (Session::has('success'))
                <div class="alert alert-success-light alert-dismissible" data-animation="fadeOutUp" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
                            </path>
                        </svg>
                    </button>
                </div>
            @endif
  <!-- Default -->
  <div class="panel panel-light">
    <div class="panel-header">
      <h1 class="panel-title">Create User</h1>
    </div>
    <div class="panel-body">



      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control">
        @error('name')
        <div class="error">
        {{ $message }}
         </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="">Last name</label>
        <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control">
        @error('last_name')
        <div class="error">
        {{ $message }}
         </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="Email" name="email" value="{{old('email')}}" class="form-control">
        @error('email')
        <div class="error">
        {{ $message }}
         </div>
        @enderror
      </div>


      <div class="form-group">
        <label for="">Password</label>
        <input  type="password" name="password" class="form-control" placeholder="Enter password here...">
        @error('password')
        <div class="error">
        {{ $message }}
         </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="">Retype Password</label>
        <input type="password"  name="password_confirmation"  class="form-control" placeholder="Enter password here...">
        <small class="form-text text-muted">
        </small>
      </div>
      <div class="form-group row mb-4">
        <label class="col-md-3 pt-2">Avatar</label>
        <div class="col-md-6">
            <div class="custom-file custom-image custom-image-avatar">
                <input type="file" name="personal_image" data-placeholder="../../../assets/misc/placeholder.jpg" class="custom-image-input" id="customImage">
                <label class="custom-image-label" for="customImage">+</label>
            </div>
        </div>
    </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Role</label>
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

    <div class="panel-footer">
      <button type="submit" class="btn btn-info-lightened">Create user</button>
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