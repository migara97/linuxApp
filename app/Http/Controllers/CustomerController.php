<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function create(){
        return view('addCustomer');
    }

    public function index(){
        $customer = Customer::all();
        return view('viewCustomer')->with('customer',$customer);
    }
    public function store(Request $request){

        // dd($request);

        $this->validate($request,[

            'customer_contact' => 'required|digits:10',

        ]);

        $customer = New Customer;
        
        $customer_name = $request->customer_name;
        $customer_code = rand(111111, 999999);
        $customer_address = $request->customer_address;
        $customer_contact =$request->customer_contact;

        $customer->customer_name=$customer_name;
        $customer->customer_code=$customer_code;
        $customer->customer_address=$customer_address;
        $customer->customer_contact=$customer_contact;

        $customer->save();

        return  back();
    }

    public function edit($id){

        $customer = Customer::find($id);

        return view('updateCustomer')->with('customer',$customer);

    }

    public function customerUpdate(Request $request,$id){

        $customer_name = $request->customer_name;
        $customer_address = $request->customer_address;
        $customer_contact =$request->customer_contact;

        $customer = Customer::find($id);

        $customer->customer_name=$customer_name;
        $customer->customer_address=$customer_address;
        $customer->customer_contact=$customer_contact;

        $customer->save();

        return  redirect('/customerView');

    }
}
