<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public $products = [];
    public function index()
    {

        $delivery = Delivery::all();

        return view('delivery.display', compact('delivery'));
    }
     public function create($id)
      {
        
        $products = [];
        $fact = Facture::findOrFail($id);
        $facture = Facture::findOrFail($id)->products()->where('status',0)->get();
        foreach ($facture as $product) {
            $products [] = [

                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $product->pivot->quantity,
                    'price' => $product->price,
                    'total_price' => $product->pivot->quantity * $product->price

            ];

        }
         return view('delivery.create',compact('facture','products','fact'));    
    //     $facture = Facture::where('id',$id)->first();
    // //     $facture = Facture::where('id',$id)->first();
    // //     foreach ($facture->products as $product) {
    // //         $products [] = [

    // //                 'product_id' => $product->id,
    // //                 'product_name' => $product->prodname,
    // //                 'quantity' => $product->pivot->quantity,
    // //                 'price' => $product->prodprice,
    // //                 'total_price' => $product->pivot->quantity * $product->prodprice

    // //         ];

    //     // }
    //     // $prod =json_encode($products);

    //     // $delivery = Delivery::create([
    //     //     'facutre_id' =>$facture->id,
    //     //     'user_id' =>auth()->user()->id,
    //     //     'products'=>json_encode($products)

    //     // ]);
      

     }

     public function store(Request $request,$id)
     {

        $fact = Facture::findOrFail($id);
        $input = $request->all;
        // $facture = Facture::findOrFail($id)->products->where('status','>','0');
        $facture = Facture::find($id)->products()->where('status',0)->get();
        foreach ($facture as $product) {
            $products [] = [

                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $product->pivot->quantity,
                    'price' => $product->pivot->price,
                    'total_price' => $product->pivot->quantity * $product->pivot->price

            ];

        }
        // $input['products'] =$request->input('products');
        // $t= $input['products'];
        $t =  $request->input('products');
       
        foreach($t as $t){
         $prods= Facture::find($id)->products()->where('status',0)->where('product_id',$t)->get();
        foreach ($prods as $product) {
            
            $pro[] = [

                    'product_id' => $t,
                    'product_name' => $product->name,
                    'quantity' => $product->pivot->quantity,
                    'price' => $product->price,
                    'total_price' => $product->pivot->quantity * $product->price

            ];


        }
        DB::table('facture_products')
        ->where('product_id',$t)
        ->where('facture_id',$id)
        ->where('status','<>','1')
        ->update(['status' =>'1']);
    }
        Delivery::create([
                'facutre_id' =>$fact->id,
                'user_id' =>auth()->user()->id,
               'products'=>json_encode($pro)
               ]);
        
       
        return back();
        // $prod =json_encode($products);

        // $delivery = Delivery::create([
        //     'facutre_id' =>$facture->id,
        //     'user_id' =>auth()->user()->id,
        //     'products'=>json_encode($products)

        // ]);

    //     $facture = Facture::where('id',$id)->first();
    //     foreach ($facture->products as $product) {
    //         $products [] = [

    //                 'product_id' => $product->id,
    //                 'quantity' => $product->pivot->quantity,
    //                 'price' => $product->prodprice,
    //                 'total_price' => $product->pivot->quantity * $product->prodprice

    //         ];

    //     }
    //     // Delivery::create([
    //     //         'facutre_id' =>$facture->id,
    //     //         'user_id' =>auth()->user()->id,
    //     //         'products'=>json_encode($products)

    //     // ]);
    //     return view('delivery.create',compact('facture','products'));
     }
    public function bonDeSortie($id)
    {
        $user = auth()->user();
        $delivery = Delivery::findOrFail($id);
        $tva =DB::table('factures')
        ->select('tva')
        ->where('id',$delivery->facutre_id)
        ->first();
        $facture =DB::table('factures')
        ->where('id',$delivery->facutre_id)
        ->first();
        $client = DB::table('clients')
        ->where('id',$facture->client_id)
        ->first();
        $tax = 0;
        $subtotal = 0;
        $ttc = 0;
        $product = json_decode($delivery->products);
        $f =count(json_decode($delivery->products));
        // for ($i=0; $i<=$f;$i++) {
        //     $product[$i] = json_decode($delivery->products);
        //     $subtotal +=$product[[0]][$i]->total_price;
           
        //     dd($subtotal);
        // }
        // foreach(json_decode($delivery->products,true) as $product)
        // {
        //    // dd($product['total_price']);
            
        //     $subtotal+=$product['total_price'];
        //     dd($subtotal);
        //     $tax = ($subtotal*$tva)/100;
        //     $ttc =$subtotal + $tax;
        // }
    return view('delivery.sortie',compact('delivery','client','facture','subtotal','tax','ttc','user'));

    }


    public function edit($id)
    {
        $delivery =Delivery::find($id);

        return view('delivery.edit',compact('delivery'));    
    }


    public function update(Request $request)
    {
        $del_id = $request->id;
        $delivery =Delivery::find($del_id);
        $id_del = $delivery->id;
        $t =  $request->input('products');
        $f_id = DB::table('deliveries')
        ->where('id',$id_del)
        ->pluck('facutre_id');
       
        foreach($t as $t)
        {
            
            // DB::table('deliveries')
            // ->where('id',$id_del)
            // ->delete();

            // $test =DB::table('facture_products')
            // ->where('facture_id',$f_id)
            // ->where('product_id',$t)
            // ->select('status');
            // $test->update(status,1);

            DB::table('facture_products')
             ->where('product_id',$t)
             ->where('facture_id',$f_id)
            ->update(['status' =>'0']);
            
            // ->update(['status' =>'1']);
            

            DB::table('deliveries')
            ->where('id',$id_del)
            ->delete();

            
        }
        return redirect('/delivery');



    }
    public function show($id) {
        // $facture = Facture::where('id',$id)->first();
        // $delivery = Delivery::where('facutre_id',$id)->first();
        // return view('delivery.show',compact('facture','delivery'));
    }
}
