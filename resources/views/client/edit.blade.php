@extends('layout.main')
@section('content')
<form class="needs-validation" method="POST" action="{{ route('client.update', $client->id) }}">
    @method('PUT')
    @csrf
    <!-- Validation -->
    <div class="panel panel-light">
        <div class="panel-header">
            <h1 class="panel-title">Client</h1>
        </div>
        <div class="panel-body">
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
            <div class="row">
            
                <div class="col-md-12 my-2">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">First name</label>
                            <input type="text" name="nom" value="{{$client->nom}}" class="form-control" id="validationCustom01" placeholder="First name"  >
                            @error('nom')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Last name</label>
                            <input type="text" name="prenom" value="{{$client->prenom}}" class="form-control" id="validationCustom02" placeholder="Last name" >
                            @error('prenom')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Job</label>
                            <input type="text" name="metier" value="{{$client->metier}}" class="form-control" id="validationCustom02" placeholder="Last name" >
                            @error('metier')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">City</label>
                            <input type="text" name="city" value="{{$client->city}}"class="form-control" id="validationCustom03" placeholder="City" >
                            @error('city')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">State</label>
                            <input type="text" name="state" value="{{$client->state}}" class="form-control" id="validationCustom04" placeholder="State" >
                            @error('state')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Zip</label>
                            <input type="text" name="zip" value="{{$client->zip}}" class="form-control" id="validationCustom05" placeholder="Zip" >
                            @error('zip')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{$client->email}}" class="form-control" placeholder="Enter email here..." >
                        @error('email')
                        <div class="error">
                            {{ $message }}
                        </div>
                        @enderror    
                    </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Civility</label>
                                <select name="civilite" value="{{$client->civilite}}" class="form-control" id="civilite">
                                    <option disabled="disabled" value="{{$client->civilite}}">Select</option>
                                    <option>Mrs</option>
                                    <option>Mr</option>
                                    <option>Ms</option>
                                </select>
                            </div>
                            @error('civilite')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Consentement</label>
                            <input type="text" name="consentement" value="{{$client->consentement}}" class="form-control" placeholder="Enter consentement here...">
                            @error('consentement')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone</label>
                            <input type="tel" name="telbureau" value="{{$client->telbureau}}" class="form-control" placeholder="Enter phone here...">
                            @error('telbureau')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Cell-phone</label>
                            <input type="tel" name="portable" value="{{$client->portable}}" class="form-control" placeholder="Enter cellphone here..." >
                            @error('portable')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Telecopy</label>
                            <input type="tel" name="telecopie" class="form-control" value="{{$client->telecopie}}" placeholder="Enter telecopy here..." >
                            @error('telecopie')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                
                </div>

            </div>

        </div>
    </div><!-- / Validation -->
  @include('company.edit')
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-info-lightened">Update customer</button>
</div>
</form>
@endsection