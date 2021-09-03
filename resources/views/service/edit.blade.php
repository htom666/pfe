@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <form action="{{ route('service.update', $service->id) }}" method="POST">
        @method('PUT')
        @csrf
                <div class="panel-header">
                    <h1 class="panel-title">Edit Product</h1>
                </div>
  <div class="panel-body">
    @if (Session::has('success'))
    <div class="alert alert-success-light alert-dismissible" data-animation="fadeOutUp" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"></path></svg>
        </button>
    </div>
    @endif
    <div class="form-panel">
        

        <div class="form-panel-body">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $service->name }}"
                    class="form-control @error('name') error @enderror" placeholder="Name">
                    @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" value="{{ $service->price }}"
                class="form-control @error('price') error @enderror" placeholder="product size">
                @error('price')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-info-lightened">Update</button>
            </div>
        </form>
</div>
@endsection
