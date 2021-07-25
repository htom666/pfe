<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

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

}
