@extends('layouts.main')

@section('content')
<body>
<br>

<div class="container">

    <div class="col-12 row">

    <div class="col-md-4"></div>


    <div class="col-md-4">
            <form action="/customerAdd" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Customer Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_name" placeholder="Enter Customer Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Customer Code</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="" placeholder="Auto Generate Customer Code" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Customer Address </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_address" placeholder="Enter Customer Address" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Customer Contact</label>
                <input type="text" class="form-control" maxlength="10" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_contact" placeholder="Enter Customer Contact" required>
            </div>

            
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
    </div>


    <div class="col-md-4"></div>
            
    </div>
</div>
@endsection