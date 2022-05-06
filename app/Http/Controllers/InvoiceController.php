<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use App\Models\Customer;
use App\Models\Freeissues;

class InvoiceController extends Controller
{
    public function create(){
        $product = Product::all();
        $customer = Customer::all();
        return view('addInvoice')->with('product',$product)->with('customer',$customer);
    }

    public function store(Request $request){

        // $cart = Session::get('cart');
        // $request->session()->put('key', 'value');
        $id = $request->product_ID;
        $qty = $request->qty;

        
        $product = Product::find($id);
        $freeissues=Freeissues::where('product_ID',$id)->first();

        if(!$product) {

            abort(404);

        }
        $cart = session()->get('cart');

        
        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "id" => $product->id,
                        "product_name" => $product->product_name,
                        "quantity" => $qty,
                        "purchase_qty" => $freeissues->purchase_qty,
                        "free_qty" => $freeissues->free_qty,
                        "type" => $freeissues->type,
                        "product_code" => $product->Product_code,
                        "product_price" => $product->product_price
                    ]
            ];

            // dd($cart);
            session()->put('cart', $cart ,compact('product'));
            
            

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;
            // dd($cart);
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->id,
            "product_name" => $product->product_name,
            "quantity"=>$qty,
            "purchase_qty" => $freeissues->purchase_qty,
            "free_qty" => $freeissues->free_qty,
            "type" => $freeissues->type,
            "product_code" => $product->Product_code,
            "product_price" => $product->product_price
           
        ];
        // dd($cart);
        session()->put('cart', $cart);
        
        

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
