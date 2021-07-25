@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Service</h2>
            </div>
            <!---<div class="pull-right">
                    <a class="btn btn-primary" href="" title="Go back"> 
                        <i class="fas fa-backward "></i> </a>
                </div>
            -->
        </div>
    </div>
    <form method="POST" action="{{ route('service.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Service Price</strong>
                    <input type="text" id="price" name="price" class="form-control" placeholder="Service Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
