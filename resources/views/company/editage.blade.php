@extends('layout.main')
@section('content')
<!-- 2 column grid layout with text inputs for the first and last names -->
<div class="panel panel-light">
    <div class="panel-header">
         <form action="{{route('company.updatage',$company->id)}}" method="POST">
            @csrf
        <h1 class="panel-title">Company</h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Client Name</label>
            @foreach($clients as $client)
            <select data-toggle="select2" data-search="true" class="custom-select" name="client_id" id="clients">
                                            <option disabled selected value="">Select Client</option>
                                                <option value="{{ $client->id }}"{{ $client->id == $company->client_id ? 'selected':'' }}>{{ $client->nom }}</option>
                                        </select>
                                        @endforeach
            </div>
            <div class="col-md-12 my-2">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Company Name</label>
                        <input type="text" name="name" value="{{$company->name}}" class="form-control" id="validationCustom01"
                            placeholder="company name here ..." required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Juridic Form</label>
                        <input type="text" name="juridikform" value="{{$company->juridikform}}" class="form-control" id="validationCustom02"
                            placeholder="juridic form here ..." required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">SIRET</label>
                        <input type="text" name="siret" value="{{$company->siret}}" class="form-control" id="validationCustom03" placeholder="siret here ..."
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">APE/NAF</label>
                        <input type="text" name="apenaf" value="{{$company->apenaf}}" class="form-control" id="validationCustom04"
                            placeholder="APE/NAF here..." required>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">TVA Intra</label>
                        <input type="text" name="tvaintra" value="{{$company->tvaintra}}" class="form-control" id="validationCustom05"
                            placeholder="TVA here..." required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Immatriculation</label>
                        <input type="text" name="immatricule" value="{{$company->immatricule}}" class="form-control" id="validationCustom02"
                            placeholder="Immatriculation here..." required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Company Phone</label>
                        <input type="tel" name="phone" value="{{$company->phone}}" class="form-control" placeholder="Enter phone here..."
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Company FAX</label>
                      <input type="tel" name="fax" value="{{$company->fax}}" class="form-control" placeholder="Enter fax here..."
                          required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Company Address</label>
                    <input type="text" name="adresse" value="{{$company->adresse}}"  class="form-control" placeholder="Enter address here..."
                        required>
                </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">City</label>
                        <input type="text" name="company_city"  value="{{$company->city}}"class="form-control" id="validationCustom03" placeholder="City"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">State</label>
                        <input type="text" name="company_state" value="{{$company->state}}" class="form-control" id="validationCustom04" placeholder="State"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Zip</label>
                        <input type="text" name="company_zip" value="{{$company->zip}}" class="form-control" id="validationCustom05"
                            placeholder="Zip" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
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
                                placeholder="Enter bank name here..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Rib</label>
                            <input type="text" name="rib" value="{{$company->rib}}" class="form-control" id="validationCustom02"
                                placeholder="Enter rib here..." required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Iban</label>
                            <input type="text" name="iban" value="{{$company->iban}}" class="form-control" id="validationCustom03" placeholder="Enter iban here..." required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">BIC</label>
                            <input type="text" name="bic"  value="{{$company->bic}}" class="form-control" id="validationCustom04" placeholder="Enter bic here..." required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
            <button type="submit" class="btn btn-info-lightened">Create company</button>
        </form> 
        </div>
    </div>
    
@endsection
