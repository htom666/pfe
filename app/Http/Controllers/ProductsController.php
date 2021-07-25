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
        if(Auth::guest())
        {
            return redirect()->route('/');
        }
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
            Session::flash('success_message', 'Product is updated successfully');
            return back();

        }else{
            Session::flash('error_message', 'An error has occured');
            return redirect()->back();
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
        Session::flash('success_message', 'Product is added successfully');
        return back();
    }else
    {
        Session::flash('error_message', 'An error has occured');
        
        return back();
    }
    }

    
    public function destroy(Product $product)
    {
        $delete =$product->delete();
        if($delete == 1){
            $success = true;
            $message = 'Product deleted successfully';

        }
        else
        {
            $success = true;
            $message = 'An error has occured';
        }
        return response()->json([
            'success' =>$success,
            'message'=>$message,
        ]);
    }
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

}
