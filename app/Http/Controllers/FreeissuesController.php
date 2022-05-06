<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freeissues;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Validator;

class FreeissuesController extends Controller
{
    public function create()
    {
        $product = Product::all();
        return view('addFreeIssues')->with('product',$product);
    }

    public function index(){
        $freeissues=DB::table('freeissues')
        ->select('freeissues.*','products.product_name as product_name')
        ->leftJoin('products', 'freeissues.product_ID', '=', 'products.id')
        ->get();

        // dd($freeissues);

        return view('viewFreeIssues')->with('freeissues',$freeissues);


    }

    public function productSelect(Request $request){
		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 
        
        //$request->id here is the id of our chosen option id
        
         $data=Product::select('product_name','id','Product_code','product_price')->where('id',$request->id)->take(100)->get();

        // $data = DB::table('subcategories')
        //         ->where('id',$request->id)
        //         ->select('subcategories.id','subcategories.title as subcategoryName','categories.title as categoryName')
        //         ->leftJoin('categories', 'subcategories.categoryID', '=', 'categories.id')
        //         ->get();

        return response()->json($data);//then sent this data to ajax success
        // dd($data);
    }
    
    public function store(Request $request){

            $freeissues = New Freeissues;
        
            $free_issue_lable = $request->free_issue_lable;
            $type = $request->type;
            $product_ID = $request->product_ID;
            $purchase_qty =$request->purchase_qty;
            $free_qty = $request->free_qty;
            $lower_limit = $request->lower_limit;
            $upeer_limit =$request->upeer_limit;



            $freeissues->free_issue_lable=$free_issue_lable;
            $freeissues->type=$type;
            $freeissues->product_ID=$product_ID;
            $freeissues->purchase_qty=$purchase_qty;
            $freeissues->free_qty=$free_qty;
            $freeissues->lower_limit=$lower_limit;
            $freeissues->upeer_limit=$upeer_limit;

            $freeissues->save();

            return  back();
    }

    public function edit($id){

        $freeissues = Freeissues::find($id);
        $product = Product::all();

        return view('updateFreeIssues')->with('freeissues',$freeissues)->with('product',$product);
    }

    public function freeissuesUpdate(Request $request,$id){
        
            $free_issue_lable = $request->free_issue_lable;
            $type = $request->type;
            $product_ID = $request->product_ID;
            $purchase_qty =$request->purchase_qty;
            $free_qty = $request->free_qty;
            $lower_limit = $request->lower_limit;
            $upeer_limit =$request->upeer_limit;

            $freeissues=freeissues::find($id);

            $freeissues->free_issue_lable=$free_issue_lable;
            $freeissues->type=$type;
            $freeissues->product_ID=$product_ID;
            $freeissues->purchase_qty=$purchase_qty;
            $freeissues->free_qty=$free_qty;
            $freeissues->lower_limit=$lower_limit;
            $freeissues->upeer_limit=$upeer_limit;

            $freeissues->save();

            return redirect('/FreeissuesView');
    
    }

}
