@extends('layout.main')
@section('content')

<form class="needs-validation" method="POST" action="{{route('prospect.store')}}">
    @csrf
    <!-- Validation -->
    <div class="panel panel-light">
        <div class="panel-header">
            <h1 class="panel-title">Prospect</h1>
        </div>
        <div class="panel-body">
            <div class="row">
            
                <div class="col-md-12 my-2">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">First name</label>
                            <input type="text" name="nom" class="form-control" id="validationCustom01" placeholder="First name"  required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Last name</label>
                            <input type="text" name="prenom" class="form-control" id="validationCustom02" placeholder="Last name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Job</label>
                            <input type="text" name="metier" class="form-control" id="validationCustom02" placeholder="Last name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">City</label>
                            <input type="text" name="city" class="form-control" id="validationCustom03" placeholder="City" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">State</label>
                            <input type="text" name="state" class="form-control" id="validationCustom04" placeholder="State" required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Zip</label>
                            <input type="text" name="zip" class="form-control" id="validationCustom05" placeholder="Zip" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Civility</label>
                                <select name="civilite" class="form-control" id="civilite" required="">
                                    <option disabled="disabled" selected="selected">Select</option>
                                    <option>Mrs</option>
                                    <option>Mr</option>
                                    <option>Ms</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Consentement</label>
                            <input type="text" name="consentement" class="form-control" placeholder="Enter consentement here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone</label>
                            <input type="tel" name="telbureau" class="form-control" placeholder="Enter phone here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Cell-phone</label>
                            <input type="tel" name="portable" class="form-control" placeholder="Enter cellphone here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Telecopy</label>
                            <input type="tel" name="telecopie" class="form-control" placeholder="Enter telecopy here..." required>
                        </div>
                        
                
                </div>

            </div>

        </div>
    </div><!-- / Validation -->
  @include('company.create')
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endsection
