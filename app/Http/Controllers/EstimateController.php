<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Estimate;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i =1;
        $estimate = Estimate::all();
        $company_list = DB::table('companies')
            ->groupBy('name')
            ->get();
        return view('estimate.estimate', compact('estimate','i'))->with('company_list', $company_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('estimate.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $services = Service::all();
        
        if ($request->orderProduct) {
           
            $estimate = Estimate::create([
                'estimate_number' => $request->estimate_number,
                'company_name' => $request->company_name,
                'company_phone' => $request->company_phone,
                'estimate_date' => $request->estimate_date,
                'client_id' => $request->client_id,
                'company_address' => $request->company_address,
                'tva' => $request->tva,
                'tax' =>$request->tax,
                'ttc'=>$request->ttc,
                'pht'=>$request->pht
            ]);
            foreach ($request->orderProduct as $product) {
               
                $estimate->products()->attach(
                    $product['product_id'],
                    ['quantity' => $product['quantity'],
                     'price' => $product['total_price'],
                     ]
                );
            }
            foreach ($request->orderService as $service) {
                $item = $services->where('id',1)->first();
                $estimate->services()->attach(
                    $service['service_id'],
                    ['quantity' => $service['quantity'],
                     'price' => $item->price,
                     ]
                );
            }

         
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estimate = Estimate::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        return view('estimate.show', compact('estimate','client','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimate = Estimate::findOrFail($id);  
        $client = Client::all();
        $company= Company::all();
        return view('estimate.edit', compact('estimate','client','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
       
        $estimate = Estimate::findOrFail($request->id);
        $estimate->estimate_number =$request->estimate_number;
        $estimate->company_name =$request->company_name;
        $estimate->company_phone =$request->company_phone;
        $estimate->estimate_date =$request->estimate_date;
        $estimate->client_id =$request->client_id;
        $estimate->company_address =$request->company_address;
        $estimate->tva =$request->tva;
        $estimate->tax =$request->tax;
        $estimate->ttc =$request->ttc;
        $estimate->pht =$request->pht;
        $estimate->save();
        foreach ($estimate->products as $product) {
            $estimate->products()->detach($product->id);
        }
        foreach ($estimate->services as $service) {
            $estimate->services()->detach($service->id);
        }
        foreach ($request->orderProduct as $product) {
               
            $estimate->products()->attach(
                $product['product_id'],
                ['quantity' => $product['quantity'],
                 'price' => $product['total_price'],
                 ]
            );
        }
        foreach ($request->orderService as $service) {
               
            $estimate->services()->attach(
                $service['service_id'],
                ['quantity' => $service['quantity'],
                 'price' => $service['total'],
                 ]
            );
        }


        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        $estimate->delete();
        return back();
    }
    }
