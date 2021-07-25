@extends('layout.main')
@section('content')

<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">{{$prospect->nom}} {{$prospect->prenom}}</h1>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12 my-2">
                <ul class="nav nav-pills" id="pill-tabs-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active nav-link-primary" id="pill-tab-1" data-toggle="tab" href="#pill-tab-content-1" role="tab" aria-controls="pill-tab-content-1" aria-selected="true">Prospect details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-primary" id="pill-tab-2" data-toggle="tab" href="#pill-tab-content-2" role="tab" aria-controls="pill-tab-content-2" aria-selected="false">Company Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-primary" id="pill-tab-3" data-toggle="tab" href="#pill-tab-content-3" role="tab" aria-controls="pill-tab-content-3" aria-selected="false">Bank Details</a>
                    </li>
                </ul>
                <div class="tab-content p-3 mt-3" id="pill-tabs-content">
                    <div class="tab-pane fade show active" id="pill-tab-content-1" role="tabpanel" aria-labelledby="pill-tab-1">
                        <h4 class="mb-3">Prospect Details</h4>
                        <p>Name : {{$prospect->nom}}</p>
                        <p>Last Name : {{$prospect->prenom}}</p>
                        <p>Job : {{$prospect->metier}}</p>
                        <p>Email : {{$prospect->email}}</p>
                        <p>Address : {{$prospect->city}} {{$prospect->state}} {{$prospect->zip}}</p>
                        <p>Phone : {{$prospect->telbureau}}</p>
                        <p>Cellphone : {{$prospect->portable}}</p>
                        <p>Telecopy : {{$prospect->telecopie}}</p>
                    </div>
                    <div class="tab-pane fade" id="pill-tab-content-2" role="tabpanel" aria-labelledby="pill-tab-2">
                        <h4 class="mb-3">Company Details</h4>
                        <p>Company Name : {{$company->name}}</p>
                        <p>Juridik Form : {{$company->juridikform}}</p>
                        <p>SIRET : {{$company->siret}}</p>
                        <p>APE/NAF : {{$company->apenaf}}</p>
                        <p>TVA : {{$company->tvaintra}}</p>
                        <p>Immatriculation : {{$company->immatricule}}</p>
                        <p>Phone : {{$company->phone}}</p>
                        <p>fax : {{$company->fax}}</p>
                        <p>address : {{$company->adresse}}</p>
                        <p>Location : {{$company->city}} {{$company->state}} {{$company->zip}}</p>
                    </div>
                    <div class="tab-pane fade" id="pill-tab-content-3" role="tabpanel" aria-labelledby="pill-tab-3">
                        <h4 class="mb-3"></h4>
                        <p>Bank Name : {{$company->bank_name}}</p>
                        <p>RIB : {{$company->rib}}</p>
                        <p>IBAN : {{$company->iban}}</p>
                        <p>BIC : {{$company->bic}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
