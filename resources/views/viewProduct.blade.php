@extends('layouts.main')

@section('content')
<body>
<br>
<div class="container">
<div class="col-12 row">

<div class="col-2"></div>
        <div class="col-8">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">product_name</th>
      <th scope="col">Product_code</th>
      <th scope="col">product_price</th>
      <th scope="col">product_expiryDate</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($product as $list)
    <tr>
      <th scope="row">{{$list->id}}</th>
      <td>{{$list->product_name}}</td>
      <td>{{$list->Product_code}}</td>
      <td>{{$list->product_price}}</td>
      <td>{{$list->product_expiryDate}}</td>
      <td><a href="/productEdit/{{$list->id}}"><i class="icon-pencil5"></i> Edit</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

        </div>
<div class="col-2"></div>

</div>

</div>
@endsection