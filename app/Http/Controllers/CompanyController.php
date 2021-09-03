<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();


        return view('company.company', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("company.create");
    }

    public function internalCreate()
    {
        $clients = Client::all();
        return view('company.comcreate',compact('clients'));
    }

    public function storage(CompanyRequest $request)
    {
        $company=Company::create([
            "client_id"=>$request->client_id,
            "name"=>$request->name,
            "juridikform"=>$request->juridikform,
            "siret"=>$request->siret,
            "apenaf"=>$request->apenaf,
            "tvaintra"=>$request->tvaintra,
            "immatricule"=>$request->immatricule,
            "phone"=>$request->phone,
            "fax"=>$request->fax,
            "adresse"=>$request->adresse,
            "city"=>$request->company_city,
            "state"=>$request->company_state,
            "zip"=>$request->company_zip,
            "bank_name" => $request->bank_name,
            "rib" => $request->rib,
            "iban" => $request->iban,
            "bic" => $request->bic,

        ]);
        if($company){
        return back()->with('success','Company created successfuly');
    }
    }
    public function updatage(CompanyRequest $request,Company $company)
    {
        $id = $company->id;
        DB::table('companies')
        ->where('id',$id)
        ->update([
            "client_id"=>$request->client_id,
            "name"=>$request->name,
            "juridikform"=>$request->juridikform,
            "siret"=>$request->siret,
            "apenaf"=>$request->apenaf,
            "tvaintra"=>$request->tvaintra,
            "immatricule"=>$request->immatricule,
            "phone"=>$request->phone,
            "fax"=>$request->fax,
            "adresse"=>$request->adresse,
            "city"=>$request->company_city,
            "state"=>$request->company_state,
            "zip"=>$request->company_zip,
            "bank_name" => $request->bank_name,
            "rib" => $request->rib,
            "iban" => $request->iban,
            "bic" => $request->bic,

        ]);
        return back()->with('success','company update successfuly');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        
        Company::create($request->all());
        return redirect()->route('company.company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }
    public function editage(Company $company)
    {
        $clients = Client::all();
        return view('company.editage',compact('company','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        
        $company->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        if($company){
            return back()->with('success','company deleted successfuly');
        }
        
    }
}
