@extends('layout.main')
@section('content')
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
      <label for="inputCity" class="form-label">Role</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Permission</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>





@endsection