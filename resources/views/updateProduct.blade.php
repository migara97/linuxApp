@extends('layouts.main')

@section('content')
<body>
<br>

<div class="container">

    <div class="col-12 row">

    <div class="col-md-4"></div>


    <div class="col-md-4">
            <form action="/productUpdate/{{$product->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_name" placeholder="Enter Product Name" value="{{$product->product_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product Code</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_code" placeholder="Enter Product Code" value="{{$product->Product_code}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_price" placeholder="Enter Price" value="{{$product->product_price}}">
            </div>

            <!-- <div class="form-group">
            <label for="exampleInputEmail1">Expiry Date</label>
            <input type="date" id="" name="product_expiryDate" value="{{$product->product_expiryDate}}">
            </div> -->
            
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
    </div>


    <div class="col-md-4"></div>
            
    </div>
</div>
@endsection