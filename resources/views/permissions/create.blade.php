@extends('layout.main')
@section('content')
<form  method="post" action="{{ route('permissions.store') }}">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control @error('name') error @enderror"
            value="{{ old('name') }}" placeholder="permission name">
        @error('name')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group text-right">
        <button class="btn btn-wide btn-success">Add</button>
    </div>
</form>
@endsection