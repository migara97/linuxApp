@extends('layouts.main')

@section('content')
<body>
<br>

<div class="container">

    <div class="col-12 row">

    <div class="col-md-4"></div>


    <div class="col-md-4">
            <form action="/customerUpdate/{{$customer->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Customer Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_name" placeholder="Enter Customer Name" value="{{$customer->customer_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Customer Code</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="" placeholder="Auto Generate Customer Code"  value="{{$customer->customer_code}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Customer Address </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_address" placeholder="Enter Customer Address"  value="{{$customer->customer_address}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Customer Contact</label>
                <input type="text" class="form-control" maxlength="10" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_contact" placeholder="Enter Customer Contact"  value="{{$customer->customer_contact}}">
            </div>

            
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
    </div>


    <div class="col-md-4"></div>
            
    </div>
</div>
@endsection