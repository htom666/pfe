<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClientRequest;
use PragmaRX\Countries\Package\Countries as Countries;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $id = DB::table('clients')
        ->select('id')
        ->get();
        $company = Company::where('client_id',$id);
        return view('client.client', compact('clients','company'));
    }
    public function edtiType($id)
    {

        $client = Client::findOrFail($id);
        return view('client.type',compact('client'));
    }

    public function clientsFilter()
    {
        $clients = Client::where('type','=','1')
        ->get();
        return view('client.allclients',compact('clients'));
    }
    
    public function prospectsFilter()
    {
        $prospects = Client::where('type','=','0')
        ->get();
        return view('client.allprospects',compact('prospects'));
    }
    public function type(Request $request,$id)
    {
        Client::findOrFail($id);
        $s = $request->input('type');
        if($s =='Client')
        {
            DB::table('clients')
            ->where('id',$id)
            ->update(['type'=>1]);
        }
        else
        {
            DB::table('clients')
            ->where('id',$id)
            ->update(['status'=>0]); 
        }
        if ($request) {
            return back()->with('success','client type updated successfuly');
        }
        else return back()->with('error','an error has occured');

    }

    public function edit(Client $client)
    {
        $id = $client->id;
        $company=DB::table('companies')
        ->where('client_id',$id)
        ->first();
        return view('client.edit',compact('client','company'));
    }

    public function update(ClientRequest $request,Client $client)
    {
        $id = $client->id;
        $client->update([
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
        $client->save();
        $company=DB::table('companies')
        ->where('client_id',$id)
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
        if($request)
        {
            return back()->with('success','client updated successfuly');
        }
    }
    public function create()
    {
        $countries = new Countries();
        $all = $countries->all()->pluck('name.common')->toArray();
    //     $country=$countries->where('name.common','Tunisia')
    // ->first()
    // ->hydrateStates()
    // ->states
    // ->sortBy('name')
    // ->pluck('name', 'postal');
    //     dd($country);

         return view("client.create",compact('all'));
         
        
    }

    public function store(ClientRequest $request)
    {
        $client=Client::create([
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
            "client_id"=>$client->id,
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
        if($client)
        {
            return back()->with('success','client created successfuly');
        }
    }
    public function destroy(Client $client)
    {
        $id = $client->id;
        DB::table('companies')
        ->where('client_id',$id)
        ->delete();
        $delete =$client->delete();
        if($delete){
            return back()->with('success','Client deleted successfuly');
        }
    }
    public function show(Client $client)
    {
        $id = $client->id;
        $company=DB::table('companies')
        ->where('client_id',$id)
        ->first();
        return view('client.show',compact('client','company'));
    }
    public function countClient(){
        $count = Client::count(); 
        return $count;   
    }
}
