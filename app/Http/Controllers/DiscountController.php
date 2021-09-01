<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Facture;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $facture = Facture::findOrFail($id);
        $d = Discount::where('facture_id',$facture->id)->latest()->first();
        return view('discount.discount' , compact('facture','d'));
    }
    public function progress()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request,$id)
    {
        $facture = Facture::where('id',$id)->first();
        $dis = $request->input('discount');
        if ($dis) {
            if($f = Discount::where('facture_id',$facture->id)->latest()->first()){
                $rest_a_payer = $f->rest_to_pay -$dis;
                if($rest_a_payer>=0){
                    $discountt = Discount::create([
                        'facture_id' =>$facture->id,
                        'discount'=> $dis,
                        'user_id' =>auth()->user()->id,
                        'rest_to_pay' =>$rest_a_payer,
                        ]);
                        $data = array(
                            'rest_to_pay' =>$rest_a_payer
                        );
                        DB::table('factures')->where('id',$id)->update(['rest_to_pay' =>$rest_a_payer]);
            }
        }
            else{
                $rest_a_payer = $facture->ttc-$dis;
                $discountt = Discount::create([
                     'facture_id' =>$facture->id,
                     'discount'=> $dis,
                     'user_id' =>auth()->user()->id,
                     'rest_to_pay' =>$rest_a_payer,
                     ]);
                     DB::table('factures')->where('id',$id)->update(['rest_to_pay' =>$rest_a_payer]);
            }  
            
        }
        $d = Discount::where('facture_id',$id)->latest()->first();
        // $dt = Discount::where('facture_id',$facture->id);
        
        return view('discount.discount' , compact('facture','d'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Discount::create($request->all());
        // Facture::create([
        //     "rest_to_pay" =>$request->rest_a_payer,
        // ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        $discount = Discount::all();
        return view ('discount.show',compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Discount::find($id)->delete();
        if($delete == 1){
            return back()->with('success','discount deleted successfully');

        }
    }
    // public function payedInvoices() 

    // {
    //     $facture = DB::table('discounts')
    //     ->where('status','paid')
    //     ->first();
    //     return view('discound.paid',compact('facture'));
    // }

}
