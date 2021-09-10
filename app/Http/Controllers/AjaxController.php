<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries as Countries;

class AjaxController extends Controller
{
    public function getCompanies()
    {
        $id = request()->input('id');
        $id = (int)$id;

        $companies = Company::where('client_id', $id)->get();
        
        $result = '<option disabled selected>Select Company</option>';

        foreach($companies as $company){
            $result .= '<option value="' . $company->id . '">' . $company->name . '</option>';
        }

        return $result;
    }
    public function getClient()
    {
        
    }

    public function getPhonenumber()
    {
        $id = request()->input('id');
        $id = (int)$id;

        $phone = Company::select('phone')->where('id', $id)->first();

        return $phone->phone ?? '';
    }
    public function getAdresse()
    {
        $id = request()->input('id');
        $id = (int)$id;
        $pays = Company::select('adresse')->where('id',$id)->first();
        return $pays->adresse ?? '';
    }
    public function getPrice()
    {
        $id = request()->input('id');
        $id = (int)$id;
        $product = Product::select('price')->where('id',$id)->first();
        return $product->price ?? '';
    }

    public function getState()
    {
        $city = request()->input('city');
        $result = '<option disabled selected>Select State</option>';
        $countries = new Countries();
        $country = $countries->whereNameCommon($city);
        $state =$countries->where('name.common',$country)
        ->first()
        ->hydrateStates()
        ->states
        ->sortBy('name')
        ->pluck('name');
        foreach($state as $st)
        {
            $result .='<option value="'.$st .'">'.$st.'</option>';
        }
        return $result;

    }

    public function filtreClients()
    {
        $result = '<option disabled selected>Select client type</option>';
        $type = request()->input('type_client');
        if($type ==  'Client')
        {
            $client = Client::where('type',1)->get(); 
        } 
        else
        {
            $client = Client::where('type',0)->get();
        }
        
        foreach($client as $client){
            $result .= '<option value="' . $client->id . '">' . $client->nom . '</option>';
        }

        return $result;

    }

}
