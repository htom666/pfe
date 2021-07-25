<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospects = Prospect::all();
        $id = DB::table('prospects')
        ->select('id')
        ->get();
        $company = Company::where('prospect_id',$id);
        return view('prospect.prospect', compact('prospects','company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("prospect.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prospect=Prospect::create([
            "civilite"=>$request->input('civilite'),
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "metier"=>$request->metier,
            "email"=>$request->email,
            "city"=>$request->city,
            "state"=>$request->state,
            "zip"=>$request->zip,
            "consentement"=>$request->consentement,
            "telbureau"=>$request->telbureau,
            "portable"=>$request->portable,
            "telecopie"=>$request->telecopie,
        ]);
        Company::create([
            "prospect_id"=>$prospect->id,
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

        return redirect()->route('prospect.prospect');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function show(Prospect $prospect)
    {
        $id = $prospect->id;
        $company=DB::table('companies')
        ->where('prospect_id',$id)
        ->first();
        return view('prospect.show',compact('prospect','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospect $prospect)
    {
        $id = $prospect->id;
        $company=DB::table('companies')
        ->where('prospect_id',$id)
        ->first();
        return view('prospect.edit',compact('prospect','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospect $prospect)
    {
        $id = $prospect->id;
        $prospect->update([
            "civilite"=>$request->input('civilite'),
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "metier"=>$request->metier,
            "city"=>$request->city,
            "state"=>$request->state,
            "zip"=>$request->zip,
            "email"=>$request->email,
            "consentement"=>$request->consentement,
            "telbureau"=>$request->telbureau,
            "portable"=>$request->portable,
            "telecopie"=>$request->telecopie,

        ]);
        $prospect->save();
        $company=DB::table('companies')
        ->where('prospect_id',$id)
        ->update([
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
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        $id = $prospect->id;
        DB::table('companies')
        ->where('prospect_id',$id)
        ->delete();
        $prospect->delete();
        return back();
    }
}
