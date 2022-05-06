@extends('layouts.main')

@section('content')
<body>
<br>

<div class="container">

    <div class="col-12 row">

    <div class="col-md-4"></div>


    <div class="col-md-4">
            <form action="/freeissuesUpdate/{{$freeissues->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Free Issue Lable</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="free_issue_lable" value="{{$freeissues->free_issue_lable}}" placeholder="Enter Free Issue Lable">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Type</label>
                <select class="form-control" id="exampleFormControlSelect1" name="type">
                <option value="Flat" @if('Flat'==$freeissues->type) selected @endif>Flat</option>
                <option value="Multiple" @if('Multiple'==$freeissues->type) selected @endif>Multiple</option>
                </select> 
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Purchase Product</label>
                <select class="form-control product" id="exampleFormControlSelect1" name="product_ID">
                <option>Select Product</option>
                @foreach($product as $list)
                <option value="{{$list->id}}" @if($list->id==$freeissues->product_ID) selected @endif>{{$list->product_name}}</option>
                @endforeach
                </select> 
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Purchase Qty</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="purchase_qty" placeholder="Enter purchase qty" value="{{$freeissues->purchase_qty}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Free Qty</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="free_qty" placeholder="Enter free qty" value="{{$freeissues->free_qty}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Lower Limit</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lower_limit" placeholder="Enter lower limit" value="{{$freeissues->lower_limit}}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Upeer Limit</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="upeer_limit" placeholder="Enter upeer limit" value="{{$freeissues->upeer_limit}}">
            </div>

            
            
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br><br>
    </div>


    <div class="col-md-4"></div>
            
    </div>
</div>
@endsection