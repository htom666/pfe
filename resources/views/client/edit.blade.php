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
            <div class="row">
            
                <div class="col-md-12 my-2">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">First name</label>
                            <input type="text" name="nom" value="{{$client->nom}}" class="form-control" id="validationCustom01" placeholder="First name"  required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Last name</label>
                            <input type="text" name="prenom" value="{{$client->prenom}}" class="form-control" id="validationCustom02" placeholder="Last name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Job</label>
                            <input type="text" name="metier" value="{{$client->metier}}" class="form-control" id="validationCustom02" placeholder="Last name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">City</label>
                            <input type="text" name="city" value="{{$client->city}}"class="form-control" id="validationCustom03" placeholder="City" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">State</label>
                            <input type="text" name="state" value="{{$client->state}}" class="form-control" id="validationCustom04" placeholder="State" required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Zip</label>
                            <input type="text" name="zip" value="{{$client->zip}}" class="form-control" id="validationCustom05" placeholder="Zip" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{$client->email}}" class="form-control" placeholder="Enter email here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Civility</label>
                                <select name="civilite" value="{{$client->civilite}}" class="form-control" id="civilite" required="">
                                    <option disabled="disabled" value="{{$client->civilite}}">Select</option>
                                    <option>Mrs</option>
                                    <option>Mr</option>
                                    <option>Ms</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Consentement</label>
                            <input type="text" name="consentement" value="{{$client->consentement}}" class="form-control" placeholder="Enter consentement here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone</label>
                            <input type="tel" name="telbureau" value="{{$client->telbureau}}" class="form-control" placeholder="Enter phone here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Cell-phone</label>
                            <input type="tel" name="portable" value="{{$client->portable}}" class="form-control" placeholder="Enter cellphone here..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Telecopy</label>
                            <input type="tel" name="telecopie" class="form-control" value="{{$client->telecopie}}" placeholder="Enter telecopy here..." required>
                        </div>
                        
                
                </div>

            </div>

        </div>
    </div><!-- / Validation -->
  @include('company.edit')
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
@endsection
 {{-- <!--<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Client</h2>
            </div>
        </div>
    </div>
    <form action="{{ route('client.update', $client->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input type="text" id="codec" name="codec" class="form-control" value="{{$client->codec}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Société/Nom</strong>
                    <input type="text" id="nomsociete" name="nomsociete" class="form-control" value="{{$client->nomsociete}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type</strong>
                    <input type="text" id="type" name="type" class="form-control"
                    value="{{$client->type}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Forme juridique</strong>
                    <input type="text" id="formjuridique" name="formjuridique" class="form-control" value="{{$client->formjuridique}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Siret</strong>
                    <input type="text" id="siret" name="siret" class="form-control" value="{{$client->siret}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>APE / NAF</strong>
                    <input type="text" id="apenaf" name="apenaf" class="form-control" value="{{$client->apenaf}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>TVA intracommunautaire</strong>
                    <input type="text" id="tvaintracommunautaire" name="tvaintracommunautaire" class="form-control" value="{{$client->tvaintracommunautaire}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>>Numéro Immatriculation</strong>
                    <input type="text" id="numimmatriculation" name="numimmatriculation" class="form-control" value="{{$client->numimmatriculation}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Téléphone</strong>
                    <input type="text" id="telephonesocite" name="telephonesocite" class="form-control" value="{{$client->telephonesocite}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Portable</strong>
                    <input type="text" id="portablesociete" name="portablesociete" class="form-control" value="{{$client->portablesociete}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fax</strong>
                    <input type="text" id="fax" name="fax" class="form-control" value="{{$client->fax}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Site web</strong>
                    <input type="text" id="siteweb" name="siteweb" class="form-control" value="{{$client->siteweb}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse</strong>
                    <input type="text" id="adresse" name="adresse" class="form-control" value="{{$client->adresse}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse (suite)</strong>
                    <input type="text" id="adresse2" name="adresse2" class="form-control" value="{{$client->adresse2}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code postal</strong>
                    <input type="text" id="codepostal" name="codepostal" class="form-control" value="{{$client->codepostal}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ville</strong>
                    <input type="text" id="ville" name="ville" class="form-control" value="{{$client->ville}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pays</strong>
                    <input type="text" id="pays" name="pays" class="form-control" value="{{$client->pays}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Banque</strong>
                    <input type="text" id="banque" name="banque" class="form-control" value="{{$client->banque}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>RIB</strong>
                    <input type="text" id="rib" name="rib" class="form-control" value="{{$client->rib}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IBAN</strong>
                    <input type="text" id="iban" name="iban" class="form-control" value="{{$client->iban}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>BIC</strong>
                    <input type="text" id="bic" name="bic" class="form-control" value="{{$client->bic}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Montant de l'encours garanti</strong>
                    <input type="text" id="montantgaranti" name="montantgaranti" class="form-control" value="{{$client->montantgaranti}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Civilité</strong>
                    <input type="text" id="civilite" name="civilite" class="form-control" value="{{$client->civilite}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom</strong>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{$client->nom}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom</strong>
                    <input type="text" id="prenom" name="prenom" class="form-control" value="{{$client->prenom}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Métier/Fonction</strong>
                    <input type="text" id="metier" name="metier" class="form-control" value="{{$client->metier}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>E-mail</strong>
                    <input type="text" id="email" name="email" class="form-control" value="{{$client->email}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Consentement</strong>
                    <input type="text" id="consentement" name="consentement" class="form-control" value="{{$client->consentement}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tel bureau</strong>
                    <input type="text" id="telbureau" name="telbureau" class="form-control" value="{{$client->telbureau}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Portable</strong>
                    <input type="text" id="portable" name="portable" class="form-control" value="{{$client->portable}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telecopie</strong>
                    <input type="text" id="telecopie" name="telecopie" class="form-control" value="{{$client->telecopie}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Option de facturation</strong>
                    <input type="text" id="modesaisieprix" name="modesaisieprix" class="form-control" value="{{$client->modesaisieprix}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Commentaire</strong>
                    <input type="text" id="commentaire" name="commentaire" class="form-control" value="{{$client->commentaire}}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection --}}
