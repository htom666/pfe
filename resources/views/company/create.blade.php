<!-- 2 column grid layout with text inputs for the first and last names -->
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">Company</h1>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12 my-2">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Company Name</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01"
                            placeholder="company name here ...">
                            @error('name')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Juridic Form</label>
                        <input type="text" name="juridikform" class="form-control" id="validationCustom02"
                            placeholder="juridic form here ...">
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
                        <input type="text" name="siret" class="form-control" id="validationCustom03" placeholder="siret here ..."
                            >
                            @error('siret')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">APE/NAF</label>
                        <input type="text" name="apenaf" class="form-control" id="validationCustom04"
                            placeholder="APE/NAF here...">
                            @error('apenaf')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">TVA Intra</label>
                        <input type="text" name="tvaintra" class="form-control" id="validationCustom05"
                            placeholder="TVA here...">
                            @error('tvaintra')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Immatriculation</label>
                        <input type="text" name="immatricule" class="form-control" id="validationCustom02"
                            placeholder="Immatriculation here...">
                            @error('immartricule')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Company Phone</label>
                        <input type="tel" name="phone" class="form-control" placeholder="Enter phone here...">
                        @error('phone')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Company FAX</label>
                      <input type="tel" name="fax" class="form-control" placeholder="Enter fax here...">
                      @error('fax')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Company Address</label>
                    <input type="text" name="adresse" class="form-control" placeholder="Enter address here...">
                    @error('adresse')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">City</label>
                        <input type="text" name="company_city" class="form-control" id="validationCustom03" placeholder="City">
                        @error('comapny_city')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">State</label>
                        <input type="text" name="company_state" class="form-control" id="validationCustom04" placeholder="State">
                        @error('company_state')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Zip</label>
                        <input type="text" name="company_zip" class="form-control" id="validationCustom05"
                            placeholder="Zip">
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
                            <input type="text" name="bank_name" class="form-control" id="validationCustom01"
                                placeholder="Enter bank name here...">
                                @error('bank_name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Rib</label>
                            <input type="text" name="rib" class="form-control" id="validationCustom02"
                                placeholder="Enter rib here...">
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
                            <input type="text" name="iban" class="form-control" id="validationCustom03" placeholder="Enter iban here...">
                            @error('iban')
                            <div class="error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">BIC</label>
                            <input type="text" name="bic" class="form-control" id="validationCustom04" placeholder="Enter bic here...">
                            @error('bic')
                           <div class="error">
                               {{ $message }}
                           </div>
                           @enderror
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>
    
