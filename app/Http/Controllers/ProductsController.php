<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProductsController extends Controller
{
    public function index()
    {
        Session::put('page','products');
     
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
        $delete=Product::find($id)->delete();
        if($delete == 1){
            return back()->with('success','product deleted successfully');

        }
    }
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

}
