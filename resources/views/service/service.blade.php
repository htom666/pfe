@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
      <h1 class="panel-title">Services List</h1>
    </div>
    <div class="panel-body">
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible alert-dismissible-2" data-animation="fadeOut"
          role="alert">
          <strong>{{ Session::get('success') }}</strong>
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
  
        <div class="col-md-12 my-2">
          <div class="table-responsive-wrapper">
            <table class="table table-bordered table-fixed" id="window-overflow">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
        @foreach ($service as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }}</td>
                <td class="operations">
                  <form action="{{route('service.destroy',$service->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('service.show',$service->id)}}" class="btn-icon btn btn-primary-light" data-toggle="tooltip" title="View">
                      <svg fill="#5780f7" viewBox="0 0 1024 1024"><path d="M966.070 981.101l-304.302-331.965c68.573-71.754 106.232-165.549 106.232-265.136 0-102.57-39.942-199-112.47-271.53s-168.96-112.47-271.53-112.47-199 39.942-271.53 112.47-112.47 168.96-112.47 271.53 39.942 199.002 112.47 271.53 168.96 112.47 271.53 112.47c88.362 0 172.152-29.667 240.043-84.248l304.285 331.947c5.050 5.507 11.954 8.301 18.878 8.301 6.179 0 12.378-2.226 17.293-6.728 10.421-9.555 11.126-25.749 1.571-36.171zM51.2 384c0-183.506 149.294-332.8 332.8-332.8s332.8 149.294 332.8 332.8-149.294 332.8-332.8 332.8-332.8-149.294-332.8-332.8z"></path></svg>
                    </a>
                    <a href="{{ route('service.edit',$service->id)}}" class="btn-icon btn btn-info-light" data-toggle="tooltip" title="Edit">
                      <svg fill="#5780f7" viewBox="0 0 1024 1024"><path d="M978.101 45.898c-28.77-28.768-67.018-44.611-107.701-44.611-40.685 0-78.933 15.843-107.701 44.611l-652.8 652.8c-2.645 2.645-4.678 5.837-5.957 9.354l-102.4 281.6c-3.4 9.347-1.077 19.818 5.957 26.85 4.885 4.888 11.43 7.499 18.104 7.499 2.933 0 5.891-0.502 8.744-1.541l281.6-102.4c3.515-1.28 6.709-3.312 9.354-5.958l652.8-652.8c28.768-28.768 44.613-67.018 44.613-107.702s-15.843-78.933-44.613-107.701zM293.114 873.883l-224.709 81.71 81.712-224.707 566.683-566.683 142.997 142.997-566.683 566.683zM941.899 225.098l-45.899 45.899-142.997-142.997 45.899-45.899c19.098-19.098 44.49-29.614 71.498-29.614s52.4 10.518 71.499 29.616c19.098 19.098 29.616 44.49 29.616 71.498s-10.52 52.4-29.616 71.498z"></path></svg>
                    </a>
                    <button type="submit" class="delete-btns btn-icon btn btn-danger-light" data-id="1" data-toggle="tooltip" title="Delete">
                      <svg fill="#ed3472" viewBox="0 0 1024 1024">
                        <path d="M793.6 102.4h-179.2v-25.6c0-42.347-34.453-76.8-76.8-76.8h-102.4c-42.347 0-76.8 34.453-76.8 76.8v25.6h-179.2c-42.347 0-76.8 34.453-76.8 76.8v51.2c0 33.373 21.403 61.829 51.2 72.397v644.403c0 42.349 34.453 76.8 76.8 76.8h512c42.349 0 76.8-34.451 76.8-76.8v-644.403c29.797-10.568 51.2-39.024 51.2-72.397v-51.2c0-42.347-34.451-76.8-76.8-76.8zM409.6 76.8c0-14.115 11.485-25.6 25.6-25.6h102.4c14.115 0 25.6 11.485 25.6 25.6v25.6h-153.6v-25.6zM742.4 972.8h-512c-14.115 0-25.6-11.485-25.6-25.6v-640h563.2v640c0 14.115-11.485 25.6-25.6 25.6zM819.2 230.4c0 14.115-11.485 25.6-25.6 25.6h-614.4c-14.115 0-25.6-11.485-25.6-25.6v-51.2c0-14.115 11.485-25.6 25.6-25.6h614.4c14.115 0 25.6 11.485 25.6 25.6v51.2z"></path><path class="path2" d="M640 358.4c-14.139 0-25.6 11.462-25.6 25.6v512c0 14.139 11.461 25.6 25.6 25.6s25.6-11.461 25.6-25.6v-512c0-14.138-11.461-25.6-25.6-25.6z"></path><path class="path3" d="M486.4 358.4c-14.138 0-25.6 11.462-25.6 25.6v512c0 14.139 11.462 25.6 25.6 25.6s25.6-11.461 25.6-25.6v-512c0-14.138-11.462-25.6-25.6-25.6z"></path><path class="path4" d="M332.8 358.4c-14.138 0-25.6 11.462-25.6 25.6v512c0 14.139 11.462 25.6 25.6 25.6s25.6-11.461 25.6-25.6v-512c0-14.138-11.462-25.6-25.6-25.6z"></path>
                      </svg>
                    </a>
                  </form>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="col-md-4 mt-4">
    <button type="button" class="btn btn-info-lightened"  data-toggle="modal" data-target="#modal-fade-scale">Add Service</button>
  </div>
</div>
<div class="modal modal-fade-scale" tabindex="-1" role="dialog" id="modal-fade-scale">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Add Service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"></path></svg>
              </button>
          </div>
          <div class="modal-body">


              <form class="h-100" method="POST" action="{{ route('service.store') }}">
                @csrf

               <!-- Material Design Outlined -->
               {{-- <div class="panel panel-light"> --}}

                   <div class="form-group form-group-material form-group-material-outline">
                     <input type="text" name="name" value="{{ old('name') }}" class="form-control  @error('name') error @enderror" autocomplete="off" id="form-group-material-outlined-1">
                     @error('name')
                     <div class="error">
                         {{ $message }}
                     </div>
                 @enderror
                     <label for="form-group-material-outlined-1">Service Name</label>
                     <span class="highlight"></span>
                     <span class="bar"></span>
                   </div>

                  <div class="form-group form-group-material form-group-material-outline">
                    <input type="text" name="price"  value="{{ old('price') }}" class="form-control" autocomplete="off" id="form-group-material-outlined-1">
                    @error('price')
                     <div class="error">
                         {{ $message }}
                     </div>
                 @enderror
                    <label for="form-group-material-outlined-1">Price</label>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                  </div>
               {{-- </div><!-- / Material Design Outlined --> --}}
               <button type="submit" class="m-1 btn btn-outline-primary">Add</button>
             </form>





              {{-- <form method="POST" action="{{ route('product.store') }}">
                  @csrf
              <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <input type="text" name="prodname" class="md-textarea form-control" rows="4">
              </div>
              <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <input type="text" name="prodsize" class="md-textarea form-control" rows="4">
              </div>
              <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <input type="text" name="productquant" class="md-textarea form-control" rows="4">
              </div>
              <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <input type="text" name="prodprice" class="md-textarea form-control" rows="4">
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-success">OK</button>
          </div>
      </form> --}}
      </div>
  </div>
</div>




</div>
@endsection

@section('extra-js')


@if ($errors->any())
    <script>
        $('#modal-fade-scale').modal({
            show: true
        });
    </script>
@endif

{{-- @if ($errors->any())
    <script>
        $('#modal-fade-scale1').modal({
            show: true
        });
    </script>
@endif --}}



@endsection
