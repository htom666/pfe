<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Products;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProductsController extends Controller

{
   
    public function index()
    {
        Session::put('page','products');
       /// $this->authorize('view-all-products', Product::class);
        $products=Product::all();
        return view('product.product',compact('products'));
    }


    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }


    public function update(ProductRequest $request,Product $product)
    {
        // $product->update($request->all());
        if($product->update($request->all())){
            return back()->with('success','Product created successfuly');;

        }else{
            return back()->with('error','An error has accured ');
        }
        
    }

    public function create()
    {
        return view("product.create");
    }

    public function store(ProductRequest $request)
    {

        $product = Product::create( $request->all());

    if($product){
        // Session::flash('success', 'Product is added successfully');
        return back()->with('success','Product created successfuly');
    }else
    {
        return back()->with('error','An error has accured ');
    }
    }

    
    public function destroy($id)
    {
        $product=Product::find($id)->delete();
        if($product == 1){
            return back()->with('success','product deleted successfully');

        }
    }

    public function deletedproduct()
    {
        $user = auth()->user();
        $i = 1;
        $products = DB::table('products')
        ->whereNotNull('deleted_at')
        ->get();
        return view('product.trash', compact('products','i','user'));

    }
    public function restoreproduct($id)
    {
        $product = Product::withTrashed()->find($id);
                $product->restore();
        return redirect()->route('product.product');
    }

    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }
    
    public function forceDelete($id)
    {
        $product = Product::where('id',$id)->forceDelete();
        if($product)
        {
            return back()->with('success','product permanently deleted');
        }
    }

}
