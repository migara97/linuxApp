<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('viewProduct')->with('product',$product);
    }
    public function store(Request $request)
    {
        // dd($request);

        // $this->validate($request,[

        // ]);

        $product = New Product;
        
        $product_name = $request->product_name;
        $product_code = $request->product_code;
        $product_price = $request->product_price;
        $product_expiryDate =$request->product_expiryDate;

        $product->product_name=$product_name;
        $product->Product_code=$product_code;
        $product->product_price=$product_price;
        $product->product_expiryDate=$product_expiryDate;

        $product->save();

        return  back();

    }
    public function edit($id){

        $product = Product::find($id);

        return view('updateProduct')->with('product',$product);

    }
    public function productUpdate(Request $request,$id){

        $product_name = $request->product_name;
        $product_code = $request->product_code;
        $product_price = $request->product_price;
        // $product_expiryDate =$request->product_expiryDate;

        $product=Product::find($id);

        $product->product_name=$product_name;
        $product->Product_code=$product_code;
        $product->product_price=$product_price;
        // $product->product_expiryDate=$product_expiryDate;

        $product->save();

        return redirect('/productView');
    }
}
