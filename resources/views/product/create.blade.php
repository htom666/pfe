

@extends('layout.main')
@section('content')
<div class="panel panel-light">
  <div class="panel-header">
    <h1 class="panel-title">Page Scrollbar</h1>
  </div>
  <div class="panel-body">
    <div class="text-center">
        <div class="row">
               <div class="col-lg-12 margin-tb">
                   <div class="pull-left">
                       <h2>Add New Product</h2>
                   </div>
               </div>
           </div>
           <form method="POST" action="{{ route('product.store') }}">

               @csrf
               @if (Session::has('success_message'))
               <div class="alert alert-success alert-dismissible alert-dismissible-2"
                   data-animation="fadeOut" role="alert">
                   {{ Session::get('success_message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                           <path class="heroicon-ui"
                               d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
                           </path>
                       </svg>
                   </button>
               </div>
            @endif
            @if (Session::has('error_message'))
            <div class="alert alert-error alert-dismissible alert-dismissible-2" data-animation="fadeOut"
            role="alert">
            {{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path class="heroicon-ui"
                        d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z">
                    </path>
                </svg>
            </button>
            </div>
            @endif
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                       <div class="form-group">
                           <strong>Name:</strong>
                           <input type="text" id="name" name="name" value="{{$product->name}}" class="form-control @error('name') error @enderror" placeholder="Name">
                           @error('name')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                   </div>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-group">
                               <strong>Product Size:</strong>
                               <input type="text" id="size" name="size" value="{{$product->size}}" class="form-control @error('size') error @enderror" placeholder="Product Size">
                               @error('size')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                           </div>
                       </div>
                           <div class="col-xs-12 col-sm-12 col-md-12">
                               <div class="form-group">
                                   <strong>Product Quantity:</strong>
                                   <input type="text" id="quantity" name="quantity" value="{{$product->quantity}}" class="form-control @error('quantity') error @enderror" placeholder="Product Quantity">
                                   @error('quantity')
                                   <div class="error">
                                       {{ $message }}
                                   </div>
                                   @enderror
                                </div>
                           </div>
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                       <strong>Product Price:</strong>
                                       <input type="text" id="price" name="price" value="{{$product->price}}"  class="form-control @error('price') error @enderror" placeholder="Product Price">
                                       @error('price')
                                       <div class="error">
                                           {{ $message }}
                                       </div>
                                       @enderror
                                    </div>
                               </div>
                               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                               </div>
               </div>
           </form>
  </div>
 
    
</div>

@endsection

