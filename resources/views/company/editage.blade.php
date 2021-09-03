@extends('layout.main')
@section('content')
<div class="panel panel-light">
    <div class="panel-header">
         <form action="{{route('company.updatage',$company->id)}}" method="POST">
            @csrf
        <h1 class="panel-title">Company</h1>
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
            <div class="col-md-4 mb-3">
        <label for="validationCustom01">Client Name</label>
            
            <select data-toggle="select2" data-search="true" class="custom-select" name="client_id" id="clients">
                @foreach($clients as $client)
         <option value="{{ $client->id }}"{{ $client->id == $company->client_id ? 'selected':'' }}>{{ $client->nom }}</option>
         @endforeach    
        </select>
        @error('client_id')
        <div class="error">
            {{ $message }}
        </div>
        @enderror
            </div>
            <div class="col-md-12 my-2">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Company Name</label>
                        <input type="text" name="name" value="{{$company->name}}" class="form-control" id="validationCustom01"
                            placeholder="company name here ..." >
                            @error('name')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Juridic Form</label>
                        <input type="text" name="juridikform" value="{{$company->juridikform}}" class="form-control" id="validationCustom02"
                            placeholder="juridic form here ..." >
                            @error('juridikform')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">SIRET</label>
                        <input type="text" name="siret" value="{{$company->siret}}" class="form-control" id="validationCustom03" placeholder="siret here ..."
                            >
                            @error('siret')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">APE/NAF</label>
                        <input type="text" name="apenaf" value="{{$company->apenaf}}" class="form-control" id="validationCustom04"
                            placeholder="APE/NAF here..." >
                            @error('apenaf')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">TVA Intra</label>
                        <input type="text" name="tvaintra" value="{{$company->tvaintra}}" class="form-control" id="validationCustom05"
                            placeholder="TVA here..." >
                            @error('tvaintra')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Immatriculation</label>
                        <input type="text" name="immatricule" value="{{$company->immatricule}}" class="form-control" id="validationCustom02"
                            placeholder="Immatriculation here..." >
                            @error('immatricule')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Company Phone</label>
                        <input type="tel" name="phone" value="{{$company->phone}}" class="form-control" placeholder="Enter phone here..."
                            >
                            @error('phone')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Company FAX</label>
                      <input type="tel" name="fax" value="{{$company->fax}}" class="form-control" placeholder="Enter fax here..."
                          >
                          @error('fax')
                          <div class="error">
                              {{ $message }}
                          </div>
                          @enderror
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Company Address</label>
                    <input type="text" name="adresse" value="{{$company->adresse}}"  class="form-control" placeholder="Enter address here..."
                        >
                        @error('adresse')
                        <div class="error">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">City</label>
                        <input type="text" name="company_city"  value="{{$company->city}}"class="form-control" id="validationCustom03" placeholder="City"
                            >
                            @error('company_city')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">State</label>
                        <input type="text" name="company_state" value="{{$company->state}}" class="form-control" id="validationCustom04" placeholder="State"
                            >
                            @error('company_state')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Zip</label>
                        <input type="text" name="company_zip" value="{{$company->zip}}" class="form-control" id="validationCustom05"
                            placeholder="Zip" >
                            @error('company_zip')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-light">
        <div class="panel-header">
            <h1 class="panel-title">Bank</h1>
        </div>
        <div class="panel-body">
            <div class="row">
    
                <div class="col-md-12 my-2">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Bank</label>
                            <input type="text" name="bank_name" value="{{$company->bank_name}}" class="form-control" id="validationCustom01"
                                placeholder="Enter bank name here..." >
                                @error('bank_name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Rib</label>
                            <input type="text" name="rib" value="{{$company->rib}}" class="form-control" id="validationCustom02"
                                placeholder="Enter rib here..." >
                                @error('rib')
                                <div class="error">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Iban</label>
                            <input type="text" name="iban" value="{{$company->iban}}" class="form-control" id="validationCustom03" placeholder="Enter iban here...">
                            @error('iban')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">BIC</label>
                            <input type="text" name="bic"  value="{{$company->bic}}" class="form-control" id="validationCustom04" placeholder="Enter bic here...">
                            @error('bic')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                    </div>
    
                </div>
    
            </div>
            <button type="submit" class="btn btn-info-lightened">Update company</button>
        </form> 
        </div>
    </div>
    
@endsection
